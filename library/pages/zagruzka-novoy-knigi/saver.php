<?

include $_SERVER["DOCUMENT_ROOT"] . '/library/backend/db.php';

$resID = mysqli_query($db, "SELECT * FROM books ORDER BY id DESC LIMIT 0, 1");

$id = mysqli_fetch_array($resID);
$uniqId = $id ? $id['id'] + 1 : 1;


include $_SERVER["DOCUMENT_ROOT"] . '/library/backend/db.php';

$name = $_POST['name'];
$category = $_POST['category'];
$content = $_POST['book'];
$author = $_POST['author'];
$link_author = $_POST['link_author'];
$link_forum = $_POST['link_forum'];
$link_announcement = $_POST['link_announcement'];
$link_buy = $_POST['link_buy'];
$contain_img = strpos($content, 'src="temp-images') ? true : false;
// $volume = str_replace(' ', '', str_replace('&nbsp;', '', strip_tags(strtolower($content))));
// $volume = strlen(preg_replace("/[^a-zA-Zа-яА-Я\\p{P}]/m", "", str_replace(' ', '', str_replace('&nbsp;', '', strip_tags(strtolower($content))))));
// $volume = preg_replace("/[^a-zA-Zа-яА-Я\\p{P}]/m", "", str_replace(' ', '', str_replace('&nbsp;', '', strip_tags(strtolower($content)))));

$volume = preg_replace("/[^a-zA-Zа-яА-Я\\p{P}]/m", "", str_replace('&nbsp;', '', strip_tags(strtolower($content))));
// $matches = [];
// preg_match_all('/[a-zA-Zа-яА-Я]+/m', str_replace(' ', '', str_replace('&nbsp;', '', strip_tags(strtolower($content)))), $matches);

// foreach ($matches[0] as $key => $value) {
//   $volume += strlen($value);
// }
// /[a-zA-Zа-яА-Я]+/gm

// echo '<pre>';
// print_r($volume);
// echo $volume;
// echo '</pre>';

$date = date("Y-m-d H:i:s");

$content = str_replace('src="temp-images', 'src="/library/images/' . $uniqId, $content);

if (function_exists('mb_ereg_replace')) {
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
// $content = iconv(mb_detect_encoding($content, mb_detect_order(), true), "UTF-8", $content);

$sql = "INSERT INTO `books` (
  `name`,
  `category`,
  `content`,
  `author`
  ) VALUES(
    '$name',
    '$category',
    '$content'
    '$author'
    )";


// `link_author`, 
// `link_forum`, 
// `link_announcement`, 
// `link_buy`, 
// `contain_img`,
// `volume`,
// `added_date`

// '$link_author', 
// '$link_forum', 
// '$link_announcement', 
// '$link_buy'
// '$contain_img',
// '$volume',
// '$date'


$result = mysqli_query($db, $sql);

// Get array of all source files
$files = scandir("temp-images/");
// Identify directories
$source = "temp-images/";
$destination = $_SERVER["DOCUMENT_ROOT"] . "/library/images/{$uniqId}/";

if (!is_dir($destination)) {
  mkdir($destination, 0755, true);
}

// Cycle through all source files
$delete = [];
foreach ($files as $file) {
  if (in_array($file, array(".", ".."))) continue;
  // If we copied this successfully, mark it for deletion
  if (copy($source . $file, $destination . $file)) {
    $delete[] = $source . $file;
  }
}
// Delete all successfully-copied files
foreach ($delete as $file) {
  unlink($file);
}



if ($result) {
  echo json_encode('<p>Данные успешно добавлены в таблицу. Можно загрузить следующую книгу.</p>', JSON_UNESCAPED_UNICODE);
} else {
  echo json_encode('<p>Произошла ошибка: ' . mysqli_error($db) . '</p>', JSON_UNESCAPED_UNICODE);
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
