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
    CONST DECTED_PLATES = "C:\Program Files\OSPanel\domains\Urban-transport-reviewer\app\PythonResourses\DetectedPlates\detected.py";
    public static function exec(string $pythonScript, $data = null)
    {
        if(!is_null($data)) {
            $res = exec('C:\Users\User\AppData\Local\Programs\Python\Python37-32\python.exe "' . $pythonScript . '" ' . static::prepareData(['img' => $data]) .' 2>&1', $out);
        } else {
            $res = exec('C:\Users\User\AppData\Local\Programs\Python\Python37-32\python.exe "' . $pythonScript . '" 2>&1', $out);
        }
        return $out/*json_decode(exec($script))*/;
    }

    public static function prepareData($data)
    {
        return base64_encode(json_encode($data));
    }


}