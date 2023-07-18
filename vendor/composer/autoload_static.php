<?php

// autoload_static.php @generated by Composer

namespace Composer\Autoload;

class ComposerStaticInit3d04b85d7bf588a056bbb4b2fedc96a3
{
    public static $files = array (
        '5255c38a0faeba867671b61dfda6d864' => __DIR__ . '/..' . '/paragonie/random_compat/lib/random.php',
        'decc78cc4436b1292c6c0d151b19445c' => __DIR__ . '/..' . '/phpseclib/phpseclib/phpseclib/bootstrap.php',
    );

    public static $prefixLengthsPsr4 = array (
        'p' => 
        array (
            'phpseclib3\\' => 11,
        ),
        'V' => 
        array (
            'VisualAppeal\\' => 13,
        ),
        'P' => 
        array (
            'Psr\\SimpleCache\\' => 16,
            'Psr\\Log\\' => 8,
            'ParagonIE\\ConstantTime\\' => 23,
        ),
        'M' => 
        array (
            'Monolog\\' => 8,
        ),
        'L' => 
        array (
            'League\\MimeTypeDetection\\' => 25,
            'League\\Flysystem\\PhpseclibV3\\' => 29,
            'League\\Flysystem\\Local\\' => 23,
            'League\\Flysystem\\' => 17,
        ),
        'D' => 
        array (
            'Desarrolla2\\Cache\\' => 18,
        ),
        'C' => 
        array (
            'Composer\\Semver\\' => 16,
        ),
    );

    public static $prefixDirsPsr4 = array (
        'phpseclib3\\' => 
        array (
            0 => __DIR__ . '/..' . '/phpseclib/phpseclib/phpseclib',
        ),
        'VisualAppeal\\' => 
        array (
            0 => __DIR__ . '/..' . '/visualappeal/php-auto-update/src',
        ),
        'Psr\\SimpleCache\\' => 
        array (
            0 => __DIR__ . '/..' . '/psr/simple-cache/src',
        ),
        'Psr\\Log\\' => 
        array (
            0 => __DIR__ . '/..' . '/psr/log/Psr/Log',
        ),
        'ParagonIE\\ConstantTime\\' => 
        array (
            0 => __DIR__ . '/..' . '/paragonie/constant_time_encoding/src',
        ),
        'Monolog\\' => 
        array (
            0 => __DIR__ . '/..' . '/monolog/monolog/src/Monolog',
        ),
        'League\\MimeTypeDetection\\' => 
        array (
            0 => __DIR__ . '/..' . '/league/mime-type-detection/src',
        ),
        'League\\Flysystem\\PhpseclibV3\\' => 
        array (
            0 => __DIR__ . '/..' . '/league/flysystem-sftp-v3',
        ),
        'League\\Flysystem\\Local\\' => 
        array (
            0 => __DIR__ . '/..' . '/league/flysystem-local',
        ),
        'League\\Flysystem\\' => 
        array (
            0 => __DIR__ . '/..' . '/league/flysystem/src',
        ),
        'Desarrolla2\\Cache\\' => 
        array (
            0 => __DIR__ . '/..' . '/desarrolla2/cache/src',
        ),
        'Composer\\Semver\\' => 
        array (
            0 => __DIR__ . '/..' . '/composer/semver/src',
        ),
    );

    public static $classMap = array (
        'Composer\\InstalledVersions' => __DIR__ . '/..' . '/composer/InstalledVersions.php',
    );

    public static function getInitializer(ClassLoader $loader)
    {
        return \Closure::bind(function () use ($loader) {
            $loader->prefixLengthsPsr4 = ComposerStaticInit3d04b85d7bf588a056bbb4b2fedc96a3::$prefixLengthsPsr4;
            $loader->prefixDirsPsr4 = ComposerStaticInit3d04b85d7bf588a056bbb4b2fedc96a3::$prefixDirsPsr4;
            $loader->classMap = ComposerStaticInit3d04b85d7bf588a056bbb4b2fedc96a3::$classMap;

        }, null, ClassLoader::class);
    }
}
