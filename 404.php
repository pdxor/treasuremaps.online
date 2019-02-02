<?php


/*


Template Name: 404


*/


$tags = $_GET['urltag'];
$urlref = wp_get_referer();
global $urlref;
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
#gform_submit_button_5 {
    margin: 0 auto;
    display: block;
  }
  </style>
    <script type="text/javascript">
window.onload = function() {
$(this).attr("src", function(index, old) {
    return old.replace('http://treasuremaps.online/tour/', 'http://treasuremaps.online/360/');
});
}

    </script>
<style>
body {
     background-color: #1f242e;
}
#outPopUp{
padding-top: 154px;
display: block;
width:100%;
max-width: 777px;
margin: 0 auto;
}
h1 {
  color: white;
  text-align: center;
}
</style>
</head>
<body>
<div id="outPopUp">
<h1 style="color: white;">
<?php 
$parts = parse_url($urlref);
$path_parts= explode('/', $parts[path]);
$customtype = $path_parts[1];
$urltag = $path_parts[2];
if ( $customtype == 'tour' ){
  echo 'This hotspot was recently deleted. You will need to refresh the map data with the button below.';
  gravity_form( 5 , $display_title = false, $display_description = false , $display_inactive = false, $field_values = array('urltag' => $urltag ) , $ajax = false, $tabindex, $echo = true );
}
else
{
    echo 'You are 404ing so hard right now. This page is not here. Super sorry.<br/> -Managements';
}
?>



</h1>
</div>

        
      </div>
    </div>
        <?php wp_footer(); ?>
  </body>
</html>