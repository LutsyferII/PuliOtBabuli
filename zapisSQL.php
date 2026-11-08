<?php
    $tptable=$_POST['table'];
    $values= array($_POST['value1'],$_POST['value2'],$_POST['value3'],$_POST['value4'],$_POST['value5'],$_POST['value6'],$_POST['value7'],$_POST['value8']);
    $columns= array($_POST['column1'],$_POST['column2'],$_POST['column3'],$_POST['column4'],$_POST['column5'],$_POST['column6'],$_POST['column7'],$_POST['column8']);
    $link = mysqli_connect("localhost", "root", "16Ru60ss28iA42","ammo");
    //$mysqli = new mysqli("localhost", "root", "16Ru60ss28iA42", "ammo");
    if ($link == false){
        print("Ошибка: Невозможно подключиться к MySQL " . mysqli_connect_error());
    }

        $sql = 'insert into '.$tptable.' SET ';
        for($i=0;$i<8;$i++){
            if($values[$i]!=NULL){
                $sql = $sql.$columns[$i].' = "'.$values[$i].'",';
            }
        }
        $sql = substr($sql,0,-1);
        
        $result = mysqli_query($link,$sql);
        
        if ($result == false) {
            print("Произошла ошибка при выполнении запроса");
        }else{
            echo "Успех";
        }


    

?>