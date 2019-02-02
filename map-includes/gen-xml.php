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
         style="tooltip"
         url="<?php the_field('icon'); ?>"
         width="88" height="88"         
         devices="all"
         visible="true"
         enabled="true"
         handcursor="true"
         ath="<?php the_field('ath'); ?>" atv="<?php the_field('atv'); ?>"
        <?php
        $mapurl = get_field('mapurl');
         if ( $mapurl ): ?>
onclick="js( gototour(<?php echo $mapurl ?>) );"
        <?php else: ?>
onclick="js( hslink(<?php the_permalink() ?>) );"
        <?php endif ?>
 tooltip="<?php the_title() ?>"
         />

        <?php endwhile; ?>
<style name="tooltip"
          onover="copy(layer[tooltip].html, tooltip);
                  set(layer[tooltip].visible, true);
                  tween(layer[tooltip].alpha, 1.0, 0.5);
                  asyncloop(hovering, copy(layer[tooltip].x,mouse.stagex); copy(layer[tooltip].y,mouse.stagey); );"
          onout="tween(layer[tooltip].alpha, 0.0, 0.25, default, set(layer[tooltip].visible,false), copy(layer[tooltip].x,mouse.stagex); copy(layer[tooltip].y,mouse.stagey); );"
          />
   <!-- the 'tooltip' textfield -->
   <layer name="tooltip" keep="true"
          url="https://treasuremaps.online/360/plugins/textfield.swf"
          parent="STAGE"
          visible="false" alpha="0"
          enabled="false"
          align="lefttop"
          edge="bottom"
          oy="-2"
          background="false" backgroundcolor="0xFFFFFF" backgroundalpha="1.0"
          border="false" bordercolor="0x000000" borderalpha="1.0"
          borderwidth="1.0" roundedge="0"
          shadow="0.0" shadowrange="4.0" shadowangle="45" shadowcolor="0x000000" shadowalpha="1.0"
          textshadow="1" textshadowrange="6.0" textshadowangle="90" textshadowcolor="0x000000" textshadowalpha="1.0"
          css="text-align:center; color:#FFFFFF; font-family:Arial; font-weight:bold; font-size:14px;"
          html=""
          />        
</krpano>