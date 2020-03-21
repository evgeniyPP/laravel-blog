<?php

namespace App\Forms;

use Illuminate\Support\Facades\Config;

class AuthForm extends Form
{
    public function __construct($errors)
    {
        $this->formName = 'auth';
        $this->method = Config::get('constants.methods.post');
        $this->fields = [
            [
                'name' => 'login',
                'type' => 'text',
                'placeholder' => 'Введите логин',
                'errors' => $errors['login'] ?? null,
                'label' => [
                    'value' => 'Логин',
                ],
            ],
            [
                'name' => 'password',
                'type' => 'password',
                'placeholder' => 'Введите пароль',
                'errors' => $errors['password'] ?? null,
                'label' => [
                    'value' => 'Пароль',
                ],
            ],
            [
                'name' => 'remember',
                'type' => 'checkbox',
                'label' => [
                    'class' => 'remember',
                    'value' => '<span></span>Запомнить',
                    'positionAfter' => true,
                ],
            ],
        ];
    }
}
