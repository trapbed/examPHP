<!DOCTYPE html>
<html>
<head>
<meta charset='utf-8'>
<meta http-equiv='X-UA-Compatible' content='IE=edge'>
<title>Задания</title>
<meta name='viewport' content='width=device-width, initial-scale=1'>
<link rel='stylesheet' type='text/css' media='screen' href='css/style.css'>
</head>
<body>
<?php
    session_start();//начало сессии, для дальнейшего получения данных
    for ($i=0;$i<=4;$i++) {//цикл для создания пяти заданий по теме
        switch($_GET['task']) {//получение данных из ссылки (подобие формы)


            case 0: //при значении 0, первый вариант задания
                $arrayTask1 = get2ss(mt_rand(2,5));//рандом из числа длиной от 2-х до 5-ти
                $var1 = $arrayTask1[0];//значение 1( первое значение из возвращенного массива функции)
                $_SESSION["session $i"] = $arrayTask1;//передача в сессию значение рандомного числа


                if ($i==0) {//условие(если задание 1) при котором вводтится открываюий тег формы
                    echo "<form method='post' enctype='multipart/form-data' action='answers.php'> ";
                }
                // ввод задачи с каждой итерацией меняются значения
                echo "<label for='task$i'>Необходимо перевести значение $var1 из 2СС в 10СС. </label>
                      <input type='number' id='task$i' name='task$i'> <br>";


                if ($i==4) {//если введено последнее задание вводим кнопку отправки, закрывающий тег 
                    //формы и блок счетчика с ссылкой на скрипт 
                    echo "<input type='submit' value='Отправить'>
                          </form> <br>
                          Счетчик
                          <div id='timer'></div><br>
                          <script src='timer.js'></script>
                          ";}
                break;

            case 1: //значение из ссылки 1, вариант заданий-2
                $var2 = colors(mt_rand(1,8));//функция принимает цифру от 1 до 8(высота/ширина изображения)
                $var20 = colors(mt_rand(1,8));//функция принимает цифру от 1 до 8(высота/ширина изображения)
                $powerVar21 = mt_rand(1,8);//рандом от 1 до 8
                $var21 = colors($powerVar21);//функция принимает цифру от 1 до 8(количество цветов)
                $arrayTask1=[$powerVar21, answerForSecond($var2,$var20,$powerVar21)];//массив из переменной и функции
                $_SESSION["session $i"] = $arrayTask1;//сессия 1 содержащая значения переменной (массив)

                if ($i==0) {//условие(если задание 1) при котором вводтится открываюий тег формы
                    echo "<form method='post' enctype='multipart/form-data' action='answers.php'> ";}
                    // ввод задачи с каждой итерацией меняются значения
                    echo "<label for='task$i'>Какой минимальный объём памяти (в Кбайт) нужно зарезервировать, чтобы можно было сохранить любое растровое изображение размером $var2 x $var20 пикселей при условии, что в изображении могут использоваться $var21 различных цветов? В ответе запишите только целое число, единицу измерения писать не нужно.</label>
                          <input type='number' id='task$i' name='task$i'> <br><br>";

                if ($i==4) {//если введено последнее задание вводим кнопку отправки, закрывающий тег 
                    //формы и блок счетчика с ссылкой на скрипт 
                    echo "<input type='submit' value='Отправить'>
                          </form> 
                          <div id='timer'></div>
                          <script src='timer.js'></script>"
                          ;}
                break;

            case 2: //значение из ссылки 2, вариант заданий-3
                $var3 = letter();//переменная хранит функцию
                $arrayTask1=answerForThird($var3);//переменная хранит функцию, хранящ еще перемен
                $_SESSION["session $i"] = $arrayTask1;//сессия 2 храящая переменную
                $text0 = $arrayTask1[0];//переменная хранящая 0 значение возвращенного из функции

                if ($i==0) {//условие(если задание 1) при котором вводтится открываюий тег формы
                    echo "<form method='post' enctype='multipart/form-data' action='answers.php'> ";}
                    // ввод задачи с каждой итерацией меняются значения
                echo "<label for='task$i'>Подсчитайте количество вхождений буквы '<b>$var3</b>' в данном тексте: <br> $text0</label><br>
                        <input type='number' id='task$i' name='task$i'> <br><br>";
                if ($i==4) {//если введено последнее задание вводим кнопку отправки, закрывающий тег 
                    //формы и блок счетчика с ссылкой на скрипт 
                    echo "<input type='submit' value='Отправить'>
                          </form> 
                          <div id='timer'></div>
                          <script src='timer.js'></script>"
                          ;}
                break;} }

// задание 1
        function get2ss($len){//функция принимающая значения переменной
            $str="";//объявление переменной(строка)
            $answer = 0;//объявление переменной
            for($i=0;$i<$len;$i++){//цикл
                if($i==0) $str.=1;//если $i=0 то происходит конкантенация 
                else $str.= rand(0,1);//в ином сл. присоед. рандом. число 0/1
                $answer+=(2**($len-($i+1)))*$str[$i];}//в $answer с кажд. итер. добавляем блок с мат. опер.
            return [$str, $answer]; }//функция возвр. массив из чисел 2СС и 10СС
// задание 2
        function colors ($power) {//функц принимает $power
            $colors = 2 ** $power;//в перем цвета занос-ся 2 возвед в ранд. степень 
            return $colors;}//функц возвр перем к-ую потом исп. не раз
        function answerForSecond ($valueSize1, $valueSize2, $powerColor) {//функц. прин. 3 переменные
            $answerBit = $valueSize1*$valueSize2*$powerColor;//получаем размер в битах
            $answer = $answerBit/(8*1024);//перевод в Кбиты
            return $answer;}//возвр. знач. в Кбитах
// задание 3
        function letter () {//функц. без аргумента
            //массив из строчных букв русского алфавита
            $arrayLetter = array('а','б','в','г','д','е','ё','ж','з','и','й','к','л','м','н','о','п','р','с','т','у','ф','х','ц','ч','ш','щ','ъ','ы','ь','э','ю','я');
            $index = mt_rand(0,32);//рандом из цифр/чисел 0<n>=32
            $letter = $arrayLetter[$index];//переменная хран. элемент массива из букв с индексом $index
            return $letter; }//возвращ. букву
        function answerForThird($var3) {//функция с атриб.
            //массив из текстов
            $arrText = [
                "я вас любил: любовь еще, быть может,
                в душе моей угасла не совсем;
                но пусть она вас больше не тревожит;
                я не хочу печалить вас ничем.
                я вас любил безмолвно, безнадежно,
                то робостью, то ревностью томим;
                я вас любил так искренно, так нежно,
                как дай вам Бог любимой быть другим",
                
                "сижу за решеткой в темнице сырой.
                вскормленный в неволе орел молодой,
                мой грустный товарищ, махая крылом,
                кровавую пищу клюет под окном,
                клюет, и бросает, и смотрит в окно,
                как будто со мною задумал одно.
                зовет меня взглядом и криком своим
                и вымолвить хочет: «Давай улетим!
                мы вольные птицы; пора, брат, пора!
                туда, где за тучей белеет гора,
                туда, где синеют морские края,
                туда, где гуляем лишь ветер… да я!..»",
                
                "уж небо осенью дышало,
                уж реже солнышко блистало,
                короче становился день,
                лесов таинственная сень
                с печальным шумом обнажалась,
                ложился на поля туман,
                гусей крикливых караван
                тянулся к югу: приближалась
                довольно скучная пора;
                стоял ноябрь уж у двора.",
                
                "в тот год осенняя погода
                стояла долго на дворе,
                зимы ждала, ждала природа.
                снег выпал только в январе
                на третье в ночь. проснувшись рано,
                в окно увидела татьяна
                поутру побелевший двор,
                куртины, кровли и забор,
                на стеклах легкие узоры,
                деревья в зимнем серебре,
                сорок веселых на дворе
                и мягко устланные горы
                зимы блистательным ковром.
                все ярко, все бело кругом.",

                "пустое вы сердечным ты
                она, обмолвясь, заменила
                и все счастливые мечты
                в душе влюбленной возбудила.
                пред ней задумчиво стою,
                свести очей с нее нет силы;
                и говорю ей: как вы милы!
                и мыслю: как тебя люблю!"];
            $text = $arrText[mt_rand(0,4)];//тк у нас 5 текстов исп. рандом от 0 до 4(эл. массива нумер-ся с 0), выбирает один из текстов
            $text_arr = preg_split("//u", $text , -1, PREG_SPLIT_NO_EMPTY);//превращаем текст в массив (//-отсутствие паттерна
                //u-исп-т кодировку utf-8,преобразуемый тект, не считает пустые элементы)
            $count = 0;//счетчик

                foreach($text_arr as $noi){//перебор массива букв текста
                    if($noi==$var3){//сравнение эл-ов массива с рандомной буквой
                        $count++;//если соотв-ет усл.- значение счетчика увел. на 1
                    }
                }
                return[$text, $count];//ф-я возвр. массив из двух
            }


?>
</body>
</html>