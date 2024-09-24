
<?php
$to = "smclub1@ya.ru";//Почтовый ящик на который будет отправленно сообщение
  $subject = "Тема сообщения";//Тема сообщения
  $message = "Message, сообщение!";//Сообщение, письмо
  $headers = "Content-type: text/plain; charset=utf-8 \r\n";//Шапка сообщения,
  //содержит определение типа письма, от кого, и кому отправить ответ на письмо
  mail ($to, $subject, $message, $headers);
?>
