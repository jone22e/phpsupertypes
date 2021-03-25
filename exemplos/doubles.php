<?php

include "../vendor/autoload.php";

use Jone22\SuperTypes\NDouble;

$val = new NDouble(500);
$val->toReais(2); //500,00
$val->fromReais("1250,00");
$val->toDouble();//500.00
