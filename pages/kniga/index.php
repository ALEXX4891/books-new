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
    <div class="books__content">
      
      <?

if (mysqli_num_rows($books) > 0) {
  
  print_r($book);
}

?>

</div>

<div class="books__navigation">
  <input type="number" min="1" value="1" class="books__number">
  <div class="books__pagination">
    <button class="books__pagination-item books__pagination-item_prev">< назад</span>
    <button class="books__pagination-item books__pagination-item_next">вперед ></button>
  </div>

</div>
  </div>
</main>

<?
include '' . $_SERVER["DOCUMENT_ROOT"] . '/includes/footer.php';
?>