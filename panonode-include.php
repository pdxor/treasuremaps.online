<?php



/*



Template Name: submit a node



*/
$lead = get_field('panoimg');
$gold = parse_url($lead);
$elixir = ($gold[path]);

?>



<html <?php language_attributes(); ?> style="margin-top: 0px !important;">

<div id="fb-root"></div>
<script>(function(d, s, id) {
  var js, fjs = d.getElementsByTagName(s)[0];
  if (d.getElementById(id)) return;
  js = d.createElement(s); js.id = id;
  js.src = "//connect.facebook.net/en_US/sdk.js#xfbml=1&version=v2.9&appId=827047834119073";
  fjs.parentNode.insertBefore(js, fjs);
}(document, 'script', 'facebook-jssdk'));</script>

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
    color: #5d5b5e;

}
  .headerbg h1 {
    font-size: 22px
    color: #5d5b5e;
    padding-left: 12px;
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

.container-full {
  margin: 0 auto;
  width: 100%;
}
.container-full .row {
    width: 100%;
    margin: 0 auto;
}
.firstp {
    display: block;
    min-height: 411px;
    background-color: #eeeeee;
    padding: 19px 22px;
    border-radius: 6px;
}
	</style>

</head>
	<body>
<div class="container-full" >
	
		  <div class="row margme" style="background: white; border-radius: 8px;">
				  <?php if ( have_posts() ) : while ( have_posts() ) : the_post(); ?>
				  	<div class="headerbg"><h1><?php the_title(); ?></h1><br/>
				  		
				  	</div>
				  	
				  	
					<div class="col-sm-6">
					<?php
				$slid = get_field('sliderID');
				if($slid)

				{
					echo get_new_royalslider($slid); 
				}

				?>
					<?php
				$imgd = get_field('upimage');
				if($imgd)

				{
					echo '<img src="'.$imgd.'" class="img-responsive">';
				}

				?>				
					<?php
				$id = get_field('youtube_id');
				if($id)

				{
					echo '<div class="intrinsic-container">'.$id.'</div>'; 
				}

				?><?php the_post_thumbnail( 'medium_large' ); ?>
				
				</div>
					<div class="col-sm-6"><div class="firstp"><?php the_content(); ?><hr/></div>
									  <?php
						global $current_user;
						get_currentuserinfo();
					 
						if (is_user_logged_in() && $current_user->ID == $post->post_author)  {
							edit_post_link('Edit Post', '', '');
							echo '&nbsp;<span style="color: black;">|</span>&nbsp;';
							echo delete_post();
						}
					?>	</div>	

				 
						  

  				 <br/>   
          
      <br/>


					  <?php endwhile; else: ?>
					  <?php _e('Sorry, this page does not exist.'); ?>
				 <?php endif; ?>



			  <div class="fb-comments" data-href="<?php the_permalink(); ?>" data-width="100%" data-numposts="5"></div>

		</div>
		    <?php wp_footer(); ?>
	</body>
</html>