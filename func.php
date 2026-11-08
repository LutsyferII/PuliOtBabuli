<?php
function sravn($x,$y){ //Создание функции сравнения массивов.
    if ($x[0]==$y[0]){
        return 0;
    }else if ($x[0]<$y[0])
        return -1;
    else
        return 1;
}
function sravnSum($x,$y){
    $sumX = 0;
    $sumY = 0;
    foreach($x as $kay => $i){
        $sumX = $sumX + $i;
    }
    foreach($y as $kay => $i){
        $sumY = $sumY + $i;
    }
    if($sumX == $sumY){return 0;}
    else if($sumX<$sumY)return -1;
    else return 1;
}
function чел($имя,$рост=180,$вес=80,$длина_члена=15){
    echo "Зовут: ".$имя."| Рост: ".$рост."| Вес: ".$вес."| Член: ".$длина_члена." см";
   //printf("Зовут: %s | Рост: %s | Вес: %s | Член:  %s см ",$имя,$рост,$вес,$длина_члена);
   $челик= array("имя"=>$имя,"рост"=>$рост,"вес"=>$вес,"длина"=>$длина_члена);
   return $челик;
}



?>