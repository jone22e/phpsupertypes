# phpsupertypes

Classes para auxiliar no desenvolvimento de aplicações em PHP

Pegando somente números:
```php
$string = new NString("CPF é 12345678911");
echo $string->numbersOnly(); //123456789
```

Verificando String

```php
$string = new NString("CPF é 12345678911");
if ($string->startsWith("C")) {

}
```

Doubles
```php
$val = new NDouble(500);
$val->toReais(2); //500,00
$val->fromReais("1250,00");
$val->toDouble();//500.00
```
