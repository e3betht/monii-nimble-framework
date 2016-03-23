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
    const VIEW_TRANSFORMER = 'monii/nimble-app:view_transformer';
    const MIDDLEWARE_ERROR_HANDLER = 'monii/nimble-app:middleware.error_handler';
    const MIDDLEWARE_EARLY = 'monii/nimble-app:middleware.early';
    const MIDDLEWARE = 'monii/nimble-app:middleware';
    const MIDDLEWARE_LATE = 'monii/nimble-app:middleware.late';

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
