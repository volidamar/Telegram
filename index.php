<?php
    
    require_once("Main.php");
    require_once("doc/Database.php");
    require_once ("doc/Database.php");

   //$filePath = 'https://api.telegram.org/bot323490435:AAH6qUwCEZ_01FWYJ3mYp585fDUrbtz4tKw/getupdates';
   // $filePath='https://api.telegram.org/bot376579345:AAGKlvSF4khe_5X86TLlrYZKS_5bqSdRJf8/getupdates';
$filePath='https://api.telegram.org/bot329259730:AAEZ-xAi795aQ4BzODtIREBmSurZStDJYYc/getupdates';

   $newMain = new Main();
    $newMain->run();
 $output = file_get_contents('php://input');
print_r($output);
    
