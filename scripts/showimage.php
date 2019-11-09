<?php
    require_once 'connectDB.php';
    require_once 'appconfig.php';




    try{
        if(!isset($_REQUEST['image_id'])){
            handle_error('Не указано изображение для загрузки!');
        }

        $image_id = $_REQUEST['image_id'];
        //echo "ID image - {$image_id}";

        $select_query = sprintf("SELECT * FROM images WHERE image_id = %d", $image_id);
        $result = mysqli_query($link, $select_query);

        if(mysqli_num_rows($result) == 0){
            handle_error('Запрошенное изображение найти невозможно!', 'Не найдено изображение с ID'.$image_id);
        }

        $image = mysqli_fetch_array($result);

        header ('Content-type: ' . $image['mime_type']);
        header ('Content-length: ' . $image['file_size']);

        echo $image['image_data'];  
    }catch(Exception $exc){
        handle_error('при загрузке вашего изображения произошел сбой.','Ошибка при загрузке изображения: '.$exc->getMessage());
    }












?>