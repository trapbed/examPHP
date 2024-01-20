<!DOCTYPE html>
<html lang="ru">
<head>
<meta charset="UTF-8">
<meta name="viewport" content="width=device-width, initial-scale=1.0">
<title>ЕГЭ</title>
</head>
<body>
    <h1>Задачник ЕГЭ по информатике.</h1>
    <span id='time'></span>
    <?php
                    switch (date("m")){
                        case 1:
                            $month= "Январь";
                            break;
                        case 2:
                            $month= "Февраль";
                            break;
                        case 3:
                            $month= "Март";
                            break;
                        case 4:
                            $month= "Апрель";
                            break;
                        case 5:
                            $month= "Май";
                            break;
                        case 6:
                            $month= "Июнь";
                            break;
                        case 7:
                            $month= "Июль";
                            break;
                        case 8:
                            $month= "Август";
                            break;
                        case 9:
                            $month= "Сентябрь";
                            break;
                        case 10:
                            $month= "Октябрь";
                            break;
                        case 11:
                            $month= "Ноябрь";
                            break;
                        case 12:
                            $month= "Декабрь";
                            break;
                        }
                        $hour=date('H');
                        $minutes=date('i');
                        $seconds=date('s');
                        
                        $clock=[$hour, $minutes, $seconds];
                        echo date("$month d, 20y "." ".$clock[0].":".$clock[1].":"."$clock[2]");
                        ?>
    <nav>
        <li><a href="/task.php?task=0">1.Задания на перевод из 2СС в 10СС.</a></li>
        <li><a href="/task.php?task=1">2.Задания на получение размера картинки в Кбит.</a></li>
        <li><a href="/task.php?task=2">3.Задания на подсчет количества букв в тексте.</a></li>
    </nav>
</body>
</html>