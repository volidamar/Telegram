<?php
/**
 * Created by PhpStorm.
 * User: mac
 * Date: 27.02.17
 * Time: 2:10 PM
 
 */$filePath='https://api.telegram.org/bot329259730:AAEZ-xAi795aQ4BzODtIREBmSurZStDJYYc/getupdates;
    $jsonData = file_get_contents($filePath, false, stream_context_create($arrContextOptions));
        $json = json_decode($jsonData, true);
        foreach($json['result] as $res{
  $id=$res['message']['message_id']; 
 }
file_get_contents("https://api.telegram.org/bot329259730:AAEZ-xAi795aQ4BzODtIREBmSurZStDJYYc/sendMessage?chat_id=."$id".&text=pret Serii");
