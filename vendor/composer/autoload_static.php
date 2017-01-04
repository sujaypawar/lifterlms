<?php

// autoload_static.php @generated by Composer

namespace Composer\Autoload;

class ComposerStaticInit8ffb8e1c2678183fdc07de498a2ce2f0
{
    public static $prefixLengthsPsr4 = array (
        'L' => 
        array (
            'LLMS\\' => 5,
        ),
    );

    public static $prefixDirsPsr4 = array (
        'LLMS\\' => 
        array (
            0 => __DIR__ . '/../..' . '/includes',
        ),
    );

    public static function getInitializer(ClassLoader $loader)
    {
        return \Closure::bind(function () use ($loader) {
            $loader->prefixLengthsPsr4 = ComposerStaticInit8ffb8e1c2678183fdc07de498a2ce2f0::$prefixLengthsPsr4;
            $loader->prefixDirsPsr4 = ComposerStaticInit8ffb8e1c2678183fdc07de498a2ce2f0::$prefixDirsPsr4;

        }, null, ClassLoader::class);
    }
}