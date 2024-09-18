<?
$title = 'Главная';
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
  <div class="container books__container instruction_block">

    <h1 class="books__title">Категории</h1>
    <ul class="books__list categories">

      <?
      $categoryArr = [];
      $booksArr = [];

      $resultCategory = mysqli_query($db, "SELECT * FROM books");
      $categoryFromDb = mysqli_fetch_array($resultCategory);

      if (mysqli_num_rows($resultCategory) > 0) {
        do {
          $categoryArr[] = $categoryFromDb['category'];
          $categoryArr = array_unique($categoryArr);
        } while ($categoryFromDb = mysqli_fetch_array($resultCategory));
      }



      $resultBook = mysqli_query($db, "SELECT * FROM books");
      $bookFromDb = mysqli_fetch_array($resultBook);

      if (mysqli_num_rows($resultBook) > 0) {
        do {
          $booksArr[] = [
            'id' => $bookFromDb['id'],
            'name' => $bookFromDb['name'],
            'category' => $bookFromDb['category']
          ];
        } while ($bookFromDb = mysqli_fetch_array($resultBook));
      }

      foreach ($categoryArr as $category) {
        echo "
            <li class='categories__item' data-category='{$category}'>
              <p class='categories__title'>{$category}</p>
              <ul class='categories__list'> 
              ";

        for ($i = 0; $i < count($booksArr); $i++) {
          if ($booksArr[$i]['category'] == $category) {
            echo "
                          <li class='books__item' data-category='{$category}' style='display: none;'>                    
                            <a class='books__link' href='/library/pages/kniga?id={$booksArr[$i]['id']}' target='_blank'>
                              {$booksArr[$i]['name']} 
                            </a>
                          </li>
                          ";
          }
        }

        // echo $count;

        echo "
        </ul>
        </li>
        ";
      }
      ?>

    </ul>


    <?
    mysqli_close($db);

    ?>




  </div>
</main>

<?
include '' . $_SERVER["DOCUMENT_ROOT"] . '/library/includes/footer.php';
?>