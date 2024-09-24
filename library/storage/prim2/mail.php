<?php
$to = "smclub1@yandex.ru"; // емайл получателя данных из формы
$tema = "Форма обратной связи на PHP"; // тема полученного емайла
$message = "Ваше имя: ".$_POST['name']."<br>";//присвоить переменной значение, полученное из формы name=name
$message .= "E-mail: ".$_POST['email']."<br>"; //полученное из формы name=email
$message .= "Номер телефона: ".$_POST['phone']."<br>"; //полученное из формы name=phone
$message .= "Сообщение: ".$_POST['message']."<br>"; //полученное из формы name=message
$headers = 'MIME-Version: 1.0' . "\r\n"; // заголовок соответствует формату плюс символ перевода строки
$headers .= 'Content-type: text/html; charset=utf-8' . "\r\n"; // указывает на тип посылаемого контента
mail($to, $tema, $message, $headers); //отправляет получателю на емайл значения переменных
"Location: /library/pages/vse-knigi/"
?>
<!DOCTYPE html>
<html lang="ru">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <link rel="stylesheet" href="../../../css/style.css">
    <script src="../../../scripts/base.js" defer></script>
    <title>для примера2</title>
</head>
<body>
    <header>
        <nav id="head_nav">
            <a href="/library/pages/vse-knigi/" class="logo">Вернуться в библиотеку</a>
                
            <button class="burger" >
                <span></span><span></span><span></span>
            </button>
        </nav>
    </header>

      <nav class="mobile_menu">

            <a class="mobile_link active" href="/library/pages/vse-knigi/" class="room">Вернуться в библиотеку</a>
              
    </nav>

    <div class="test_block">

        <div class="main_panel">

            <div class="panel">
               <a href="/library/pages/vse-knigi/" class="panel_link end">Вернуться в библиотеку</a>
            </div>
        </div>
        <div class="content_wrapper">
            <div class="content">
                <h2 class="title">Ваше сообщение получено администратором</h2>
 <p>Вам ответят в рабочее время</p>

              <button class="main_button" active> <a href="#" class="room" onclick="history.back();"> Вернуться</a></button>
 </div>
    </div>
   </div>

</body>
</html>