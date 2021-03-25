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
