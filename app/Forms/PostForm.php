<?php

namespace App\Forms;

use Illuminate\Support\Facades\Config;

class PostForm extends Form
{
    public function __construct(array $values = [])
    {
        $this->formName = 'addedit';
        $this->method = Config::get('constants.methods.post');
        $this->fields = [
            [
                'name' => 'title',
                'type' => 'text',
                'placeholder' => 'Введите название',
                'class' => 'post__title',
                'value' => $values['title'] ?? null,
                'label' => [
                    'value' => 'Название поста',
                ],
            ],
            [
                'name' => 'content',
                'type' => 'textarea',
                'placeholder' => 'Введите текст',
                'class' => 'post__content',
                'value' => $values['content'] ?? null,
                'label' => [
                    'value' => 'Текст поста',
                ],
            ],
            [
                'name' => 'image',
                'type' => 'file',
                'label' => [
                    'value' => 'Изображение',
                ],
            ],
        ];
    }
}
