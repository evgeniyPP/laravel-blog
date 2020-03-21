<?php

namespace App\Providers;

use App\Forms\PostForm;
use App\Forms\FormBuilder;
use Illuminate\Support\ServiceProvider;

class FormServiceProvider extends ServiceProvider
{
    protected $defer = true;
    /**
     * Register the application services.
     *
     * @return void
     */
    public function register()
    {
        $this->app->bind('PostForm', function ($app, $values = []) {
            $form = new PostForm($values);
            return new FormBuilder($form);
        });
    }

    public function provides()
    {
        return [FormBuilder::class];
    }
}
