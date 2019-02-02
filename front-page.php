<?php 
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
  <title>Treasure Maps is a 360 Media and VR Content Management</title>
  <meta property="og:title" content="Treasure Maps - 360 Media and VR Content Management"/>
  <meta property="og:description" content="Treasure Maps makes it easy for non coders to quickly create immersive and educational Virtual Reality websites that can be viewed in any device as well as adapts to vr headsets. As VR explodes in popularity and the social media giants are adopting VR in the worksplace, Treasuremaps is making easy to use tools to help keep your business or project on the cutting edge."/>
  <meta property="og:type" content="article"/>
  <meta property="og:url" content="https://www.treasuremaps.online"/>
  <meta property="og:site_name" content="Treasure Maps"/>
  <meta property="og:image" content="https://treasuremaps.online/ogimage3.jpg"/>
  <meta property="fb:app_id" content="827047834119073">
  <meta name="viewport" content="target-densitydpi=device-dpi, width=device-width, initial-scale=1.0, minimum-scale=1.0, maximum-scale=1.0" />
  <meta name="apple-mobile-web-app-capable" content="yes" />
  <meta http-equiv="Content-Type" content="text/html;charset=utf-8" />
  <meta http-equiv="x-ua-compatible" content="IE=edge" />
 <link rel="shortcut icon" href="/favicon.ico" type="image/x-icon">
<link rel="icon" href="/favicon.ico" type="image/x-icon"> 
  <link rel="stylesheet" type="text/css" media="all" href="<?php echo get_stylesheet_directory_uri(); ?>/css/color-theme.css" />
  <link rel="stylesheet" type="text/css" media="all" href="<?php echo get_stylesheet_directory_uri(); ?>/css/webslidemenu.css" />
    <!-- font awesome -->
  <link rel="stylesheet" href="<?php echo get_stylesheet_directory_uri(); ?>/font-awesome/css/font-awesome.min.css" />
  <!-- font awesome -->
  <!--[if !IE]><!-->
  <script type="text/javascript" src="<?php echo get_stylesheet_directory_uri(); ?>/js/jquery-2.1.1.min.js"></script>
  <!--<![endif]-->
  <!--[if lte IE 8]>
  <script type="text/javascript" src="<?php echo get_stylesheet_directory_uri(); ?>/js/jquery-1.11.1.min.js"></script>
  <![endif]-->
  <!--[if gt IE 8]>
  <script type="text/javascript" src="<?php echo get_stylesheet_directory_uri(); ?>/js/jquery-2.1.1.min.js"></script>
  <![endif]--> 
<!-- Latest compiled and minified CSS -->
<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css" integrity="sha384-BVYiiSIFeK1dGmJRAkycuHAHRg32OmUcww7on3RYdg4Va+PmSTsz/K68vbdEjh4u" crossorigin="anonymous">

<!-- Optional theme -->
<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap-theme.min.css" integrity="sha384-rHyoN1iRsVXV4nD0JutlnGaslCJuC7uwjduW9SVrLvRYooPp2bWYgmgJQIXwl/Sp" crossorigin="anonymous">

<!-- Latest compiled and minified JavaScript -->
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js" integrity="sha384-Tc5IQib027qvyjSMfHjOMaLkfuWVxZxUPnCJA7l2mCWNIpG9mGCD8wGNIcPD7Txa" crossorigin="anonymous"></script>
 <link rel="stylesheet" type="text/css" href="<?php echo get_stylesheet_directory_uri(); ?>/css/style.css">
  <!--Main Menu File-->
  <script type="text/javascript" src="<?php echo get_stylesheet_directory_uri(); ?>/js/webslidemenu.js"></script>
  <script>
  (function(i,s,o,g,r,a,m){i['GoogleAnalyticsObject']=r;i[r]=i[r]||function(){
  (i[r].q=i[r].q||[]).push(arguments)},i[r].l=1*new Date();a=s.createElement(o),
  m=s.getElementsByTagName(o)[0];a.async=1;a.src=g;m.parentNode.insertBefore(a,m)
  })(window,document,'script','https://www.google-analytics.com/analytics.js','ga');

  ga('create', 'UA-101778065-1', 'auto');
  ga('send', 'pageview');

</script>
  <style>
  body
  {
      background-image: url(<?php echo get_stylesheet_directory_uri(); ?>/images/map.jpg);
      height: 100%;
      background-position: center;
      background-repeat: no-repeat;
      background-size: cover;
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
     <script src="http://www.youtube.com/player_api"></script>
     <script>
      var windowWidth = $(window).width();
      if(windowWidth > 600){
          // Do stuff here
          // create youtube player
          var player;
          function onYouTubePlayerAPIReady() {
              player = new YT.Player('player', {
                videoId: 'qrR8VDL9ehA',
                events: {
                  'onReady': onPlayerReady,
                  'onStateChange': onPlayerStateChange
                }
              });


          // autoplay video
            function onPlayerReady(event) {
          player.mute();
          player.playVideo();
          };
          // when video ends
          function onPlayerStateChange(event) {        
              if(event.data === 0) {            
                  $('#swaper').html('');
                  $('#container').addClass("mapbg");
              }
          } 
          $('#mute-toggle').on('click', function() {
          var mute_toggle = $(this);

      if(player.isMuted()){
              player.unMute();

              mute_toggle.html('<span class="glyphicon glyphicon-volume-off" aria-hidden="true"></span><p>Turn Off Sound</p>');
          }
      else{
              player.mute();
              mute_toggle.html('<span class="glyphicon glyphicon-volume-up" aria-hidden="true"></span><p>Turn On Sound</p>');
          }
      })
      }
      document.getElementById('resume').onclick = function() {
          player.playVideo();
      };
      document.getElementById('pause').onclick = function() {
          player.pauseVideo();
      };      
      }
      function howtoswap(){
        $('#swaper').html('<iframe src="https://www.youtube.com/embed/9wUn1ntRE1Y?controls=0&showinfo=0&rel=0&autoplay=1&loop=1&playlist=W0LHTWG-UmQ" frameborder="0" allowfullscreen></iframe>');
      }
    </script>
  </head>
  <body>
 
<div id="swaper" class="video-background">

  </div>

<div id="vidtop-content">
<div class="vid-info">
<div name="tiptop"></div>
<div class="ytvid">
<img name="1" style="max-height: 49px;" src="https://treasuremaps.online/wp-content/uploads/2017/06/logo-regular.png">
</div>
<div class="row">
<div id="measure" class="col-sm-6">
<div id="swapme">
<img id="trigger4" class="img-responsive point" src="https://treasuremaps.online/wp-content/themes/WP-VR-Press/images/Drone-owner.jpg">
</div>

</div>
<div class="col-sm-6">
    <h1 style="padding-top: 22px;">360 Media and VR Content Management System</h1>
    <p style="padding-bottom: 11px;">
  VR is here and growing in popularity, yet to many it seems too complicated or expensive to use. Treasuremaps VR tool suite and CMS are easy to use and can help you quickly launch your own virtual world that is rich with infospots. Treasuremaps, unlike the static Youtube and Facebook VR viewers, is adding plugins and addons all the time. You can make VR stores, VR insurance damage assesments, virtual classrooms, live 360 real estate open houses and much more.
	  <a style="max-width: 254px; padding: 15px 0px; border-radius: 20px;" href="#" onclick="hslink('https://treasuremaps.online/request-full-demo/')">Request Personal Demo</a>
    </p>
	<h2 style="text-align: center">Demo Treasure Maps git change</h2>
    <div class="row">
        <div class="col-sm-6"><a href="https://treasuremaps.online/tour/nyc-timesquare/"><img class="img-responsive" alt="Photo 360 VR demo button"  src="https://treasuremaps.online/wp-content/themes/WP-VR-Press/images/360photovr.png"></a></div>
        <div class="col-sm-6"><a href="https://treasuremaps.online/tour/sel/"><img class="img-responsive" alt="360 video vr demo"  src="https://treasuremaps.online/wp-content/themes/WP-VR-Press/images/360video-vr.png"></a></div>
		</div>
		<div class="row">
		
        <div class="col-sm-6"><a href="https://treasuremaps.online/featured_tour/solfeggio/"><img class="img-responsive" alt="Flat Aerial Treasure map button"  src="https://treasuremaps.online/wp-content/themes/WP-VR-Press/images/flat-map.png"></a></div>
        <div class="col-sm-6"><A href="https://treasuremaps.online/tour/lodging-and-pool/"><img class="img-responsive" alt="360 Aerial mapdemo button"  src="https://treasuremaps.online/wp-content/themes/WP-VR-Press/images/360aerialmap.png"></a></div>
		
    </div>
</div>
</div>    
  </div>
</div>
  <div id="wrap" class="text-center">
</div>
  <!-- Modal -->
  <div class="modal fade bs-example-modal-lg" id="myModal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
    <div class="modal-dialog modal-lg" role="document">
      <div class="modal-content">
      <div id="outPopUp"><img src="<?php echo get_stylesheet_directory_uri(); ?>/images/download.gif"></div>
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
          About Treasure Maps</h4>
        </div>
        <div style="color: black;" class="modal-body">
            Treasure Maps is an online application that uses your images or map templates to bring life and excitement into your project. It was created by a team of developers, photographers and real estate professionals who have used maps and tours as a vital part of their selling process. 
            <h2>Uses and Differentiators</h2>
            <ul>
			 <li>Mark structures for insurance claims, risk accessment and fire rescue hazards</li>
			 <li>Make on the spot sales presentations while aerial photographing from your phone. Immediately and easily create a high value product for your client.</li>			
              <li>Hotels can use their maps to attract sales, inform guests and train faculty.</li>
              <li>Sell your property or house by showing off the Treasures on the grounds</li>
              <li>Attract investors and visually communicate your reasons for needing funding.</li>
            </ul>
        <h2>For Questions and Suggestions</h2>
        <p><a target="_blank" href="http://www.kahlilcalavas.com">Contact CTO<br/>
		Kahlil Calavas</a><br>
		1429 Park St #114, Hartford, CT 06106</br>
		Call: 1-860-328-5698
        </p>
            </div>
        </div>
      </div>
    </div>
  </div>  

    <div class="mapbg" id="container">

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
  <script src="<<?php echo get_stylesheet_directory_uri(); ?>/krpano/tour.js"></script> 

  <div class="logo"><img style="max-height: 49px;" src="https://treasuremaps.online/wp-content/uploads/2017/06/logo-regular.png"></div>

</div>

</body>
<script>

</script>
<script>
jQuery(document).ready(function( $ ) {
var width = $('#measure').width();
var height = $('#swapme').height();
// $ Works! You can test it with next line if you like
$('#trigger').click(function(){
$('#swapme').html('<iframe width="'+width+'" height="'+height+'" src="https://www.youtube.com/embed/dz-1JZJLq2k?autoplay=1" frameborder="0" allowfullscreen></iframe>');

});

});
</script>
<script>
jQuery(document).ready(function( $ ) {
var width = $('#measure').width();
var height = $('#swapme').height();
// $ Works! You can test it with next line if you like
$('#trigger2').click(function(){
$('#swapme').html('<iframe width="'+width+'" height="'+height+'" src="https://www.youtube.com/embed/WSWpKFxTOmo?autoplay=1" frameborder="0" allowfullscreen></iframe>');

});

});
</script>
<script>
jQuery(document).ready(function( $ ) {
var width = $('#measure').width();
var height = $('#swapme').height();
// $ Works! You can test it with next line if you like
$('#trigger3').click(function(){
$('#swapme').html('<iframe width="'+width+'" height="'+height+'" src="https://www.youtube.com/embed/3GPLJAzeuKs?autoplay=1" frameborder="0" allowfullscreen></iframe>'); 
});

});
</script>
<script>
jQuery(document).ready(function( $ ) {
var width = $('#measure').width();
var height = $('#swapme').height();
// $ Works! You can test it with next line if you like
$('#trigger4').click(function(){
$('#swapme').html('<iframe width="'+width+'" height="'+height+'" src="https://www.youtube.com/embed/xww7crdy6r0?autoplay=1" frameborder="0" allowfullscreen></iframe>'); 
$(".vid-info").scrollTo("#tiptop");
});

});
</script>
      <script src="<?php echo get_stylesheet_directory_uri(); ?>/js/actions.js"></script> 

  <? if ( $pano_author == $loggedinuser ): ?>
  <script src="<?php echo get_stylesheet_directory_uri(); ?>/js/cms.js"></script> 
  <?php else: ?>
            <script src="<?php echo get_stylesheet_directory_uri(); ?>/js/public.js"></script>
  <? endif; ?>


</html>