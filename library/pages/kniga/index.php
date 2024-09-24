<?
$title = 'Книга';
$description = '';
$keywords = '';
include $_SERVER["DOCUMENT_ROOT"] . '/library/includes/header.php';

$id = $_GET['id'];

$books = mysqli_query($db, "SELECT * FROM books WHERE id = $id");
$bookArr = mysqli_fetch_array($books);
$book = $bookArr['content'];
$link_author = $bookArr['link_author'];
$bookName = $bookArr['name'];
$link_forum = $bookArr['link_forum'];
$link_announcement = $bookArr['link_announcement'];
$link_buy = $bookArr['link_buy'];

mysqli_close($db);

?>
<main class="main books">
  <div class="container books__container">
    <div class="link-block">
      <a href="<?= $link_author ?>" class="link-block__link" target="_blank">
        Автор
      </a>
      <a href="<?= $link_forum ?>" class="link-block__link" target="_blank">
        Обсуждение
      </a>
      <a href="<?= $link_announcement ?>" class="link-block__link" target="_blank">
        Аннотация
      </a>
      <a href="<?= $link_buy ?>" class="link-block__link" target="_blank">
        Купить книгу
      </a>
    </div>
    <h1 class="books__title"><?= $bookName ?></h1>
    <div class="books__content">
      <?= $book ?>
    </div>

    <div class="books__navigation">
      <input type="number" min="1" value="1" class="books__number">
      <div class="books__pagination">
        <button class="books__pagination-item books__pagination-item_prev">
          < назад</span>
            <button class="books__pagination-item books__pagination-item_next">вперед ></button>
      </div>

    </div>
  </div>
</main>

<?
include '' . $_SERVER["DOCUMENT_ROOT"] . '/library/includes/footer.php';
?>