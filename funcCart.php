<?php  
    function cartAdd($address){
        require ("connection.php");
        if(isset($_GET['action']) && $_GET['action']=="add"){ 
              
            $id=intval($_GET['id']); 
              
            if(isset($_SESSION['cart'][$id])){ 
                  
                $_SESSION['cart'][$id]['quantity']++; 
                header("Location: ".$address);
                  
            }else{ 
                  
                $sql_s="SELECT * FROM ammo 
                    WHERE ammoid={$id}"; 
                $query_s=mysqli_query($db,$sql_s); 
                if(mysqli_num_rows($query_s)!=0){ 
                    $row_s=mysqli_fetch_array($query_s); 
                      
                    $_SESSION['cart'][$row_s['ammoid']]=array( 
                            "quantity" => 1, 
                            "price" => $row_s['price'] 
                        ); 
                      
                      
                }else{ 
                      
                    $message="This product id it's invalid!"; 
                      
                } 
                header("Location: ".$address);
            } 
              
        } 
    }
?>
