<?php 
    include ("../classes.php");
    echo '<link href="../puli.css" rel="stylesheet">';
    $main_page = new Page;
    $main_page->SetLogoGif("../logo.gif");
    $cont_v2="<div class=content></div>";

    $main_page->SetContent($cont_v2);
    $main_page->Display();
    echo '<link href="localhost/puliotbabuli/contents/puli.css" rel="stylesheet">';
    
?>
