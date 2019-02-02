<?php


/*


Template Name: call back template


*/

$root = $_SERVER['DOCUMENT_ROOT'];
include($root . '/wp-load.php'); 
global $loop;
$actual_link = 'http://'.$_SERVER['HTTP_HOST'].$_SERVER['PHP_SELF'];
$strings = explode("/", $actual_link);
$newlink = $strings[4];
$user = wp_get_current_user();
$userstatus = $_GET['status'];
$publicmaps = $_GET['message'];
$submitmap = $_GET['action'];
$oglink = 'https://'.$_SERVER["SERVER_NAME"].$_SERVER["REQUEST_URI"];
?><!DOCTYPE html>
<html>
<head>
  <title>Welcome Treasure Mappers!</title>
  <meta property="og:title" content="Treasure Map - First Online Drone Mapping Tool"/>
  <meta property="og:description" content="Treasure Maps is a must have tool for drone pilots - Allows you to instantly make maps out of your aerial photos and tag images, videos and more with clickable markers. These presentations can be made in the field with your phone and are immediate sales generators. Keep the excitement high with Treasure Maps! "/>
  <meta property="og:type" content="article"/>
  <meta property="og:url" content="https://www.treasuremaps.online/welcome-back"/>
  <meta property="og:site_name" content="Treasure Maps"/>
  <meta property="og:image" content="https://treasuremaps.online/wp-content/uploads/2017/06/ogimage.jpg"/>
  <meta property="fb:app_id" content="827047834119073">
  <meta name="viewport" content="target-densitydpi=device-dpi, width=device-width, initial-scale=1.0, minimum-scale=1.0, maximum-scale=1.0" />
  <meta name="apple-mobile-web-app-capable" content="yes" />
  <meta http-equiv="Content-Type" content="text/html;charset=utf-8" />
  <meta http-equiv="x-ua-compatible" content="IE=edge" />
  
  <link rel="stylesheet" type="text/css" media="all" href="<?php echo get_site_url(); ?>/360/treasuremap-template-files/css/color-theme.css" />
  <link rel="stylesheet" type="text/css" media="all" href="<?php echo get_site_url(); ?>/360/treasuremap-template-files/css/webslidemenu.css" />
    <!-- font awesome -->
  <link rel="stylesheet" href="<?php echo get_site_url(); ?>/360/treasuremap-template-files/font-awesome/css/font-awesome.min.css" />
  <!-- font awesome -->
  <!--[if !IE]><!-->
  <script type="text/javascript" src="<?php echo get_site_url(); ?>/360/treasuremap-template-files/js/jquery-2.1.1.min.js"></script>
  <!--<![endif]-->
  <!--[if lte IE 8]>
  <script type="text/javascript" src="<?php echo get_site_url(); ?>/360/treasuremap-template-files/js/jquery-1.11.1.min.js"></script>
  <![endif]-->
  <!--[if gt IE 8]>
  <script type="text/javascript" src="<?php echo get_site_url(); ?>/360/treasuremap-template-files/js/jquery-2.1.1.min.js"></script>
  <![endif]-->
<!-- Latest compiled and minified CSS -->
<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css" integrity="sha384-BVYiiSIFeK1dGmJRAkycuHAHRg32OmUcww7on3RYdg4Va+PmSTsz/K68vbdEjh4u" crossorigin="anonymous">

<!-- Optional theme -->
<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap-theme.min.css" integrity="sha384-rHyoN1iRsVXV4nD0JutlnGaslCJuC7uwjduW9SVrLvRYooPp2bWYgmgJQIXwl/Sp" crossorigin="anonymous">

<!-- Latest compiled and minified JavaScript -->
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js" integrity="sha384-Tc5IQib027qvyjSMfHjOMaLkfuWVxZxUPnCJA7l2mCWNIpG9mGCD8wGNIcPD7Txa" crossorigin="anonymous"></script>
 <link rel="stylesheet" type="text/css" href="<?php echo get_site_url(); ?>/360/treasuremap-template-files/style.css">
  <!--Main Menu File-->
  <script type="text/javascript" src="<?php echo get_site_url(); ?>/360/treasuremap-template-files/js/webslidemenu.js"></script>
  <style>
    @font-face {
    font-family: "gotham";
    src: url("https://www.treasuremaps.online/360/fonts/GothamRounded-Medium.woff") format('woff');
    } 
    h1,h2,h3,h4,h5,p,body,html,li,ul,a,i {
     font-family: "gotham"; 
    }  
#outPopUp{
     position:absolute;
     width:216px;
     height:216px;
     z-index:0;
     top:50%;
     left:50%;
     margin:-108px 0 0 -108px;
}
/*Bootstrap 3*/
.modal-lg {
     width: 95%;

}
.modal-content {
  min-height: 999px;
}
#target {
  width:400px;
  height:100px;
  border:1px solid #ccc;
}
body.modal-open #wrap{
    -webkit-filter: blur(7px);
    -moz-filter: blur(15px);
    -o-filter: blur(15px);
    -ms-filter: blur(15px);
    filter: blur(15px);
}
.modal-backdrop {background: #f7f7f7;}

.close {
    font-size: 29px;
    display:block;
    font-weight: bold;
    color: white;
}
.close span {
      color: white;
}
div.modal-content {
    background: rgba(255,255,255,.7);
  }

  .modal-header {
        color: #c6d6d6;
    background: #5d5b5e;
    border-bottom: 6px solid #079061;
  }
  * { box-sizing: border-box; }
.video-background, .video-background img {
  background: #000;
  position: fixed;
  top: 0; right: 0; bottom: 0; left: 0;
  z-index: -99;
}
.video-foreground,
.video-background iframe {
  position: absolute;
  top: 0;
  left: 0;
  width: 100%;
  height: 100%;
}
.video-background {
  
      background-image: url("https://treasuremaps.online/wp-content/uploads/2015/01/map.jpg");

    /* Full height */
    height: 100%; 

    /* Center and scale the image nicely */
    background-position: center;
    background-repeat: no-repeat;
    background-size: cover;
}
.ytvid {display: none;}
#vidtop-content {
  top: 0;
  color: #fff;
}
.vid-info { position: absolute; bottom: 10%; right: 0; width: 50%; background: rgba(0,0,0,0.3); color: #fff; padding: 1rem; font-family: Avenir, Helvetica, sans-serif; }
.vid-info h1 { font-size: 4.5rem; font-weight: 700; margin-top: 0; line-height: 1.2; }
.vid-info a { display: block; color: #fff; text-decoration: none; background: rgba(0,0,0,0.5); transition: .6s background; border-bottom: none; margin: 1rem auto; text-align: center; }
@media (min-aspect-ratio: 16/9) {
  .video-foreground { height: 300%; top: -100%; }
  .video-foreground img { height: 300%; top: -100%; }
}
@media (max-aspect-ratio: 16/9) {
  .video-foreground { width: 300%; left: -100%; }
  .video-foreground img { width: 300%; left: -100%; }
}
@media all and (max-width: 600px) {
.vid-info { width: 100%; padding: .5rem; bottom:22px;}
.vid-info h1 { margin-bottom: .2rem; font-size: 18px; }
.video-background iframe {display: none;}
.ytvid {display: block; margin: 0 auto;}
}
@media all and (max-width: 500px) {
.vid-info .acronym { display: none; }
}

  </style>

<script type="text/javascript">
    jQuery(document).ready(function( $ ) {
    
    // $ Works! You can test it with next line if you like
    // console.log($);
<? if ( $userstatus == 'newuser'): ?>
 runhotspot('https://www.treasuremaps.online/my-maps');      
<? endif; ?> 
<? if ( !is_user_logged_in() ): ?>
 runhotspot('https://www.treasuremaps.online/login');      
<? endif; ?> 
<? if ( $publicmaps == 'publicmaps'): ?>
 runhotspot('https://www.treasuremaps.online/public-maps');      
<? endif; ?> 
<? if ( $submitmap == 'submitmap'): ?>
 runhotspot('https://www.treasuremaps.online/add-map');      
<? endif; ?> 

    $('#myModal').on('shown.bs.modal', function () {
  $('#myInput').focus()
})
  });    
</script>
<script>


</script>
<script type="text/javascript">

function about(){

     $("#newModal").modal("show");
  };
  function embedcode(){

     $("#embedmodal").modal("show");
  };
   </script>
<script src="http://www.youtube.com/player_api"></script>

<script>
    function howtoswap(){
      $('#swaper').html('<iframe src="https://www.youtube.com/embed/z2sOrr-N1WE?controls=0&showinfo=0&rel=0&autoplay=1&loop=1&playlist=W0LHTWG-UmQ" frameborder="0" allowfullscreen></iframe>');
    }
</script>
  </head>
  <body>
<div id="swaper" class="video-background">

  </div>

<div id="vidtop-content">
<div class="vid-info">
<div class="ytvid">
<img src="https://treasuremaps.online/wp-content/uploads/2015/01/map.jpg">
</div>
    <h1>Welcome Treasure Mappers!</h1>
    <p style="font-size: 25px;">
      Start uploading your maps right away and start generating the buzz needed to stand out in todays market. You can now create high quality presentations quickly from you mobile device or home computer. Maps can be aerial photos, google map/google earth screen captures, and or any other type of digital map image.
    </p>
 <div class="row">
    <div class="col-sm-6"><button type="button" class="btn btn-primary btn-lg btn-block" onClick="location.href='https://treasuremaps.online/tour/world-food-map/'">Demo Map</button></div>
    <div class="col-sm-6"><button type="button"  class="btn btn-lg btn-block btn-success" href="#" onclick="runhotspot('https://www.treasuremaps.online/add-map')">Make Map!</button></div>
  </div>
  </div>
</div>
  <div id="wrap" class="text-center">
</div>
  <!-- Modal -->
  <div class="modal fade bs-example-modal-lg" id="myModal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
    <div class="modal-dialog modal-lg" role="document">
      <div class="modal-content">
      <div id="outPopUp"><img src="https://www.treasuremaps.online/360/treasuremap-template-files/download.gif"></div>
        <div class="modal-header">
          <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span style="color: white;" aria-hidden="true">&times;</span></button>
                  <h4 style="color: #a9b6bc; padding-left: 8px; font-size: 26px;" class="modal-title" id="myModalLabel">
          Content Management</h4>
        </div>
        <div id="mcswap" style="color: black;" class="modal-body">

        </div>
      </div>
    </div>
  </div>
<!-- Modal -->
  <div class="modal fade bs-example-modal-lg" id="newModal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
    <div class="modal-dialog modal-lg" role="document">
      <div class="modal-content">
        <div class="modal-header">
          <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
          <h4 style="color: #a9b6bc; padding-left: 8px; font-size: 26px;" class="modal-title" id="myModalLabel">
          About Location</h4>
        </div>
        <div style="color: black;" class="modal-body">
          <?php echo $goodies; ?>
                    <?php
            global $current_user;
            get_currentuserinfo();
           
            if (is_user_logged_in() && $current_user->ID == $post->post_author)  {
              edit_post_link('edit', '', '');
            }
          ?>
        </div>
      </div>
    </div>
  </div>  

    <div id="container">

      <div class="titlebox"><h1 id="titleh"><?php echo $pagetitle; ?></h1><!-- Button trigger modal -->
</div>


      <div class="wsmenucontainer clearfix">
      <div class="overlapblackbg"></div>
 

      <div class="wsmobileheader clearfix">
        <a id="wsnavtoggle" class="animated-arrow"><span></span></a>
      </div>
  
      <div class="header">
        <div class="wrapper clearfix bigmegamenu">
          <div class="logo clearfix"></div>
  <?php get_template_part( 'webslide','menu'); ?> 
          </div>
        </div>
      </div>
  <script src="<?php echo get_site_url(); ?>/360/treasuremap-template-files/tour.js"></script> 

  <div class="logo"><img style="max-height: 49px;" src="https://treasuremaps.online/wp-content/uploads/2017/06/logo-regular.png"></div>

</div>

</body>
      <script src="<?php echo get_site_url(); ?>/360/treasuremap-template-files/actions.js"></script> 

 <? if ( $pano_author == $loggedinuser ): ?>
  <script src="<?php echo get_site_url(); ?>/360/treasuremap-template-files/cms.js"></script> 
  <?php else: ?>
            <script src="<?php echo get_site_url(); ?>/360/treasuremap-template-files/public.js"></script>
  <? endif; ?>


</html>