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
	<title>Virtual Tour Builder and Snapshot Plugin</title>
	<meta name="viewport" content="width=device-width, initial-scale=1.0, minimum-scale=1.0, maximum-scale=1.0" />
	<meta name="apple-mobile-web-app-capable" content="yes" />
	<meta name="apple-mobile-web-app-status-bar-style" content="black" />
	<meta http-equiv="Content-Type" content="text/html;charset=utf-8" />
	<meta http-equiv="x-ua-compatible" content="IE=edge" />
	<link rel="stylesheet" href="https://www.treasuremaps.online/360/<?php echo $newlink; ?>/skin/css/font-awesome/css/font-awesome.min.css">
	<link href="https://fonts.googleapis.com/css?family=Open+Sans+Condensed:300|Roboto+Condensed&subset=latin-ext" rel="stylesheet">
  <script type = "text/javascript" src = "https://ajax.googleapis.com/ajax/libs/jquery/2.1.3/jquery.min.js"/></script>
	<script src="https://www.treasuremaps.online/360/<?php echo $newlink; ?>/skin/js/howler.min.js"></script>
	<style>
		@-ms-viewport { width:device-width; }
		@media only screen and (min-device-width:800px) { html { overflow:hidden; } }
		html { height:100%; }
		body { height:100%; overflow:hidden; margin:0; padding:0; font-family:Arial, Helvetica, sans-serif; font-size:16px; color:#FFFFFF; background-color:#000000; }
	</style>
	<script>
    (function(i,s,o,g,r,a,m){i['GoogleAnalyticsObject']=r;i[r]=i[r]||function(){
    (i[r].q=i[r].q||[]).push(arguments)},i[r].l=1*new Date();a=s.createElement(o),
    m=s.getElementsByTagName(o)[0];a.async=1;a.src=g;m.parentNode.insertBefore(a,m)
    })(window,document,'script','https://www.google-analytics.com/analytics.js','ga');

    ga('create', 'UA-xxxxxxxx-x', 'auto');
    ga('send', 'pageview');
  </script>
</head>
<body>

<script src="https://www.treasuremaps.online/360/<?php echo $newlink; ?>/tour.js"></script>

<div id="pano" style="width:100%;height:100%;">
	<noscript><table style="width:100%;height:100%;"><tr style="vertical-align:middle;"><td><div style="text-align:center;">ERROR:<br/><br/>Javascript not activated<br/><br/></div></td></tr></table></noscript>
	<script>
		embedpano({swf:"https://www.treasuremaps.online/360/<?php echo $newlink; ?>/tour.swf", xml:"https://www.treasuremaps.online/360/<?php echo $newlink; ?>/tour.xml", target:"pano", html5:"only+webgl",webglsettings:{preserveDrawingBuffer:true}, mobilescale:1.0, passQueryParameters:true});
	</script>
</div>

</body>
</html>
