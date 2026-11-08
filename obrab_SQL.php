<?php 
    session_start();
    echo 1;
    if(isset($_POST['password']) || $_SESSTION['password2']=="16602842"){
        echo 2;
        if($_POST['password']=="16602842" || $_SESSTION['password2']=="16602842"){
            echo 3;
            $_SESSION['password2']=$_POST['password'];
            $title=$_POST['title'];
            $body=$_POST['body'];
            if ($_FILES && $_FILES["filename"]["error"]== UPLOAD_ERR_OK)
            {
                $name = "img_news/" . $_FILES["filename"]["name"];
                move_uploaded_file($_FILES["filename"]["tmp_name"], $name);
                echo "Файл загружен";
            }
            
            $date=date('l jS \of F Y h:i:s A');
            echo $date;






        }else{
            echo "pizda";
        }
    }else{
        echo "huy";
    }


?>