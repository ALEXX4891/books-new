<?php
$file = "book.txt";
$data = date('d.m.Y H:i'. ' мск');
$text = $_REQUEST['text'];
$name = $_REQUEST['name'];
if (@$_REQUEST['add']) {
  $f = fopen($file, "a");
  if (@$_REQUEST['text'] && @$_REQUEST['name']) fputs($f, '<span class="date-mess">'.$name.' '.$data. " </span><br>". " <span class='message'>" .$text ."</span>"."\n");
  fclose($f);
  $random = time();    // случайный параметр, чтоб не кешировалось
  Header("Location: http://{$_SERVER['SERVER_NAME']}{$_SERVER['SCRIPT_NAME']}?$random#form");
  exit();
}
$gb = @file($file);
if (!$gb) $gb = [];
