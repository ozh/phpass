<?php

function includeIfExists($file)
{
    if (file_exists($file)) {
        return include $file;
    }
}

if ((!$loader = includeIfExists(__DIR__.'/../vendor/autoload.php'))) {
    die('You must set up the project dependencies, run the following commands:'.PHP_EOL.
        'curl -s http://getcomposer.org/installer | php'.PHP_EOL.
        'php composer.phar install'.PHP_EOL);
}

// PHPUnit 6 compatibility for previous versions
if ( class_exists( 'PHPUnit\Runner\Version' ) && version_compare( PHPUnit\Runner\Version::id(), '6.0', '>=' ) ) {
    class_alias( 'PHPUnit\Framework\Assert',        'PHPUnit_Framework_Assert' );
    class_alias( 'PHPUnit\Framework\TestCase',      'PHPUnit_Framework_TestCase' );
    class_alias( 'PHPUnit\Framework\Error\Error',   'PHPUnit_Framework_Error' );
    class_alias( 'PHPUnit\Framework\Error\Notice',  'PHPUnit_Framework_Error_Notice' );
    class_alias( 'PHPUnit\Framework\Error\Warning', 'PHPUnit_Framework_Error_Warning' );
}
