<?php

// autoload_static.php @generated by Composer

namespace Composer\Autoload;

class ComposerStaticInit3e36c23e5b0700ec5949e0c7aece5002
{
    public static $prefixLengthsPsr4 = array (
        'T' => 
        array (
            'Tests\\' => 6,
        ),
        'P' => 
        array (
            'Psr\\Container\\' => 14,
        ),
    );

    public static $prefixDirsPsr4 = array (
        'Tests\\' => 
        array (
            0 => __DIR__ . '/../..' . '/tests',
        ),
        'Psr\\Container\\' => 
        array (
            0 => __DIR__ . '/..' . '/psr/container/src',
        ),
    );

    public static $prefixesPsr0 = array (
        'P' => 
        array (
            'Pimple' => 
            array (
                0 => __DIR__ . '/..' . '/pimple/pimple/src',
            ),
        ),
    );

    public static $classMap = array (
        'Classes\\Api\\TheTopologyApi' => __DIR__ . '/../..' . '/src/Classes/Api/TheTopologyApi.php',
        'Classes\\DIContainer\\DIContainer' => __DIR__ . '/../..' . '/src/Classes/DIContainer/DIContainer.php',
        'Classes\\Device' => __DIR__ . '/../..' . '/src/Classes/Device.php',
        'Classes\\FileHandler\\FileHandlerInterface' => __DIR__ . '/../..' . '/src/Classes/FileHandler/FileHandlerInterface.php',
        'Classes\\FileHandler\\JsonFileHandler' => __DIR__ . '/../..' . '/src/Classes/FileHandler/JsonFileHandler.php',
        'Classes\\TopologiesCollection' => __DIR__ . '/../..' . '/src/Classes/TopologiesCollection.php',
        'Classes\\Topology' => __DIR__ . '/../..' . '/src/Classes/Topology.php',
        'Composer\\InstalledVersions' => __DIR__ . '/..' . '/composer/InstalledVersions.php',
    );

    public static function getInitializer(ClassLoader $loader)
    {
        return \Closure::bind(function () use ($loader) {
            $loader->prefixLengthsPsr4 = ComposerStaticInit3e36c23e5b0700ec5949e0c7aece5002::$prefixLengthsPsr4;
            $loader->prefixDirsPsr4 = ComposerStaticInit3e36c23e5b0700ec5949e0c7aece5002::$prefixDirsPsr4;
            $loader->prefixesPsr0 = ComposerStaticInit3e36c23e5b0700ec5949e0c7aece5002::$prefixesPsr0;
            $loader->classMap = ComposerStaticInit3e36c23e5b0700ec5949e0c7aece5002::$classMap;

        }, null, ClassLoader::class);
    }
}
