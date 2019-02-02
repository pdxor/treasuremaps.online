<html <?php language_attributes(); ?> style="margin-top: 0px !important;">
<!--<![endif]-->
<head>
<?php wp_head(); ?>
<meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1"> 
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
  #loginform > h3 {
    display: none;
  }
  img {
    max-width: 100%;
    margin: 0 auto;
    height: auto;
  }
.headerbg {
display: none;
}
  .headerbg h1 {
    font-size: 22px
  }
  .intrinsic-container {
  position: relative;
  height: 80%;
  width: 100%;

  overflow: hidden;
}
 span.colour {
  display: none;
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
#input_2_18 li {
  display: inline;
}
.wpuf-author {
display: none;

}
#wpuf-login-form {
    display: block;
    margin: 0 auto;
    width: 222px;
    margin-top: 111px;
  }
</style>

<script type="text/javascript">
  function newTab(f) {
    var els = document.getElementsByTagName('a'); //read anchor elements into variable
    if(f.tab.checked == true) { //If the box is checked.
      for (var i in els) {
        els[i].setAttribute('target', '_blank'); //Add 'target="blank"' to the HTML
      } 
    } else { // not checked...
      for (var i in els) {
        els[i].setAttribute('target', '_self'); //Add 'target="self" to HTML
      }
    }
  }
</script>   
<style>
.container-full {
  margin: 0 auto;
  width: 100%;
}
.container-full .row {
  width: 95%;
  margin: 0 auto;
}
#field_2_22 {
visibility: hidden;
}
#tags {
  visibility: hidden;
}
div.gform_heading {
  display: none;
}
  </style>

</head>