<?php 
$root = $_SERVER['DOCUMENT_ROOT'];
include($root . '/wp-load.php'); 
global $loop;
$actual_link = $_SERVER['REQUEST_URI'];
$strings = explode("/", $actual_link);
$newlink = $strings[2];
$user = wp_get_current_user();
$pagetitle = str_replace("-"," ",$newlink);
$page = get_page_by_title($pagetitle , post_author, 'featured_tour');
$descrip = $page->post_excerpt;
$goodies = $page->post_content;
$oglink = 'https://'.$_SERVER["SERVER_NAME"].$_SERVER["REQUEST_URI"];
?>
<!DOCTYPE html>
<html>
  <head>
  <title>Treasure Maps - <?php echo $pagetitle; ?></title>
  <meta property="og:title" content="Treasure Map - <?php  echo $pagetitle; ?> "/>
  <meta property="og:description" content="Explore an interactive presentation of <?php echo $pagetitle; ?> - <?php echo $descrip; ?>"/>
  <meta property="og:type" content="article"/>
  <meta property="og:url" content="https://<?php echo $oglink; ?>"/>
  <meta property="og:site_name" content="Treasure Maps"/>
  <meta property="og:image" content="https://www.treasuremaps.online/360/<?php echo $newlink; ?>/indexdata/thumbnail.jpg"/>
  <meta property="fb:app_id" content="827047834119073">
  <meta name="viewport" content="target-densitydpi=device-dpi, width=device-width, initial-scale=1.0, minimum-scale=1.0, maximum-scale=1.0" />
  <meta name="apple-mobile-web-app-capable" content="yes" />
  <meta http-equiv="Content-Type" content="text/html;charset=utf-8" />
  <meta http-equiv="x-ua-compatible" content="IE=edge" />
  <link rel="shortcut icon" href="/favicon.ico" type="image/x-icon">
<link rel="icon" href="/favicon.ico" type="image/x-icon">
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
  <script>
  (function(i,s,o,g,r,a,m){i['GoogleAnalyticsObject']=r;i[r]=i[r]||function(){
  (i[r].q=i[r].q||[]).push(arguments)},i[r].l=1*new Date();a=s.createElement(o),
  m=s.getElementsByTagName(o)[0];a.async=1;a.src=g;m.parentNode.insertBefore(a,m)
  })(window,document,'script','https://www.google-analytics.com/analytics.js','ga');

  ga('create', 'UA-101778065-1', 'auto');
  ga('send', 'pageview');

</script>
  <style>
    @font-face {
    font-family: "gotham";
    src: url("<?php echo get_site_url(); ?>/360/fonts/GothamRounded-Medium.woff") format('woff');
    } 
.modal-header {
  padding: 0px 5px 0px 0px;
}
.modal-header .close {
    margin-top: 4px;
}
@media (min-width: 768px) {
.modal-dialog {
    margin: 5px auto;
}
}
  </style>


    <style type="text/css">
      @-ms-viewport { width: device-width; }
      @media only screen and (min-device-width: 800px) { html { overflow:hidden; } }
      * { padding: 0; margin: 0; }
      html { height: 100%; }
      body { height: 100%; overflow:hidden; }
      div#container { height: 100%; min-height: 100%; width: 100%; margin: 0 auto; }
      div#tourDIV {
        height:100%;
        position:relative;
        overflow:hidden;
      }
      div#panoDIV {
        height:100%;
        position:relative;
        overflow:hidden;
        -webkit-user-select: none;
        -khtml-user-select: none;
        -moz-user-select: none;
        -o-user-select: none;
        user-select: none;
      }
    </style>
        <!--[if !IE]><!-->
    <script type="text/javascript" src="https://www.treasuremaps.online/360/<?php echo $newlink; ?>/indexdata/lib/jquery-2.1.1.min.js"></script>
    <!--<![endif]-->
    <!--[if lte IE 8]>
    <script type="text/javascript" src="https://www.treasuremaps.online/360/<?php echo $newlink; ?>/indexdata/lib/jquery-1.11.1.min.js"></script>
    <![endif]-->
    <!--[if gt IE 8]>
    <script type="text/javascript" src="https://www.treasuremaps.online/360/<?php echo $newlink; ?>/indexdata/lib/jquery-2.1.1.min.js"></script>
    <![endif]-->
    <style type="text/css">
      div#panoDIV.cursorMoveMode {
        cursor: move;
        cursor: url(https://www.treasuremaps.online/360/<?php echo $newlink; ?>/indexdata/graphics/cursors_move_html5.cur), move;
      }
      div#panoDIV.cursorDragMode {
        cursor: grab;
        cursor: -moz-grab;
        cursor: -webkit-grab;
        cursor: url(https://www.treasuremaps.online/360/<?php echo $newlink; ?>/indexdata/graphics/cursors_drag_html5.cur), default;
      }
      #container .nofeatour { display: none; }
    </style>

    <script type="text/javascript">
      function webglAvailable() {
        try {
          var canvas = document.createElement("canvas");
          return !!window.WebGLRenderingContext && (canvas.getContext("webgl") || canvas.getContext("experimental-webgl"));
        } catch(e) {
          return false;
        }
      }
      function getWmodeValue() {
        var webglTest = webglAvailable();
        if(webglTest){
          return 'direct';
        }
        return 'opaque';
      }
      function readDeviceOrientation() {
        // window.innerHeight is not supported by IE
        var winH = window.innerHeight ? window.innerHeight : jQuery(window).height();
        var winW = window.innerWidth ? window.innerWidth : jQuery(window).width();
        //force height for iframe usage
        if(!winH || winH == 0){
          winH = '100%';
        }
        // set the height of the document
        jQuery('html').css('height', winH);
        // scroll to top
        window.scrollTo(0,0);
      }
      jQuery( document ).ready(function() {
        if (/(iphone|ipod|ipad|android|iemobile|webos|fennec|blackberry|kindle|series60|playbook|opera\smini|opera\smobi|opera\stablet|symbianos|palmsource|palmos|blazer|windows\sce|windows\sphone|wp7|bolt|doris|dorothy|gobrowser|iris|maemo|minimo|netfront|semc-browser|skyfire|teashark|teleca|uzardweb|avantgo|docomo|kddi|ddipocket|polaris|eudoraweb|opwv|plink|plucker|pie|xiino|benq|playbook|bb|cricket|dell|bb10|nintendo|up.browser|playstation|tear|mib|obigo|midp|mobile|tablet)/.test(navigator.userAgent.toLowerCase())) {
          if(/iphone/.test(navigator.userAgent.toLowerCase()) && window.self === window.top){
            jQuery('body').css('height', '100.18%'); 
          }
          // add event listener on resize event (for orientation change)
          if (window.addEventListener) {
            window.addEventListener("load", readDeviceOrientation);
            window.addEventListener("resize", readDeviceOrientation);
            window.addEventListener("orientationchange", readDeviceOrientation);
          }
          //initial execution
          setTimeout(function(){readDeviceOrientation();},10);
        }
      });
      
      function accessWebVr(){
        unloadPlayer();

        setTimeout(function(){ loadPlayer(true); }, 100);
      }
      function accessStdVr(){
        unloadPlayer();

        setTimeout(function(){ loadPlayer(false); }, 100);
      }
      function loadPlayer(isWebVr) {
        if (isWebVr) {
          embedpano({
            id:"krpanoSWFObject"
            ,xml:"https://www.treasuremaps.online/360/<?php echo $newlink; ?>/indexdata/index_vr.xml"
            ,target:"panoDIV"
            ,passQueryParameters:true
            ,bgcolor:"#000000"
            ,html5:"only+webgl"
            ,vars:{skipintro:true,norotation:true}
          });
        } else {
          embedpano({
            id:"krpanoSWFObject"

            ,swf:"https://www.treasuremaps.online/360/<?php echo $newlink; ?>/indexdata/index.swf"

            ,target:"panoDIV"
            ,passQueryParameters:true
            ,bgcolor:"#000000"

            ,html5:"prefer"


          });
        }
        //apply focus on the visit if not embedded into an iframe
        if(top.location === self.location){
          kpanotour.Focus.applyFocus();
        }
      }
      function unloadPlayer(){
        if(jQuery('#krpanoSWFObject')){
          removepano('krpanoSWFObject');
        }
      }
        function isVRModeRequested() {
        var querystr = window.location.search.substring(1);
        var params = querystr.split('&');
        for (var i=0; i<params.length; i++){
          if (params[i].toLowerCase() == "vr"){
            return true;
          }
        }
        return false;
      }
    </script>

    <script type="text/javascript">
        jQuery(document).ready(function( $ ) {
        
          // $ Works! You can test it with next line if you like
          // console.log($);
          $('#myModal').on('shown.bs.modal', function () {
            $('#myInput').focus()
        });


      

      
      });   
    jQuery.noConflict();
    (function ($) {
        $('#abootmodal').click(function(){
              $('#myModal').modal('toggle');
        }); 
    }
    )(jQuery);


   
    </script>       
  </head>
  <body>
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
  <div class="logo"><a href="https://www.treasuremaps.online"><img style="max-height: 49px;" src="https://treasuremaps.online/360/map-includes/littleopen.png"></a></div>    
    <div id="container">

      <div id="tourDIV">
        <div id="panoDIV">
          <noscript>

            <object classid="clsid:d27cdb6e-ae6d-11cf-96b8-444553540000" width="100%" height="100%" id="https://www.treasuremaps.online/360/<?php echo $newlink; ?>/indexdata/index">
              <param name="movie" value="https://www.treasuremaps.online/360/<?php echo $newlink; ?>/indexdata/index.swf"/>
              <param name="allowFullScreen" value="true"/>
              <!--[if !IE]>-->
              <object type="application/x-shockwave-flash" data="https://www.treasuremaps.online/360/<?php echo $newlink; ?>/indexdata/index.swf" width="100%" height="100%">
                <param name="movie" value="https://www.treasuremaps.online/360/<?php echo $newlink; ?>/indexdata/index.swf"/>
                <param name="allowFullScreen" value="true"/>
                <!--<![endif]-->
                <a href="http://www.adobe.com/go/getflash">
                  <img src="http://www.adobe.com/images/shared/download_buttons/get_flash_player.gif" alt="Get Adobe Flash player to visualize the Virtual Tour : New Project (Virtual tour generated by Panotour and Livepano)"/>
                </a>
              <!--[if !IE]>-->
              </object>
              <!--<![endif]-->
            </object>

          </noscript>
        </div>

        <script type="text/javascript" src="https://www.treasuremaps.online/360/<?php echo $newlink; ?>/indexdata/index.js"></script>
        <script type="text/javascript">
          if (isVRModeRequested()){
            accessWebVr();
          }else{
            accessStdVr();
          }
        </script>
      </div>
    </div>
</body>
      <script src="<?php echo get_site_url(); ?>/360/treasuremap-template-files/actions.js"></script> 

 <? if ( $pano_author == $loggedinuser ): ?>
  <script src="<?php echo get_site_url(); ?>/360/treasuremap-template-files/cms.js"></script> 
  <?php else: ?>
            <script src="<?php echo get_site_url(); ?>/360/treasuremap-template-files/public.js"></script>
  <? endif; ?>





</html>