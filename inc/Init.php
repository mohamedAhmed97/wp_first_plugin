<?php

namespace Inc;

final class Init
{

    public static function getServices()
    {
        return [
            Pages\Admin::class,
            Base\SettingLink::class,
            Base\ShortCode::class
        ];
    }

    public static function registerServices()
    {
        foreach (self::getServices()  as $class) {
            $service = self::getInstance($class);
            if (method_exists($service, 'register')) {
                $service->register();
            }
        }
    }
    private static function getInstance($class)
    {
        $instance = new $class();
        return $instance;
    }
}
