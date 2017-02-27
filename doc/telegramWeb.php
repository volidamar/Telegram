<?php
/**
 * Created by PhpStorm.
 * User: mac
 * Date: 27.02.17
 * Time: 2:10 PM
 */

$output = json_decode(file_get_contents('php://input'),true);


file_put_contents("logs.txt",$output);

