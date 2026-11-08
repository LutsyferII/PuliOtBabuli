<?php 
    if(!isset($_SESSION)){
    session_start();}
    if(isset($_POST["searchterm"])){
        $_SESSION['searchterm']=$_POST["searchterm"];
        $searchterm = $_POST["searchterm"];
        header("Location: results.php?search=".$_POST["searchterm"]);
    }
    if(isset($_SESSION['searchterm'])){
        if(isset($_GET['search'])){
            $_SESSION['searchterm']=$_GET['search'];
        }
        $searchterm = $_SESSION['searchterm'];
    }
    include ("classes.php");
    $main_page = new Page;
    if(!isset($searchterm)){
        $cont_v2 = "Попробуйте снова";
        echo "huy";
        exit;
    }
    //$searchterm = $_GET['search'];
    //$searchterm = $_POST["searchterm"];
    trim($searchterm);
    if (!$searchterm){
        $cont_v2 = 'А вводить что-нибудь пытался?';
        $main_page->SetContent($cont_v2);
        $main_page->Display();
        exit;
    }

    $searchterm = addslashes($searchterm);
    @ $db = mysqli_connect('localhost','admin','123456789','ammo');
    if (!$db){
        $cont_v2 = 'Пизда рулю.';
        $main_page->SetContent($cont_v2);
        $main_page->Display();
        mysqli_close($db) ;
        exit;
    }
    $sql_temp = 'select count(*) from ammo where nazv like \'%'.$searchterm.'%\'';
    $count_sql=mysqli_query($db,$sql_temp);
    $count_sql=mysqli_fetch_array($count_sql);
    $count_sql=$count_sql[0];
    $page=1;
    $content_limit=12;
    if(isset($_GET['page'])){
        if($_GET['page']-1<$count_sql/$content_limit&&$_GET['page']>=1){
            $page=$_GET['page'];
            //echo "huy";
        }
    }
    $pages=$count_sql/$content_limit;
    $first_limit=$content_limit*($page-1);


    $sql = 'select * from ammo where nazv like \'%'.$searchterm.'%\''." limit ".$first_limit.", ".$content_limit;
    $result = mysqli_query($db,$sql);
    $num_results = mysqli_num_rows($result);
    if($num_results == 0){
        $cont_v2 = "Нихуя, прям совсем нихуя.";
    }else{
        $cont_v2="<div class=main_page_cont>";
        for($i=0;$i<$num_results;$i++){
            $row = mysqli_fetch_array($result);
            $cont = "<br><a href=\"tovar.php?aid=".$row['ammoid']."\">"."<div class=content color=white style='background-image: url(ammo_img/".$row['url_img'].");background-size: cover;background-repeat: no-repeat;background-size: 100% 100%;'><div class=content_1><div><strong>".htmlspecialchars(stripslashes($row["nazv"]))."</strong></div>";
        $cont = $cont."<div>Цена: ".htmlspecialchars(stripslashes($row["price"]))."</div></div></div></a>";
            $cont_v2.=$cont;
        }
        $cont_v2.="</div><div class=niz_panel>";
        for($i=0;$i<$pages;$i++){
            $cont_v2.="<a href='results.php?page=".$i+1 ."'><div class=page_i>".$i+1 ."</div></a>";
        }
        $cont_v2.="</div>";
    }
    require ("funcCart.php");
    cartAdd("results.php");
    $main_page->SetContent($cont_v2);
    $main_page->Display();
    mysqli_close($db) ;
   
    
?>
<?php 
    




?>

    
    
