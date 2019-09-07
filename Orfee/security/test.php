<?php

$string1 = bin2hex(openssl_random_pseudo_bytes(3));

$string2 = bin2hex($string1);

$string3 = hexdec($string2);

echo $string1 . "<br>";

echo $string2 . "<br>";

echo $string3 . "<br><br>";



$one = mcrypt_create_iv(3, MCRYPT_DEV_URANDOM);

$two = bin2hex($one);

$three = hexdec($two);

echo $one . "<br>";

echo $two . "<br>";

echo $three;

?>