<?php

namespace App\Providers;

use Illuminate\Support\Facades\Auth;
use Illuminate\Support\ServiceProvider;
use Illuminate\Contracts\Events\Dispatcher;
use JeroenNoten\LaravelAdminLte\Events\BuildingMenu;

class AppServiceProvider extends ServiceProvider
{
    /**
     * Bootstrap any application services.
     *
     * @param Dispatcher $events
     * @return void
     */
    public function boot(Dispatcher $events)
    {
        $events->listen(BuildingMenu::class, function (BuildingMenu $event) {
            if(Auth::user()->role == 'J'){
                $event->menu->menu = [];
                $event->menu->add('Mis cartas');
                $event->menu->add([
                    'text' => 'Colección',
                    'url' => 'user/'.Auth::user()->id.'/coleccion',
                ]);
                $event->menu->add([
                    'text' => 'Compras',
                    'url' => 'user/'.Auth::user()->id.'/compras',
                ]);
                $event->menu->add('Tienda');
                $event->menu->add([
                    'text' => 'Sobres',
                    'url' => 'tienda/sobre',
                ]);
                $event->menu->add([
                    'text' => 'Cartas',
                    'url' => 'tienda/carta',
                ]);
                $event->menu->add([
                    'text' => 'Adquirir monedas',
                    'url' => 'tienda/dinero',
                ]);
            }

        });
    }

    /**
     * Register any application services.
     *
     * @return void
     */
    public function register()
    {
        //
    }
}
