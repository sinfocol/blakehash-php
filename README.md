# BLAKE Hash extension for PHP
The BLAKE Hash is one of the five finalist algorithms that participates in the NIST SHA-3 competition. This hash functions is based on the [HAIFA](http://eprint.iacr.org/2007/278) structure and the [ChaCha](http://cr.yp.to/chacha.html) core function.
The algorithm was designed by Jean-Philippe Aumasson, Luca Henzen, Willi Meier and Raphael C.-W. Phan.

There are four instances of the function, the first two, BLAKE224 and BLAKE256 work with 32-bit words and they have an output of 28 and 32 bytes respectively. The other two, BLAKE384 and BLAKE512 work with 64-bit words and they have an output of 48 and 64 bytes respectively.

The algorithm has been designed to be secure and to have high performance (Even better than SHA-2).

The code is based on the [final round package](http://131002.net/blake/#final) sent.

## Compilation
### Linux
Download source code and extract to a folder called blake, then you have to run the next commands.
```
cd blake
phpize
./configure
make
make test
make install
```

Add "extension" directive to php.ini as follows:
```
extension=blake.so
```
### Windows
Compilation in Windows is harder and requires:
  * Microsoft Visual C++ (6.0 or 9)
  * Windows SDK
  * Some binary tools

The [wiki site of PHP](http://wiki.php.net/internals/windows/stepbystepbuild) describes perfectly how to build PHP and PECL extensions step by step
## Functions
### Introduction
This PHP extension is composed by five functions: blake, blake_file, blake_init, blake_update and blake_final.

Both, blake and blake_file are used to parse strings and files, the rest of the functions are used for incremental hashing. 
### Details
| | |
| - | - |
| **Function name** | blake() |
| **Description** | ```string blake ( string $data , int $type [, string $salt [, bool $raw_output = false ]] )``` |
| **Parameters** | |
| data | Message to be hashed. |
| type | Type of instace to use. It must be: BLAKE_224, BLAKE_256, BLAKE_384 or BLAKE_512. |
| salt | Salt to use. When use BLAKE_224 or BLAKE_256, salt must be 16 bytes, Otherwise, it must be 32 bytes, or a null string for use with raw_output. |
| raw_output | When set to true, outputs raw binary data. |
| **Return values** | Returns a string containing the calculated message digest as lowercase hexits unless raw_output is set to true in which case the raw binary representation of the message digest is returned. |

| | |
| - | - |
| **Function name** | blake_file() |
| **Description** | ```string blake_file ( string $filename , int $type [, string $salt [, bool $raw_output = false ]] )``` |
| **Parameters** | |
| filename | URL describing location of file to be hashed; Supports fopen wrappers. |
| type | Type of instace to use. It must be: BLAKE_224, BLAKE_256, BLAKE_384 or BLAKE_512. |
| salt | Salt to use. When use BLAKE_224 or BLAKE_256, salt must be 16 bytes, Otherwise, it must be 32 bytes, or a null string for use with raw_output. |
| raw_output | When set to true, outputs raw binary data. |
| **Return values** | Returns a string containing the calculated message digest as lowercase hexits unless raw_output is set to true in which case the raw binary representation of the message digest is returned. |

| | |
| - | - |
| **Function name** | blake_init() |
| **Description** | ```resource blake_init ( int $type [, string $salt ] )``` |
| **Parameters** | |
| type | Type of instace to use. It must be: BLAKE_224, BLAKE_256, BLAKE_384 or BLAKE_512. |
| salt | Salt to use. When use BLAKE_224 or BLAKE_256, salt must be 16 bytes, Otherwise, it must be 32 bytes, or a null string for use with raw_output. |
| **Return values** | Returns a Blake state resource for use with blake_update() and blake_final(). |

| | |
| - | - |
| **Function name** | blake_update() |
| **Description** | ```bool blake_update ( resource $state, string $data )``` |
| **Parameters** | |
| state | Blake state returned by blake_init() |
| data | Message to be updated in the incremental hashing. |
| **Return values** | Returns TRUE. |

| | |
| - | - |
| **Function name** | blake_final() |
| **Description** | ```string blake_final ( resource $state [, bool $raw_output = false ] )``` |
| **Parameters** | |
| state | Blake state returned by blake_init() |
| raw_output | When set to true, outputs raw binary data. |
| **Return values** | Returns a string containing the calculated message digest as lowercase hexits unless raw_output is set to true in which case the raw binary representation of the message digest is returned. |

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
## Screenshots
phpinfo.png and blake.png
