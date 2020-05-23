

<!DOCTYPE html>
<html lang="ru">
  <head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <!-- The above 3 meta tags *must* come first in the head; any other head content must come *after* these tags -->
    <meta name="description" content="">
    <meta name="author" content="">
    <link rel="icon" href="/favicon.ico">
    <title>Отправка формы на почту </title>

    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
    <style>
    	form {
    		background-color: #f9f9f9;
    		padding: 20px;
    		margin: 20px;
    	}
    </style>
  </head>

  <body>
    <div class="container">

      <div class="row">
      	<div class="col-sm-4">
      		<form action="mail.php" method="POST">
      			<legend>Заголовок формы</legend>

      			<div class="form-group">
      				<label for="">Введите ваш ID</label>
      				<input type="text" class="form-control" id="" name="user_name" placeholder="Например, Иван" value="<?php echo @$_POST['user_name']; ?>">
      			</div>
      			<div class="form-group">
      				<label for="">Введите ваш email</label>
      				<input type="text" class="form-control" id="" name="user_email" placeholder="mail@mail.ru" value="<?php echo @$_POST['user_email']; ?>">
      			</div>
      		
      			<button type="submit" class="btn btn-primary" name='send-form'>Отправить форму</button>
            
      		</form>
          
          <!-- <form action="index.php" method="POST">
            <button type="submit" class="btn btn-primary" name='check-form'>Проверить данные</button>
          </form>  TODO--> 



          
      	</div><!-- .col-sm-4 -->
      </div> <!-- .row -->

    </div><!-- /.container -->


    <!-- Bootstrap core JavaScript
    ================================================== -->
    <!-- Placed at the end of the document so the pages load faster -->
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.3/jquery.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/js/bootstrap.min.js"></script>
    <!-- IE10 viewport hack for Surface/desktop Windows 8 bug -->
    <script src="http://getbootstrap.com/assets/js/ie10-viewport-bug-workaround.js"></script>
  </body>
</html>
	