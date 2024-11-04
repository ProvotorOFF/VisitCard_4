<?php

namespace App\Providers;

use App\Services\AddressParser\DadataParser;
use App\Services\AddressParser\FakeParser;
use App\Services\AddressParser\ParserInterface;
use Dadata\DadataClient;
use Illuminate\Support\ServiceProvider;

class AppServiceProvider extends ServiceProvider
{
    /**
     * Register any application services.
     */
    public function register(): void
    {
        $this->app->singleton(ParserInterface::class, function () {
            return (env('DD_TOKEN') && env('DD_SECRET')) ? new DadataParser((new DadataClient(env('DD_TOKEN'), env('DD_SECRET')))) : new FakeParser();
        });
    }

    /**
     * Bootstrap any application services.
     */
    public function boot(): void
    {
        $blade = $this->app['view']->getEngineResolver()->resolve('blade')->getCompiler();
        $blade->extend(function ($line) {
            return preg_replace_callback('/<icon\s+src\s*=\s*"([^"]+)"\s*\/>/', function ($matches) {
                $iconPath = resource_path('views/components/icons/' . str_replace('.', '/', $matches[1]) . '.svg');
                if (file_exists($iconPath)) {
                    return file_get_contents($iconPath);
                }
                return $matches[0];
            }, $line);
        });
    }
}
