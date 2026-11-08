<?php 
if(!is_writable($file)){ echo "<tr><td><h2>Fail error, pls try later.</tr><td>"; exit;}
if(!$fp = fopen("EtoBaza.txt","a",1)) {echo "<tr><td><h2>System can't save your order, pls try later.</tr><td>"; exit; }
$masFile = file($file);
$lines = count($masFile);
$lines = $lines/5 + 1;
$outData = "\n".$lines."\t".$date.","."  ".$lol." - 7.62x39".",".$lol2." - 7.62x54 ,".$lol3." - 5.45x39  \n".$reason."\n"."\t".$_POST["address"]."\n"."\t".$price."\n"."J";
if($fp){flock($fp,2);}
if(fwrite($fp, $outData) === FALSE){echo "<tr><td><h2>Can't write your order, pls try later.</tr><td>";fclose($fp);fclose($ftd); exit;}
if($fp){flock($fp,3);}  

fclose($fp);


?>
