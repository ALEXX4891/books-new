<!DOCTYPE html>
<html lang="en">

<? 
// var_dump($_POST); 
// $info = json_decode(file_get_contents("php://input"), true);
// var_dump($info);
?>

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Document</title>
  <link rel="stylesheet" href="/assets/css/swiper-bundle.min.css">
  <script src="/assets/js/lib/swiper-bundle.min.js" defer></script>
  <link rel="stylesheet" href="/style.css">
  <script src="/script.js" defer></script>

</head>

<body>
  <main class="main ">
    <div class="container container_save">
      <form class="form" id="save-form" action="#">
        <!-- <label class="label" for="name">Название книги:

          <input class="input  _req" type="text" name="name" id="name" placeholder="Название книги" value="<?= $_POST['name'] ?>">
        </label>
        <label class="label" for="name">Категория произведения:

          <input class="input  _req" type="text" name="category" id="category" placeholder="Категория произведения" value="<?= $_POST['category'] ?>">
        </label>
        <input class="open-btn" type="submit" value="Сохранить">
      </form> -->

      <div class="swiper-wrapp">
        <h1 class="title">Содержание книги:</h1>
        <div class="swiper slider_swiper">
          <?
          // подключение автозагрузчика:
          require __DIR__ . '/vendor/autoload.php';

          // use PhpOffice\PhpWord\PhpWord;


          // interface HttpMethod
          // {
          //   public const GET = 'GET';
          //   public const POST = 'POST';
          // }


          // function response(mixed $data)
          // {
          //   return json_encode($data, JSON_UNESCAPED_SLASHES | JSON_PRETTY_PRINT | JSON_UNESCAPED_UNICODE);
          // }

          // function ok(array $data)
          // {
          //   return response(array_merge(['code' => 200], $data));
          // }

          // function error(string $message)
          // {
          //   return response(['code' => 500, 'message' => $message]);
          // }

          // function notfound()
          // {
          //   return response(['code' => 404, 'message' => 'Parser Not found']);
          // }

          // function main()
          // {
          //   $httpPath = parse_url($_SERVER['REQUEST_URI'], PHP_URL_PATH);

          //   echo '<pre>';
          //   var_dump($httpPath);
          //   echo '</pre>';

          //   $httpMethod = $_SERVER['REQUEST_METHOD'];
          //   $allowedExtensions = ['docx'];

          //   header('Access-Control-Allow-Origin: *');
          //   header('Content-Type: appplication/json');


          //   // echo $httpPath;
          //   // echo $httpMethod;
          //   // var_dump($_FILES);


          //   if (HttpMethod::POST === $httpMethod) {
          //     // if ('/upload' === $httpPath) {
          //     if ('/parser.php' === $httpPath) {



          //       if (isset($_FILES['file'])) {
          //         $tmpName = $_FILES['file']['tmp_name'];
          //         $clientName = $_FILES['file']['name'];
          //         $extension = pathinfo($clientName, PATHINFO_EXTENSION);
          //         // $serverName = sprintf("%s/%s.%s", FILES_STORAGE_PATH, md5($clientName), $extension);
          //         $serverName = sprintf("%s/%s.%s", FILES_STORAGE_PATH, $clientName, $extension);

          //         $uploadErrorCode = $_FILES['file']['error'];

          //         if (!in_array($extension, $allowedExtensions, 1)) {
          //           return error('Extension not allowed');
          //         }

          //         if (move_uploaded_file($tmpName, $serverName)) {
          //           return ok(['message' => 'File uploaded', 'filename' => $serverName]);
          //         } else if ($uploadErrorCode > 0) {
          //           $fileUploadErrorsMap = [
          //             UPLOAD_ERR_INI_SIZE => 'The file exceeds the upload_max_filesize setting in php.ini.',
          //             UPLOAD_ERR_FORM_SIZE => 'The file exceeds the MAX_FILE_SIZE setting in the HTML form.',
          //             UPLOAD_ERR_PARTIAL => 'The file was only partially uploaded.',
          //             UPLOAD_ERR_NO_FILE => 'No file was uploaded.',
          //             UPLOAD_ERR_NO_TMP_DIR => 'No temporary folder was available.',
          //             UPLOAD_ERR_CANT_WRITE => 'Unable to write to the disk.',
          //             UPLOAD_ERR_EXTENSION => 'File upload stopped.'
          //           ];

          //           $errorMessage = $fileUploadErrorsMap[$uploadErrorCode] ?: 'A system error occurred.';

          //           return error($errorMessage);
          //         }
          //       } else {
          //         return error('No file param');
          //       }
          //     } else {
          //       // echo 'not found';
          //       return notfound();
          //     }
          //   }

          //   if (HttpMethod::GET === $httpMethod) {
          //     return response(['code' => 200, 'message' => 'No data']);
          //   }
          // }


          // print main();

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



          // function getFileName()
          // {
          const FILES_STORAGE_PATH = './uploaded';

          $httpMethod = $_SERVER['REQUEST_METHOD'];
          $allowedExtensions = ['docx'];;

          if ($httpMethod === 'POST') {
            if (isset($_FILES['file'])) {
              // echo '<pre>';
              // print_r($_FILES['file']);
              // var_dump($httpPath);
              // echo '</pre>';
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

          // getFileName();

          // $uploaddir = './uploaded/';
          // $uploadfile = $uploaddir . basename($_FILES['file']['name']);

          // // echo '<pre>';
          // if (move_uploaded_file($_FILES['file']['tmp_name'], $uploadfile)) {
          //     // echo "Файл не содержит ошибок и успешно загрузился на сервер.\n";
          // } else {
          //     echo "Возможная атака на сервер через загрузку файла!\n";
          // }

          // echo 'Дополнительная отладочная информация:';
          // print_r($_FILES);
          // echo 'Название загружаемого файла: ' . $_FILES['file']['name'];
          // echo 'Размер загружаемого файла: ' . $_FILES['file']['size'] . ' байт';
          // echo 'Тип загружаемого файла: ' . $_FILES['file']['type'];
          // echo 'Произвольный заголовок: ' . $_FILES['file']['tmp_name'];
          // echo 'Путь к загружаемому файла: ' . $uploadfile;

          // print "</pre>";




          require_once('wordphp.php');
          // var_dump($_POST);
          // var_dump($_FILES);
          // const FILES_STORAGE_PATH = './uploaded';
          // $docxFile = $uploadfile;
          // echo $docxFile;
          $rt = new WordPHP(false);
          $text = $rt->readDocument($serverName, 'N');
          // $text = $rt->readDocument('test.docx', 'Y');

          // var_dump($text);
          // echo $text;
          // echo json_encode($text);
          // $data = ['one' => $text];
          // echo json_encode( $data, JSON_UNESCAPED_UNICODE );

          // //------------
          // $dom = new DOMDocument;
          // $dom->loadHTML($text);
          // // use DiDom\Document;
          // // $document = new Document($text, true);
          // // $pages = $document->find('.page');

          // // for ($i = 0; $i < count($pages); $i++) {
          // //   $node = $nodes->item($i);
          // //   $node->setAttribute('data-page', $i);
          // // }

          // // $dom->loadHTML($text);
          // $finder = new DomXPath($dom);
          // $classname="page";
          // $nodes = $finder->query("//".$classname);

          // var_dump($nodes->length);

          // for ($i = 0; $i < $nodes->length; $i++) {
          //   $node = $nodes->item($i);
          //   $node->setAttribute('data-id', $i);
          // }
          // //------------

          // The following two lines are optional if required to save the html text to a file (newfile.php)
          $myfile = fopen("newfile.php", "w") or die("Unable to open file!");
          fwrite($myfile, $text);

          // $text = $dom->saveHTML();
          // fopen("newfile.php", "w");

          // $bookText = htmlentities(file_get_contents("newfile.php"));

          // header('Content-Type: application/json; charset=utf-8');
          ?>


          <?
          echo $text;
          // echo json_encode($bookText, JSON_UNESCAPED_UNICODE);

          // echo $bookText;

          ?>



        </div>
      </div>

      <div class="swiper-button-next"></div>
      <div class="swiper-button-prev"></div>
      <div class="swiper-pagination"></div>
    </div>



  </main>


</body>

</html>