<?php 
require 'appconfig.php';
$name = trim($_REQUEST['name']);
$surname = trim($_REQUEST['lastname']);
$email = trim($_REQUEST['email']);
$bio = trim($_REQUEST['bio']);

    $facebook_url = str_replace("facebook.org", "facebook.com", trim($_REQUEST['facebook_url']));
    $position = strpos($facebook_url, "facebook.com");
    if ($position === false) {
     $facebook_url = "http://www.facebook.com/" . $facebook_url;
    } 

    $twitter_handle = trim($_REQUEST['twitter_handle']);
    $twitter_url = "http://www.twitter.com/";
    $position = strpos($twitter_handle, "@");
    if ($position === false) {
     $twitter_url = $twitter_url . $twitter_handle;
    } else {
     $twitter_url = $twitter_url . substr($twitter_handle, $position + 1);
    } 

    
    
    //Загрузка файла на СЕРВЕР!
     $image_name = "user_pic";
    $kuda_zagrushat = "../images/";
    
   

    $php_errors = [1 => 'Превышен максимальный размер файла, указанный в php.ini',
                   2 => 'Превышенный максимальный размер файла указанный в форме HTML',
                   3 => 'Была отправлена только часть файла',
                   4 => 'Файл для отправки не был выбран'
                  ];

    ($_FILES[$image_name][error] == 0) 
           // or exit('Ошибка при отправке изображения! ');
           or handle_error('Серверу не удалось получить ваше изображение!', php_errors[$_FILES[$image_name]['error']]);
        
        //Это полезно для удостоверения того, что злонамеренный пользователь не пытается обмануть скрипт так, чтобы он работал с файлами, с которыми работать не должен - к примеру, /etc/passwd.
        is_uploaded_file($_FILES[$image_name]['tmp_name']) 
            //or exit('Вы пытались совершить безнравственный поступок! ПОЗОР!');
         or handle_error('Вы пытались совершить безнравственный поступок! ПОЗОР!', 
                 "Запрос на отправку, файл назывался: ".$_FILES[$image_name]['tmp_name']);
        
        
        //Проверка. ЯВЛЯЕТСЯ ли загружаемый файл изображением ( функцию getimagesize() php.net не рекомендует использовать!)
        getimagesize($_FILES[$image_name]['tmp_name'])
           // or exit('Вы выбрали файл, который не является изображением!');
             or handle_error('Вы выбрали файл, который не является изображением!', 
                     $_FILES[$image_name]['tmp_name']." Не является настоящим файлом изображения!");
        
        $now = time();
        //Присвоение файлу его уникального имени - $upload_filename!
       /*
       
        while (file_exists($upload_filename = $kuda_zagruzhat.$now."-".$_FILES[$image_name]['name'])){
            $now++;
            //echo 'Привет<br>';
        }
       */
        
        
        //Перемещение файла на его постоянное место!
  //    move_uploaded_file($_FILES[$image_name]['tmp_name'], $kuda_zagrushat.$_FILES[$image_name]['tmp_name'])
      //       or exit('Возникла проблема сохранения вашего изображения в его постоянном месте!');
      $upload_filename = $kuda_zagrushat.$now.'-'.$_FILES[$image_name]['name'];
       move_uploaded_file($_FILES[$image_name]['tmp_name'],$upload_filename )
             or exit('Возникла проблема сохранения вашего изображения в его постоянном месте!');
                $now++;


