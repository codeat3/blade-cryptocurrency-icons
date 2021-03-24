<?php

declare(strict_types=1);

namespace Codeat3\BladeCryptocurrencyIcons;

use BladeUI\Icons\Factory;
use Illuminate\Support\ServiceProvider;

final class BladeCryptocurrencyIconsServiceProvider extends ServiceProvider
{
    public function register(): void
    {
        $this->callAfterResolving(Factory::class, function (Factory $factory) {
            $factory->add('cryptocurrency-icons', [
                'path' => __DIR__.'/../resources/svg',
                'prefix' => 'cri',
            ]);
        });
    }

    public function boot(): void
    {
        if ($this->app->runningInConsole()) {
            $this->publishes([
                __DIR__.'/../resources/svg' => public_path('vendor/blade-cri'),
            ], 'blade-cri');
        }
    }
}
