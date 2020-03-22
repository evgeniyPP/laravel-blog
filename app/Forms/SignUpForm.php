<?php

namespace App\Forms;

use Illuminate\Support\Facades\Config;

class SignUpForm extends Form
{
    public function __construct(array $values = [])
    {
        $this->formName = 'signup';
        $this->method = Config::get('constants.methods.post');
        $this->fields = [
            [
                'name' => 'name',
                'type' => 'text',
                'placeholder' => 'Введите ваше имя',
                'value' => $values['name'] ?? null,
                'label' => [
                    'value' => 'Имя',
                ],
            ],
            [
                'name' => 'surname',
                'type' => 'text',
                'placeholder' => 'Введите вашу фамилию',
                'value' => $values['surname'] ?? null,
                'label' => [
                    'value' => 'Фамилия',
                ],
            ],
            [
                'name' => 'login',
                'type' => 'text',
                'placeholder' => 'Введите логин',
                'value' => $values['login'] ?? null,
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
                'name' => 'confirm',
                'type' => 'password',
                'placeholder' => 'Повторите пароль',
                'label' => [
                    'value' => 'Повторите пароль',
                ],
            ],
            [
                'name' => 'policy',
                'type' => 'checkbox',
                'label' => [
                    'class' => 'checkbox',
                    'value' => '<span></span><div>Я согласен на обработку моих данных</div>',
                    'positionAfter' => true,
                ],
            ],
        ];
    }
}
