<html>
<head>
    <link href="puli.css" rel="stylesheet">
    <title> Babuliny Puli - Orders</title>
    <style>
        body{
            background-color: rgb(10, 0, 85);
        }
    </style>
</head>
<body>
<div>
    <h1> Babuliny Puli</h1>
    <h2> Orders</h1>
    <form action="VidData.php" method=post>
    <table border=0  class="ordTabl">
    <?php 
      if(!$fp = fopen("EtoBaza.txt","r",1)) {echo "<tr><td><h2>System can't save your order, pls try later.</tr><td>"; exit; }
        flock($fp,1);
        while (!feof($fp)){
            $order= fgetcsv($fp,100,",");
        //    $date= fgetcsv($fp,100,",");
        //    $ak= fgetcsv($fp,100,",");
        //    $pkm= fgetcsv($fp,100,",");
        //    $ak74= fgets($fp, 100);
            $reason= fgets($fp,100);
            $address= fgets($fp, 100);
            $price= fgets($fp, 100);
            $rdy= fgets($fp,100);
            echo "<tr class=bq><td  colspan=3></tr></td>";
            echo "<tr><td colspan=3>".$order[0].$order[1]."</td></tr>";
            echo "<tr><td>".$order[2]."</td><td>".$order[3]."</td><td>".$order[4]."</td></tr>";
            //echo "<tr><td>".$ak."</td><td>".$pkm."</td><td>".$ak74."</td></tr>";
            echo "<tr><td> Address: </td><td colspan=2>".$address."</td></tr>";
            echo "<tr><td> Price: </td><td colspan=2>".$price."</td></tr>";
            if($rdy[0]=="J"){
            echo "<tr><td></td><td> <input type=submit value='Complite'></td><td></td></tr>";
            }else{echo "<tr><td></td><td>".$rdy[0]."</td><td></td></tr>";}
        }
        if ($fp){
            flock($fp,3);
            fclose($fp);
        }
    ?>
    </table>
    </form>

</div>
</body>

</html>