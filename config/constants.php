<?php

return [
    'methods' => [
        'get' => 'GET',
        'post' => 'POST'
    ],
    'addPostValidation' => [
        'title' => 'required|string|unique:posts|min:5|max:255',
        'content' => 'required|string|min:100'
    ],
    'editPostValidation' => [
        'title' => 'required|string|min:5|max:255',
        'content' => 'required|string|min:100'
    ]
];
