<!DOCTYPE html>
<html lang="ru">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Document</title>
  <link rel="stylesheet" href="style.css">
  <script src="script.js" defer></script>
</head>

<body>
  <main>
    <div class="container">

      <!-- <form id="docx-form2" action="parser.php" method="post" enctype="multipart/form-data">
        <input type="file" name="file" id="file">
        <input type="submit" value="Открыть">
      </form> -->

      <form class="form" id="docx-form2" action="parser.php" method="post" enctype="multipart/form-data">
        <input class="input _req" type="text" name="name" id="name" placeholder="Название книги">
        <input class="input _req" type="text" name="category" id="category" placeholder="Категория произведения">

        <input class="input _req _file" type="file" name="file" id="file">
        <input class="open-btn" type="submit" value="Открыть просмотр">
      </form>

      <!-- <form class="form" id="docx-form" action="#">
        <input class="input _req" type="text" name="name" id="name" placeholder="Название книги">
        <input class="input _req" type="text" name="category" id="category" placeholder="Категория произведения">

        <input class="input _req _file" type="file" name="file" id="file">
        <input class="open-btn" type="submit" value="Открыть просмотр">
      </form> -->

      <div id="result" class="result ">
        <div class="swiper-wrapp">
          <h1 class="title">Содержание книги:</h1>
          <div class="swiper slider_swiper">
            <?
            // function deleteFiles($dir)
            // {
            //   $files = glob("$dir/*");
            //   foreach ($files as $file) {
            //     if (is_file($file)) {
            //       unlink($file);
            //     }
            //   }
            // }

            // $dir = './uploaded';
            // deleteFiles($dir);
            // $dir = './images';
            // deleteFiles($dir);

            // const FILES_STORAGE_PATH = './uploaded';

            // $httpMethod = $_SERVER['REQUEST_METHOD'];
            // $allowedExtensions = ['docx'];;

            // if ($httpMethod === 'POST') {
            //   if (isset($_FILES['file'])) {
            //     $tmpName = $_FILES['file']['tmp_name'];
            //     $clientName = $_FILES['file']['name'];
            //     $extension = pathinfo($clientName, PATHINFO_EXTENSION);
            //     $serverName = sprintf("%s/%s.%s", FILES_STORAGE_PATH, $clientName, $extension);

            //     $uploadErrorCode = $_FILES['file']['error'];

            //     if ($uploadErrorCode > 0) {
            //       $fileUploadErrorsMap = [
            //         UPLOAD_ERR_INI_SIZE => 'Ошибка: выбранный файл превышает максимальный размер, размер не может превышать 300 Мб!',
            //         UPLOAD_ERR_FORM_SIZE => 'Ошибка: выбранный файл превышает максимальный размер, размер не может превышать 300 Мб!',
            //         UPLOAD_ERR_PARTIAL => 'Ошибка: часть файла не была загружена!',
            //         UPLOAD_ERR_NO_FILE => 'Ошибка: не выбран файл!',
            //         UPLOAD_ERR_NO_TMP_DIR => 'Ошибка: нет временной папки!',
            //         UPLOAD_ERR_CANT_WRITE => 'Oшибка: не удаётся записать файл на диск!',
            //         UPLOAD_ERR_EXTENSION => 'Ошибка: загрузка файла была прервана, попробуйте ещё раз!'
            //       ];

            //       $errorMessage = $fileUploadErrorsMap[$uploadErrorCode] ?: 'A system error occurred.';

            //       // die($errorMessage);
            //       die(json_encode($errorMessage, JSON_UNESCAPED_UNICODE));
            //     }

            //     if (!in_array($extension, $allowedExtensions, 1)) {
            //       // echo json_encode('Extension not allowed', JSON_UNESCAPED_UNICODE);
            //       die(json_encode('Ошибка: расширение не поддерживается, выберите документ с расширением docx!', JSON_UNESCAPED_UNICODE));
            //     }

            //     if (!move_uploaded_file($tmpName, $serverName)) {
            //       // echo 'Unable to write to the disk';
            //       die(json_encode('Ошибка: не удаётся записать файл на диск', JSON_UNESCAPED_UNICODE));
            //     }
            //   }
            // }

            // require_once('wordphp.php');
            // $rt = new WordPHP(false);
            // $text = $rt->readDocument($serverName, 'N');
            // $myfile = fopen("newfile.php", "w") or die("Unable to open file!");
            // fwrite($myfile, $text);
            ?>
            <?
            // echo $text;
            ?>
          </div>
        </div>

      </div>

      <div class="swiper-button-next"></div>
      <div class="swiper-button-prev"></div>
      <div class="swiper-pagination"></div>
    </div>
  </main>
</body>

</html>