<?php

namespace App\Forms;

use Illuminate\Support\Facades\Config;

class FormBuilder
{
    public $form;

    public function __construct(Form &$form)
    {
        $this->form = $form;
    }

    public function method()
    {
        return $this->form->getMethod() ?? Config::get('constants.methods.get');
    }

    public function fields()
    {
        $inputs = [];

        foreach ($this->form->getFields() as $field) {
            $isLabel = false;
            $isTextArea = false;

            if (isset($field['label'])) {
                $label = $field['label'];
                $isLabel = true;
            }
            unset($field['label']);

            if ($field['type'] === 'textarea') {
                unset($field['type']);
                if (isset($field['value'])) {
                    $value = $field['value'];
                }
                unset($field['value']);
                $isTextArea = true;
            }

            if ($isTextArea) {
                $input = $this->textarea($field, $value ?? '');
            } else {
                $input = $this->input($field);
            }

            if ($isLabel) {
                $inputs[$field['name']] = $this->label($label, $input);
            } else {
                $inputs[$field['name']] = $input;
            }
        }

        return $inputs;
    }

    private function input($attributes)
    {
        return sprintf('<input %s>', $this->attributes($attributes));
    }

    private function textarea($attributes, $value)
    {
        return sprintf('<textarea %s>%s</textarea>', $this->attributes($attributes), $value);
    }

    private function label($label, $input)
    {
        $classes = isset($label['class']) ? sprintf('class=%s', $label['class']) : '';

        if (isset($label['positionAfter']) && $label['positionAfter']) {
            return sprintf('<label %s>%s%s</label>', $classes, $input, $label['value']);
        }

        return sprintf('<label %s>%s%s</label>', $classes, $label['value'], $input);
    }

    private function attributes($attributes)
    {
        $array = [];

        foreach ($attributes as $attribute => $value) {
            $array[] = sprintf('%s="%s"', $attribute, $value);
        }

        return implode(' ', $array);
    }
}
