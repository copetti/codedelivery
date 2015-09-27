<?php

namespace CodeDelivery\Providers;

use Illuminate\Support\ServiceProvider;

class RepositoryServiceProvider extends ServiceProvider
{

    /**
     * Register the application services.
     *
     * @return void
     */
    public function register()
    {
        $this->app->bind(
            'CodeDelivery\Repositories\CategoryRepository', //chamada padrao do repositorio para carregar o Eloquent
            'CodeDelivery\Repositories\CategoryRepositoryEloquent'// Chama o eloquent
        );
        $this->app->bind(
            'CodeDelivery\Repositories\ProductRepository', //chamada padrao do repositorio para carregar o Eloquent
            'CodeDelivery\Repositories\ProductRepositoryEloquent'// Chama o eloquent
        );
    }
}
