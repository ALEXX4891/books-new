<?php 
include 'foo.php';  
 ?>
<!DOCTYPE html>
<html lang="en">
<head>
<meta charset="utf-8">
<meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
<meta name="description" content="Оставить отзыв о сайте SerBlog.ru">
<link rel="stylesheet" type="text/css" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css">
<link rel="stylesheet" type="text/css" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.9.0/css/all.css">
<title>Гостевая книга</title>
<style>
  body{
    background: url(bg.jpg);
    background-attachment: fixed;
  }
  .alert.alert-mess:before{
    content: "";
    position: absolute;
    border: 6px solid transparent;
    border-bottom: 12px solid #d4edda;
    top: -16px;
    left: 0px; 
  }
  .alert.alert-mess{
    display: inline-block;
  }
</style>
</head>
<body>
  <section>
    <div class="container">
      <div class="row">
        <div class="col-lg-12">
          <span class="text-white mb-2 d-block">Сообщений в базе: <?php echo $cou.'<br>'; ?></span>
          <nav aria-label="...">
            <ul class="pagination">
              <?php 
              if (isset($page) && $page > 1) {
                echo '<li class="page-item"><a class="page-link" href="?page='.$prev.'"><</a></li>';
              }
               ?>
              <?php for ($i = 1; $i <= $pagesCount; $i++) {                  
                
                if ($page == $i) {
                  echo '<li class="page-item active"><a class="page-link" href="?page='.$i.'">'.$i.'</a></li>';
                }else{
                  echo '<li class="page-item"><a class="page-link" href="?page='.$i.'">'.$i.'</a></li>
                  ';
                }
              }
              
              
              ?>
            </ul>
          </nav>
          <?php
            for ($b = $first; $b <= $last; $b++) {
                echo $arr[$b];
            }
           ?>
           <?php echo $mess; ?>
          <form action="<?php echo $_SERVER['SCRIPT_NAME']; ?>"method="post">
            <div class="form-group">
              <small class="text-muted">Введи имя</small>
              <input type="text" class="form-control" name="name" id="name" data-attribut="Lexus">
              <input type="hidden" id="secret" name="secret" value="">
              <div class="block text-warning"></div>
            </div>
             <div class="form-group">
              <small class="text-muted">Введи сообщение</small>
              <textarea name="txt" id="form" rows="3" class="form-control"></textarea>
              <button class="btn btn-success mt-3" type="submit" name="add" id="btn">Отправить</button>
             </div>
             <span class="span text-white"></span>

          </form>
          <nav aria-label="...">
            <ul class="pagination">
          <?php for ($t = 1; $t <= $pagesCount; $t++) {
                if ($page == $t) {
                  echo '<li class="page-item active"><a class="page-link" href="?page='.$t.'">'.$t.'</a></li>';
                }else{
                  echo '<li class="page-item"><a class="page-link" href="?page='.$t.'">'.$t.'</a></li>';
                }
                
              }
              ?>
            </ul>
          </nav>
        </div>
      </div>
    </div>
  </section>  
<script type="text/javascript">
  let name = document.querySelector('#name');
  name.value = localStorage.getItem('names');
  name.oninput = () => {
  localStorage.setItem('names', name.value);
  };

  let secret = document.querySelector('#secret');
  document.querySelector('#btn').onclick = function(){
    secret.value = 'uhklaerhgaerhguilserhgioerhgio';
  };
</script>
</body>
</html>