<?php

namespace Monii\Nimble;

use Illuminate\Contracts\Container\Container;
use Monii\Nimble\ServiceProvider\ActionHandlerServiceProvider;
use Monii\Nimble\ServiceProvider\ContainerServiceProvider;
use Monii\Nimble\ServiceProvider\NikicFastRouteServiceProvider;
use Monii\Nimble\ServiceProvider\RelayServiceProvider;
use Monii\Nimble\ServiceProvider\ViewTransformerServiceProvider;

class WebApp
{
    const ACTION_ATTRIBUTE_NAME = 'monii/nimble-app:action';
    const PARAMETERS_ATTRIBUTE_NAME = 'monii/nimble-app:parameters';

    public static function webify(App $app, Container $container)
    {
        $app->makeAndRegisterServiceProviders($container, [
            ActionHandlerServiceProvider::class,
            NikicFastRouteServiceProvider::class,
            RelayServiceProvider::class,
            ViewTransformerServiceProvider::class,
        ]);
    }
}
