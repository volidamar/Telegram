<?php
    
 
$output = file_get_contents('php://input');

file_put_contents("message.txt",$output,FILE_APPEND | LOCK_EX);
$json = json_decode("message.txt", true);
print_r($json);

    
