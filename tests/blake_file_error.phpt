--TEST--
Test function blake_file() by calling it more than or less than its expected arguments
--CREDITS--
Daniel Correa admin@sinfocol.org
--SKIPIF--
<?php if (!extension_loaded("blake")) print "skip"; ?>
--FILE--
<?php

$filename = dirname(__FILE__) . "/files/Avatar3.png";
$type = BLAKE_224;
$salt = '0123456789abcdef';
$raw_output = false;
$extra_arg = '';
$non_existent_constant = 123;
$wrong_salt = 'abcdef';

var_dump(blake_file($filename, $type, $salt, $raw_output, $extra_arg));

var_dump(blake_file($filename));

var_dump(blake_file($filename, $non_existent_constant));

var_dump(blake_file($filename, BLAKE_224, $wrong_salt));

var_dump(blake_file($filename, BLAKE_256, $wrong_salt));

var_dump(blake_file($filename, BLAKE_384, $wrong_salt));

var_dump(blake_file($filename, BLAKE_512, $wrong_salt));

?>
--EXPECTF--
Warning: blake_file() expects at most 4 parameters, 5 given in %s on line %d
NULL

Warning: blake_file() expects at least 2 parameters, 1 given in %s on line %d
NULL

Warning: Bad Hash-Bit Length in %s on line %d
bool(false)

Warning: Salt should be 128-bit (16 bytes) in %s on line %d
bool(false)

Warning: Salt should be 128-bit (16 bytes) in %s on line %d
bool(false)

Warning: Salt should be 256-bit (32 bytes) in %s on line %d
bool(false)

Warning: Salt should be 256-bit (32 bytes) in %s on line %d
bool(false)
