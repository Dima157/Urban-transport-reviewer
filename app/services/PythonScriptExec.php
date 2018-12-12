<?php
/**
 * Created by PhpStorm.
 * User: User
 * Date: 13.11.2018
 * Time: 15:05
 */

namespace App\services;


class PythonScriptExec
{

    CONST PYTHON_SCRIPT = "C:\Users\User\AppData\Local\Programs\Python\Python37-32\python.exe";
    public static function exec(string $pythonScript, $data = null)
    {
        if(!is_null($data)) {
            $res = exec(static::PYTHON_SCRIPT . '"' . $pythonScript . '" ' . static::prepareData($data) .' 2>&1', $out);
        } else {
            $res = exec(static::PYTHON_SCRIPT . '"' . $pythonScript . '" ' . static::prepareData(['type' => 'all']) .' 2>&1', $out);
        }
        return $res/*json_decode(exec($script))*/;
    }

    public static function prepareData($data)
    {
        return base64_encode(json_encode($data));
    }

}