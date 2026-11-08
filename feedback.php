<?php 
    $toaddress = "feedback@puliotbabuli.com";
    $subject = "Фидбек хуйтеров.";
    $mailcontent = "Имя заказчика:  ".$name."\n"."Мыло заказчика: ".$email."\n"."Отзыв:  \n".$feedback."\n";
    $fromaddress = "webserver@puliotbabuli.com";
    mail($toaddress,$subject,$mailcontent,$fromaddress);
?>
<html>
<head>
    <title>Бабулины пули - Отправка отзывов.</title>
</head>
<body>
<h1>Отзыв обработан</h1>
<p>Ваш отзыв отправлен</p>
</body>
</html>