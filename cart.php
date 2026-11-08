<?php 
    include ("classes.php");
    require ("connection.php");
    if(!isset($_SESSION)){
    session_start();}
    $main_page = new Page;
    echo "<style>
    .main_content{
        width:95%;display: flex;justify-content: center;flex-wrap: wrap;flex-direction: column;align-items: center;align-content: center;
        color: lightsteelblue;

    }
    
    </style>";
    if(isset($_SESSION['cart'])&&!empty($_SESSION['cart'])){
    if(isset($_POST['submit'])){ 
  
        foreach($_POST['quantity'] as $key => $val) { 
            if($val==0) { 
                unset($_SESSION['cart'][$key]); 
            }else{ 
                $_SESSION['cart'][$key]['quantity']=$val; 
            } 
        } 
          
        }
    $cont_v2="<h1>View cart</h1> 
    <a href='index.php?page=index'>Go back to products page</a> 
    <form method='post' action='cart.php'>  
        <table> 
            <tr> 
                <th>Name</th> 
                <th>Quantity</th> 
                <th>Price</th> 
                <th>Items Price</th> 
            </tr>";
    $sql="SELECT * FROM ammo WHERE ammoid IN (";
                          
    foreach($_SESSION['cart'] as $id => $value) { 
        $sql.=$id.','; 
    } 
                          
    $sql=substr($sql, 0, -1).')'; 
    $query=mysqli_query($db,$sql); 
    $totalprice=0; 
    while($row=mysqli_fetch_array($query)){ 
    $subtotal=$_SESSION['cart'][$row['ammoid']]['quantity']*$row['price']; 
    $totalprice+=$subtotal; 

    $cont_v2=$cont_v2."<tr> 
    <td>".$row['nazv']."</td> 
    <td><input type='text' name='quantity[".$row['ammoid']."]' size='5' value='".$_SESSION['cart'][$row['ammoid']]['quantity']."' /></td> 
    <td>".$row['price'] ."₽</td> 
    <td>".$_SESSION['cart'][$row['ammoid']]['quantity']*$row['price'] ."₽</td> 
    </tr> ";
    } 
    $cont_v2.="
        <tr> 
            <td colspan='4'>Total Price: ".$totalprice."</td> 
        </tr> 
    </table> 
    <br /> 
    <button type='submit' name='submit'>Update Cart</button> 
    </form> 
    <br /> 
    <p>To remove an item, set it's quantity to 0.</p>";
}else{
    $cont_v2="Пусто";
}
    $main_page->SetContent($cont_v2);
    $main_page->Display();
   
    
?>