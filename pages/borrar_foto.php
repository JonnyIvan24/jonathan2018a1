<?php
/**
 * Created by PhpStorm.
 * User: Jonny
 * Date: 21/04/2018
 * Time: 09:21 PM
 */
$file = $_GET['archivo'];
if(is_file($file)){
    chmod($file,0777);
    if(!unlink($file)){
        echo false;
    }
}
?>

