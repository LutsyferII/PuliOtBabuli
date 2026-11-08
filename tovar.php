<?php 
    include ("classes.php");
    require ("funcCart.php");
    $page = new Page;
    if(!isset($_GET['aid'])){


        $page->SetContent("Ну и нахуй ты там тыкаешь?");
        $page->Display();
        if($db){
            mysqli_close($db);
            }
        exit;
    }
    

    require ("connection.php");
    if($db){
        
        $sql = 'select * from ammo where ammoid = '.$_GET['aid'];
        $result = mysqli_query($db,$sql);
        $row = mysqli_fetch_array($result);
        //echo var_dump($row);
        $cont_v2 ="<div class='ammo_cont'><div class='ammo_nazv'>".
        $row["nazv"].
        "</div><div class='ammo_main'><div class='ammo_img'><img src='ammo_img/".
        $row["url_img"].
        "' class='img_ammo'></div><div class='ammo_info'>Характеристики: <br><br>  Калибр: ".$row["caliber"]."<br>Тип: ".$row["typ"]."<br>Масса: ".$row["mass"]."<br>Тип патрона: ".$row["typeammo"]."<br>Производитель: ".$row["maker"]."<br>Блок: ".$row["type"].
        "<div class='ammo_price'>Цена за один: ".$row["price"]."</div></div></div></div>";
    }else{
        $cont_v2="Пизда рулю";
    }   
    $page->SetContent($cont_v2);
    $page->Display();
    
    if($db){
    mysqli_close($db);
    }

?>
