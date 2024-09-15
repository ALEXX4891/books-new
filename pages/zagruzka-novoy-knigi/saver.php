<?
// phpinfo();
// error_reporting(E_ALL);
// ini_set('display_errors', 1);

include $_SERVER["DOCUMENT_ROOT"] . '/backend/db.php';

$resID = mysqli_query($db, "SELECT * FROM books ORDER BY id DESC LIMIT 0, 1");
// SELECT MAX(date_column) AS max_date
$id = mysqli_fetch_array($resID);
$uniqId = $id ? $id['id'] + 1 : 1;

// $uniqId = $id['id'] + 1;


include $_SERVER["DOCUMENT_ROOT"] . '/backend/db.php';

$name = $_POST['name'];
// $name = 'Название';

$category = $_POST['category'];
// $category = 'Категория';

$content = $_POST['book'];

// $content = file_get_contents('newfile.php');

// $content = '<div class="imgWrap"><img src="temp-images/rId13.jpeg" style="width:248px; height:306px; padding:10px 5px 10px 5px;"></div>';
// var_dump($content);

$content = str_replace('src="temp-images', 'src="/images/' . $uniqId, $content);

if (function_exists('mb_ereg_replace'))
{
    function mb_escape(string $string)
    {
        return mb_ereg_replace('[\x00\x0A\x0D\x1A\x22\x25\x27\x5C\x5F]', '\\\0', $string);
    }
} else {
    function mb_escape(string $string)
    {
        return preg_replace('~[\x00\x0A\x0D\x1A\x22\x25\x27\x5C\x5F]~u', '\\\$0', $string);
    }
}

$content = mb_escape($content);  // удаляем запрещенные символы
$content = iconv(mb_detect_encoding($content, mb_detect_order(), true), "UTF-8", $content);
// echo gettype($content);
// echo $content;

// echo $content;


// $content = 'Lorem ipsum dolor sit amet consectetur adipisicing elit. Repudiandae, cumque. Lorem ipsum dolor sit amet consectetur adipisicing elit. Repudiandae, cumque. Lorem ipsum dolor sit amet consectetur adipisicing elit. Repudiandae, cumque. Lorem ipsum dolor sit amet consectetur adipisicing elit. Repudiandae, cumque. Lorem ipsum dolor sit amet consectetur adipisicing elit. Repudiandae, cumque. Lorem ipsum dolor sit amet consectetur adipisicing elit. Repudiandae, cumque. Lorem ipsum dolor sit amet consectetur adipisicing elit. Repudiandae, cumque. Lorem ipsum dolor sit amet consectetur adipisicing elit. Repudiandae, cumque.';

$sql = "INSERT INTO `books` (`name`, `category`, `content`) VALUES('$name', '$category', '$content')";

// echo $name;
// echo $category;
// echo $content;

$result = mysqli_query($db, $sql);
// echo '<pre>';
// // echo $_SERVER["DOCUMENT_ROOT"] . '/backend/db.php';
// // var_dump($db);
// var_dump($result);


// echo '</pre>';

// $resultServ = mysqli_query($db, "SELECT * FROM books");
// $resultServ = mysqli_fetch_assoc(mysqli_query($db, "SELECT * FROM books"));
// print_r($resultServ);
// $serv = mysqli_fetch_array($result);

// $name = $_POST['name'];
// var_dump($result);
// echo $_SERVER["DOCUMENT_ROOT"] . '/backend/db.php';

// $book = $_POST['book'];


// Get array of all source files
$files = scandir("temp-images/");
// Identify directories
$source = "temp-images/";
$destination = $_SERVER["DOCUMENT_ROOT"] . "/images/{$uniqId}/";

if (!is_dir($destination)) {
  mkdir($destination, 0755, true);
}

// echo $destination;
// Cycle through all source files
$delete = [];
foreach ($files as $file) {
  if (in_array($file, array(".",".."))) continue;
  // If we copied this successfully, mark it for deletion
  if (copy($source.$file, $destination.$file)) {
    $delete[] = $source.$file;
  }
}
// Delete all successfully-copied files
foreach ($delete as $file) {
  unlink($file);
}



// INSERT INTO `books` (`id`, `name`, `category`, `content`) VALUES (NULL, 'рараапр', 'прпарапрарарапрапр', 'опопопопопо');
if ($result) {
  // echo json_encode("New record created successfully");
  echo json_encode('<p>Данные успешно добавлены в таблицу. Можно загрузить следующую книгу.</p>', JSON_UNESCAPED_UNICODE);
} else {
  echo json_encode('<p>Произошла ошибка: ' . mysqli_error($db) . '</p>', JSON_UNESCAPED_UNICODE);
  // echo json_encode("Error: " . $result . "<br>" . $db->error);
}

mysqli_close($db);

$dir = 'uploaded';
deleteFiles($dir);

function deleteFiles($dir)
{
  $files = glob("$dir/*");
  foreach ($files as $file) {
    if (is_file($file)) {
      unlink($file);
    }
  }
}
