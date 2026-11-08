<?php session_start(); ?>
<?php
//if(isset($_GET["page"]) && $_GET["page"]!="index"){
 //   require ("funcCart.php");
 //   require ("connection.php");
 //   $page_name=$_GET["page"].".php";
//    require ($page_name);
    //header("Location: cart.php");
//    exit;
//}
?>
<?php 
    require ("funcCart.php");
    require ("connection.php");
    cartAdd("index.php");
  
?>
<?php include('pulibabuli_v3.php'); ?>
<?php      
$operaciaZapuska = `ls -la`;
echo "<pre>".$operaciaZapuska."</pre>";

?>
