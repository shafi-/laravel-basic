<?php
/**
 * Created by PhpStorm.
 * User: mash
 * Date: 1/9/18
 * Time: 1:42 AM
 */

namespace App\Http\Controllers\Api;


use App\Http\Controllers\Controller;
use App\User;
use Illuminate\Support\Facades\Auth;


class ApiController extends Controller
{
    /**
     * Returns An user instance of the api user
     * @return User
     */
    protected function getApiUser(){
        return Auth::guard('api')->user();
    }

    /**
     * @param $data
     * @param string $msg
     * @return array
     */
    public function success($data, $msg = ''){
        return $this->response(MyStatus::$SUCCESS, $data, $msg);
    }

    /**
     * @param string $msg
     * @param string $data
     * @return array
     */
    public function error($msg = 'An error occurred', $data = ''){
        return $this->response(MyStatus::$ERROR, $data,$msg);
    }

    /**
     * @param string $msg
     * @param string $data
     * @return array
     */
    public function modelNotFound($msg = 'Model not found', $data = ''){
        return $this->response(MyStatus::$MODEL_NOT_FOUND, $data, $msg);
    }

    /**
     * @param string $msg
     * @param string $data
     * @return array
     */
    protected function permissionDenied($msg = 'Permission denied', $data = ''){
        return $this->response(MyStatus::$PERMISSION_DENIED, $data, $msg);
    }

    /**
     * @param string $msg
     * @param string $data
     * @return array
     */
    protected function operationNotAllowed($msg = 'Operation Not Allowed', $data = ''){
        return $this->response(MyStatus::$OPERATION_NOT_ALLOWED, $data, $msg);
    }

    /**
     * @param $status
     * @param $data
     * @param $msg
     * @return array
     */
    public function response($status, $data, $msg){
        return [
            'status' => $status,
            'data' => $data,
            'msg' => $msg,
            'time' => time(), /** Returns current time in seconds from unix epoch 1/1/1970
                                * This may be useful to detect user's manipulation in system time
                                */
        ];
    }
}