<?php
/**
 * Created by PhpStorm.
 * User: mac
 * Date: 27.02.17
 * Time: 2:10 PM
 */
$output = json_decode(file_get_contents('php://input'),true);
$id = $output['message']['chat']['id'];
file_get_contents("https://api.telegram.org/bot376579345:AAGKlvSF4khe_5X86TLlrYZKS_5bqSdRJf8/sendMessage?chat_id=".$id."&text=i can see you");
file_put_contents("doc/logs.txt",$id);
print_r($output);
