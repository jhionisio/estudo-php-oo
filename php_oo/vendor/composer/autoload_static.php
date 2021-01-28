<?php

// autoload_static.php @generated by Composer

namespace Composer\Autoload;

class ComposerStaticInit73cb05b13bfb23fe5098815428ca7265
{
    public static $prefixLengthsPsr4 = array (
        'a' => 
        array (
            'app\\' => 4,
        ),
    );

    public static $prefixDirsPsr4 = array (
        'app\\' => 
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
            $loader->prefixLengthsPsr4 = ComposerStaticInit73cb05b13bfb23fe5098815428ca7265::$prefixLengthsPsr4;
            $loader->prefixDirsPsr4 = ComposerStaticInit73cb05b13bfb23fe5098815428ca7265::$prefixDirsPsr4;
            $loader->classMap = ComposerStaticInit73cb05b13bfb23fe5098815428ca7265::$classMap;

        }, null, ClassLoader::class);
    }
}
