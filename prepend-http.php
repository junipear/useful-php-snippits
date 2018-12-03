<?php
if (!preg_match("/^(http|ftp):/", $_POST['url'])) {  
   $_POST['url'] = 'http://'.$_POST['url'];  
}
?>
