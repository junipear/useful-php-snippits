<?php
/****************** 
*@email - Email address to show gravatar for 
*@size - size of gravatar 
*@default - URL of default gravatar to use 
*@rating - rating of Gravatar(G, PG, R, X) 
*/  
function show_gravatar($email, $size, $default, $rating)  
{  
    echo '<img src="http://www.gravatar.com/avatar.php?gravatar_id='.md5($email).  
        '&default='.$default.'&size='.$size.'&rating='.$rating.'" width="'.$size.'px"  
        height="'.$size.'px" />'; 
?>
