<html>
<head>
    <link href="puli.css" rel="stylesheet">
    <style>
        body{
            background-color: rgb(36, 33, 33);
        }
    </style>
</head>
<body>
    <form action="puliotbabuli.php" method=post>
        <table border=0 class="hren" width=500px>
            <tr ><td><h1 class ="her">Babuliny Puli</h1></td></tr>
            <tr><td><h2>Order</h2></td></tr>
            <tr><td class="suka">   
                <?php 
                    if(is_numeric($_POST["akmqty"])){$lol=$_POST["akmqty"];}else{$lol=0;}
                    if(is_numeric($_POST["pkmqty"])){$lol2=$_POST["pkmqty"];}else{$lol2=0;}
                    if(is_numeric($_POST["ak74qty"])){$lol3=$_POST["ak74qty"];}else{$lol3=0;}
                    $reason=$_POST["reason"];
                    if($reason=="d"){
                        $reason=$_POST["reas"];
                    }
                    if($lol>0||$lol2>0||$lol3>0){
                        if($_POST["address"]!=NULL){
                            $date= date(DATE_RFC822);
                            $price = $lol*30 + $lol2*50 + $lol3*20;
                        }else{
                            echo "<tr><td><h2>Wrong Address!</tr></td>";
                            exit;
                        }
                    }else{
                        echo "<tr><td><h2> Get back to Canada!</tr></td>"."<tr><td><h3> Fucking liberal</tr></td>";
                        exit;
                    }

                    
                        
                    define("AKMAMMOPRICE", 30);
                    define("NALOG", 0.8);
                    $totalPrice = $lol*30+$lol2*50+$lol3*20;
                    $totalPeiceWTax = 0;
                    //$reas=$_POST["reas"];
                    $plotiNalogi = 0.8;
                    //echo "<br>",$reason;
                    
                    echo "<br> Your order:";
                    echo "<br>"; 
                ?><tr><td border =1 class="suka"><?php
                    if($lol>0){
                    echo "Quantity: ". $lol."  |7.62x39|  It costs:". $lol*AKMAMMOPRICE ."<br>";}//30
                    ?><tr><td class="suka"><?php
                    if($lol2>0){
                    echo "Quantity: ". $lol2."  |7.62x54|  It costs: ". $lol2*50 ."<br>";}//50
                    ?><tr><td class="suka"><?php
                    if($lol3>0){
                    echo "Quantity: ". $lol3."  |5.45x39|  It costs: ". $lol3*20 ."<br>";}//20
                    echo " <br>";
                    ?>  
            </td></tr>
            <tr><td><h2><?php 
            //echo "total price: ";
                        echo "total price: ".$totalPrice;
            ; ?></h2></td></tr>
            <tr><td><h3><?php 
            //echo "total price: ";
                        echo "total price without taxes: ". $totalPrice*NALOG;
                
            ; ?></h2></td></tr>
            <tr><td>
            <input type=submit value="Submit Order">

            </td></tr>
            <tr><td><?php echo date("H:i, jS F") ; ?>
        <?php      
                $operaciaZapuska = `ls -la`;
                echo "<pre>".$operaciaZapuska."</pre>";

        ?></tr></td>
            </td></tr>
        </table>
    </form>

</body>
</html>

