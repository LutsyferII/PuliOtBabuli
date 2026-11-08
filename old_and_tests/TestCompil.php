<?php
include('func.php');
define("SLOVO", "Slovo");
$huy = 14;
if($huy>=15){
 //    $массивАсоцМассивов = array( array( SLOVO => "Слово", "Bukva" => "B", "Chislo" => 100), array( "LuboyIndex" => "Значение, хранимое по этому индексу", "luboeSlovo" => "Значение, на которое указывает этот индекс", "Chislo" => 20));
 //    $массивАсоцМассивов[0][SLOVO] = "Другое слово";
 //    $m = array("huy","pizda");
 //    for($i=0;$i < 2;$i++){
 //        foreach($массивАсоцМассивов[$i] as $ключ => $значение){
 //            echo $ключ." Ключ значения ".$значение;
 //            echo "<br>";
 //        }
 //        //for()
 //        //echo "<br>";
 //    }
 //    $mm = array(array(40,400,1000),array(20,200,2000),array(30,300,3000),array(99,999));
 //    $трехмерныйМассив = array(array("don"=>array("Loh"=>"ты")));
 //    echo $трехмерныйМассив[0]["don"]["Loh"]."<br>";
 //    usort($mm, "sravn");
 //    echo $mm[0][0]."<br>".$mm[0][1]."<br>";
 //    usort($mm, "sravnSum");
 //   echo $mm[0][0]."<br>".$mm[0][1]."<br>";
}
class cheliki{
   var $имя;
   var $рост;
   function predstav(){
    echo $this->имя;
   }
}
$chel = new cheliki;
$chel->имя="Чел";
$chel->predstav();
class woman extends cheliki{
    var $size_boobs;
    var $temp = false;
    function pokazBoobs(){
        echo "<br>".$this->size_boobs;
    }
    function pushUp(){
        if ($this->size_boobs<=5 && $this->temp==false){
            $this->size_boobs++;
            $this->temp = true;
        }else{echo "<br>Куда тебе ещё?!";}
    }
    function pushUpRemove(){
        if($this->temp==true){
            $this->size_boobs--;
            $this->temp=false;
        }else{echo "<br>Былоб что снимать...";}
    }
}
$wom = new woman;
$wom->size_boobs = 2;
$wom->имя="Аня";
$wom->predstav();
$wom->pokazBoobs();
$wom->pushUp();
$wom->pushUp();
$wom->pokazBoobs();
$wom->pushUpRemove();
$wom->pushUpRemove();
$wom->pokazBoobs();
$p="puli.css";
include($p);
$mass= array("huy"=>15,"her"=>"mda","chlen"=>"idi","hren"=>"pospi");
echo key($mass);
echo "<br>";

?>