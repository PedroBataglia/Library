<?php

// autoload_static.php @generated by Composer

namespace Composer\Autoload;

class ComposerStaticInit4c167ed5e3776dd532fa3a776b94387c
{
    public static $prefixLengthsPsr4 = array (
        'P' => 
        array (
            'Pedropetretti\\Library\\' => 22,
        ),
    );

    public static $prefixDirsPsr4 = array (
        'Pedropetretti\\Library\\' => 
        array (
            0 => __DIR__ . '/../..' . '/src',
        ),
    );

    public static $classMap = array (
        'Composer\\InstalledVersions' => __DIR__ . '/..' . '/composer/InstalledVersions.php',
    );

    public static function getInitializer(ClassLoader $loader)
    {
        return \Closure::bind(function () use ($loader) {
            $loader->prefixLengthsPsr4 = ComposerStaticInit4c167ed5e3776dd532fa3a776b94387c::$prefixLengthsPsr4;
            $loader->prefixDirsPsr4 = ComposerStaticInit4c167ed5e3776dd532fa3a776b94387c::$prefixDirsPsr4;
            $loader->classMap = ComposerStaticInit4c167ed5e3776dd532fa3a776b94387c::$classMap;

        }, null, ClassLoader::class);
    }
}
