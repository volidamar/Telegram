
<?php
/**
 * Created by PhpStorm.
 * User: mac
 * Date: 27.02.17
 * Time: 2:10 PM
 */
include('../index.php');

$output = file_get_contents('php://input');
$messageId=$output['message']['message_id'];
$output=$output.',';
file_put_contents("message.txt",$output,FILE_APPEND | LOCK_EX);
$json = json_decode("message.txt", true);
print_r($json);
$token='376579345:AAGKlvSF4khe_5X86TLlrYZKS_5bqSdRJf8';
$output = json_decode(file_get_contents('php://input'),true);
$id = $output['message']['chat']['id'];
$firstName=$output['message']['from']['first_name'];
$message=$output['message']['text'];



$dataTime = $output['message']['date'];
$datee = date("d-m-Y H:i:s", $dataTime);
$date = new DateTime($datee);
$date->format('Y-m-d H:i:s');


if($message=='checkout'){ 
  
  $x=123;
    sendMessage($token,$id,$x);
  
   //$lol=$output['message']['message_id'];
 //  $lol=$newMain->R[0]->messageIdCheckout;

}
     
  
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
   /* case 'checkout';      
foreach($newMain->R as $res){
 if($res->messageIdCheckout==$messageId)
 {$message=$res->workTime;
 }
}
           sendMessage($token,$id,$message);

        break;*/
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
