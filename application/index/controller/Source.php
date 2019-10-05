<?php

namespace app\index\controller;

use app\index\model\Bill;
use think\Controller;
use think\facade\Session;
use think\Request;
use think\Response;

class Source extends Controller
{
    /**
     * 显示资源列表
     *
     * @return \think\Response
     */
    public function index($id)
    {
        $result = \app\index\Model\Source::get($id);
        if (is_null($result)) $this->error("页面不存在");
        $this->assign("source", $result);
        return $this->fetch("Source/detail");
    }

    /**
     * 显示创建资源表单页.
     *
     * @return \think\Response
     */
    public function create()
    {
        //
        return $this->fetch("Source/create");
    }

    public function upload(Request $request)
    {
        $file = Profile::upload($request, "./static/cover/", "cover");
        return Response::create(["path" => "/static/cover/", "saveName" => $file->getSaveName(), "md5" => $file->hash("md5")], "json");
    }


    /**
     * 保存新建的资源
     *
     * @param Request $request
     * @param $source_name
     * @param $price
     * @param $gid
     * @param $cover
     * @param string $description
     * @return Response
     */
    public function save(Request $request, $source_name, $price, $gid, $cover, $description = "")
    {
        //目标文件
        $file = Profile::upload($request, "../uploads/", "profile");
        $result = \app\index\Model\Source::create([
            "source_name" => $source_name,
            "path" => $file->getPath() . $file->getSaveName(),
            "image" => $cover,
            "gid" => $gid,
            "description_content" => $description,
            "author_id" => Session::get("user_id"),
            "md5" => $file->hash("md5"),
            "price" => $price,
            "size" => $file->getSize()
        ]);
        return Response::create(["msg" => "", "status" => 0, "data" => $result], "json");
    }

    /**
     * 显示指定的资源
     *
     * @param int $id
     * @return \think\Response
     */
    public function read($id = "")
    {
        $profile = \app\index\Model\Source::get($id);
        return Response::create(["msg" => "", "status" => 0, "data" => $profile->getData]);
    }

    public function show($group = 1, $page = 1, $limit = 10)
    {
        $data = \app\index\Model\Source::where("gid", $group)->hidden(["switch", "md5", "description_content", "path"])->page($page, $limit)->select();
        foreach ($data as $key => $item) {
            $data[$key]["username"] = \app\index\model\User::get($item["author_id"])->getData("username");
        }
        $count = \app\index\Model\Source::where("gid", $group)->count();
        return Response::create(["status" => 0, "error" => false, "data" => $data, "count" => $count], "json");
    }

    /**
     * 显示编辑资源表单页.
     *
     * @param int $id
     * @return \think\Response
     */
    public
    function edit($id)
    {
        //
    }

    /**
     * 保存更新的资源
     *
     * @param \think\Request $request
     * @param int $id
     * @return \think\Response
     */
    public
    function update(Request $request, $id)
    {
        //
    }

    /**
     * 删除指定资源
     *
     * @param int $id
     * @return \think\Response
     */
    public function delete($id)
    {
        $profile = \app\index\Model\Source::destroy($id);
    }


    /**
     * 购买资源，默认积分支付
     * @param $id
     * @param $password
     * @param string $method
     * @return Response
     */
    public function pay($id, $password, $method = "integral")
    {
        //todo 支付程序
        $result = Auth::verifyPassword($password);
        if (!$result) return Response::create(["msg" => "密码错误", "error" => true, "status" => 1], "json");
        $source = \app\index\Model\Source::find($id);
        if (is_null($source)) return Response::create(["msg" => "您要购买的资源不存在"], "json");
        $price = $source->getData("price") - $source->getData("discount");
        $bill = Bill::create(["uid" => Session::get("user_id"), "sid" => $id, "price" => $price]);
        \app\index\model\User::update(["integral" => ["dec", $price]], ["id" => Session::get("user_id")]);
        return Response::create(["msg" => "购买成功", "data" => $bill, "status" => 0, "error" => false], "json");
    }

    public function download($v)
    {
        $data = $this->decodeDownloadSecret($v);
        $uid = Session::get("user_id");
        $id = $data["id"];
        if ($data["uid"] != $uid) $this->error("没有下载权限");
        $source = \app\index\Model\Source::get($id);
        return download($source->getData("path") . "1570118261.jpg", $source->getData("source_name"))->expire(600);
    }

    public function check($id)
    {
        $uid = Session::get("user_id");
        $result = Bill::where(["uid" => $uid, "sid" => $id])->find();
        if (!is_null($result)) return Response::create(["status" => 0, "error" => false, "data" => $this->createDownloadSecret(
            ["id" => $id, "uid" => $uid, "timestamp" => time()])], "json");
        else return Response::create(["msg" => "您未购买该资源", "error" => true, "status" => 1], "json", 200);
    }

    /**
     * @param array $data
     * @return string
     */
    private function createDownloadSecret($data = [])
    {
        return base64_encode(json_encode($data));
    }

    /**
     * @param $secret
     * @return array
     */
    private function decodeDownloadSecret($secret)
    {
        return json_decode(base64_decode($secret), true);
    }

}