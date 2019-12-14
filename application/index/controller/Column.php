<?php


namespace app\index\controller;


use app\index\model\SourceGroup;
use think\Controller;
use think\Response;

class Column extends Controller
{
    public function index($gid = 1)
    {
        $group = SourceGroup::find($gid);
        $this->assign("group", $group);
        return $this->fetch("Column/list");
    }

    public function show()
    {
        $group = SourceGroup::select();
        return Response::create(["data" => $group, "status" => 0, "error" => false], 'json');
    }

    public function get($id)
    {
        $data = SourceGroup::get($id);
        if (!is_null($data)) return Response::create(["data" => $data->getData(), "msg" => "ok"], "json");
    }
}
