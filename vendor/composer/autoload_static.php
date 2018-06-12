<?php

// autoload_static.php @generated by Composer

namespace Composer\Autoload;

class ComposerStaticInit8ab14dbe760bad8370b08fc81cecc7e7
{
    public static $prefixLengthsPsr4 = array (
        'P' => 
        array (
            'Predis\\' => 7,
        ),
    );

    public static $prefixDirsPsr4 = array (
        'Predis\\' => 
        array (
            0 => __DIR__ . '/..' . '/predis/predis/src',
        ),
    );

    public static function getInitializer(ClassLoader $loader)
    {
        return \Closure::bind(function () use ($loader) {
            $loader->prefixLengthsPsr4 = ComposerStaticInit8ab14dbe760bad8370b08fc81cecc7e7::$prefixLengthsPsr4;
            $loader->prefixDirsPsr4 = ComposerStaticInit8ab14dbe760bad8370b08fc81cecc7e7::$prefixDirsPsr4;

        }, null, ClassLoader::class);
    }
}