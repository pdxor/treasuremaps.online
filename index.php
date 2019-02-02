<title><?php wp_title('|', true, 'right'); ?></title>
<?php wp_head(); ?>
  <body>
<div class="container-full" >
  <div class="headerbg"><h1><?php the_title(); ?></h1></div>
      <div class="row" style="background: white; border-radius: 8px;">
          <?php if ( have_posts() ) : while ( have_posts() ) : the_post(); ?>

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

  </body>
<?php wp_footer(); ?>