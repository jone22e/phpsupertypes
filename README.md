# phpsupertypes

Classes para auxiliar no desenvolvimento de aplicações em PHP

Instalação:

```
"jone22e/phpsupertypes": "dev-main"
```

Strings

```php
$string = new NString("CPF é 12345678911");
echo $string->numbersOnly(); //123456789
if ($string->startsWith("C")) {

}
```

Doubles
```php
$val = new NDouble(500);
$val->toReais(2); //500,00
$val->fromReais("1250,00");
$val->toDouble();//1250.00
```

Dates

```php
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
$date2 = new NDate();
$date2->toString(); //hoje dd/mm/aaaa
$date3 = new NDate("2021-12-31"); 
echo $date3->daysRemaining();// = 281 (hoje é 25/03/2021)
```
