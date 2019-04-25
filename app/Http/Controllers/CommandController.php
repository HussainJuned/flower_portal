<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class CommandController extends Controller
{
    public function migrate_fresh()
    {
        /* php artisan migrate:fresh */
        \Artisan::call('migrate:fresh');
        dd("php artisan migrate:fresh is Done");
    }

    public function migrate()
    {
        /* php artisan migrate */
        \Artisan::call('migrate');
        dd("php artisan migrate is Done");
    }

    public function config_clear()
    {
        /* php artisan config:clear */
        \Artisan::call('config:clear');
        dd("php artisan config:clear is Done");
    }

}
