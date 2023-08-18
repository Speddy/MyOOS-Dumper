<?php

declare (strict_types=1);
namespace PHPStan;

use RectorPrefix202308\Composer\Autoload\ClassLoader;
final class PharAutoloader
{
    /** @var ClassLoader */
    private static $composerAutoloader;
    public static final function loadClass(string $class) : void
    {
        if (!\extension_loaded('phar') || \defined('RectorPrefix202308\\__PHPSTAN_RUNNING__')) {
            return;
        }
        if (str_starts_with($class, '_PHPStan_')) {
            if (!\in_array('phar', \stream_get_wrappers(), \true)) {
                throw new \Exception('Phar wrapper is not registered. Please review your php.ini settings.');
            }
            if (self::$composerAutoloader === null) {
                self::$composerAutoloader = (require 'phar://' . __DIR__ . '/phpstan.phar/vendor/autoload.php');
                require_once 'phar://' . __DIR__ . '/phpstan.phar/vendor/jetbrains/phpstorm-stubs/PhpStormStubsMap.php';
                require_once 'phar://' . __DIR__ . '/phpstan.phar/vendor/react/async/src/functions_include.php';
                require_once 'phar://' . __DIR__ . '/phpstan.phar/vendor/react/promise-timer/src/functions_include.php';
                require_once 'phar://' . __DIR__ . '/phpstan.phar/vendor/react/promise/src/functions_include.php';
                require_once 'phar://' . __DIR__ . '/phpstan.phar/vendor/ringcentral/psr7/src/functions_include.php';
            }
            self::$composerAutoloader->loadClass($class);
            return;
        }
        if (!str_starts_with($class, 'PHPStan\\') || str_starts_with($class, 'PHPStan\\PhpDocParser\\')) {
            return;
        }
        if (!\in_array('phar', \stream_get_wrappers(), \true)) {
            throw new \Exception('Phar wrapper is not registered. Please review your php.ini settings.');
        }
        $filename = \str_replace('\\', \DIRECTORY_SEPARATOR, $class);
        if (str_starts_with($class, 'PHPStan\\BetterReflection\\')) {
            $filename = \substr($filename, \strlen('PHPStan\\BetterReflection\\'));
            $filepath = 'phar://' . __DIR__ . '/phpstan.phar/vendor/ondrejmirtes/better-reflection/src/' . $filename . '.php';
        } else {
            $filename = \substr($filename, \strlen('PHPStan\\'));
            $filepath = 'phar://' . __DIR__ . '/phpstan.phar/src/' . $filename . '.php';
        }
        if (!\file_exists($filepath)) {
            return;
        }
        require $filepath;
    }
}
\spl_autoload_register(\PHPStan\PharAutoloader::loadClass(...));
