<?php

namespace Core;

class App
{
    private static $container;

    public static function setContainer($container): void
    {
        static::$container = $container;
    }

    public static function resolve($key)
    {
        return static::container()->resolve($key);
    }

    public static function container()
    {
        return static::$container;
    }

    public static function bind($key, $resolver): void
    {
        static::container()->bind($key, $resolver);
    }
}