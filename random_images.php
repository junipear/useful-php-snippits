<?php
    $pic = array('1.jpg','2.jpg','3.jpg','4.jpg','any.png');
    shuffle($pic);
    ?>
    <html lang="en">
    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <meta http-equiv="X-UA-Compatible" content="ie=edge">
        <title>ramdon images</title>
    </head>
    <body>
        <ul>
            <?php
                for($i = 0; $i < 3; $i++)
                echo '<li style="display:inline;"><img src="$pic" width="250" height="250" /></li>'
                ?>
        </ul>
    </body>
    </html>
