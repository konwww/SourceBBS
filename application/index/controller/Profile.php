<?php


namespace app\index\controller;


use think\Controller;
use think\File;
use think\Request;

class Profile extends Controller
{
    /**
     * @param Request $request
     * @param string $path
     * @param string $param
     * @param string $ext 文件类型
     * @return File
     */
    static function upload(Request $request, $path, $param, $ext = null)
    {
        $file = $request->file($param);
        if (!is_null($ext)) if ($file->validate(["ext" => $ext])) return null;
        $info = $file->move($path, time());
        return $info;
    }

}