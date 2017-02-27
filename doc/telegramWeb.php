<?php
/**
 * Created by PhpStorm.
 * User: mac
 * Date: 27.02.17
 * Time: 2:10 PM
 */
$output = json_decode(file_get_contents('php://input'),true);
$id = $output['message']['chat']['id'];
file_get_contents("https://api.telegram.org/bot272967076:AAFnC6WbVpExcWWoSXf1TUTE1WlnRiyKLrQ/sendMessage?chat_id=".$id."&text=i can see you");
file_put_contents("doc/logs.txt",$id);
