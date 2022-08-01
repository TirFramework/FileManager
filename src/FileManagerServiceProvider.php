<?php
namespace Tir\FileManager;

use Illuminate\Support\ServiceProvider;
use Tir\Crud\Support\Module\Module;
use Tir\Crud\Support\Module\Modules;

class FileManagerServiceProvider extends ServiceProvider
{
    /**
     * Register any application services.
     *
     * @return void
     */
    public function register()
    {


    }

    /**
     * Bootstrap any application services.
     *
     * @return void
     */
    public function boot()
    {
        $this->loadMigrationsFrom(__DIR__ . '/Database/Migrations');
        $this->loadRoutesFrom(__DIR__ . '/Routes/admin.php');

        $fileManager = new Module();
        $fileManager->setName('file-manager')->enable();
        $fileManager->setPermissions([
            [
                'page' => [
                    'label' => trans('core::panel.upload'),
                    'value' => 'upload'
                ],
                'access' => [
                    [
                        'label' => trans('core::panel.allow'),
                        'value' => 'allow',
                    ],
                    [
                        'label' => trans('core::panel.deny'),
                        'value' => 'deny',
                    ]
                ]
            ]
        ]);
        Modules::init()->register($fileManager);
    }
}
