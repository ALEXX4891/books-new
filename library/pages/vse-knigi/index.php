<?
$title = 'Библиотека';
$description = '';
$keywords = '';
include $_SERVER["DOCUMENT_ROOT"] . '/library/includes/header.php';
?>

<main class="main books-page test_block">
  <div class="container books__container instruction_block">

    <h1 class="books__title">Каталог</h1>
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
            'category' => $bookFromDb['category'],
            // 'content' => $bookFromDb['content'],
            'author' => $bookFromDb['author'],
            'link_author' => $bookFromDb['link_author'],
            'link_forum' => $bookFromDb['link_forum'],
            'link_announcement' => $bookFromDb['link_announcement'],
            'link_buy' => $bookFromDb['link_buy'],
            'contain_img' => $bookFromDb['contain_img'],
            'volume' => $bookFromDb['volume'],
            'added_date' => $bookFromDb['added_date'],
            'skin' => $bookFromDb['skin']
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
                <div class='books__img'>
                  <img src='/library/images/{$booksArr[$i]['skin']}' alt='{$booksArr[$i]['name']}'>
                </div>
                
                <div class='books__text-block'>
                  <a class='books__value' href='/library/pages/kniga?id={$booksArr[$i]['id']}' target='_blank'>{$booksArr[$i]['name']} 
                  </a>

                  <a class='books__value' href='{$booksArr[$i]['link_author']}'>  
                    {$booksArr[$i]['author']} 
                  </a>

                  <div class='books__info'>       
                    <span class='books__value'>
                      {$booksArr[$i]['added_date']}
                    </span>
                  </div> 

                  <div class='books__info'>
                    <span class='books__label'>
                    </span>
                              
                      <span class='books__value'>
                        {$booksArr[$i]['volume']} страниц 
                      </span>              
                  </div>

                  <div class='books__info'>
                    <span class='books__label'>                  
                    </span>
                    <a class='books__value' href='{$booksArr[$i]['link_forum']}' target='_blank'>
                      Обсуждение
                    </a>
                  </div>
                </div>
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