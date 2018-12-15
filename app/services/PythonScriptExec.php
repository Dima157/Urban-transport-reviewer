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
    CONST GRAPHIC = "C:\Program Files\OSPanel\domains\Urban-transport-reviewer\app\PythonResourses\Graphics\graphic.py";
    public static function exec(string $pythonScript, $data = null)
    {
        if(!is_null($data)) {
            exec('C:\Users\User\AppData\Local\Programs\Python\Python37-32\python.exe "' . $pythonScript . '" ' . static::prepareData(['img' => $data]) .' 2>&1', $out);
        } else {
            echo 1;
            //exec('C:\Users\User\AppData\Local\Programs\Python\Python37-32\python.exe "' . $pythonScript . '" 2>&1', $out);
        }
        return true;
    }

    public static function prepareData($data)
    {
        return base64_encode(json_encode($data));
    }


}