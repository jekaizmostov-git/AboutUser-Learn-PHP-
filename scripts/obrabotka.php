<?php
   require 'aboutuser.php';
   require_once 'connectDB.php';
	
	
	
	
	
	
	
    //ДОБАВЛЕНИЕ ДАННЫХ!!!!!!!
    $insert_sql = "INSERT INTO users (first_name, last_name, email, facebook_url, twitter_handle, bio, user_pic_path)".
            " VALUES('{$name}','$surname','{$email}','{$facebook_url}','{$twitter_url}','{$bio}','{$upload_filename}');";
    mysqli_query($link, $insert_sql)
           // or die ("<p>Ошибка при выполнении запроса!</p>");
			 or handle_error('Ошибка при добавлении пользователя', mysqli_error($link));

    
    


    $user_id= mysqli_insert_id($link);

    header("Location: showuser.php?user_id=".$user_id); 
    exit();
    ?>