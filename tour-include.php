<?php 
$root = $_SERVER['DOCUMENT_ROOT'];
include($root . '/wp-load.php'); 
global $loop;
$actual_link = get_permalink();
$strings = explode("/", $actual_link);
$newlink = $strings[4];
$pagetitle = str_replace("-"," ",$newlink);
$user = wp_get_current_user();
$page = get_page_by_title($pagetitle , post_author, 'tour');
$descrip = $page->post_excerpt;
$goodies = $page->post_content;
$pano_author = $page->post_author;
$loggedinuser = get_current_user_id();
$oglink = 'https://'.$_SERVER["SERVER_NAME"].$_SERVER["REQUEST_URI"];
?>
<!DOCTYPE html>
<html>
<head>
  <title>Treasure Maps - <?php echo $actual_link; ?></title>
  <meta property="og:title" content="Treasure Map - <?php  echo $pagetitle; ?> "/>
  <meta property="og:description" content="Explore an interactive presentation of <?php echo $pagetitle; ?> - <?php echo $descrip; ?>"/>
  <meta property="og:type" content="article"/>
  <meta property="og:url" content="<?php echo $oglink;?>"/>
  <meta property="og:site_name" content="Treasure Maps"/>
  <meta property="og:image" content="https://www.treasuremaps.online/360/<?php echo $newlink; ?>/panos/panorama.tiles/map.jpg"/>
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
 <link rel="stylesheet" type="text/css" href="<?php echo get_stylesheet_directory_uri(); ?>/css/style.css">
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
.rplm-alert button {
  display: none;
}
.modal-header .close {
    margin-top: 4px;
}
#field_17_1 > label {
  display: none;
}

#field_17_2 > label {
  display: none;
}
.link-list li {

    text-align: center;
}
.link-list li a {

    text-align: center;
}
@media (min-width: 768px) {
.modal-dialog {
    margin: 5px auto;
}
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
<!--replete modal -->
    <link rel="stylesheet" href="<?php echo get_site_url(); ?>/360/treasuremap-template-files/css/animate.css">
    <link rel="stylesheet" href="<?php echo get_site_url(); ?>/360/treasuremap-template-files/css/replete-modal.css">
    <script src="<?php echo get_site_url(); ?>/360/treasuremap-template-files/js/replete-modal.js"></script>
  </head>
  <body>
    <?php
$parentmapurl = get_field('parentmapurl'); 
if ($parentmapurl){
 echo '<div class="btm"><a href="'.$parentmapurl.'"><img src="https://treasuremaps.online/360/treasuremap-template-files/parent-map.png">Parent Map</a></div>';
}
?>
<?php 
$values = get_field('public');
 if ( $values == 'yes' && !is_user_logged_in() ): ?>
    <div class="loginForm" style="display:none;">
    <p>Bring excitement, energy and engagement<br/>to your project <span style="font-size: 1.4em;">immediately.</span></p>
    <?php echo do_shortcode('[gravityform id="17" title="false" description="false"]'); ?><span style="display: block; width: 100%;">or</span>
<a href="https://treasuremaps.online/wp-login.php?loginFacebook=1&redirect=https://treasuremaps.online" onclick="window.location = 'https://treasuremaps.online/wp-login.php?loginFacebook=1&redirect='+window.location.href; return false;"> <img src="https://treasuremaps.online/360/treasuremap-template-files/fblogin.png" /> </a>
By logging in you are agreeing to our <a target="_blank" style="color: red; text-decoration: underline;"  href="https://treasuremaps.online/tos-page/">terms. </a>
      </div>
    <script>
$(window).load( function(){
        var loginForm = $('.loginForm').html();
        rplm({
          title: "<img style='max-width: 77px;' src='https://treasuremaps.online/wp-content/uploads/2017/06/tropen-150x150.png'> <br/>Demo Treasuremaps Now",
          text: "" + loginForm,
          html: true,
          animation: "swing",
          modalNOverlay: 'transparent',
          overlay: 'transparent',
                showCloseButton: false,
                showConfirmButton: false
        });
      });
    </script>
<?php else: ?>
<?php endif ?>
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
          About This Map</h4>
        </div>
        <div style="color: black;" class="modal-body">

<?php if (have_posts()) : ?>

  <?php while (have_posts()) : the_post(); ?>


    <?php the_content(); ?> 
    <?php
            global $current_user;
            get_currentuserinfo();
           
            if (is_user_logged_in() && $current_user->ID == $post->post_author)  {
             
              echo '<a href="https://www.treasuremaps.online/my-maps">Edit Map Descriptions</a>';

            }
          ?>

  <?php endwhile; ?>
  
<?php else : ?>


<?php endif; ?>

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
  <script src="<?php echo get_site_url(); ?>/360/brand-free/tour.js"></script>
  <div class="logo"><a href="https://www.treasuremaps.online"><img style="max-height: 49px;" src="https://treasuremaps.online/360/map-includes/littleopen.png"></a></div>

    

    <div id="editbox" style="display: none; background: rgba(0,0,0,.5); position: fixed; top: 0; bottom:0; left:0; right: 0; z-index: 9999998;">

          <a href="#" id="wsnavtoggle" style="font-size: 24px;position: fixed;top: 21px;right: 44px;color: white;text-decoration: none;border-radius: 0;padding: 12px;background-color: #5d5b5e;z-index: 999999900;"  onclick="showHideDiv('editbox')">X</a>
            <div class="centeredloader">
          <img src="<?php echo get_site_url(); ?>/360/treasuremap-template-files/loading.gif">
            </div>
        <div id="wireframeholder">
          <iframe style="border-radius: 15px; height: 100%; width: 100%;" name="myIframe" frameborder="0" src="#"></iframe>
        </div>
    </div>

    <div id="pano" style="display: block; float:left; width:100%; height:100%;">
    <noscript><table style="width:100%;height:100%;"><tr style="valign:middle;"><td><div style="text-align:center;">ERROR:<br/><br/>Javascript not activated<br/><br/></div></td></tr></table></noscript>
    <script>
      embedpano({swf:"<?php echo get_site_url(); ?>/360/brand-free/tour.swf", xml:"https://www.treasuremaps.online/360/<?php echo $newlink; ?>/360tour.xml", target:"pano", html5:"prefer", passQueryParameters:true});   
      function receiveMessage(event)
      {
        location.reload();
      }
      function about(){

     $("#newModal").modal("show");
  };
  function embedcode(){

     $("#embedmodal").modal("show");
  };
    </script>

</div>

</body>
      <script src="<?php echo get_site_url(); ?>/360/treasuremap-template-files/actions.js"></script> 

 <? if ( $pano_author == $loggedinuser ): ?>
  <script src="<?php echo get_site_url(); ?>/360/treasuremap-template-files/cms.js"></script> 
  <?php else: ?>
            <script src="<?php echo get_site_url(); ?>/360/treasuremap-template-files/public.js"></script>
  <? endif; ?>
 <?php 
$values = get_field('public');
 if ( $values == 'yes' && is_user_logged_in() ): ?>
   <script src="<?php echo get_site_url(); ?>/360/treasuremap-template-files/cms.js"></script>
   <? endif; ?>


</html>