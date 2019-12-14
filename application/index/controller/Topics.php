<?php


namespace app\index\controller;


use app\index\model\SourceGroup;
use app\index\model\Topic;
use think\Response;

class Topics extends Auth
{
    public function index($gid, $page, $limit)
    {
        $data = Topic::field(["id", "author_id", "createTime","title"])->where("gid", $gid)->order("createTime", "desc")->page($page, $limit)->select();
        return Response::create(["data" => $data, "msg" => "ok"], "json");
    }

    public function category()
    {
        $data = SourceGroup::select();
        return Response::create(["data" => $data], "json");
    }
}
