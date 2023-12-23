<?php 

function redirect($path = '')
{
    header('Location:'. APP_PATH . $path);
    exit();
}