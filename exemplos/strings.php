<?php

include "../vendor/autoload.php";

use Jone22\SuperTypes\NString;

$string = new NString("CPF é 12345678911");
echo $string->numbersOnly(); //123456789

if ($string->startsWith("C")) {
    echo "true";
}