<?php


   // require 'aboutuser.php';
    require 'connectDB.php';
    require_once 'appconfig.php';
    //ПРОСМОТР ДАННЫХ!!!!!!!!!!!

$user_id = $_REQUEST['user_id'];
$sql ="SELECT * FROM users WHERE user_id =".$user_id;
$result = mysqli_query($link, $sql);

    
    if($result){
        $row = mysqli_fetch_array($result);
        $name=$row['first_name'];
        $surname=$row['last_name'];
        $email=$row['email'];
        $facebook_url=$row['facebook_url'];
        $twitter_url=$row['twitter_handle'];
        $bio = preg_replace("/[\r\n]+/", "</p><p>", $row['bio']);
        $user_image = $row['user_pic_path'];
        
    }else{
         handle_error('Ошибка при выполнении вашего запроса!', 'Ошибка обнаружения пользователся с ID - '.$user_id);
    }
?>









<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <title>Результат!</title>
    <style>
        *{
            margin: 0px;
            padding: 0px;
          
        }
        h1{
            text-align: center;
            margin: 40px 0px;
        }
       
        .maininfo hr{
            width: 300px;
            
        }
        .flex {
            display: flex;
            justify-content: space-between;
            
            
        }
        .container{
            max-width: 700px;
            margin: 0 auto;
        }
        .foto{
            background-color: darkgreen;
            min-width: 200px;
            height: 200px;
        }
        .foto img{
             width: 200px;
            height: 200px;
        }
        .bio{
            margin-right:20px;
        }
    </style>
</head>

<body>


<h1>PHP &amp; MySql!</h1>

<div class="container">
    <div class="flex">
         <div class="maininfo">
            <h3><?php echo $name." ".$surname;?></h3>
            <hr align="left">
            <p class="bio">
                <?php echo $bio; ?>
            </p>
        </div>
        <div class="foto">
            <p><img src="<?php echo $user_image; ?>" alt="Фото пользователя!"></p>
        </div>
    </div>
    
    <div class="feedback">
        <h5>Feedback:</h5>
        <ul>
            <li><?php echo $email?></li>
            <li><a href="<?php echo $facebook_url; ?>">Facebook</a></li>
            <li>Twitter: <?php echo $twitter_url;?></li>
        </ul>
    </div>
</div>
<pre>

</pre>
</body>

</html>



