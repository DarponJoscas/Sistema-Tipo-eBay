<?php

namespace App\Providers;

use Illuminate\Foundation\Support\Providers\RouteServiceProvider as ServiceProvider;
use Illuminate\Support\Facades\Route;

class RouteServiceProvider extends ServiceProvider
{
    /**
     * El nombre de la ruta "home" para tu aplicación.
     *
     * @var string
     */
    public const HOME = '/home';

    /**
     * Define los "bindings" de modelo de ruta, los filtros de patrón, etc.
     *
     * @return void
     */
    public function boot()
    {
        parent::boot();  // Llamada al método boot() de la clase base, sin parámetros
    }

    /**
     * Define las rutas para tu aplicación.
     *
     * @return void
     */
    public function map()
    {
        $this->mapApiRoutes();
        $this->mapWebRoutes();
    }

    /**
     * Define las rutas "api" para la aplicación.
     *
     * @return void
     */
    protected function mapApiRoutes()
    {
        Route::prefix('api')
             ->middleware('api')
             ->namespace($this->namespace) // Usar el namespace de la clase base
             ->group(base_path('routes/api.php'));
    }

    /**
     * Define las rutas "web" para la aplicación.
     *
     * @return void
     */
    protected function mapWebRoutes()
    {
        Route::middleware('web')
             ->namespace($this->namespace) // Usar el namespace de la clase base
             ->group(base_path('routes/web.php'));
    }
}
