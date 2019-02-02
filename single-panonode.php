<?php
$iconname = get_field('icon'); 
if ($iconname == 'https://www.treasuremaps.online/360/icons/360.png'){
get_template_part('tour','include'); 
} elseif ($iconname == 'https://www.treasuremaps.online/360/icons/photo.png') {
 get_template_part('panonode','include');    

} else {
get_template_part('panonode','include'); 
}

?>
