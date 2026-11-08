<?php 
if(!isset($_SESSION)){
    session_start();
}
$currentUrl = ((!empty($_SERVER['HTTPS'])) ? 'https' : 'http') . '://' . $_SERVER['HTTP_HOST'] . $_SERVER['REQUEST_URI'];
$currentUrl = explode('?', $currentUrl);
$currentUrl = $currentUrl[0];
@ $db = mysqli_connect('localhost','admin','123456789','ammo');
if (!$db){
    $cont_v2 = 'Пизда рулю.';
    exit;
}
if(isset($_SESSION['cart'])&&!empty($_SESSION['cart'])){ 

$dadada=0;
 if(isset($_POST['dich'])){
     $dadada=$_POST['dich'];
 }
 if(isset($_POST['param'])){
    $temp=$_POST['param'];
    if($dadada==1&&isset($_SESSION['cart'][$temp])){    
        unset($_SESSION['cart'][$temp]);
    }
   if(isset($_SESSION['cart'][$temp])){
   echo $_SESSION['cart'][$temp];
   }
}
//echo var_dump($_SESSION['cart']);
if(isset($_SESSION['cart'])&&!empty($_SESSION['cart'])){ 
$sql="SELECT * FROM ammo WHERE ammoid IN ("; 

foreach($_SESSION['cart'] as $id => $value) { 
    $sql.=$id.","; 
} 
$sql=substr($sql, 0, -1).") ORDER BY nazv ASC"; 
$query=mysqli_query($db,$sql); 
$dadada=0;
if(isset($_POST['dich'])){
    $dadada=$_POST['dich'];
}
if($dadada==1){
    $temp=$_POST['param'];
    unset($_SESSION['cart'][$temp]);
}
$delete_bottom="
<script> function deleteH(id){ $(document).on(\"click\", \"#deletecart\", function() {
    var huy=1;
    $.ajax({
      type: \"POST\",
      url: \"cartVis.php\",
      data: {\"param\":id, \"dich\": huy}
    }).done(function(result) {
        $( \"#cartVis\").html(result);
      });
    }); }</script>

";
echo "<table>";
while($row=mysqli_fetch_array($query)){
echo "<tr><td class=\"tdleft\">".$row['nazv']." x ".$_SESSION['cart'][$row['ammoid']]['quantity'].$delete_bottom."</td><td width=\"20%\" left=\"0\"><input type='button' class='closeKnopka' id='deletecart' onclick='deleteH(".$row['ammoid'].")'/> <div id='deletecarthtml'></div>"."</td></tr>";          
} 
echo "</table>";
echo "<hr />
<a href='index.php?page=cart'>В корзину</a>";     
}
else{      
    echo "<p>Пусто</p>";      
    } 
}else{      
echo "<p>Пусто</p>";      
} 
mysqli_close($db);


?>