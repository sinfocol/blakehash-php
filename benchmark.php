<?php

$types = array("Blake224" => BLAKE_224,
               "Blake256" => BLAKE_256,
               "Blake384" => BLAKE_384,
               "Blake512" => BLAKE_512);

foreach ($types as $name => $type) {
    benchmark($name, $type);
}

function benchmark($name, $type) {
    echo "$name Benchmark" . PHP_EOL;
    
    //General purpose variables
    $i = 0;
    $string = str_repeat("\xcc", 1024);
    $time = microtime(true);
    
    //Fast way to benchmark
    do {
        blake($string, $type);
    } while($i++ < 65535);
    
    $media = (microtime(true) - $time) / 65535;
    echo "\t $media" . PHP_EOL;
}
