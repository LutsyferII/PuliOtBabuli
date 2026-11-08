<?php 
    include ("classes.php");
    $this_page = new Page;
    session_start();
    $content = "Я тебя спас и в благородство играть не буду, выполнишь для меня пару заданий и мы в расчете.Не знаю на кой тебе здался этот Стрелок, но я в чужие дела не лезу, если убить хочешь, значит есть за что.";
    $this_page->SetContent($content);
    $this_page->Display();

    ?>