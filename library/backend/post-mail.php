<?php

// error_reporting(E_ALL);
// ini_set('display_errors', 1);


use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\Exception;

require 'PHPMailer/src/Exception.php';
require 'PHPMailer/src/PHPMailer.php';

$mail = new PHPMailer(true);
$mail->AddCustomHeader('Precedence: bulk;');
$mail->CharSet = 'utf-8'; //кодировка письма
$mail->setLanguage('ru', 'PHPMailer/language/'); //задать язык для отображения ошибок
$mail->isHTML(true); // включить html теги в письме
// $mail->Mailer = 'smtp';

// от кого письмо
$mail->setFrom('admin@ivq.ru', 'ivq');

// кому письмо
$recipients = [
  'ALEXX4891@mail.ru' => 'Person One',
  'ALEXX4891@yandex.ru' => 'Person One',

];

foreach ($recipients as $email => $name) {
  $mail->addAddress($email, $name);
}

$img = $_FILES['img'];
$textfile = $_FILES['textfile'];
$files = $_FILES['files'];
$userphoto = $_FILES['userphoto'];



// тема письма
$mail->Subject = 'Загрузка новой книги, с сайта ivq.ru';

// текст письма
$body = '<h1>Загрузка новой книги, с сайта ivq.ru:</h1><br/><br/>';

if (trim(!empty($_POST['username']))) {
  $body .= '<p><strong>Автор:</strong> ' . $_POST['username'] . '</p><br/>';
}

if (trim(!empty($_POST['bookname']))) {
  $body .= '<p><strong>Название книги:</strong> ' . $_POST['bookname'] . '</p><br/>';
}

if (trim(!empty($_POST['description']))) {
  $body .= '<p><strong>Книга:</strong> ' . $_POST['description'] . '</p><br/>';
}

if (trim(!empty($_POST['email']))) {
  $body .= '<p><strong>Email:</strong> ' . $_POST['email'] . '</p><br/>';
}

if (trim(!empty($_POST['message']))) {
  $body .= '<p><strong>Комментарий:</strong> ' . $_POST['message'] . '</p><br/>';
}

if (trim(!empty($_POST['sex']))) {
  $body .= '<p><strong>Пол:</strong> ' . $_POST['sex'] . '</p><br/>';
}

// Прикрипление файлов к письму
if (!empty($img['name'][0])) {
  $mail->addAttachment($img['tmp_name'], $img['name']);
  $body .= '<p><strong>Обложка книги во вложении</strong> <a href="' . $img['tmp_name'] . '">' . $img['name'] . '</a></p><br/>';
}

if (!empty($textfile['name'][0])) {
  $mail->addAttachment($textfile['tmp_name'], $textfile['name']);
  $body .= '<p><strong>Текст книги во вложении</strong> <a href="' . $textfile['tmp_name'] . '">' . $textfile['name'] . '</a></p><br/>';
}

if (count($files['name']) > 0) {
//   echo '<pre>';
// print_r($files);
// echo '</pre>';

  for ($i = 0; $i < count($files['name']); $i++) {
    $mail->addAttachment($files['tmp_name'][$i], $files['name'][$i]);
    $body .= '<p><strong>Илюстрация во вложении</strong> <a href="' . $files['tmp_name'][$i] . '">' . $files['name'][$i] . '</a></p><br/>';
  }
}

if (!empty($userphoto['name'][0])) {
  $mail->addAttachment($userphoto['tmp_name'], $userphoto['name']);
  $body .= '<p><strong>Фото автора во вложении</strong> <a href="' . $userphoto['tmp_name'] . '">' . $userphoto['name'] . '</a></p><br/>';
}

$mail->Body = $body;

// Отправляем
if (!$mail->send()) {
  $message = 'Ошибка';
} else {
  $message = 'Данные отправлены';

  $message .= $body;
}

$response = ['message' => $message];

header('Content-type: application/json');
echo json_encode($response);
