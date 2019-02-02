<?php 
$root = $_SERVER['DOCUMENT_ROOT'];
include($root . '/wp-load.php'); 
global $loop;
$parent = basename(dirname($_SERVER['PHP_SELF']));
?>
<krpano>
<?php 
$args = array(
    'post_type'     => 'panonode',
    'posts_per_page'    => 100,
    'meta_key'      => 'tour-name',
    'meta_value'        => $parent,
    'ath' => get_field('ath'), 
    'atv' => get_field('atv'),
    'name' => get_field('tour-name'),
    'icon' => get_field('icon'),

);
 
// query
$loop = new WP_Query( $args );
 ?>
        <?php while ( $loop->have_posts() ) : $loop->the_post(); ?>
       <hotspot name="<?php the_title() ?>"
         type="image"
         url="<?php the_field('icon'); ?>"
         width="94" height="94"
         devices="all"
         visible="true"
         enabled="true"
         handcursor="true"
         ath="<?php the_field('ath'); ?>" atv="<?php the_field('atv'); ?>"
         onclick="js( hslink(<?php the_permalink() ?>) );"
         tooltip="<?php the_field('tour-name'); ?>"
         />

        <?php endwhile; ?>
</krpano>