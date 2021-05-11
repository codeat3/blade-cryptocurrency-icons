<?php

declare(strict_types=1);

namespace Codeat3\BladeCryptocurrencyIcons;

use BladeUI\Icons\Factory;
use Illuminate\Support\ServiceProvider;
use Illuminate\Contracts\Container\Container;

final class BladeCryptocurrencyIconsServiceProvider extends ServiceProvider
{
    public function register(): void
    {
        $this->registerConfig();

        $this->callAfterResolving(Factory::class, function (Factory $factory, Container $container) {
            $config = $container->make('config')->get('blade-cryptocurrency-icons', []);

            $factory->add('codicon', array_merge(['path' => __DIR__.'/../resources/svg'], $config));
        });

    }

    private function registerConfig(): void
    {
        $this->mergeConfigFrom(__DIR__.'/../config/blade-cryptocurrency-icons.php', 'blade-cryptocurrency-icons');
    }

    public function boot(): void
    {
        if ($this->app->runningInConsole()) {
            $this->publishes([
                __DIR__.'/../resources/svg' => public_path('vendor/blade-cryptocurrency-icons'),
            ], 'blade-cryptocurrency-icons');

            $this->publishes([
                __DIR__.'/../config/blade-cryptocurrency-icons.php' => $this->app->configPath('blade-cryptocurrency-icons.php'),
            ], 'blade-cryptocurrency-icons-config');
        }
    }
}
