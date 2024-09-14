<?
$title = 'Главная';
$description = '';
$keywords = '';
include $_SERVER["DOCUMENT_ROOT"] . '/includes/header.php';
?>

<main>
  <div class="container">
    <h1 class="page-title">Страница для загрузки произведений.</h1>

    <div class="form-wrapper">
      <form class="form" id="docx-form" action="#" method="post" enctype="multipart/form-data">
        <input class="input docx-form-name _req" type="text" name="name" id="docx-form-name" placeholder="Название книги">
        <input class="input docx-form-category _req" type="text" name="category" id="docx-form-category" placeholder="Категория произведения">

        <input class="input _req _file" type="file" name="file" id="file">
        <input class="open-btn" type="submit" value="Открыть просмотр">
      </form>

      <form class="form" id="save-form" action="#" style="display: none;" method="post" enctype="multipart/form-data">
        <input class="input _req" type="text" name="name" id="save-form-name" placeholder="Название книги">
        <input class="input _req" type="text" name="category" id="save-form-category" placeholder="Категория произведения">

        <!-- <input class="input _req _file" type="file" name="file" id="file"> -->
        <input class="open-btn" type="submit" value="Cохранить">
      </form>

      <a href="/pages/vse-knigi.php" class="all-btn">
        Посмотреть все загруженные книги
      </a>

    </div>

    <div class="result-wrap" style="display: none;">

      <h2 class="title">Содержание книги:</h2>
      <div id="result" class="">


      </div>
    </div>

    <div class="message-wrap" style="display: none;">
      <h3 class="title">Сообщение:</h3>
      <p id="message" class="message">
      </p>
    </div>

  </div>
</main>

<?
include '' . $_SERVER["DOCUMENT_ROOT"] . '/includes/footer.php';
?>