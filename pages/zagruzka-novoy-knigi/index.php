<?
$title = 'Загрузка новой книги';
$description = '';
$keywords = '';
include $_SERVER["DOCUMENT_ROOT"] . '/includes/header.php';
?>

<main class="main books-page test_block">
  <div class="main_panel">
    <div class="panel">
      <a href="men_about.html" class="panel_link top ">О гаданиях</a>
      <a href="men_test.html" class="panel_link top">Личностные тесты </a>
    </div>


    <div class="panel">
      <a href="men_acquaintances.html" class="panel_link end">Знакомства</a>
      <a href="men_clubs.html" class="panel_link end">Клубы и сообщества</a>
      <a href="shop/index.html" class="panel_link end">Магический магазинчик</a>
      <a href="library/index.html" class="panel_link end">Эро библиотека</a>
      <a href="psycholog/index.html" class="panel_link end">Спец по отношениям</a>
    </div>
  </div>
  <div class="container instruction_block">
    <h1 class="page-title">Страница для загрузки произведений.</h1>

    <div class="form-wrapper">
      <form class="form" id="docx-form" action="#" method="post" enctype="multipart/form-data">
        <label class="label" for="docx-form-name">
          Введите название книги:*
          <input class="input docx-form-name _req" type="text" name="name" id="docx-form-name" placeholder="Название книги">
        </label>

        <label class="label" for="docx-form-category">
          Введите жанр произведения:*
          <input class="input docx-form-category _req" type="text" name="category" id="docx-form-category" placeholder="Категория произведения">
        </label>

        <label class="label" for="password">
          Введите пароль:*
          <input class="input docx-form-name _req" type="password" name="password" id="password" placeholder="Пароль">
        </label>

        <label class="label" for="autor">
          Автор:*
          <input class="input docx-form-name _req" type="text" name="autor" id="autor" placeholder="Автор">
        </label>

        <label class="label" for="img">
          Обложка:*
          <input class="input docx-form-name _file _req" type="file" name="img" id="img">
        </label>

        <label class="label" for="link_autor">
          Ссылка на автора:*
          <input class="input docx-form-name _req" type="text" name="link_autor" id="link_autor" placeholder="Ссылка на автора">
        </label>

        <label class="label" for="link_forum">
          Ссылка на страницу обсуждения:*
          <input class="input docx-form-name _req" type="text" name="link_forum" id="link_forum" placeholder="Ссылка на страницу обсуждения">
        </label>

        <label class="label" for="file">
          Файл книги:*
          <input class="input _req _file" type="file" name="file" id="file">
        </label>

        <!-- <input class="input _req _file" type="file" name="file" id="file"> -->
        <input class="open-btn" type="submit" value="Открыть просмотр">
      </form>

      <form class="form" id="save-form" action="#" style="display: none;" method="post" enctype="multipart/form-data">
        <input class="input _req" type="text" name="name" id="save-form-name" placeholder="Название книги">
        <input class="input _req" type="text" name="category" id="save-form-category" placeholder="Категория произведения">

        <!-- <input class="input _req _file" type="file" name="file" id="file"> -->
        <input class="open-btn" type="submit" value="Cохранить">
      </form>

      <!-- <a href="/pages/vse-knigi" class="all-btn">
        Посмотреть все загруженные книги
      </a> -->

    </div>

    <div class="result-wrap" style="display: none;">

      <h2 class="title">Содержание книги:</h2>
      <div id="result" class="">


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