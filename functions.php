<?php
/**
 * Theme Functions
 *
 * @package Treasure Maps
 * @author Treasure Maps
 * @link https://treasuremaps.online
 */

// Add a custom user role

$result = add_role( 'treasuremapper', __(

'treasuremapper' ),

array(

'read' => true, // true allows this capability
'edit_posts' => true, // Allows user to edit their own posts
'edit_pages' => true, // Allows user to edit pages
'edit_others_posts' => false, // Allows user to edit others posts not just their own
'create_posts' => true, // Allows user to create new posts
'manage_categories' => true, // Allows user to manage post categories
'publish_posts' => true, // Allows the user to publish, otherwise posts stays in draft mode
'edit_themes' => false, // false denies this capability. User can’t edit your theme
'install_plugins' => false, // User cant add new plugins
'update_plugin' => false, // User can’t update any plugins
'update_core' => false // user cant perform core updates

)

);

$result = add_role( 'minimapper', __(

'minimapper' ),

array(

'read' => true, // true allows this capability
'edit_posts' => true, // Allows user to edit their own posts
'edit_pages' => true, // Allows user to edit pages
'edit_others_posts' => false, // Allows user to edit others posts not just their own
'create_posts' => true, // Allows user to create new posts
'manage_categories' => true, // Allows user to manage post categories
'publish_posts' => true, // Allows the user to publish, otherwise posts stays in draft mode
'edit_themes' => false, // fa\lse denies this capability. User can’t edit your theme
'install_plugins' => false, // User cant add new plugins
'update_plugin' => false, // User can’t update any plugins
'update_core' => false // user cant perform core updates

)

);
$result = add_role( 'maybemapper', __(

'maybemapper' ),

array(

'read' => true, // true allows this capability
'edit_posts' => true, // Allows user to edit their own posts
'edit_pages' => true, // Allows user to edit pages
'edit_others_posts' => false, // Allows user to edit others posts not just their own
'create_posts' => true, // Allows user to create new posts
'manage_categories' => true, // Allows user to manage post categories
'publish_posts' => true, // Allows the user to publish, otherwise posts stays in draft mode
'edit_themes' => false, // false denies this capability. User can’t edit your theme
'install_plugins' => false, // User cant add new plugins
'update_plugin' => false, // User can’t update any plugins
'capabilities' => array('assign_terms' => 'edit_tours'),
'capability_type' => 'tour',
'map_meta_cap' => true,
'update_core' => false // user cant perform core updates

)

);
/**
 * WordPress register with email only, make it possible to register with email 
 * as username in a multisite installation
 * @param  Array $result Result array of the wpmu_validate_user_signup-function
 * @return Array         Altered result array
 */
function custom_register_with_email($result) {
 
   if ( $result['user_name'] != '' && is_email( $result['user_name'] ) ) {
 
      unset( $result['errors']->errors['user_name'] );
 
   }
 
   return $result;
}
add_filter('wpmu_validate_user_signup','custom_register_with_email');

add_action("gform_user_registered", "autologin", 10, 4);
function autologin($user_id, $config, $entry, $password) {
        wp_set_auth_cookie($user_id, false, '');
}

add_action('wp_head', 'add_css_head');
function add_css_head() {
   if ( is_user_logged_in() ) {
   ?>
      <style>
           .loggedout {
           	display: none
           } 
          .loggedin {
           	display: inline;
           	color: yellow;  
           }
      </style>
   <?php
   } else {
   ?>
     <style> 
     .loggedout {
           	display: inline;
           }  
     .loggedin {
           	display: none;
           }
   	</style>
   <?php
   }
}

add_filter('show_admin_bar', '__return_false');

// Delete post
function delete_post(){
    global $post;
    $deletepostlink= add_query_arg( 'frontend', 'true', get_delete_post_link( get_the_ID() ) );
    if (current_user_can('edit_post', $post->ID)) {
        echo       '<span><a class="post-delete-link" onclick="return confirm(\'¿Are you sure to delete?\')" href="'.$deletepostlink.'">Delete Post</a></span>';
    }
}

//Redirect after delete post in frontend
add_action('trashed_post','trash_redirection_frontend');
function trash_redirection_frontend($post_id) {
    if ( filter_input( INPUT_GET, 'frontend', FILTER_VALIDATE_BOOLEAN ) ) {
        wp_redirect( get_option('siteurl').'/my-maps' );
        exit;
    }
}
/**
 * Gravity Wiz // Gravity Forms // Rename Uploaded Files
 *
 * Rename uploaded files for Gravity Forms. You can create a static naming template or using merge tags to base names on user input.
 *
 * Features:
 *  + supports single and multi-file upload fields
 *  + flexible naming template with support for static and dynamic values via GF merge tags
 *
 * Uses:
 *  + add a prefix or suffix to file uploads
 *  + include identifying submitted data in the file name like the user's first and last name
 *
 * @version   2.2
 * @author    David Smith <david@gravitywiz.com>
 * @license   GPL-2.0+
 * @link      https://gravitywiz.com/rename-uploaded-files-for-gravity-form/
 */
class GW_Rename_Uploaded_Files {
	public function __construct( $args = array() ) {
		// set our default arguments, parse against the provided arguments, and store for use throughout the class
		$this->_args = wp_parse_args( $args, array(
			'form_id'  => false,
			'field_id' => false,
			'template' => ''
		) );
		// do version check in the init to make sure if GF is going to be loaded, it is already loaded
		add_action( 'init', array( $this, 'init' ) );
	}
	public function init() {
		// make sure we're running the required minimum version of Gravity Forms
		if( ! is_callable( array( 'GFFormsModel', 'get_physical_file_path' ) ) ) {
			return;
		}
		add_filter( 'gform_entry_post_save', array( $this, 'rename_uploaded_files' ), 9, 2 );
		add_filter( 'gform_entry_post_save', array( $this, 'stash_uploaded_files' ), 99, 2 );
		add_action( 'gform_after_update_entry', array( $this, 'rename_uploaded_files_after_update' ), 9, 2 );
		add_action( 'gform_after_update_entry', array( $this, 'stash_uploaded_files_after_update' ), 99, 2 );
	}
	function rename_uploaded_files( $entry, $form ) {
		if( ! $this->is_applicable_form( $form ) ) {
			return $entry;
		}
		foreach( $form['fields'] as &$field ) {
			if( ! $this->is_applicable_field( $field ) ) {
				continue;
			}
			$uploaded_files = rgar( $entry, $field->id );
			if( empty( $uploaded_files ) ) {
				continue;
			}
			$uploaded_files = $this->parse_files( $uploaded_files, $field );
			$stashed_files  = $this->parse_files( gform_get_meta( $entry['id'], 'gprf_stashed_files' ), $field );
			$renamed_files  = array();
			foreach( $uploaded_files as $_file ) {
				// Don't rename the same files twice.
				if( in_array( $_file, $stashed_files ) ) {
					$renamed_files[] = $_file;
					continue;
				}
				$dir  = wp_upload_dir();
				$dir  = $this->get_upload_dir( $form['id'] );
				$file = str_replace( $dir['url'], $dir['path'], $_file );
				if( ! file_exists( $file ) ) {
					continue;
				}
				$renamed_file = $this->rename_file( $file, $entry );
				if ( ! is_dir( dirname( $renamed_file ) ) ) {
					wp_mkdir_p( dirname( $renamed_file ) );
				}
				$result = rename( $file, $renamed_file );
				$renamed_files[] = $this->get_url_by_path( $renamed_file );
			}
			// In cases where 3rd party add-ons offload the image to a remote location, no images can be renamed.
			if( empty( $renamed_files ) ) {
				continue;
			}
			if( $field->get_input_type() == 'post_image' ) {
				$value = str_replace( $uploaded_files[0], $renamed_files[0], rgar( $entry, $field->id ) );
			} else if( $field->multipleFiles ) {
				$value = json_encode( $renamed_files );
			} else {
				$value = $renamed_files[0];
			}
			GFAPI::update_entry_field( $entry['id'], $field->id, $value );
			$entry[ $field->id ] = $value;
		}
		return $entry;
	}
	function get_upload_dir( $form_id ) {
		$dir = GFFormsModel::get_file_upload_path( $form_id, 'PLACEHOLDER' );
		$dir['path'] = dirname( $dir['path'] );
		$dir['url']  = dirname( $dir['url'] );
		return $dir;
	}
	function rename_uploaded_files_after_update( $form, $entry_id ) {
		$entry = GFAPI::get_entry( $entry_id );
		$this->rename_uploaded_files( $entry, $form );
	}
	/**
	 * Stash the "final" version of the files after other add-ons have had a chance to interact with them.
	 *
	 * @param $entry
	 * @param $form
	 */
	function stash_uploaded_files( $entry, $form ) {
		foreach ( $form['fields'] as &$field ) {
			if ( ! $this->is_applicable_field( $field ) ) {
				continue;
			}
			$uploaded_files = rgar( $entry, $field->id );
			gform_update_meta( $entry['id'], 'gprf_stashed_files', $uploaded_files );
		}
		return $entry;
	}
	function stash_uploaded_files_after_update( $form, $entry_id ) {
		$entry = GFAPI::get_entry( $entry_id );
		$this->stash_uploaded_files( $entry, $form );
	}
	function rename_file( $file, $entry ) {
		$new_file = $this->get_template_value( $this->_args['template'], $file, $entry );
		$new_file = $this->increment_file( $new_file );
		return $new_file;
	}
	function increment_file( $file ) {
		$file_path = GFFormsModel::get_physical_file_path( $file );
		$pathinfo  = pathinfo( $file_path );
		$counter   = 1;
		// increment the filename if it already exists (i.e. balloons.jpg, balloons1.jpg, balloons2.jpg)
		while ( file_exists( $file_path ) ) {
			$file_path = str_replace( ".{$pathinfo['extension']}", "{$counter}.{$pathinfo['extension']}", GFFormsModel::get_physical_file_path( $file ) );
			$counter++;
		}
		$file = str_replace( basename( $file ), basename( $file_path ), $file );
		return $file;
	}
	function is_path( $filename ) {
		return strpos( $filename, '/' ) !== false;
	}
	function get_template_value( $template, $file, $entry ) {
		$info = pathinfo( $file );
		if( strpos( $template, '/' ) === 0 ) {
			$dir      = wp_upload_dir();
			$template = $dir['basedir'] . $template;
		} else {
			$template = $info['dirname'] . '/' . $template;
		}
		// replace our custom "{filename}" psuedo-merge-tag
		$value = str_replace( '{filename}', $info['filename'], $template );
		// replace merge tags
		$form  = GFAPI::get_form( $entry['form_id'] );
		$value = GFCommon::replace_variables( $value, $form, $entry, false, true, false, 'text' );
		// make sure filename is "clean"
		$filename = $this->clean( basename( $value ) );
		$value    = str_replace( basename( $value ), $filename, $value );
		// append our file ext
		$value .= '.jpg';
		return $value;
	}
	function remove_slashes( $value ) {
		return stripslashes( str_replace( '/', '', $value ) );
	}
	function is_applicable_form( $form ) {
		$form_id = isset( $form['id'] ) ? $form['id'] : $form;
		return $form_id == $this->_args['form_id'];
	}
	function is_applicable_field( $field ) {
		$is_file_upload_field   = in_array( GFFormsModel::get_input_type( $field ), array( 'fileupload', 'post_image' ) );
		$is_applicable_field_id = $this->_args['field_id'] ? $field['id'] == $this->_args['field_id'] : true;
		return $is_file_upload_field && $is_applicable_field_id;
	}
	function clean( $str ) {
		return $this->remove_slashes( sanitize_title_with_dashes( strtr(
			utf8_decode( $str ),
			utf8_decode( 'ŠŒŽšœžŸ¥µÀÁÂÃÄÅÆÇÈÉÊËÌÍÎÏÐÑÒÓÔÕÖØÙÚÛÜÝßàáâãäåæçèéêëìíîïðñòóôõöøùúûüýÿ'),
			'SOZsozYYuAAAAAAACEEEEIIIIDNOOOOOOUUUUYsaaaaaaaceeeeiiiionoooooouuuuyy'
		), 'save' ) );
	}
	function get_url_by_path( $file ) {
		$dir = wp_upload_dir();
		$url = str_replace( $dir['basedir'], $dir['baseurl'], $file );
		return $url;
	}
	function parse_files( $files, $field ) {
		if( empty( $files ) ) {
			return array();
		}
		if( $field->get_input_type() == 'post_image' ) {
			$file_bits = explode( '|:|', $files );
			$files = array( $file_bits[0] );
		} else if( $field->multipleFiles ) {
			$files = json_decode( $files );
		} else {
			$files = array( $files );
		}
		return $files;
	}
}
new GW_Rename_Uploaded_Files( array(
	'form_id' => 13,
	'field_id' => 7,
	'template' => 'map' // most merge tags are supported, original file extension is preserved
) );
new GW_Rename_Uploaded_Files( array(
	'form_id' => 6,
	'field_id' => 5,
	'template' => 'map' // most merge tags are supported, original file extension is preserved
) );
new GW_Rename_Uploaded_Files( array(
	'form_id' => 12,
	'field_id' => 5,
	'template' => 'map' // most merge tags are supported, original file extension is preserved
) );
new GW_Rename_Uploaded_Files( array(
	'form_id' => 18,
	'field_id' => 5,
	'template' => 'map' // most merge tags are supported, original file extension is preserved
) );

add_filter( 'gform_upload_path', 'change_upload_pathloggedin', 10, 2 );
function change_upload_pathloggedin( $path_info, $form_id ) {
	$form_id = 12;
	$name = rgpost( 'input_4' );
	$name = str_replace(' ', '-', $name);
	$name = strtolower($name);
    $path_info['path'] = '/home1/enizielski/public_html/treasuremaps.online/360/'.$name.'/panos/panorama.tiles/path/';
    $path_info['url'] = 'http://www.treasuremaps.online/360/'.$name.'/panos/panorama.tiles/url/';
			copy('/home1/enizielski/public_html/treasuremaps.online/360/map-includes/tour.xml', '/home1/enizielski/public_html/treasuremaps.online/360/'.$name.'/tour.xml');
			copy('/home1/enizielski/public_html/treasuremaps.online/360/map-includes/plugin.xml', '/home1/enizielski/public_html/treasuremaps.online/360/'.$name.'/plugin.xml');			
			copy('/home1/enizielski/public_html/treasuremaps.online/360/map-includes/myfile.xml', '/home1/enizielski/public_html/treasuremaps.online/360/'.$name.'/myfile.xml');
			copy('/home1/enizielski/public_html/treasuremaps.online/360/map-includes/mobilemyfile.xml', '/home1/enizielski/public_html/treasuremaps.online/360/'.$name.'/mobilemyfile.xml');
			copy('/home1/enizielski/public_html/treasuremaps.online/360/map-includes/mobilegen-xml.php', '/home1/enizielski/public_html/treasuremaps.online/360/'.$name.'/mobilegen-xml.php');
			copy('/home1/enizielski/public_html/treasuremaps.online/360/map-includes/gen.php', '/home1/enizielski/public_html/treasuremaps.online/360/'.$name.'/gen.php');
			copy('/home1/enizielski/public_html/treasuremaps.online/360/map-includes/gen-xml.php', '/home1/enizielski/public_html/treasuremaps.online/360/'.$name.'/gen-xml.php');   
   return $path_info;
}
add_filter( 'gform_upload_path', 'change_upload_pathpurchlgdin', 10, 2 );
function change_upload_pathpurchlgdin( $path_info, $form_id ) {
	$form_id = 18;
	$name = rgpost( 'input_4' );
	$name = str_replace(' ', '-', $name);
	$name = strtolower($name);
    $path_info['path'] = '/home1/enizielski/public_html/treasuremaps.online/360/'.$name.'/panos/panorama.tiles/path/';
    $path_info['url'] = 'http://www.treasuremaps.online/360/'.$name.'/panos/panorama.tiles/url/';
			copy('/home1/enizielski/public_html/treasuremaps.online/360/map-includes/tour.xml', '/home1/enizielski/public_html/treasuremaps.online/360/'.$name.'/tour.xml');
			copy('/home1/enizielski/public_html/treasuremaps.online/360/map-includes/plugin.xml', '/home1/enizielski/public_html/treasuremaps.online/360/'.$name.'/plugin.xml');			
			copy('/home1/enizielski/public_html/treasuremaps.online/360/map-includes/myfile.xml', '/home1/enizielski/public_html/treasuremaps.online/360/'.$name.'/myfile.xml');
			copy('/home1/enizielski/public_html/treasuremaps.online/360/map-includes/mobilemyfile.xml', '/home1/enizielski/public_html/treasuremaps.online/360/'.$name.'/mobilemyfile.xml');
			copy('/home1/enizielski/public_html/treasuremaps.online/360/map-includes/mobilegen-xml.php', '/home1/enizielski/public_html/treasuremaps.online/360/'.$name.'/mobilegen-xml.php');
			copy('/home1/enizielski/public_html/treasuremaps.online/360/map-includes/gen.php', '/home1/enizielski/public_html/treasuremaps.online/360/'.$name.'/gen.php');
			copy('/home1/enizielski/public_html/treasuremaps.online/360/map-includes/gen-xml.php', '/home1/enizielski/public_html/treasuremaps.online/360/'.$name.'/gen-xml.php');   
   return $path_info;
}
add_filter( 'gform_upload_path', 'change_upload_pathbuy', 10, 2 );
function change_upload_pathbuy( $path_info, $form_id ) {
	$form_id = 6;
	$name = rgpost( 'input_4' );
	$name = str_replace(' ', '-', $name);
	$name = strtolower($name);
    $path_info['path'] = '/home1/enizielski/public_html/treasuremaps.online/360/'.$name.'/panos/panorama.tiles/';
    $path_info['url'] = 'http://www.treasuremaps.online/360/'.$name.'/panos/panorama.tiles/';
    copy("http://treasuremaps.online/360/map-includes/tour.xml", get_home_path()  . "/360/'.$name.'/tour.xml");
			copy('/home1/enizielski/public_html/treasuremaps.online/360/map-includes/tour.xml', '/home1/enizielski/public_html/treasuremaps.online/360/'.$name.'/tour.xml');
			copy('/home1/enizielski/public_html/treasuremaps.online/360/map-includes/plugin.xml', '/home1/enizielski/public_html/treasuremaps.online/360/'.$name.'/plugin.xml');			
			copy('/home1/enizielski/public_html/treasuremaps.online/360/map-includes/myfile.xml', '/home1/enizielski/public_html/treasuremaps.online/360/'.$name.'/myfile.xml');
			copy('/home1/enizielski/public_html/treasuremaps.online/360/map-includes/mobilemyfile.xml', '/home1/enizielski/public_html/treasuremaps.online/360/'.$name.'/mobilemyfile.xml');
			copy('/home1/enizielski/public_html/treasuremaps.online/360/map-includes/mobilegen-xml.php', '/home1/enizielski/public_html/treasuremaps.online/360/'.$name.'/mobilegen-xml.php');
			copy('/home1/enizielski/public_html/treasuremaps.online/360/map-includes/gen.php', '/home1/enizielski/public_html/treasuremaps.online/360/'.$name.'/gen.php');
			copy('/home1/enizielski/public_html/treasuremaps.online/360/map-includes/gen-xml.php', '/home1/enizielski/public_html/treasuremaps.online/360/'.$name.'/gen-xml.php');   
   return $path_info;
}
add_filter( 'gform_upload_path', 'uploadthreesixty', 10, 2 );
function uploadthreesixty( $path_info, $form_id ) {
	$form_id = 20;
	$name = rgpost( 'input_4' );
	$name = str_replace(' ', '-', $name);
	$name = strtolower($name);
    $path_info['path'] = '/home1/enizielski/public_html/treasuremaps.online/360/'.$name.'/panos/panorama.tiles/';
    $path_info['url'] = 'http://www.treasuremaps.online/360/'.$name.'/panos/panorama.tiles/';
			copy('/home1/enizielski/public_html/treasuremaps.online/360/map-includes/360tour.xml', '/home1/enizielski/public_html/treasuremaps.online/360/'.$name.'/360tour.xml');
			copy('/home1/enizielski/public_html/treasuremaps.online/360/map-includes/plugin.xml', '/home1/enizielski/public_html/treasuremaps.online/360/'.$name.'/plugin.xml');			
			copy('/home1/enizielski/public_html/treasuremaps.online/360/map-includes/myfile.xml', '/home1/enizielski/public_html/treasuremaps.online/360/'.$name.'/myfile.xml');
			copy('/home1/enizielski/public_html/treasuremaps.online/360/map-includes/mobilemyfile.xml', '/home1/enizielski/public_html/treasuremaps.online/360/'.$name.'/mobilemyfile.xml');
			copy('/home1/enizielski/public_html/treasuremaps.online/360/map-includes/mobilegen-xml.php', '/home1/enizielski/public_html/treasuremaps.online/360/'.$name.'/mobilegen-xml.php');
			copy('/home1/enizielski/public_html/treasuremaps.online/360/map-includes/gen.php', '/home1/enizielski/public_html/treasuremaps.online/360/'.$name.'/gen.php');
			copy('/home1/enizielski/public_html/treasuremaps.online/360/map-includes/gen-xml.php', '/home1/enizielski/public_html/treasuremaps.online/360/'.$name.'/gen-xml.php');   
   return $path_info;
}

add_filter( 'gform_upload_path', 'upload360vid', 10, 2 );
function upload360vid( $path_info, $form_id ) {
	$form_id = 22;
	$name = rgpost( 'input_4' );
	$name = str_replace(' ', '-', $name);
	$name = strtolower($name);
    $path_info['path'] = '/home1/enizielski/public_html/treasuremaps.online/360/'.$name.'/panos/panorama.tiles/';
    $path_info['url'] = 'http://www.treasuremaps.online/360/'.$name.'/panos/panorama.tiles/';
			copy('/home1/enizielski/public_html/treasuremaps.online/360/map-includes/videotour.xml', '/home1/enizielski/public_html/treasuremaps.online/360/'.$name.'/videotour.xml');			
			copy('/home1/enizielski/public_html/treasuremaps.online/360/map-includes/plugin.xml', '/home1/enizielski/public_html/treasuremaps.online/360/'.$name.'/plugin.xml');			
			copy('/home1/enizielski/public_html/treasuremaps.online/360/map-includes/myfile.xml', '/home1/enizielski/public_html/treasuremaps.online/360/'.$name.'/myfile.xml');
			copy('/home1/enizielski/public_html/treasuremaps.online/360/map-includes/mobilemyfile.xml', '/home1/enizielski/public_html/treasuremaps.online/360/'.$name.'/mobilemyfile.xml');
			copy('/home1/enizielski/public_html/treasuremaps.online/360/map-includes/mobilegen-xml.php', '/home1/enizielski/public_html/treasuremaps.online/360/'.$name.'/mobilegen-xml.php');
			copy('/home1/enizielski/public_html/treasuremaps.online/360/map-includes/gen.php', '/home1/enizielski/public_html/treasuremaps.online/360/'.$name.'/gen.php');
			copy('/home1/enizielski/public_html/treasuremaps.online/360/map-includes/gen-xml.php', '/home1/enizielski/public_html/treasuremaps.online/360/'.$name.'/gen-xml.php');   
   return $path_info;
}


//login after registration
add_action("gform_user_registered", "register_login_reload", 10, 3);

function register_login_reload($user_id, $config, $entry) {    

	$user = new WP_User($user_id);

    $user_login = $_POST['input_22']; //use the input of the username in your form
    $user_pass  = $_POST['input_21']; //use the input of the password in your form

    //pass the above to the wp_signon function
    wp_signon( array(	'user_login' => $user_login,
    					'user_password' =>  $user_pass,
    					'remember' => false
    			   )
    		);

    $user = get_userdata($user_id);

	}


add_filter("gform_confirmation", "custom_confirmation", 10, 4);

function custom_confirmation($confirmation, $form, $lead, $ajax){

 //    global $current_user;

	// get_currentuserinfo();
		global $current_user;

		get_currentuserinfo();

	$switch = $lead["16"];

	$cursite = get_site_url();
  if( $form['id'] == '22' ) {
          $confirmation = array( "redirect" => "https://treasuremaps.online/my-maps" );
	
  }	
    if( $form['id'] == '20' ) {
          $confirmation = array( "redirect" => "https://treasuremaps.online/my-maps" );
	
  }	

    
    if( $form['id'] == '12' ) {
        $confirmation = array( "redirect" => "https://treasuremaps.online/my-maps" );
    } elseif($form["id"] == "2"){

    	$file_contents = file_get_contents("http://www.treasuremaps.online/360/".$switch."/gen-xml.php");



		// Open or create a file (this does it in the same dir as the script)

		$my_file = fopen( $_SERVER['DOCUMENT_ROOT'] . "/360/" . $switch . "/myfile.xml", "w");

		fwrite($my_file, $file_contents);



		// Close 'er up

		fclose($my_file);



		$file_contentsm = file_get_contents("http://www.treasuremaps.online/360/".$switch."/mobilegen-xml.php");



		// Open or create a file (this does it in the same dir as the script)

		$my_filem = fopen( $_SERVER['DOCUMENT_ROOT'] . "/360/" . $switch . "/mobilemyfile.xml", "w");

		fwrite($my_filem, $file_contentsm);



		// Close 'er up

		fclose($my_filem);



        $confirmation = array("redirect" => $cursite . "/360/gen.php");

    }



    return $confirmation;

}

add_filter("gform_confirmation", "refresh_nodes", 10, 4);

function refresh_nodes($confirmation, $form, $lead, $ajax){

    global $current_user;

	get_currentuserinfo();

	$switch = $lead["16"];

	$cursite = get_site_url();

    if($form["id"] == "5"){

    	$file_contents = file_get_contents("http://www.treasuremaps.online/360/".$switch."/gen-xml.php");



		// Open or create a file (this does it in the same dir as the script)

		$my_file = fopen( $_SERVER['DOCUMENT_ROOT'] . "/360/" . $switch . "/myfile.xml", "w");

		fwrite($my_file, $file_contents);



		// Close 'er up

		fclose($my_file);



		$file_contentsm = file_get_contents("http://www.treasuremaps.online/360/".$switch."/mobilegen-xml.php");



		// Open or create a file (this does it in the same dir as the script)

		$my_filem = fopen( $_SERVER['DOCUMENT_ROOT'] . "/360/" . $switch . "/mobilemyfile.xml", "w");

		fwrite($my_filem, $file_contentsm);



		// Close 'er up

		fclose($my_filem);



        $confirmation = array("redirect" => $cursite . "/360/" . $switch . "/gen.php");

    }



    return $confirmation;

}

add_filter("gform_confirmation", "pub_submit", 10, 4);

function pub_submit($confirmation, $form, $lead, $ajax){

    global $current_user;

	get_currentuserinfo();

	$switch = $lead["16"];

	$cursite = get_site_url();

    if($form["id"] == "26"){

    	$file_contents = file_get_contents("http://www.treasuremaps.online/360/".$switch."/gen-xml.php");



		// Open or create a file (this does it in the same dir as the script)

		$my_file = fopen( $_SERVER['DOCUMENT_ROOT'] . "/360/" . $switch . "/myfile.xml", "w");

		fwrite($my_file, $file_contents);



		// Close 'er up

		fclose($my_file);



		$file_contentsm = file_get_contents("http://www.treasuremaps.online/360/".$switch."/mobilegen-xml.php");



		// Open or create a file (this does it in the same dir as the script)

		$my_filem = fopen( $_SERVER['DOCUMENT_ROOT'] . "/360/" . $switch . "/mobilemyfile.xml", "w");

		fwrite($my_filem, $file_contentsm);



		// Close 'er up

		fclose($my_filem);



        $confirmation = array("redirect" => $cursite . "/360/" . $switch . "/gen.php");

    }



    return $confirmation;

}

add_filter( 'gform_pre_render_20', 'populate_post2' );
add_filter( 'gform_pre_validation_20', 'populate_post2' );
add_filter( 'gform_pre_submission_filter_20', 'populate_post2' );
add_filter( 'gform_admin_pre_render_20', 'populate_post2' );
function populate_post2( $form ) {

    foreach ( $form['fields'] as &$field ) {

        if ( $field->type != 'select' || strpos( $field->cssClass, 'populate-post' ) === false ) {
            continue;
        }
        $luid = wp_get_current_user();
        // you can add additional parameters here to alter the posts that are retrieved
        // more info: [http://codex.wordpress.org/Template_Tags/get_posts](http://codex.wordpress.org/Template_Tags/get_posts)
        $posts = get_posts( 'numberposts=-1&post_status=publish&post_type=tour&author='.$luid->ID );


        $choices = array();

        foreach ( $posts as $post ) {
            $choices[] = array( 'text' => get_permalink($post->ID), 'value' => get_permalink($post->ID) );
        }

        // update 'Select a Post' to whatever you'd like the instructive option to be
        $field->placeholder = 'Select a parent Map';
        $field->choices = $choices;

    }

    return $form;
}
add_filter( 'gform_pre_render_2', 'populate_post3' );
add_filter( 'gform_pre_validation_2', 'populate_post3' );
add_filter( 'gform_pre_submission_filter_2', 'populate_post3' );
add_filter( 'gform_admin_pre_render_2', 'populate_post3' );
function populate_post3( $form ) {

    foreach ( $form['fields'] as &$field ) {

        if ( $field->type != 'select' || strpos( $field->cssClass, 'populate-post' ) === false ) {
            continue;
        }
        $luid = wp_get_current_user();
        // you can add additional parameters here to alter the posts that are retrieved
        // more info: [http://codex.wordpress.org/Template_Tags/get_posts](http://codex.wordpress.org/Template_Tags/get_posts)
        $posts = get_posts( 'numberposts=-1&post_status=publish&post_type=tour&author='.$luid->ID );


        $choices = array();

        foreach ( $posts as $post ) {
            $choices[] = array( 'text' => get_permalink($post->ID), 'value' => get_permalink($post->ID) );
        }

        // update 'Select a Post' to whatever you'd like the instructive option to be
        $field->placeholder = 'Select a parent Map';
        $field->choices = $choices;

    }

    return $form;
}