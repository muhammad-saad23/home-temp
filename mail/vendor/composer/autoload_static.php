<?php

// autoload_static.php @generated by Composer

namespace Composer\Autoload;

class ComposerStaticInit08bc43c3fdd45398f283031d72b32498
{
    public static $prefixLengthsPsr4 = array (
        'P' => 
        array (
            'PHPMailer\\PHPMailer\\' => 20,
        ),
    );

    public static $prefixDirsPsr4 = array (
        'PHPMailer\\PHPMailer\\' => 
        array (
            0 => __DIR__ . '/..' . '/phpmailer/phpmailer/src',
        ),
    );

    public static $classMap = array (
        'Composer\\InstalledVersions' => __DIR__ . '/..' . '/composer/InstalledVersions.php',
    );

    public static function getInitializer(ClassLoader $loader)
    {
        return \Closure::bind(function () use ($loader) {
            $loader->prefixLengthsPsr4 = ComposerStaticInit08bc43c3fdd45398f283031d72b32498::$prefixLengthsPsr4;
            $loader->prefixDirsPsr4 = ComposerStaticInit08bc43c3fdd45398f283031d72b32498::$prefixDirsPsr4;
            $loader->classMap = ComposerStaticInit08bc43c3fdd45398f283031d72b32498::$classMap;

        }, null, ClassLoader::class);
    }
}
