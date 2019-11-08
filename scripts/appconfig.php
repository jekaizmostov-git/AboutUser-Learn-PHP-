<?php



//Мод для простмотра ошибок!
define ("DEBUG_MODE",true);

function debug_message ($message){
    if(DEBUG_MODE){
        echo $message;
    }
}
function handle_error($user_error_message, $system_error_message){
header ("Location: showerror.php?error_message={$user_error_message}&system_error_message={$system_error_message}");
exit();
}



