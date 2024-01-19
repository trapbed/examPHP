<!DOCTYPE html>
<html>
<head>
<meta charset='utf-8'>
<meta http-equiv='X-UA-Compatible' content='IE=edge'>
<title>Результаты</title>
<meta name='viewport' content='width=device-width, initial-scale=1'>
<link rel='stylesheet' type='text/css' media='screen' href='css/style.css'>
</head>
<body>
<?php
session_start();
for ($u=0;$u<=4;$u++) {//цикл для 5-ти задач
    $no=$u+1;  //переменная- номер задачи
    $user = $_POST["task$u"];//переменная, хранящая ответ пользователя
    $res = $_SESSION["session $u"][1];//переменная, хранящая верный ответ
    if($_POST["task$u"]==$_SESSION["session $u"][1]) {//проверка верного ответа
        //при верном решении выводится ответ и зеленый текст "верный"
        echo "Вопрос №$no.<br>Ваш ответ: $user <font color='green'>-Верный!!!</font> <br>";
    } 
    else {
        //если не верное решение, отобр. ваше и верное решение
        echo "Вопрос №$no.<br> Ваш ответ: $user <font color='red'>-Неверный!!!</font> Правильный ответ: $res<br>";
    } 
}
?>
</body>
</html>