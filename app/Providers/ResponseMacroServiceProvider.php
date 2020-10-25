<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;
use Illuminate\Support\Facades\Response;

class ResponseMacroServiceProvider extends ServiceProvider
{
    /**
     * Register services.
     *
     * @return void
     */
    public function register()
    {
        //
    }

    /**
     * Bootstrap services.
     *
     * @return void
     */
    public function boot()
    {
        Response::macro('success', function ($data, $status = 200, $message = null) {
            $response = [
                'error' => false,
                'data' => $data,
            ];
            return Response::json($response, $status);
        });

        Response::macro('error', function ($message, $status = 400) {
            return Response::json([
                'error' => true,
                'message' => $message,
            ], $status);
        });
    }
}