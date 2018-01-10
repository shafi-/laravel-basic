<?php
/**
 * Created by PhpStorm.
 * User: mash
 * Date: 1/9/18
 * Time: 1:47 AM
 */

namespace App\Http\Controllers\Api;

class MyStatus
{

    public static $SUCCESS = 1;
    public static $ERROR = -1;
    public static $MODEL_NOT_FOUND = -2;
    public static $OPERATION_NOT_ALLOWED = -3;
    public static $PERMISSION_DENIED = -4;
}