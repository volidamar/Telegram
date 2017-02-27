<?php
/**
 * Created by PhpStorm.
 * User: mac
 * Date: 27.02.17
 * Time: 2:10 PM
 */

//$output = file_get_contents('php://input');
//$lol=file_put_contents("logs.txt",$output,FILE_APPEND | LOCK_EX);
$output = json_decode(file_get_contents('php://input'),true);
$id = $output['message']['chat']['id'];
$firstName=$output['message']['from']['first_name'];
if($output['message']['text']==='checkin'){
file_get_contents("https://api.telegram.org/bot376579345:AAGKlvSF4khe_5X86TLlrYZKS_5bqSdRJf8/sendMessage?chat_id=".$id."&text=hi." ".$firstName."-(dolbaeb)");
}
  file_put_contents("logs.txt",$id);
print_r($output);

