<?php 
include 'book.php';
?>
<!DOCTYPE html>
<html lang="ru">
<head>
	<meta charset="UTF-8">
	<title>блог книги</title>
	<meta name="description" content="блог книги">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<style>
		body{
			background: url(img/awayphp.jpg);
			background-attachment: fixed; 
		}
		.container{
			width: 80%;
			margin: 0 auto;
			font-family: sans-serif;
		}
		.content {
		    position: relative;
		}
		form, input, textarea{
			width: 80%;
			
		}
		form{
			margin-top: 20px;
		}
		input, textarea{
			border-radius: 5px;
			margin-bottom: 10px;
			border: 1px solid #ccc;
			padding:5px; 
		}
		input[type="submit"]{
			background: #4CAF50;
			color: #fff;
			cursor: pointer;
			border: 1px solid #535544;
			padding: 10px;
			font-size: 15px;
		}
		input[type="submit"]:hover{
			opacity: .8;
		}

		span.date-mess{
			/*background: #4CAF50;*/
			color: #fff;
			margin-right: 10px;
			padding:0 5px;
			font-size: 13px;
		}
		span.message {
		    padding: 5px;
		    border-radius: 10px;
		    background: #baffb5;
		    /*line-height: 1.6;*/
		    display: inline-block;
		    position: relative;
		    top: 8px;
		}
		span.message:before {
		    content: "";
		    position: absolute;
		    border: 8px solid transparent;
		    border-bottom: 12px solid #baffb5;
		    top: -13px;
		    left: 1px;
		}
		@media(max-width: 600px){
			.container{
				width: 98%;
			}
			form{
			    width: 95%;
			    margin: 0 auto;
			    margin-bottom: 20px;
			    width: 90%;
			}
			input, textarea{
				width: 100%;
			}
			input[type="submit"]{
				width: 100%;
			}
		}
	</style>
</head>
	<body>
		<div class="container">
			<?foreach($gb as $text) {?>
				<?=($text)?><br><br>
			<?}?>
			<form action="<?=$_SERVER['SCRIPT_NAME']?>" method="POST" id="form">
				<input type="text" name="name" placeholder="Имя" id="name">
				<textarea name="text" placeholder="Текст"></textarea><br>
				<input type="submit" name="add" value="Добавить запись">
			</form>
		</div>
		<script>
			var i2 = document.querySelector('#name');
				i2.value = localStorage.getItem('names');
			i2.oninput = function() {
    			localStorage.setItem('names', i2.value);
 			}
		</script>
	</body>
</html>
