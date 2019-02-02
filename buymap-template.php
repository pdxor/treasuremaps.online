<?php


/*


Template Name: but map template


*/


$tags = $_GET['urltag'];
$loggedinuser = get_current_user_id();
?>
<html <?php language_attributes(); ?> style="margin-top: 0px !important;">
<!--<![endif]-->
<head>
<meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1">
<?php wp_head(); ?>   
<link rel="stylesheet" href="//netdna.bootstrapcdn.com/bootstrap/3.1.0/css/bootstrap.min.css">
  <style>
  #wpadminbar {
    display: none;
  }

  #respond {

      padding-top: 17px;
      display: none;
  }
  #loginform a {
    display: none;
  }
  img {
    max-width: 100%;
    margin: 0 auto;
    height: auto;
  }
.headerbg {
    color: #c6d6d6;
    background: url(http://www.treasuremaps.online/360/tr-icon.jpg)#5d5b5e no-repeat left 3px;
    padding: 1px 13px 3px 62px;
    border-bottom: 6px solid #079061;
}
  .headerbg h1 {
    font-size: 22px
  }
  .intrinsic-container {
  position: relative;
  height: 80%;
  width: 100%;

  overflow: hidden;
}
 
/* 16x9 Aspect Ratio */
.intrinsic-container-16x9 {
  padding-bottom: 56.25%;
}
 
/* 4x3 Aspect Ratio */
.intrinsic-container-4x3 {
  padding-bottom: 75%;
}
 
.intrinsic-container iframe {
  top:0;
  left: 0;
  width: 100%;
  height: 100%;
}
.cleanlogin-outer {
  background: none;
  border: none;
}
.cleanlogin-container {
padding: 25px;
}


</style>

<script type="text/javascript">
  function newTab(f) {
    var els = document.getElementsByTagName('a'); //read anchor elements into variable
    if(f.tab.checked == true) { //If the box is checked.
      for (var i in els) {
        els[i].setAttribute('target', '_blank'); //Add 'target="blank"' to the HTML
      } 
    } else { // not checked...
      for (var i in els) {
        els[i].setAttribute('target', '_self'); //Add 'target="self" to HTML
      }
    }
  }
</script>   
<style>
.container-full {
  margin: 0 auto;
  width: 100%;
}
.container-full .row {
  width: 95%;
  margin: 0 auto;
}
#field_12_13 {
visibility: hidden;
  }
  </style>
</head>
  <body>
<div class="container-full" >
  <h1><?php the_title(); ?></h1>
      <div class="row" style="background: white; border-radius: 8px;">
          <?php 
          $user = new WP_User( $loggedinuser );

          if ( !empty( $user->roles ) && is_array( $user->roles ) ) {
              foreach ( $user->roles as $role )
                  global $role;
          }

          ?>
          <?php 

          $amtmaps = count_user_posts( $loggedinuser , "tour"  );
           if($role == 'administrator' ){
           echo 'you can post admin' ;
           gravity_form( 12, false, false, false, '', false );
          }
         elseif($role == 'minimapper' && $amtmaps < 5 ) {
           echo 'you can post minimapper. you have'. $amtmaps. 'maps' ;
           gravity_form( 12, false, false, false, '', false );
          } 
          elseif($role == 'maybemapper') {
            gravity_form( 18, false, false, false, '', false );
          }
         elseif( !is_user_logged_in() ) {
            gravity_form( 6, false, false, false, '', false );
          }
          else {
            gravity_form( 18, false, false, false, '', false );
          } ?>
          <php echo $loggedinuser; ?>
          <?php if ( have_posts() ) : while ( have_posts() ) : the_post(); ?>
         
         <?php the_content(); ?>

            <?php the_post_thumbnail( 'medium_large' ); ?>
            <?php comments_template( '', true ); ?> 
            
            <?php endwhile; else: ?>
            <?php _e('Sorry, this page does not exist.'); ?>
         <?php endif; ?>
        <div class="intrinsic-container">
        <?php
        $id = get_field('youtube_id');
        if($id)

        {
          echo $id;
        }

        ?>

        
      </div>
    </div>
        <?php wp_footer(); ?>
  </body>
</html>