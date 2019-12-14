<?php


namespace app\index\controller;


use think\Controller;
use think\db\exception\DataNotFoundException;
use think\db\exception\ModelNotFoundException;
use think\exception\DbException;
use think\facade\Config;
use think\facade\Session;
use think\Response;

class Auth extends Controller
{
    public $model;
    /**
     * @param $account
     * @param $password
     * @param $verifyCode
     * @return Response
     * @throws DataNotFoundException
     * @throws ModelNotFoundException
     * @throws DbException
     */
    public function login($account, $password, $verifyCode = "")
    {
        //todo 验证码验证
        $result = \app\index\model\User::where(["email|phone|username" => $account])->where("password", $this::encipher($password))->find();
        if (is_null($result)) return Response::create(["msg" => "账号或者密码错误", "data" => "", "status" => 1], "json");
        Session::set("user_id", $result->getData("id"));
        Session::set("user_info", $result->getData());
        return Response::create(["msg" => "登陆成功", "data" => "success", "status" => 0], "json");
    }

    static function verifyPassword($password)
    {
        $uid = Session::get("user_id");
        $result = \app\index\model\User::where(["id" => $uid, "password" => self::encipher($password)])->find();
        return !is_null($result);
    }

    public function logout()
    {
        Session::delete("user_id");
        Session::delete("user_info");
        return Response::create(["msg" => "注销成功", "data" => "", "status" => 0], "json");
    }

    /**
     * 加密器
     * @param $key
     * @return string
     */
    static public function encipher($key)
    {
        $secret = Config::get("sysVars.cipher_secret");
        return md5((string)$key . $secret);
    }

}
