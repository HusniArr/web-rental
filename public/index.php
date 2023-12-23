<?php 

define('ROOT', dirname(__DIR__)); // c://laragon/www/oop-mvc
define('DS', DIRECTORY_SEPARATOR); // /
define('APP_URL', 'http://localhost/web-rental/public');// http://localhost/web-rental/public
define('DIR', str_replace($_SERVER['DOCUMENT_ROOT'], '', ROOT.DS));// Folder name
define('APP_PATH','http://localhost/web-rental' );

session_start();

require_once ROOT.DS.'lib'.DS.'app.php';

new Router();
