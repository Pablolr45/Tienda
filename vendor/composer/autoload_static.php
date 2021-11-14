<?php

// autoload_static.php @generated by Composer

namespace Composer\Autoload;

class ComposerStaticInite200b8eba64903ecbe361039e993d162
{
    public static $files = array (
        '6e3fae29631ef280660b3cdad06f25a8' => __DIR__ . '/..' . '/symfony/deprecation-contracts/function.php',
    );

    public static $prefixLengthsPsr4 = array (
        'T' => 
        array (
            'Tienda\\' => 7,
        ),
        'P' => 
        array (
            'Psr\\Container\\' => 14,
        ),
        'F' => 
        array (
            'Faker\\' => 6,
        ),
    );

    public static $prefixDirsPsr4 = array (
        'Tienda\\' => 
        array (
            0 => __DIR__ . '/../..' . '/src',
        ),
        'Psr\\Container\\' => 
        array (
            0 => __DIR__ . '/..' . '/psr/container/src',
        ),
        'Faker\\' => 
        array (
            0 => __DIR__ . '/..' . '/fakerphp/faker/src/Faker',
        ),
    );

    public static $classMap = array (
        'Composer\\InstalledVersions' => __DIR__ . '/..' . '/composer/InstalledVersions.php',
    );

    public static function getInitializer(ClassLoader $loader)
    {
        return \Closure::bind(function () use ($loader) {
            $loader->prefixLengthsPsr4 = ComposerStaticInite200b8eba64903ecbe361039e993d162::$prefixLengthsPsr4;
            $loader->prefixDirsPsr4 = ComposerStaticInite200b8eba64903ecbe361039e993d162::$prefixDirsPsr4;
            $loader->classMap = ComposerStaticInite200b8eba64903ecbe361039e993d162::$classMap;

        }, null, ClassLoader::class);
    }
}
