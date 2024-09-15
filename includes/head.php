<?
include $_SERVER["DOCUMENT_ROOT"] . '/backend/db.php';
?>

<!DOCTYPE html>
<html lang="ru">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title><? echo $title ?></title>
  <meta name="keywords" content="<? echo $keywords ?>" />
  <meta name="description" content="<? echo $description ?>" />
  <link rel="canonical" href="<? echo 'https://' . $_SERVER['HTTP_HOST'] . '' . $_SERVER['REQUEST_URI']; ?>" />
  <link rel="stylesheet" href="/assets/css/style.css">
  <!-- <link rel="stylesheet" href="/assets/css/newStyle.css"> -->
  <!-- <script src="scripts/base.js" defer></script> -->
</head>