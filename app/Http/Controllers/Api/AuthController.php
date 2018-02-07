<?php

namespace App\Http\Controllers\Api;

use App\Services\UserService;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;

class AuthController extends ApiController
{
    protected $userService;

    public function __construct(UserService $service){
        $this->userService = $service;
    }

    public function register(Request $request)
    {
    	// $validate = $this->userService->validate($request);
    	$request->validate($this->userService->rules);

    	$user = $userService->create($request);
    	
    	return $this->success($user);
    }
}
