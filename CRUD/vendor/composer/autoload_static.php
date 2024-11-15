<?php

// autoload_static.php @generated by Composer

namespace Composer\Autoload;

class ComposerStaticInit8d1f03aaf2afdad272d4a34e75fc4887
{
    public static $prefixLengthsPsr4 = array (
        'A' => 
        array (
            'App\\' => 4,
        ),
    );

    public static $prefixDirsPsr4 = array (
        'App\\' => 
        array (
            0 => __DIR__ . '/../..' . '/app',
        ),
    );

    public static $classMap = array (
        'Composer\\InstalledVersions' => __DIR__ . '/..' . '/composer/InstalledVersions.php',
    );

    public static function getInitializer(ClassLoader $loader)
    {
        return \Closure::bind(function () use ($loader) {
            $loader->prefixLengthsPsr4 = ComposerStaticInit8d1f03aaf2afdad272d4a34e75fc4887::$prefixLengthsPsr4;
            $loader->prefixDirsPsr4 = ComposerStaticInit8d1f03aaf2afdad272d4a34e75fc4887::$prefixDirsPsr4;
            $loader->classMap = ComposerStaticInit8d1f03aaf2afdad272d4a34e75fc4887::$classMap;

        }, null, ClassLoader::class);
    }
}
