<?php
mysqli_select_db ("databasename") ; //Выбор базы данных.
@ $db = mysqli_connect('Адресс','nickname','password',['databasename']);// Подключение к базе данных.
$result = mysqli_query($db,$sqlscript);//Выполнение $sqlscript в консоли базы данных через подключение $db и возвращение ответа в $result
$num_results = mysqli_num_rows($result);// Подсчет строк, которые вернуло в $result
$row = mysqli_fetch_array($result);//Создает ассоциативный массив, в который вносит строку. Название столбца - ключ. Значение в строке - значение;
htmlspecialchars(stripslashes($row["column"]));//htmlspecialchars - добавляет \ перед специальными символами html | stripslashes - удаляет слеш.
mysql_fetch_row()://mysqli_fetch_array, но возвращает не ассоциативный массив, а обычный.
$row = mysqli_fetch_object($result);// Выбирает строку внутрь обьекта.
mysqli_close($db);//Отключение от базы данных.
$row = mysqli_result($result,$i,"поле");//Возвращает &i количество строк из &result по названию поля.
mysqli_affected_rows()|affected_rows;//Возвращает номер затронутой строки.
$mysqli = new mysqli('Адресс','nickname','password',['databasename']);//Создание обьекта базы данных.
$mysqli->connect_errno;//Есть ли подключение.
$mysqli->query("COMMAND");//
$mysqli->affected_rows;//
mysqli_free_result(int $result);//Освобождает память, занимаемую результатом.
doubleval();





?>