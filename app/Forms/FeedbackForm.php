<?php

namespace App\Forms;

use Illuminate\Support\Facades\Config;

class FeedbackForm extends Form
{
    public function __construct()
    {
        $this->formName = 'feedback';
        $this->method = Config::get('constants.methods.post');
        $this->fields = [
            [
                'name' => 'name',
                'type' => 'text',
                'placeholder' => 'Введите ваше имя',
                'label' => [
                    'value' => 'Ваше имя *',
                ],
            ],
            [
                'name' => 'email',
                'type' => 'email',
                'placeholder' => 'Введите ваш e-mail',
                'label' => [
                    'value' => 'Ваш e-mail *',
                ],
            ],
            [
                'name' => 'message',
                'type' => 'textarea',
                'class' => 'feedback-message',
                'placeholder' => 'Введите текст сообщения',
                'label' => [
                    'value' => 'Текст сообщения *',
                ],
            ],
        ];
    }
}
