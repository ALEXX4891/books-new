<?
$title = 'Загрузка новой книги';
$description = '';
$keywords = '';
include $_SERVER["DOCUMENT_ROOT"] . '/library/includes/header.php';
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
        <!-- <label class="label" for="docx-form-name"> -->
        <!-- Введите название книги:* -->
        <input class="input docx-form-name _req"  type="text" name="name" id="docx-form-name" placeholder="Название книги*">
        <!-- </label> -->

        <!-- <label class="label" for="docx-form-category"> -->
        <!-- Введите жанр произведения:* -->
        <input class="input docx-form-category _req" type="text" name="category" id="docx-form-category" placeholder="Жанр произведения*">
        <!-- </label> -->

        <!-- <label class="label" for="author"> -->
        <!-- Автор:* -->
        <input class="input docx-form-author _req" type="text" name="author" id="docx-form-author" placeholder="Автор*">
        <!-- </label> -->

        <!-- <label class="label" for="img">
          Обложка:*
          <input class="input docx-form-name _file _req" type="file" name="img" id="img">
        </label> -->

        <!-- <label class="label" for="link_author"> -->
        <!-- Ссылка на автора:* -->
        <input class="input docx-form-link_author _req" type="text" name="link_author" id="docx-form-link_author" placeholder="Ссылка на автора*">
        <!-- </label> -->

        <!-- <label class="label" for="link_forum"> -->
        <!-- Ссылка на страницу обсуждения:* -->
        <input class="input docx-form-link_forum _req" type="text" name="link_forum" id="docx-form-link_forum" placeholder="Ссылка на страницу обсуждения*">
        <!-- </label> -->

        <!-- <label class="label" for="link_announcement"> -->
        <!-- Ссылка на анотацию:* -->
        <input class="input docx-form-link_announcement _req" type="text" name="link_announcement" id="docx-form-link_announcement" placeholder="Ссылка на анотацию*">
        <!-- </label> -->

        <!-- <label class="label" for="link_buy"> -->
        <!-- Ссылка на страницу в магазине:* -->
        <input class="input docx-form-link_buy _req" type="text" name="link_buy" id="docx-form-link_buy" placeholder="Ссылка на страницу в магазине*">
        <!-- </label> -->

        <label class="label" for="file">
        Файл книги:*
        <input class="input _req _file" type="file" name="file" id="file">

        </label>

        <label class="label" for="skin">
        Обложка книги:*
        <input class="input docx-form-link_skin _req" type="file" name="skin" id="skin">
        <div class="preview"> 
          <img id="preview" src="" alt="">
        </div>
        </label>


        <!-- <label class="label" for="password"> -->
        <!-- Введите пароль:* -->
        <input class="input docx-form-name _req" type="password" name="password" id="password" placeholder="Пароль*">
        <!-- </label> -->

        <!-- <input class="input _req _file" type="file" name="file" id="file"> -->
        <input class="open-btn" type="submit" value="Открыть просмотр">
      </form>

      <form class="form" id="save-form" action="#" style="display: none;" method="post" enctype="multipart/form-data">
        <input class="input save-form-name _req" type="text" name="name" id="save-form-name" placeholder="Название книги*">
        <input class="input save-form-category _req" type="text" name="category" id="save-form-category" placeholder="Жанр произведения*">
        <input class="input save-form-author _req" type="text" name="author" id="save-form-author" placeholder="Автор*">
        <input class="input save-form-link_author _req" type="text" name="link_author" id="save-form-link_author" placeholder="Ссылка на автора*">
        <input class="input save-form-link_forum _req" type="text" name="link_forum" id="save-form-link_forum" placeholder="Ссылка на страницу обсуждения*">
        <input class="input save-form-link_announcement _req" type="text" name="link_announcement" id="save-form-link_announcement" placeholder="Ссылка на анотацию*">
        <input class="input save-form-link_buy _req" type="text" name="link_buy" id="save-form-link_buy" placeholder="Ссылка на страницу в магазине*">
        <!-- <input class="input save-form-link_skin _req" type="file" name="skin" id="skin">         -->
        <p>Обложка:</p>
        <div class="preview">
          <img id="save-form-link_skin" src="" alt="">
        </div>

        <!-- <input class="input _req" type="text" name="name" id="save-form-name" placeholder="Название книги"> -->
        <!-- <input class="input _req" type="text" name="category" id="save-form-category" placeholder="Категория произведения"> -->
        <!-- <input class="input _req _file" type="file" name="file" id="file"> -->
        <input class="open-btn" type="submit" value="Cохранить">
        <label class="label" for="volume">
            Количество страниц:
            <input class="input save-form-volume _req" type="text" name="volume" id="save-form-volume">
        </label>
      </form>


      <!-- <a href="/library/pages/vse-knigi" class="all-btn">
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
include '' . $_SERVER["DOCUMENT_ROOT"] . '/library/includes/footer.php';
?>