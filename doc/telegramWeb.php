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
$message=$output['message']['text'];
switch($message){
    case '/start':
        $message='HELLO';
        sendMessage($token,$id,$message.KeyboardMenu());
        break;
        case 'keyboard':
             $message='the keyboard is ready';
        sendMessage($token,$id,$message.KeyboardMenu());
        break;
    case 'hi':
        $message='Hello';
        sendMessage($token,$id,$message);
        break;
    case 'how are you?':
        $message='i am fine';
        sendMessage($token,$id,$message);
        break;
 
}
function sendMessage($token,$id,$message)
{
 file_get_contents("https://api.telegram.org/bot" .$token. "/sendMessage?chat_id=".$id."&text=".$message);
}
function KeyboardMenu()
{
         $reply_markup = '';
    $buttons = [['checkin','checkout'],['pause','resume']];
    $keyboard = json_encode($keyboard = [
        'keyboard' => $buttons /*[$buttons]*/,
        'resize_keyboard' => true,
        'one_time_keyboard' => false,
        'parse_mode' => 'HTML',
        'selective' => true
    ]);
    $reply_markup = '&reply_markup=' . $keyboard . '';
    
    return $reply_markup;
}
