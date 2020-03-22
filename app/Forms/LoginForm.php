<?php

namespace App\Forms;

use Illuminate\Support\Facades\Config;

class LoginForm extends Form
{
    public function __construct()
    {
        $this->formName = 'login';
        $this->method = Config::get('constants.methods.post');
        $this->fields = [
            [
                'name' => 'login',
                'type' => 'text',
                'placeholder' => 'Введите логин',
                'label' => [
                    'value' => 'Логин',
                ],
            ],
            [
                'name' => 'password',
                'type' => 'password',
                'placeholder' => 'Введите пароль',
                'label' => [
                    'value' => 'Пароль',
                ],
            ],
            [
                'name' => 'remember',
                'type' => 'checkbox',
                'label' => [
                    'class' => 'checkbox',
                    'value' => '<span></span><div>Запомнить</div>',
                    'positionAfter' => true,
                ],
            ],
        ];
    }
}
