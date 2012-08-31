Openwall Phpass, modernized
===========================

This is Openwall's Phpass, based on the 0.3 release, but modernized slightly:

- Namespaced
- Composer support (Autoloading)
- PHP 5 style

The changes are minimal and only stylistic. The source code is in the public domain. I claim no ownership, but needed it for one of my projects, and wanted to make it available to other people as well. 

## Installation ##

Add this requirement to your `composer.json` file and run `composer.phar install`:

    {
        "require": {
            "openwall/phpass": "dev-master"
        }
    }

## Usage ##

The following example shows how to hash a password (to then store the hash in the database), and how to check whether a provided password is correct (hashes to the same value):  

``` php
<?php

namespace Your\Namespace;

use Openwall\Phpass\PasswordHash;

require_once(__DIR__ . "/vendor/autoload.php");
 
$passwordHasher = new PasswordHash(8,false);
 
$password = $passwordHasher->HashPassword('secret');
var_dump($password);
 
$passwordMatch = $passwordHasher->CheckPassword('secret', "$2a$08$0RK6Yw6j9kSIXrrEOc3dwuDPQuT78HgR0S3/ghOFDEpOGpOkARoSu");
var_dump($passwordMatch);

