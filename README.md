# BLAKE Hash extension for PHP
The BLAKE Hash is one of the five finalist algorithms that participates in the NIST SHA-3 competition. This hash functions is based on the [HAIFA](http://eprint.iacr.org/2007/278) structure and the [ChaCha](http://cr.yp.to/chacha.html) core function.
The algorithm was designed by Jean-Philippe Aumasson, Luca Henzen, Willi Meier and Raphael C.-W. Phan.

There are four instances of the function, the first two, BLAKE224 and BLAKE256 work with 32-bit words and they have an output of 28 and 32 bytes respectively. The other two, BLAKE384 and BLAKE512 work with 64-bit words and they have an output of 48 and 64 bytes respectively.

The algorithm has been designed to be secure and to have high performance (Even better than SHA-2).

The code is based on the [final round package](http://131002.net/blake/#final) sent.

## Examples
```php
<?php
echo blake('sinfocol', BLAKE_224) . PHP_EOL;
echo blake('sinfocol', BLAKE_256) . PHP_EOL;
echo blake('sinfocol', BLAKE_384) . PHP_EOL;
echo blake('sinfocol', BLAKE_512) . PHP_EOL;

//Using incremental hashing and 0123456789abcdef as the salt
$blake = blake_init(BLAKE_256, '0123456789abcdef');
blake_update($blake, 'sinfocol');
echo blake_final($blake);

/* Expected output
1427375d4a16cc70ab4155a7c721f975f92867aa53703ccd1c8f5a4b
be2f4e21cf62f1e98ba6800a73a8b887e8c69e9fbe914d64c769299b111c8974
f41a32404f454bf925b16f7b38bfd8e1910cbd31100a4e7a4ec6cbb54115ea2c0289133953a4a28b04f6ddf14a1884cb
3ec1d1ba3dfbc3ac553f5d8ad5e6c34de7b449cc9ed04b0453f9fa859f80f47e994b6f84f859a86b66b203b0d335867b4cece8c7a0dfa5092e17b1271a5a7e70
a7cae55a3d0f5235ae2d0e2c74ce469d855d11561a5326e46e6d7c9c4d319681
*/
?>
```

## Benchmark
Benchmark using PHP VC9, Intel Core i7 950 3.19 GHz, processing an string of 1024 bytes 65535 times.
If you want to benchmark the extension in your own machine, you could try using benchmark.php

    Blake224 : 1.2724665325057400681E-5 // 0.0000127246 seconds
    Blake256 : 1.2369102040881139223E-5 // 0.0000123691 seconds
    Blake384 : 2.1126971161501024445E-5 // 0.0000211269 seconds
    Blake512 : 2.1303350341359146412E-5 // 0.0000213033 seconds

# Screenshots
phpinfo.png and blake.png
