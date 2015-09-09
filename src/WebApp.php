<?php

namespace Monii\Nimble;

use Illuminate\Contracts\Container\Container;
use Monii\Nimble\ServiceProvider\ActionHandlerServiceProvider;
use Monii\Nimble\ServiceProvider\ContainerServiceProvider;
use Monii\Nimble\ServiceProvider\NikicFastRouteServiceProvider;
use Monii\Nimble\ServiceProvider\RelayServiceProvider;

class WebApp
{
    const DEFAULT_ACTION_ATTRIBUTE_NAME = 'monii/nimble-app:action';
    const DEFAULT_PARAMETERS_ATTRIBUTE_NAME = 'monii/nimble-app:parameters';

    public static function webify(Container $container)
    {
        $container->makeAndRegisterServiceProviders($container, [
            ActionHandlerServiceProvider::class,
            NikicFastRouteServiceProvider::class,
            RelayServiceProvider::class,
        ]);
    }
}
