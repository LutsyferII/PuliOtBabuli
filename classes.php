<script src="path/to/jquery.min.js"></script>
<?php class Page{
    var $content;
    var $title = "Пули от бабули";
    var $keywords ="Пули, патроны, калибр";
    var $buttons = array("Home"=>"index.php","Контакты"=>"contact.php","Сервисы"=>"services.php","Корзина"=>"cart.php");
    var $style_file = "puli.css";
    var $url_gif = "logo.png";  
    var $scripts= array(array("text/javascript","js/menu_o.js"));
    var $head_content=array();
    var $bottom_panel;
    var $page_m=false;
    function ExcludeScript($j){
        if(isset($this->scripts[$j])){
            unset($this->scripts[$j]);
        }
    }
    function AddScript($some_shit,$type){
        $temp_array= array($type,$some_shit);

        array_push($this->scripts,$temp_array);
    }
    function cart(){
}
    function MainPage(){
        $this->page_m=true;
    }
    function SetLogoGif($some_shit){
        $this->url_gif=$some_shit;
    }
    function SetContent($some_shit){
        $this->content=$some_shit;
    }
    function SetTitle($some_shit){
        $this->title=$some_shit;
    }
    function SetKeywords($some_shit){
        $this->keywords=$some_shit;
    }
    function SetButtons($some_shit){
        $this->buttons=$some_shit;
    }
    function SetBP($some_shit){
        $this->bottom_panel=$some_shit;
    }
    function DisplayHeader(){
        include("header.inc");
    }
    function DisplayFooter(){
        include("foot.inc");
    }
    function DisplayStyles(){
        echo "<link href=\"$this->style_file\"rel=\"stylesheet\">";
    }
    function DisplayTitle(){
        echo"<title> $this->title</title>";
    }
    function DisplayKeywords(){
        echo "<META name=\"keywords\" content=\"$this->keywords\">";
    }
    function DisplayHead(){
        if(isset($this->head_content[0])){
            for($i=0;$i<count($this->head_content);$i++){
                echo $this->head_content[$i];
            }
        }

    }
    function DisplayScripts(){
        for($i=0;$i<count($this->scripts);$i++){
            $temp = current($this->scripts);
            echo '<script type="'.$temp[0].'" src='.$temp[1].'></script>';
            next($this->scripts);
            //if(isset($this->scripts[$i])){
            //echo '<script type="'.$this->scripts[$i][0].'" src='.$this->scripts[$i][1].'></script>';
            //}
        }
    }
    function DisplayMenu(){
        
        echo
        "
        <div class=menu_close id=menu>
                <a href='".current($this->buttons)."'class=side_menu_1><div >".key($this->buttons);next($this->buttons);echo"</div></a>
                <a href='".current($this->buttons)."'class=side_menu_1><div >".key($this->buttons);next($this->buttons);echo"</div></a>
                <a href='".current($this->buttons)."'class=side_menu_1><div >".key($this->buttons)."</div></a>
        
        </div>
        "; reset($this->buttons);echo"
        <header id=header class=header>
        <div class=menu_table cellpadding=4 cellspacing=4>
            <div height=40px class=menu_tr_1>
                <div class=cont><a vertical-align=middle href=\"";echo current($this->buttons);echo "\"><div class=menu>".key($this->buttons); next($this->buttons);echo "</div></a></div>
                <div class=cont><a href=\"";echo current($this->buttons);echo "\"><span class=menu>".key($this->buttons); next($this->buttons);echo "</span></a></div>
                <div class=cont><a href=\"";echo current($this->buttons);echo "\"><span class=menu>".key($this->buttons); next($this->buttons);echo "</span></a></div>
                <div class=cart_vis><a href=\"";echo current($this->buttons);echo "\"><span class=menu>".key($this->buttons); reset($this->buttons);echo " </span></a><script src=\"http://code.jquery.com/jquery-latest.js\"></script><div class='cartM' id='cartVis'>";include("cartVis.php");echo"</div></div>
            </div>
            
            <div class=menu_tr_2>
                <div class=icon_menu id=menu_i onclick=sideMenu()><div class=icon_menu_a id=imp_1></div><div class=icon_menu_a id=imp_2></div><div class=icon_menu_a id=imp_3></div></div><div class=search_div><form action='results.php' method='post'  class=search_form>    <input name='searchterm' type=text size=100px  class=search> <input type=submit value='Поиск' class=search_button>   </form></div>
            </div>
        </div>
        </header>";
    }
    Function DisplayTopHuy(){
        if(isset($_GET['huy'])){
            echo "<div class=top_huy>".$_GET['huy']."</div>";
        }else{
        echo "<div class=top_huy></div>";
        }
    }
    function DisplayLeftHuy(){

        echo "
        <div class=bok_h>
            <form action='index.php' method='post'>
                <div class=bok_h_cont>
                    <div class=bok_h_cont_calibr> <div class=bok_h_cont_cal_name>Калибр: </div>";
        $calibers=array(array("7.62x39","7-62x39"),array("5.45x39","5-45x39"),array("5.56x45","5-56x45"));
        for($i=0;$i<count($calibers);$i++){
            echo"
                        <label class=ui_bok_h_1>
                            <span>
                            ".$calibers[$i][0]."
                            </span>
                            <input type=checkbox class=ui_bok_h_input id=".$calibers[$i][1]." name=".$calibers[$i][1]." value=1>
                            <span class='ui_bok_h_box'></span>
                        </label>

        ";
        }
        
        
        echo"
                    </div>
                    <input type='submit' value='suka!'>
                </div>
            </form>
        </div>
            
            
        ";





    }
    function DisplayContent($huy){
        if($huy==true){
            echo "<div class=page>";
            $this->DisplayTopHuy();
            echo "<div class=main>";$this->DisplayLeftHuy();echo"<div class=main_content>";if(is_array($this->content)){foreach($this->content as $znach){echo $znach;}}else{echo $this->content;};echo "</div></div>";
            echo "</div>";
        }else{
        echo "<div class=main><div class=main_content>";if(is_array($this->content)){foreach($this->content as $znach){echo $znach;}}else{echo $this->content;};echo "</div></div>";
        }
    }
    function Display(){
        echo "<html>\n<head>\n";
        $this->DisplayTitle();
        $this->DisplayScripts();
        $this->DisplayKeywords();
        $this->DisplayStyles();
        echo "</head>\n<body>\n";
        $this->DisplayHeader();
        $this->DisplayMenu($this->buttons);
        $this->DisplayContent($this->page_m);
        $this->DisplayFooter();
        echo "</body>\n</html>\n";
    }

}
?>