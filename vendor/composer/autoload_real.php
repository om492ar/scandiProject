<?php

// autoload_real.php @generated by Composer

class ComposerAutoloaderInitd7a5fda91a9d1d80e7897cb15a5225c5
{
    private static $loader;

    public static function loadClassLoader($class)
    {
        if ('Composer\Autoload\ClassLoader' === $class) {
            require __DIR__ . '/ClassLoader.php';
        }
    }

    /**
     * @return \Composer\Autoload\ClassLoader
     */
    public static function getLoader()
    {
        if (null !== self::$loader) {
            return self::$loader;
        }

        spl_autoload_register(array('ComposerAutoloaderInitd7a5fda91a9d1d80e7897cb15a5225c5', 'loadClassLoader'), true, true);
        self::$loader = $loader = new \Composer\Autoload\ClassLoader(\dirname(__DIR__));
        spl_autoload_unregister(array('ComposerAutoloaderInitd7a5fda91a9d1d80e7897cb15a5225c5', 'loadClassLoader'));

        require __DIR__ . '/autoload_static.php';
        call_user_func(\Composer\Autoload\ComposerStaticInitd7a5fda91a9d1d80e7897cb15a5225c5::getInitializer($loader));

        $loader->register(true);

        return $loader;
    }
}
