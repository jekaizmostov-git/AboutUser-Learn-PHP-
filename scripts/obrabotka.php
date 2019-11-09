<?php
   require 'aboutuser.php';
   require_once 'connectDB.php';

    
	
	$image = $_FILES[$image_name];
	$image_filename = $image['name'];
	$image_info = getimagesize($image['tmp_name']);
	$image_mime_type = $image_info['mime'];
	$image_size = $image['size'];

//    echo "<pre>";
//    var_dump($image_info['mime']);
//    echo "</pre>";


	$image_data = file_get_contents($_FILES[$image_name]['tmp_name']);


	
	$insert_image_sql = sprintf("INSERT INTO images(filename, mime_type, file_size, image_data) VALUES('%s', '%s', '%d', '%s');",
	mysqli_real_escape_string($link,$image_filename),
	mysqli_real_escape_string($link,$image_mime_type),
	mysqli_real_escape_string($link,$image_size),
	mysqli_real_escape_string($link,$image_data)
                               );
	
	mysqli_query($link, $insert_image_sql) 
     or  handle_error('Ошибка при загрузке изображения в бд', mysqli_error($link));
	

	
	
	
    //ДОБАВЛЕНИЕ ДАННЫХ!!!!!!!
    $insert_sql = sprintf("INSERT INTO users (first_name, last_name, email, facebook_url, twitter_handle, bio, profile_pic_id)".
            " VALUES('%s','%s','%s','%s','%s','%s','%d');",
			mysqli_real_escape_string($link,$name),
			mysqli_real_escape_string($link,$surname),
			mysqli_real_escape_string($link,$email),
			mysqli_real_escape_string($link,$facebook_url),
			mysqli_real_escape_string($link,$twitter_url),
			mysqli_real_escape_string($link,$bio),
            mysqli_insert_id($link)
			);
   mysqli_query($link, $insert_sql)
           	or handle_error('Ошибка при добавлении пользователя', mysqli_error($link));
    $user_id= mysqli_insert_id($link);



    //echo "<p>Фото добавлено в БД!</p>";
    header("Location: showuser.php?user_id=".$user_id); 
    exit();
    ?>