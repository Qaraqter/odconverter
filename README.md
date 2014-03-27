odconverter
===========

PHP wrapper for LibreOffice's document conversion feature.

Authors
-------

* Bart Huttinga <barthuttinga@gmail.com>

Requirements
------------

* [LibreOffice](https://www.libreoffice.org/)

Installation
------------

 1. Add the library to composer.json:

```
// composer.json
{
    "repositories": [
        {
            "type": "vcs",
            "url": "https://github.com/barthuttinga/odconverter"
        }
    ],
    "require":{
        "barthuttinga/phphighcharts": "dev-master"
    }
}
```

 2. Use Composer to download and install the library:

```
$ php composer.phar update barthuttinga/odconverter
```

Usage
-----

Convert ODT-file to PDF:

```
use ODConverter\Convert;

$odtFile = 'file.odt';
$converter = new Converter('/usr/bin/soffice');
$pdfFile = $converter->convert($odtFile, 'pdf');
```
