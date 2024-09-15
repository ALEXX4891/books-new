<?
$title = 'Книга';
$description = '';
$keywords = '';
include $_SERVER["DOCUMENT_ROOT"] . '/includes/header.php';

$id = $_GET['id'];

$books = mysqli_query($db, "SELECT * FROM books WHERE id = $id");
$book = mysqli_fetch_array($books)['content'];

$books = mysqli_query($db, "SELECT * FROM books WHERE id = $id");
$bookName = mysqli_fetch_array($books)['name'];
mysqli_close($db);

?>
<main class="main books">
  <div class="container books__container">
    <h1 class="books__title"><?= $bookName ?></h1>
    <div class="swiper slider_swiper">

      <?

      if (mysqli_num_rows($books) > 0) {

        print_r($book);
      }

      ?>

    </div>

  </div>
</main>

<?
include '' . $_SERVER["DOCUMENT_ROOT"] . '/includes/footer.php';
?>