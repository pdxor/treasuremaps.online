<?php
/*
Template Name: submit tag
*/
$tags = $_GET['urltag'];
?>
<html <?php language_attributes(); ?>>
<!--<![endif]-->
<head>
<meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1">
<?php wp_head(); ?>   

<link rel="stylesheet" href="//netdna.bootstrapcdn.com/bootstrap/3.1.0/css/bootstrap.min.css">
<style>
  #wpadminbar {
    display: none;
  }
#loginform a {
  display: none;
}
</style>
</head>
<body>

<div>
  <div class="row">
  <div class="col-md-6">
  	hello
      <?php if ( have_posts() ) : while ( have_posts() ) : the_post(); ?>
      <?php the_content(); ?>
      <?php edit_post_link(); ?>
      <?php endwhile; else: ?>
      <?php _e('Sorry, this page does not exist.'); ?>
      <?php endif; ?>
  </div>
<div class="col-md-6">
  hello
<?php if($_GET){
//do something if $_GET is set 
$args = array(
"thumbnail_width" => "54","thumbnail_height" => "54",
"widget_title" => "Submissions for this spot",
"meta_key"      => "tour-name",
"meta_value"        => $tags,
special_recent_posts($args);
} 
?>
</div>

</div>
        <?php wp_footer(); ?>
</body>
</html>