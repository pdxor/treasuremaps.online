<?php
/*
Template Name: dashboard
*/

$tags = $_GET['urltag'];


?>
  <html <?php language_attributes(); ?> style="margin-top: 0px !important;">
<!--<![endif]-->
<head>
<meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1">
<?php wp_head(); ?>   
<link rel="stylesheet" href="//netdna.bootstrapcdn.com/bootstrap/3.1.0/css/bootstrap.min.css">
<style>
.wpuf-author {
  display: none;
}
.post-edit-link{
  display: none;
}
.vc_inline-link{
  display: none;
}
#wpadminbar {
  display: none;
}
#loginform a {
  display: none;
}
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
      background: url(http://www.treasuremaps.online/360/tr-icon.jpg)#5d5b5e no-repeat left 32px;
      padding: 22px 13px 7px 62px;
      border-bottom: 15px solid #079061;
    }
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
      background: url(http://www.treasuremaps.online/360/tr-icon.jpg)#5d5b5e no-repeat left 32px;
      padding: 22px 13px 7px 62px;
      border-bottom: 15px solid #079061;
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
</head>
  <body>
      <div style="display: block; width: 90%; margin: -22px auto 0px auto;">
      <div class="row" style="background: white; border-radius: 8px;">
          <?php if ( have_posts() ) : while ( have_posts() ) : the_post(); ?>
          <div class="headerbg"><h1><?php the_title(); ?></h1></div>

                <?php echo get_post_meta($post->ID, 'krlat', true); ?>

         
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