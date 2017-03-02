<?php

/**
 * Created by PhpStorm.
 * User: volidamar
 * Date: 11/16/16
 * Time: 12:14 PM
 */
require_once("index.php");
require_once("WorkDay.php");


class Main
{
    private $result = array();
    public $massiv = array();
    public $firstNames = array();
    public $lastNames = array();
    public $names = [];
    public $id = array();
    public $splitedByNames = array();
    public $editedMEssageId = [];
    public $editedMessageText = [];
    public $originalMessage;
    public $qwerty = [];
    public $R=[];




    public function run($filePath)
    {

        $d = null;
        $id = null;
        //error_reporting(0);

        $arrContextOptions = array(
            "ssl" => array(
                "verify_peer" => false,
                "verify_peer_name" => false,
            ),
        );
        $js = file_get_contents("https://telegramrus.herokuapp.com/doc/message.txt", false, stream_context_create($arrContextOptions));
        $t='[';
$x=']';
      file_put_contents('doc/logs.txt',$js);
        $qqq=file_get_contents('doc/logs.txt');
        $rest = substr($qqq, 0, -1);
        $rest=$t.$rest.$x;
        $json=json_decode($rest,true);
        //print_r($json);

        /*$jsonData = file_get_contents($filePath, false, stream_context_create($arrContextOptions));
        $json = json_decode($jsonData, true);*/
        //file_get_contents("https://api.telegram.org/bot376579345:AAGKlvSF4khe_5X86TLlrYZKS_5bqSdRJf8/sendMessage?chat_id=222985371&text=pret Serii",false,stream_context_create($arrContextOptions));
        //file_put_contents('doc/logs.txt',$jsonData);
//print_r($json);

        foreach ($json as $i => $value) {
            if (isset($json[$i]['edited_message'])) {
                $this->editedMessageText[] = $json[$i]['edited_message']['text'];
                $this->editedMEssageId[] = $json[$i]['edited_message']['message_id'];
                unset($json[$i]);
            }
        }
//EDIT messaged

        foreach ($json as $i => $value) {
            foreach ($this->editedMEssageId as $g => $value) {
                if ($json[$i]['message']['message_id'] === $value) {
                    $json[$i]['message']['text'] = $this->editedMessageText[$g];
                }
            }
        }


        foreach ($json as $i => $value) {
            if ($json[$i]['message']['text'] == '/start') {
                unset($json[$i]);
            }
        }
        foreach ($json as $i => $value) {
            if ($json[$i]['message']['text'] == 'keyboard') {
                unset($json[$i]);
            }
        }
        $result = null;
        $db = new Database('127.0.0.1', 'root', 'r00t', 'time_work');
        $messageId = null;
        $messageIdCheckout=null;

        foreach ($json as $key => $res) {
            $this->splitedByNames[$key] = $res['message']['from']['first_name'];
        }
        array_multisort($this->splitedByNames, SORT_STRING, $json);
        // print_r($this->splitedByNames);echo "<br/>";

        foreach ($json as $res) {

            $dataTime = $res['message']['date'];
            $message = $res['message']['text'];
            $firstName = $res['message']['from']['first_name'];
            $lastName = $res['message']['from']['last_name'];
            $messageId = $res['message']['from']['id'];
            $pravilo = '/\/c[a-z][a-z]c[a-z]in/i';
            $pravilo2 = '/\/c[a-z][a-z]c[a-z]out/i';
            $pravilo3 = '/\/pause/i';
            $pravilo4 = '/\/resume/i';
            $message = preg_replace($pravilo, 'Checkin', $message);
            $message = preg_replace($pravilo2, 'Checkout', $message);
            $message = preg_replace($pravilo3, 'pause', $message);
            $message = preg_replace($pravilo4, 'resume', $message);
            $datee = date("d-m-Y H:i:s", $dataTime);
            $date = new DateTime($datee);
            $date->format('Y-m-d H:i:s');
            $pattern = '/(Checkin|\+)/i';
            
                $messageIdCheckout=$res['message']['message_id'];

            $checkIfPatternExist = preg_match($pattern, $message);
            $r = true;
            if ($r === true) {
                if ($checkIfPatternExist) {
                    if ($d != null) {
                        $this->result[] = $d;
                        $lastResult = array(&$d);
                        $result = array_merge($this->result, $lastResult);
                    }
                    $d = new WorkDay();
                }
                $d->message($date, $message, $messageId, $firstName, $lastName, $messageIdCheckout);
            }
        }
        
        $this->R=$result;
      // print_r($this->R);

    $workTime=serialize($this->R);
    file_put_contents("doc/workTime.txt",$workTime,FILE_APPEND | LOCK_EX);
   
    
            $this->insertInfo($result, $db, $id);

        $db->query("CREATE TEMPORARY TABLE `t_temp`as (SELECT min(id) as id FROM `users` GROUP BY first_name,last_name)");
        $db->query("DELETE from `users` WHERE `users`.`id` not in (SELECT id FROM `t_temp`)");
        $db->disconnect();
    }

    public function insertInfo($result, $db)
    {
        foreach ($result as &$info) {

            $startInt = $info->startInterval->format('Y-m-d H:i:s');
            $db->query("INSERT INTO `users`(user_id,first_name,last_name) VALUE ('$info->messageId','$info->firstName','$info->lastName')");
            $db->query("INSERT INTO `work_days`(users_id,checkin_time,date,worked_time) VALUE ('$info->messageId','$startInt','$startInt',$info->workTime)");
            }
        }
    public function getWorkTime()
    {
        return $this->R;
    }

}
