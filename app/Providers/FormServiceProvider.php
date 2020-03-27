<?php

namespace App\Providers;

use App\Forms\FeedbackForm;
use App\Forms\PostForm;
use App\Forms\FormBuilder;
use App\Forms\LoginForm;
use App\Forms\SignUpForm;
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

        $this->app->bind('LoginForm', function () {
            $form = new LoginForm();
            return new FormBuilder($form);
        });

        $this->app->bind('SignUpForm', function ($app, $values = []) {
            $form = new SignUpForm($values);
            return new FormBuilder($form);
        });

        $this->app->bind('FeedbackForm', function () {
            $form = new FeedbackForm();
            return new FormBuilder($form);
        });
    }

    public function provides()
    {
        return [
            PostForm::class,
            LoginForm::class,
            SignUpForm::class,
            FormBuilder::class
        ];
    }
}
