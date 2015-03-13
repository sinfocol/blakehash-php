# Introduction #

This PHP extension is composed by five functions: blake, blake\_file, blake\_init, blake\_update and blake\_final.

Both, blake and blake\_file are used to parse strings and files, the rest of the functions are used for incremental hashing.


# Details #

| **Function name** | blake() |
|:------------------|:--------|
| **Description** | ` string blake ( string $data , int $type [, string $salt [, bool $raw_output = false ]] ) ` |
| **Parameters** |  |
| data | Message to be hashed. |
| type | Type of instace to use. It must be: BLAKE\_224, BLAKE\_256, BLAKE\_384 or BLAKE\_512. |
| salt | Salt to use. When use BLAKE\_224 or BLAKE\_256, salt must be 16 bytes, Otherwise, it must be 32 bytes, or a null string for use with raw\_output. |
| raw\_output | When set to true, outputs raw binary data. |
| **Return values** | Returns a string containing the calculated message digest as lowercase hexits unless raw\_output is set to true in which case the raw binary representation of the message digest is returned. |

| **Function name** | blake\_file() |
|:------------------|:--------------|
| **Description** | ` string blake_file ( string $filename , int $type [, string $salt [, bool $raw_output = false ]] ) ` |
| **Parameters** |  |
| filename | URL describing location of file to be hashed; Supports fopen wrappers. |
| type | Type of instace to use. It must be: BLAKE\_224, BLAKE\_256, BLAKE\_384 or BLAKE\_512. |
| salt | Salt to use. When use BLAKE\_224 or BLAKE\_256, salt must be 16 bytes, Otherwise, it must be 32 bytes, or a null string for use with raw\_output. |
| raw\_output | When set to true, outputs raw binary data. |
| **Return values** | Returns a string containing the calculated message digest as lowercase hexits unless raw\_output is set to true in which case the raw binary representation of the message digest is returned. |

| **Function name** | blake\_init() |
|:------------------|:--------------|
| **Description** | ` resource blake_init ( int $type [, string $salt ] ) ` |
| **Parameters** |  |
| type | Type of instace to use. It must be: BLAKE\_224, BLAKE\_256, BLAKE\_384 or BLAKE\_512. |
| salt | Salt to use. When use BLAKE\_224 or BLAKE\_256, salt must be 16 bytes, Otherwise, it must be 32 bytes, or a null string for use with raw\_output. |
| **Return values** | Returns a Blake state resource for use with blake\_update() and blake\_final(). |

| **Function name** | blake\_update() |
|:------------------|:----------------|
| **Description** | ` bool blake_update ( resource $state, string $data ) ` |
| **Parameters** |  |
| state | Blake state returned by blake\_init() |
| data | Message to be updated in the incremental hashing. |
| **Return values** | Returns TRUE. |

| **Function name** | blake\_final() |
|:------------------|:---------------|
| **Description** | ` string blake_final ( resource $state [, bool $raw_output = false ] ) ` |
| **Parameters** |  |
| state | Blake state returned by blake\_init() |
| raw\_output | When set to true, outputs raw binary data. |
| **Return values** | Returns a string containing the calculated message digest as lowercase hexits unless raw\_output is set to true in which case the raw binary representation of the message digest is returned. |