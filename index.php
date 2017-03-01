<?php
    
    require_once("Main.php");
    require_once("doc/Database.php");
    require_once ("doc/Database.php");

   //$filePath = 'https://api.telegram.org/bot323490435:AAH6qUwCEZ_01FWYJ3mYp585fDUrbtz4tKw/getupdates';
    $filePath='https://api.telegram.org/bot376579345:AAGKlvSF4khe_5X86TLlrYZKS_5bqSdRJf8/getupdates';
            //  $filePath='https://api.telegram.org/bot329259730:AAEZ-xAi795aQ4BzODtIREBmSurZStDJYYc/getupdates';

    $newMain = new Main();
    $newMain->run($filePath);

   /*
    $db = new Database('127.0.0.1', 'root', 'r00t', 'time_work');

    $db->query("INSERT INTO `users` (first_name,last_name) VALUES ('serii','lol')");
     $db->query("SELECT `users_id` FROM `work_days` WHERE `id`>0");
     
     
     if ($db->numRows() == 0) {
     echo 'no articlies';
     } else {
     foreach ($db->rows() as $article) {
     print_r($article);
     
     }
     
     }*/
     /*if(!$result){
     $db->query("INSERT INTO `work_days` (checkin_time) VALUES ($result["checkin"])");
     }
     $db->disconnect();
    
    
    
    /*$timeFirst = strtotime('2011-05-12 18:18:50');
     $timeSecond = strtotime('2011-05-12 18:20:50');
     $differenceInSeconds = $timeSecond - $timeFirst;
     
     
     $date1=date_create('2011-05-12 18:20:50');
     $date2=date_create('2011-05-12 18:20:50');
     $diff=date_diff($date1,$date2);
     
     $datetime1 = new DateTime('2011-05-12 18:20:29');
     $datetime2 = new DateTime('2011-05-12 17:18:28');
     $interval = $datetime1->diff($datetime2);
     $interval->format('%i%s sec');
     $array[]=$interval;
     $array[0]->s=$array[0]->i*60+$array[0]->h*3600+$array[0]->s;*/
    //$db->query("INSERT INTO `WorkTime` (user) VALUES ('lol')");
    /*$mysqli = @new mysqli('localhost', 'new_user', '123456', 'time_work');
     if (mysqli_connect_errno()) {
     echo "Подключение невозможно: ".mysqli_connect_error();
     }
     $mysqli->query("INSERT INTO WorkTime (user) VALUES ('lol')");
     $mysqli->close();*/
    
    
    /*$handle = fopen("https://api.telegram.org/bot323490435:AAH6qUwCEZ_01FWYJ3mYp585fDUrbtz4tKw/getupdates", "r");
     while (!feof($handle)) {
     
     $buffer = fgets($handle);
     echo $buffer;
     }
     fclose($handle);*/
