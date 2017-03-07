
<?php
/**
 * Created by PhpStorm.
 * User: mac
 * Date: 27.02.17
 * Time: 2:10 PM
 */


$output = file_get_contents('php://input');
$messageId=$output['message']['message_id'];
$output=$output.',';
file_put_contents("message.txt",$output,FILE_APPEND | LOCK_EX);
$json = json_decode("message.txt", true);
$token='376579345:AAGKlvSF4khe_5X86TLlrYZKS_5bqSdRJf8';
$output = json_decode(file_get_contents('php://input'),true);
$id = $output['message']['chat']['id'];
$firstName=$output['message']['from']['first_name'];
$message=$output['message']['text'];


include('../index.php');
