<?php


/*


Template Name: video-bg


*/
$root = $_SERVER['DOCUMENT_ROOT'];
include($root . '/wp-load.php'); 
global $loop;
$actual_link = 'http://'.$_SERVER['HTTP_HOST'].$_SERVER['PHP_SELF'];
$strings = explode("/", $actual_link);
$newlink = $strings[4];
$user = wp_get_current_user();
?><!DOCTYPE html>
<html>
<head>
  <title>Treasure Maps - <?php echo $actual_link; ?></title>
  <meta property="og:title" content="Treasure Map - <?php  echo $pagetitle; ?> "/>
  <meta property="og:description" content="Explore an interactive presentation of <?php echo $pagetitle; ?> - <?php echo $descrip; ?>"/>
  <meta property="og:type" content="article"/>
  <meta property="og:url" content="<?php echo $actual_link;?>"/>
  <meta property="og:site_name" content="Treasure Maps"/>
  <meta property="og:image" content="https://www.treasuremaps.online/360/<?php echo $newlink; ?>/tour.tiles/preview.jpg"/>
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
    src: url("<?php echo get_site_url(); ?>/360/fonts/GothamRounded-Medium.woff") format('woff');
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
.video-background {
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
  pointer-events: none;
}
#vidtop-content {
  top: 0;
  color: #fff;
}
.vid-info { position: absolute; top: 122px; right: 0; width: 33%; background: rgba(0,0,0,0.3); color: #fff; padding: 1rem; font-family: Avenir, Helvetica, sans-serif; }
.vid-info h1 { font-size: 2rem; font-weight: 700; margin-top: 0; line-height: 1.2; }
.vid-info a { display: block; color: #fff; text-decoration: none; background: rgba(0,0,0,0.5); transition: .6s background; border-bottom: none; margin: 1rem auto; text-align: center; }
@media (min-aspect-ratio: 16/9) {
  .video-foreground { height: 300%; top: -100%; }
}
@media (max-aspect-ratio: 16/9) {
  .video-foreground { width: 300%; left: -100%; }
}
@media all and (max-width: 600px) {
.vid-info { width: 50%; padding: .5rem; }
.vid-info h1 { margin-bottom: .2rem; }
}
@media all and (max-width: 500px) {
.vid-info .acronym { display: none; }
}
  </style>

<script type="text/javascript">
    jQuery(document).ready(function( $ ) {
    
    // $ Works! You can test it with next line if you like
    // console.log($);
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

  </head>
  <body>
    <a data-flickr-embed="true" data-context="true" data-vr="true"  href="https://www.flickr.com/photos/getyourview/35102813645/in/photolist-VhodUe-VtV6wV-UVgyhb-UTGGcw-Ucibqs-UTGLWS-UchS7y-Ucku87-UTKuPf-UckguG-UfmwsB" title="Luxury Residential 360 Virtual Tour"><img src="https://farm5.staticflickr.com/4214/35102813645_ba7aaa7b4e_k.jpg" width="2048" height="1024" alt="Luxury Residential 360 Virtual Tour"></a><script async src="//embedr.flickr.com/assets/client-code.js" charset="utf-8"></script>
<div id="vidtop-content">
<div class="vid-info">
    <h1>YouTube Fullscreen Background Demo</h1>
    <p>The International Space Station orbits the Earth every 92 minutes, with its crew seeing a sunrise 15 times a day. It exists as a scientific, educational, and engineering platform in low orbit, 330 to 435 kilometres above the Earth.
     <p>Original timelapse by Riccardo Rossi (ISAA), used under a Creative Commons Attribution-NonCommercial-ShareAlike 4.0 International License. Raw photos courtesy of http://eol.jsc.nasa.gov/
   <a href="/500/Use-YouTube-Videos-as-Fullscreen-Web-Page-Backgrounds">Full article</a>
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

  <!--Main Menu HTML Code-->
          <nav class="wsmenu clearfix">
                    <ul class="mobile-sub wsmenu-list">
                    <li><a class="fb-xfbml-parse-ignore" target=_blank" href="https://www.facebook.com/sharer/sharer.php?u=<?php echo $actual_link; ?>&amp;src=sdkpreparse"><img src="https://www.treasuremaps.online/360/treasuremap-template-files/sharefb.png"></a></li>
                    <li><a href="#" onclick="alert('&#x3C;iframe width=&#x22;777&#x22; height=&#x22;555&#x22; src=&#x22;<?php echo $actual_link; ?>&#x22; frameborder=&#x22;0&#x22; allowfullscreen&#x3E;&#x3C;/iframe&#x3E;')"><img src="https://www.treasuremaps.online/360/treasuremap-template-files/embed.png"></a></li>
                    <li><a  href="#" onclick="about()" >About Location</a></li>               
      <? if ( is_user_logged_in() ): ?>
                      <li><a href="#" onclick="hslink('https://www.treasuremaps.online/dashboard')">My Treasures</a>
                      </li>
                      <li><a href="#" onclick="hslink('https://www.treasuremaps.online/my-maps')">My Maps</a>
                      </li>  
                      <li><a href="#" id="click_me" onclick="runhotspot('https://www.treasuremaps.online/add-map')">Submit Map</a>
                      </li> 
                      <li>  
                      <a href="#" onclick="hslink('https://www.treasuremaps.online/how-to')">How To <img src="<?php echo get_site_url(); ?>/360/treasuremap-template-files/info.png"></a>
                      </li>             
<? endif; ?>

<? if ( !is_user_logged_in() ): ?>
                      <li><a href="#" id="click_me" onclick="runhotspot('https://treasuremaps.online/register/')">Submit Map</a></li>                        
                      <li><a href="#" onclick="hslink('https://www.treasuremaps.online/login')">Login</a>
                      </li>                    
<? endif; ?>
                    </ul>
          </nav>
  <!--Menu HTML Code--> 
          </div>
        </div>
      </div>
  <script src="<?php echo get_site_url(); ?>/360/treasuremap-template-files/tour.js"></script> 

  <div class="logo"><img src="<?php echo get_site_url(); ?>/360/map-includes/littleopen.png"></div>

</div>

</body>
      <script src="<?php echo get_site_url(); ?>/360/treasuremap-template-files/actions.js"></script> 

 <? if ( $pano_author == $loggedinuser ): ?>
  <script src="<?php echo get_site_url(); ?>/360/treasuremap-template-files/cms.js"></script> 
  <?php else: ?>
            <script src="<?php echo get_site_url(); ?>/360/treasuremap-template-files/public.js"></script>
  <? endif; ?>


</html>