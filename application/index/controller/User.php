<?php

namespace app\index\controller;

use think\Controller;
use think\db\exception\DataNotFoundException;
use think\db\exception\ModelNotFoundException;
use think\exception\DbException;
use think\facade\Session;
use think\Request;
use think\Response;

class User extends Controller
{
    public function login()
    {
        if (Session::has("user_id")) $this->redirect("/index/user/index");
        return $this->fetch("User/login");
    }

    /**
     * 显示资源列表
     */
    public function index()
    {
        //
        $result = $this->read();
        $this->assign("user", $result->getData()["data"]);
        return $this->fetch("User/index");
    }

    /**
     * 显示创建资源表单页.
     *
     * @return \think\Response
     */
    public function create()
    {
        return $this->fetch("User/register");
    }

    /**
     * 保存新建的资源
     *
     * @param $username
     * @param $email
     * @param $password
     * @param $verifyCode
     * @return \think\Response
     * @throws DataNotFoundException
     * @throws ModelNotFoundException
     * @throws DbException
     */
    public function save($username, $email, $password, $verifyCode = "")
    {
        //
        if (!$this->verifyUsername($username)) return Response::create(["msg" => "用户名已被注册", "data" => "", "status" => 1], "json");
        if (!$this->verifyEmail($email)) return Response::create(["msg" => "该email已被注册", "data" => "", "status" => 1], "json");
        //todo 验证验证码

        $user = \app\index\model\User::create(["username" => $username, "email" => $email, "password" => Auth::encipher($password)]);
        return Response::create(["msg" => "注册成功", "data" => $user, "status" => 0], "json");
    }

    /**
     * 显示指定的资源
     *
     * @param int $id
     * @return \think\Response
     */
    public function read($id = "")
    {
        //
        if (empty($id)) $id = Session::get("user_id");
        $user = \app\index\model\User::get($id);
        return Response::create(["msg" => "", "status" => 0, "data" => $user->getData()], "json");
    }

    /**
     * 显示编辑资源表单页.
     *
     * @param int $id
     * @return mixed
     */
    public function edit($id)
    {
        //
        return $this->fetch();
    }

    /**
     * 用户名更新
     *
     * @param int $id
     * @param $username
     * @return Response
     * @throws DataNotFoundException
     * @throws ModelNotFoundException
     * @throws DbException
     */
    public function updateUserName($id, $username)
    {
        $result = $this->verifyUsername($username);
        if ($result) {
            return Response::create(["msg" => "该ID已被注册", "data" => false, "status" => 1], "json");
        }
        $result = \app\index\model\User::update(["username" => $username], ["Id" => $id]);
        return Response::create(["msg" => "修改成功", "data" => $result, "status" => 0], "json");
    }

    /**
     * 头像更新
     * @param $id
     * @param Request $request
     * @return Response
     */
    public function updateAvatar($id, Request $request)
    {
        $info = Profile::upload($request, "../public/static/avatar/", "avatar", "jpg,jpeg,gif,png");
        if (is_null($info)) return Response::create(["msg" => "文件上传失败或者上传类型不合法", "status" => 1, "data" => ""], "json");
        $result = \app\index\model\User::update(["avatar" => $info->getSaveName()], ["Id" => $id]);
        return Response::create(["data" => $result, "status" => 0, "msg" => "更新成功"]);
    }

    /**
     * 用户名验证
     * @param $username
     * @return bool
     * @throws DataNotFoundException
     * @throws DbException
     * @throws ModelNotFoundException
     */
    private function verifyUsername($username)
    {
        $result = \app\index\model\User::where(["username" => $username])->select();
        return count($result) == 0;
    }

    /**
     * 邮件地址验证
     * @param $email
     * @return bool
     */
    private function verifyEmail($email)
    {
        //todo 邮件验证
        return true;

    }

    /**
     * 电话号码验证
     * @param $id
     * @param $phone
     * @return bool
     */
    private function verifyPhone($id, $phone)
    {
        return true;
    }

    /**
     * 删除指定资源
     *
     * @param int $id
     * @return \think\Response
     */
    public function delete($id)
    {
        //
        $result = \app\index\model\User::destroy($id);
        return Response::create(["msg" => "", "status" => 0, "data" => $result, "json"], "json");
    }

}
