<?php

include "../vendor/autoload.php";

use Jone22\SuperTypes\NDate;

$date = new NDate();
$date->fromString("25/03/2021 18:00");
$date->toDate();//2021-03-25 18:00
$date->toDateOnly();//2021-03-25
$date->addmonths(1); //2021-04-25

$date = new NDate("2021-03-25");
$date->toString(); //25/03/2021
$date->addDays(1); //26/03/2021
if ($date->isHigherToday()) {

}
