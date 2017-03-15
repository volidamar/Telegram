<?php

/**
 * Created by PhpStorm.
 * User: volidamar
 * Date: 11/16/16
 * Time: 12:14 PM
 */
require_once("Main.php");

class WorkDay
{
    /** @var DateTime */
    public $date;
    public $workTime = 0;
    public $messages = array();
    public $messageId;
    public $firstName;
    public $lastName;
    public  $messageIdCheckout;


    /** @var  DateTime */
    public $startInterval;

    public function message(DateTime $date, $messages, $messageId, $firstName, $lastName, $messageIdCheckout)
    {
        $this->messages[] = $messages;
        $this->messageId = $messageId;
        $this->firstName = $firstName;
        $this->lastName = $lastName;
$this->messageIdCheckout= $messageIdCheckout;
        $pattern = '/(Checkin|\+|resume)/i';
        $pattern2 = '/(Checkout|\-|pause)/i';
        $y = preg_match($pattern2, $messages);
        $x = preg_match($pattern, $messages);
        if ($x) {
            $this->startInterval = $date;
            $this->date = $date;

        } elseif ($y) {
            $this->date = $date;


            $this->workTime = $this->workTime + $this->comparator($this->date, $this->startInterval);


        }
        //print_r($this->date);
        // echo $this->workTime;


    }


    function comparator($to_time, $from_time)
    {

        $datetime1 = $from_time;
        $datetime2 = $to_time;
        $interval = $datetime1->diff($datetime2);
        $array[] = $interval;
        $array[0]->s = $array[0]->i * 60 + $array[0]->h * 3600 + $array[0]->s;
        return $array[0]->s;
    }

    public function getDate()
    {
        return $this->date;
    }

}

