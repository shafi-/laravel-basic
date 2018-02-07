<?php

namespace App\Services;

use App\User;

class UserService extends Service
{
    protected $userFields = ['name','email','phone','password','api_token','remember_token'];
    
    protected $userRules = [
        'name' => 'required|string|max:255',
        'email' => 'required|string|email|max:255|unique:users',
        'phone' => 'required|max:15|unique:users',
        'password' => 'required|string|min:6',
    ];

    public function __construct(User $user)
    {
        parent::__construct($user, $this->userFields, $this->userRules);
    }
}