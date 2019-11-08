<?php
    require 'appconfig.php';
    if(isset($_REQUEST['error_message'])){
         $error_message  = preg_replace("/\\\\/",'',$_REQUEST['error_message']);
    }else{
        $error_message ='Вы здесь оказались из-за сбоя в работе программы.';
    }
  
    if(isset($_REQUEST['system_error_message'])){
        $system_error_message  = preg_replace("/\\\\/",'',$_REQUEST['system_error_message']);
    }else{
        $system_error_message ='Сообщения о системных ошибках отсутствуют!';
    }
    

?>
<!DOCTYPE html>
<html>
    <head>
        <title>Ошибка!</title>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <style>
            .container{
                width:1000px;
                margin: 0 auto;
            }
            img {
                float: right;
            }
        </style>
    </head>
    <body>
        <div class="container">
         <img src="../images/error.jpg" alt="Ошибка" width="100px" height="100px">
        <h1>Извините, возникла ошибка!</h1>
        <?php echo $error_message ?>
        <hr width ="50%" align ="left" color="black">
        
        <h3>Нам очень жаль....</h3>
        <p>.... но произошел небольшой сбой. Вероятно, <i><?php echo $error_message ?></i></p>
        <p>
            Не волнейтесь, мы в курсе происходящего и предпримем все необходимые меры. Если же вы хотите
           связаться с нами и узнать подробности произошедшего или вас что-нибудь беспокоит в сложившейся
           ситуации, пришлите нам ваше сообщение, и мы неприменно откликнемся.
        </p>
        <?php
            debug_message("<hr />");
            debug_message("<p>Было получено следующее сообщение об ошибке системного уровня: "
                    . "<b>{$system_error_message}</b</p>");
            
        ?>
        </div>
    </body>
</html>
