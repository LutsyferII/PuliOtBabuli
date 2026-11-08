<?php 
    include ("classes.php");
    $main_page = new Page;
    $main_page->MainPage();
    if($db){
    $cont_v2=array();

    //ФУНКЦИИ
    function is_true($var){
        return $var;
    }
    function caliber($some_shit){
        preg_match('/^[0-9]*-/',$some_shit,$lal);
        preg_match('/-[[:print:]]*/',$some_shit,$lol);
        $lal=substr($lal[0],0,-1);
        $lol=substr($lol[0],1);
        $lal.=".".$lol;
        return $lal;
    }
    //!ФУНКЦИИ


    //echo $first_limit;
    //echo $pages;
    $calibers_filter_names=array('7-62x39'=>false,'5-45x39'=>false,'5-56x45'=>false);
    if(isset($_GET['calibers'])){
        //echo "<br> cal= ".$_GET['calibers']."<br>";
        for($i=0;$i<count($calibers_filter_names);$i++){
            $temp_huy=substr($_GET['calibers'],$i,1);
            //echo "<br> cal= ".$temp_huy."<br>";
            if($temp_huy==1){
                $calibers_filter_names[key($calibers_filter_names)]=true;
                //echo "<br> cal= ".$calibers_filter_names[key($calibers_filter_names)]."<br>";
            }
            next($calibers_filter_names);
        }
        reset($calibers_filter_names);
    }
    for($i=0;$i<count($calibers_filter_names);$i++){
        if(isset($_POST[key($calibers_filter_names)])&&$_POST[key($calibers_filter_names)]==1){
            $calibers_filter_names[key($calibers_filter_names)]=true;
        }
        next($calibers_filter_names);
    }
    //var_dump($calibers_filter_names);
    reset($calibers_filter_names);
    $cfn=array_filter($calibers_filter_names,'is_true');
    $sql_temp = 'select count(*) from ammo ';
    if(!empty($cfn)){
        reset($cfn);
        //var_dump($cfn);
        $sql_temp.=' where caliber in(';
        for($i=0;$i<count($cfn);$i++){
            $sql_temp.="'".caliber(key($cfn))."',";
            //echo "<br>".caliber(key($cfn))."<br>";
            next($cfn);
        }
        $sql_temp = substr($sql_temp,0,-1);
        $sql_temp.=")";
        reset($cfn);
    }
    $count_sql=mysqli_query($db,$sql_temp);
    $count_sql=mysqli_fetch_array($count_sql);
    $count_sql=$count_sql[0];
    $page=1;
    $content_limit=12;
    if(isset($_GET['page'])){
        if($_GET['page']-1<$count_sql/$content_limit&&$_GET['page']>=1){
            $page=$_GET['page'];
            //echo "huy";
        }
    }
    $pages=$count_sql/$content_limit;
    $first_limit=$content_limit*($page-1);
    
    
   // echo '<br>';
    //var_dump($cfn);
    
    //echo caliber('7-62x39');

    $sql = 'select * from ammo ';
    if(!empty($cfn)){
        $sql.=' where caliber in(';
        for($i=0;$i<count($cfn);$i++){
            $sql.="'".caliber(key($cfn))."',";
            //echo "<br>".caliber(key($cfn))."<br>";
            next($cfn);
        }
        $sql = substr($sql,0,-1);
        $sql .=") ";
        reset($cfn);
    }
    $sql .=" limit ".$first_limit.", ".$content_limit;
    $result = mysqli_query($db,$sql);
    $num_results = mysqli_num_rows($result);
    $cont_v2="<div class=main_page_cont>";
    for($i=0;$i<$num_results;$i++){
        $row = mysqli_fetch_array($result);
        $cont = "<br><a href=\"tovar.php?aid=".$row['ammoid']."\">"."<div class=content color=white style='background-image: url(ammo_img/".$row['url_img'].");background-size: cover;background-repeat: no-repeat;background-size: 100% 100%;'><div class=content_1><div><strong>".htmlspecialchars(stripslashes($row["nazv"]))."</strong></div>";
        $cont = $cont."<div>Цена: ".htmlspecialchars(stripslashes($row["price"]))."</div></div></div></a>";
        $cont_v2.=$cont;
        //array_push($cont_v2,$cont);
    }
    $cont_v2.="</div><div class=niz_panel>";
    $get_huet='';
    for($i=0;$i<count($calibers_filter_names);$i++){
        if(current($calibers_filter_names)==true){
            $get_huet.=1;
        }else{
            $get_huet.=0;
        }
        next($calibers_filter_names);
    }
    //var_dump($get_huet);
    reset($calibers_filter_names);
    for($i=0;$i<$pages;$i++){
        $cont_v2.="<a href='index.php?page=".$i+1 ."&calibers=".$get_huet."'><div class=page_i>".$i+1 ."</div></a>";
    }
    $cont_v2.="</div>";
        
    }else{
        $cont_v2="Пизда рулю";
    }   
    $main_page->SetContent($cont_v2);
    $main_page->Display();
    
    if($db){
    mysqli_close($db);
    }

?>


    
    
