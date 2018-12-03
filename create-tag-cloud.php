<?php
function getCloud( $data = array(), $minFontSize = 12, $maxFontSize = 30 )  
{  
    $minimumCount = min($data);  
    $maximumCount = max($data);  
    $spread       = $maximumCount - $minimumCount;  
    $cloudHTML    = '';  
    $cloudTags    = array();  
  
    $spread == 0 && $spread = 1;  
  
    foreach( $data as $tag => $count )  
    {  
        $size = $minFontSize + ( $count - $minimumCount )   
            * ( $maxFontSize - $minFontSize ) / $spread;  
        $cloudTags[] = '<a style="font-size: ' . floor( $size ) . 'px'   
        . '" class="tag_cloud" href="#" title="\'' . $tag  .  
        '\' returned a count of ' . $count . '">'   
        . htmlspecialchars( stripslashes( $tag ) ) . '</a>';  
    }  
      
    return join( "\n", $cloudTags ) . "\n";  
}  
/************************** 
****   Sample usage    ***/  
$arr = Array('Actionscript' => 35, 'Adobe' => 22, 'Array' => 44, 'Background' => 43,   
    'Blur' => 18, 'Canvas' => 33, 'Class' => 15, 'Color Palette' => 11, 'Crop' => 42,   
    'Delimiter' => 13, 'Depth' => 34, 'Design' => 8, 'Encode' => 12, 'Encryption' => 30,   
    'Extract' => 28, 'Filters' => 42);  
echo getCloud($arr, 12, 36);  
?>
