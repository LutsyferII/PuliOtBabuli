<?php 
    session_start();
 $dadada=0;
 if(isset($_POST['dich'])){
     $dadada=$_POST['dich'];
 }
 if(isset($_POST['param'])){
    $temp=$_POST['param'];
}
 if($dadada==1&&isset($_SESSION['cart'][$temp])){
     
     unset($_SESSION['cart'][$temp]);
 }
$a=$_POST['param'];
$a++;
echo $a;
$e=$_POST['dich'];
echo $e;
if(isset($_SESSION['cart'][$temp])){
echo $_SESSION['cart'][$temp];
}
?>