# Linux
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

# Windows
Compilation in Windows is harder and requires:
  * Microsoft Visual C++ (6.0 or 9)
  * Windows SDK
  * Some binary tools

The [wiki site of PHP](http://wiki.php.net/internals/windows/stepbystepbuild) describes perfectly how to build PHP and PECL extensions step by step