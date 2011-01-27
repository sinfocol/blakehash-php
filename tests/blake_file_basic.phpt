--TEST--
Test function blake_file() by calling it with its expected arguments
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

var_dump(blake_file($filename, $type));

var_dump(blake_file($filename, $type, $salt));

var_dump(blake_file($filename, $type, $salt, $raw_output));

var_dump(blake_file($filename, $type, ''));

var_dump(blake_file($filename, $type, '', $raw_output));

?>
--EXPECT--
string(56) "72f60dfc43bcb8a76dda27d1046e538e1b8e64ad32601af3493bc898"
string(56) "b27f7b241f38233f852e9634835ae4732676caf85b3e924ae17c7061"
string(56) "b27f7b241f38233f852e9634835ae4732676caf85b3e924ae17c7061"
string(56) "72f60dfc43bcb8a76dda27d1046e538e1b8e64ad32601af3493bc898"
string(56) "72f60dfc43bcb8a76dda27d1046e538e1b8e64ad32601af3493bc898"
