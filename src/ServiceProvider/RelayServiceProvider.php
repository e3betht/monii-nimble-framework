<?php

namespace Monii\Nimble\ServiceProvider;

use Illuminate\Contracts\Container\Container;
use Monii\Http\Middleware\Psr7\ActionHandler\ActionHandler;
use Monii\Http\Middleware\Psr7\NikicFastRoute\NikicFastRoute;
use Monii\Http\Middleware\Psr7\ResponseAssertion\ResponseAssertion;
use Monii\Http\Psr7\ViewTransformer\Middleware\ViewTransformer;
use Monii\Nimble\WebApp;
use Relay\Relay;
use Relay\RelayBuilder;

class RelayServiceProvider
{
    public function register(Container $container)
    {
        $container->bind(Relay::class, function (Container $container) {
            /** @var RelayBuilder $relayBuilder */
            $relayBuilder = $container->make(RelayBuilder::class);

            $queue = array_merge(
                [
                    $container->make(NikicFastRoute::class, [
                        'actionAttributeName' => WebApp::ACTION_ATTRIBUTE_NAME,
                        'parametersAttributeName' => WebApp::PARAMETERS_ATTRIBUTE_NAME,
                    ]),
                ],
                $container->tagged('nimble.middleware.error_handler'),
                $container->tagged('nimble.middleware.early'),
                $container->tagged('nimble.middleware'),
                $container->tagged('nimble.middleware.late'),
                [
                    $container->make(ResponseAssertion::class),
                    $container->make(ViewTransformer::class),
                    $container->make(ActionHandler::class, [
                        'actionAttributeName' => WebApp::ACTION_ATTRIBUTE_NAME,
                    ]),
                ]
            );

            return $relayBuilder->newInstance($queue);
        });
    }
}
