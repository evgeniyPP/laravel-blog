<?php

return [
    'addPostValidation' => [
        'title' => 'required|string|unique:posts|min:5|max:255',
        'content' => 'required|string|min:100'
    ],
    'editPostValidation' => [
        'title' => 'required|string|min:5|max:255',
        'content' => 'required|string|min:100'
    ],
    'loginValidation' => [
        'login' => 'required|string|min:4',
        'password' => 'required|string|min:4'
    ],
    'signUpValidation' => [
        'name' => 'required|string|min:2|max:255',
        'surname' => 'required|string|min:2|max:255',
        'login' => 'required|string|unique:users|min:4',
        'password' => 'required|string|min:4',
        'confirm' => 'required|string|same:password|min:4',
        'policy' => 'required'
    ],
    'feedbackValidation' => [
        'name' => 'required|string|min:2|max:255',
        'email' => 'required|email',
        'message' => 'required|string|min:20'
    ]
];
