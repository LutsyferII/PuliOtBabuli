<?php
    $string = "lol lollolохllolrerxxxx охlfds - этоlохkох судьба." ;
    preg_match('/(?:[[:alpha:]]*ох+[[:print:]]*+ох){1,1}/',$string, $lal);
    var_dump($lal);
    echo "<br>".$lal[0]."<br>";
    $str = "start mtar hatar";
    //preg_match_all('/[[:alpha:]]*tar{1,3}/',$str,$lol);
    preg_match('/(s)(tar)/',$str,$lol);
    $email = "huy@v.rot";
    preg_match('/^[a-zA-Z0-9]+@[a-zA-Z0-9\-]+\.[a-zA-Z0-9\-\.]+$/',$email,$kek);
    var_dump($kek);echo "<br>";
    $host = "http://www.v.rot/index.html";
    preg_match('@^(?:http://)?([^/]+)@i',$host,$huy); //
    var_dump($huy);echo "<br>";
    preg_match('/(?<milo>\w+)@(?<site>[[:print:]]+)/', $email,$her);
    var_dump($her);echo "<br>";
    function чел($имя,$рост=180,$вес=80,$длина_члена=15){
        echo "Зовут: ".$имя."| Рост: ".$рост."| Вес: ".$вес."| Член: ".$длина_члена." см";
       //printf("Зовут: %s | Рост: %s | Вес: %s | Член:  %s см ",$имя,$рост,$вес,$длина_члена);
       $челик= array("имя"=>$имя,"рост"=>$рост,"вес"=>$вес,"длина"=>$длина_члена);
       return $челик;
    }
    $челики[0]=чел("Челик",187,100);
    echo "<br>".$челики[0]["имя"];
    $huy=10;
    function test(&$h){
        $h=$h+1;
    }
    test($huy);
    echo $huy;

?>
<?php
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




?>