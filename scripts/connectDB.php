<?php
require_once 'appconfig.php';

define('HOST','localhost');
define('ROOT','root');
define('PASSWORD','');
define('DBNAME','aboutuser');
$link = mysqli_connect(HOST, ROOT, PASSWORD, DBNAME) 
			or die ("<p>Ошибка при подключении к БД!</p>");
      //  or handle_error('Возникла проблема с подключением к БД', "");