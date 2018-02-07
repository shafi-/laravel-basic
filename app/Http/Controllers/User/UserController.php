<?php

namespace App\Http\Controllers\User;

use App\Http\Controllers\Api\ApiController;
use App\Services\UserService;
use Illuminate\Http\Request;

class UserController extends ApiController
{
    private $service;

    public function __construct(UserService $userService, User $user)
    {
        $this->service = $userService;
    }

    public function create(Request $request){
        $data = $this->service->prepareArray($request);
        $data['password'] = bcrypt($data['password']);

        return $this->service->create($data);
    }

    public function update(Request $request, $id){
        $data = $this->service->prepareArray($request);
        $user = $this->service->find($id);

        if(is_null($user)) return $this->modelNotFound();

        $user->update($data);

        return $this->success('successfully updated');
    }

    public function destroy(Request $request, $id){
        $user = $this->service->find($id);

        if(is_null($user)) return $this->modelNotFound();

        $user->delete();

        return $this->success('deleted');
    }
}
