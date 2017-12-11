<?php

// autoload_static.php @generated by Composer

namespace Composer\Autoload;

class ComposerStaticInit846f235a13c2e51b45c6107386b03ede
{
    public static $prefixLengthsPsr4 = array (
        'S' => 
        array (
            'Services\\' => 9,
        ),
        'M' => 
        array (
            'Models\\' => 7,
        ),
        'C' => 
        array (
            'Controllers\\' => 12,
        ),
    );

    public static $prefixDirsPsr4 = array (
        'Services\\' => 
        array (
            0 => __DIR__ . '/../..' . '/app/services',
        ),
        'Models\\' => 
        array (
            0 => __DIR__ . '/../..' . '/app/models',
        ),
        'Controllers\\' => 
        array (
            0 => __DIR__ . '/../..' . '/app/controllers',
        ),
    );

    public static function getInitializer(ClassLoader $loader)
    {
        return \Closure::bind(function () use ($loader) {
            $loader->prefixLengthsPsr4 = ComposerStaticInit846f235a13c2e51b45c6107386b03ede::$prefixLengthsPsr4;
            $loader->prefixDirsPsr4 = ComposerStaticInit846f235a13c2e51b45c6107386b03ede::$prefixDirsPsr4;

        }, null, ClassLoader::class);
    }
}