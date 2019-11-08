<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Learn PHP</title>
    <style>
        fieldset{
            border: none;
        }
        input,textarea{
            padding: 5px 7px;
            width: 200px;
            margin-top: 15px;
        }
        .container{
            text-align:center;
            width:1000px;
            margin: 0 auto;
        }
        textarea{
            resize: none;
        }
    </style>
</head>
<body>
   <div class="container">
       <h1>PHP &amp; MySql!</h1>
       <hr>
       <h2>Вступайте в наш виртуальный клуб!</h2>
       <p>Пожалуйста, введите ниже свои данные для связи в Интернете!</p>
	   <form action="scripts/obrabotka.php" method="post" enctype="multipart/form-data">
       
           <fieldset>
               <!--<label for="name">Введите имя:</label>-->
               <input type="text" name="name" placeholder="Имя:"><br>
                <!--<label for="lastname">Введите Фамилию:</label>-->
               <input type="text" name="lastname" placeholder="Фамилия:"><br>
                <!--<label for="email">Введите электронную почту:</label>-->
               <input type="text" name="email" placeholder="e-mail:"><br>
                <!--<label for="facebook_url">Введите ссылку на Фейсбук:</label>-->
               <input type="text" name="facebook_url" placeholder="фейсбук:"><br>
                <!--<label for="twitter_handle">Введите ID в твиттер:</label>-->
               <input type="text" name="twitter_handle" placeholder="Твиттер:"><br>
                <!--<label for="bio">Введите вашу биографию:</label>-->
                <textarea placeholder="О себе!" rows="10" name="bio" maxlength="2000000"></textarea>   <br>
				<intput type="hidden" name="MAX_VALUE_SIZE" value="2000000">
                <label for="user_pic">Выберете ваше фото!</label>
               <input type="file" size="30" name="user_pic">
           </fieldset>
           <fieldset>
               <input type="submit" value="Отправить">
               <input type="reset" value="Очистить">
           </fieldset>
       </form>
   </div>

    
</body>
</html>

