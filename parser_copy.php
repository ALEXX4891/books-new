          <?
          // подключение автозагрузчика:
          require __DIR__ . '/vendor/autoload.php';
          function deleteFiles($dir)
          {
            $files = glob("$dir/*");
            foreach ($files as $file) {
              if (is_file($file)) {
                unlink($file);
              }
            }
          }

          $dir = './uploaded';
          deleteFiles($dir);
          $dir = './images';
          deleteFiles($dir);

          const FILES_STORAGE_PATH = './uploaded';

          $httpMethod = $_SERVER['REQUEST_METHOD'];
          $allowedExtensions = ['docx'];;

          if ($httpMethod === 'POST') {
            if (isset($_FILES['file'])) {
              $tmpName = $_FILES['file']['tmp_name'];
              $clientName = $_FILES['file']['name'];
              $extension = pathinfo($clientName, PATHINFO_EXTENSION);
              $serverName = sprintf("%s/%s.%s", FILES_STORAGE_PATH, $clientName, $extension);
              // echo $serverName;

              $uploadErrorCode = $_FILES['file']['error'];

              if ($uploadErrorCode > 0) {
                $fileUploadErrorsMap = [
                  UPLOAD_ERR_INI_SIZE => 'Ошибка: выбранный файл превышает максимальный размер, размер не может превышать 300 Мб!',
                  UPLOAD_ERR_FORM_SIZE => 'Ошибка: выбранный файл превышает максимальный размер, размер не может превышать 300 Мб!',
                  UPLOAD_ERR_PARTIAL => 'Ошибка: часть файла не была загружена!',
                  UPLOAD_ERR_NO_FILE => 'Ошибка: не выбран файл!',
                  UPLOAD_ERR_NO_TMP_DIR => 'Ошибка: нет временной папки!',
                  UPLOAD_ERR_CANT_WRITE => 'Oшибка: не удаётся записать файл на диск!',
                  UPLOAD_ERR_EXTENSION => 'Ошибка: загрузка файла была прервана, попробуйте ещё раз!'
                ];

                $errorMessage = $fileUploadErrorsMap[$uploadErrorCode] ?: 'A system error occurred.';

                // die($errorMessage);
                die(json_encode($errorMessage, JSON_UNESCAPED_UNICODE));
              }

              if (!in_array($extension, $allowedExtensions, 1)) {
                // echo json_encode('Extension not allowed', JSON_UNESCAPED_UNICODE);
                die(json_encode('Ошибка: расширение не поддерживается, выберите документ с расширением docx!', JSON_UNESCAPED_UNICODE));
              }

              if (!move_uploaded_file($tmpName, $serverName)) {
                // echo 'Unable to write to the disk';
                die(json_encode('Ошибка: не удаётся записать файл на диск', JSON_UNESCAPED_UNICODE));
              }
            }
          }
          // }

          require_once('wordphp.php');
          $rt = new WordPHP(false);
          $text = $rt->readDocument($serverName, 'N');
          $myfile = fopen("newfile.php", "w") or die("Unable to open file!");
          fwrite($myfile, $text);
          ?>


          <?
          echo $text;

          ?>