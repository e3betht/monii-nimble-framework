<?php

namespace Monii\Nimble;

use Illuminate\Contracts\Container\Container;
use Monii\Nimble\ServiceProvider\ContainerServiceProvider;

class App
{
    public function makeAndRegisterServiceProviders(Container $container, array $serviceProviderClassNames)
    {
        foreach ($serviceProviderClassNames as $providerClassName) {
            if (! $container->bound($providerClassName)) {
                $container->singleton($providerClassName);
            }

            $provider = $container->make($providerClassName);

            $provider->register($container);
        }
    }

    public function registerServiceProviders(Container $container)
    {
        $this->makeAndRegisterServiceProviders($container, [
            ContainerServiceProvider::class
        ]);
    }
}
