<?php

namespace AlexBklnv\DaData;

use Illuminate\Support\ServiceProvider;
use AlexBklnv\DaData\Facades\DaDataAddress;
use AlexBklnv\DaData\Facades\DaDataProfile;

class DaDataServiceProvider extends ServiceProvider
{
    /**
     * @return void
     */
    public function register(): void
    {
        $this->mergeConfigFrom(__DIR__ . '/../config/dadata.php', 'dadata');
        
        $this->app->singleton(DaDataAddress::class, fn() => app(DaDataAddressService::class));
        $this->app->singleton(DaDataProfile::class, fn() => new DaDataProfileService());
    }
    
    /**
     * Bootstrap the application services.
     */
    public function boot(): void
    {
        $this->publishes([
            __DIR__ . '/../config/dadata.php' => $this->app->configPath('dadata.php'),
        ], 'config');
    }
}
