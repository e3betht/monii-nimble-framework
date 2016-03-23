<?php

namespace Monii\Nimble\ServiceProvider;

use Illuminate\Contracts\Container\Container;
use Monii\Http\Psr7\ViewTransformer\Transformer\NullViewTransformer;
use Monii\Http\Psr7\ViewTransformer\Transformer\StringViewTransformer;
use Monii\Http\Psr7\ViewTransformer\Transformer\ViewTransformerChain;
use Monii\Http\Psr7\ViewTransformer\ViewTransformer;

class ViewTransformerServiceProvider
{
    public function register(Container $container)
    {
        $container->bind(ViewTransformer::class, function (Container $container) {
            return new ViewTransformerChain($container->tagged(WebApp::VIEW_TRANSFORMER));
        });

        $container->tag([
            NullViewTransformer::class,
            StringViewTransformer::class,
        ], [WebApp::VIEW_TRANSFORMER]);
    }
}
