<?php
/**
 * Created by PhpStorm.
 * User: mac
 * Date: 27.02.17
 * Time: 2:10 PM
 */

$output = file_get_contents('php://input');
$output=$output.',';
file_put_contents("message.txt",$output,FILE_APPEND | LOCK_EX);
$json = json_decode("message.txt", true);
print_r($json);
$token='376579345:AAGKlvSF4khe_5X86TLlrYZKS_5bqSdRJf8';
$output = json_decode(file_get_contents('php://input'),true);
$id = $output['message']['chat']['id'];
$firstName=$output['message']['from']['first_name'];
//file_put_contents("logs.txt",$id);
sendMessage($token,$id);
function sendMessage($token,$id)
{
 if($output['message']['text']==='checkin'){
    file_get_contents("https://api.telegram.org/bot".$token."/sendMessage?chat_id=".$id."&text=hi   ".$firstName."-(dolbaeb)");
}   
}
