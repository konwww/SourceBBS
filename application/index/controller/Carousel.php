<?php


namespace app\index\controller;


use think\Controller;
use think\Response;

class Carousel extends Auth
{
    public function upload()
    {
        $file = $this->request->file("file");
        if (is_null($file)) return Error::error_param("file");
        //上传类型限制
        $upload = $file->validate(['ext' => 'jpg,png,gif,jpeg'])->move("./images/carousel/", "carousel_" . time());
        if ($upload) {
            $filename = $upload->getSaveName();
            return Response::create(["msg" => "ok", "data" => [
                "filename" => $filename
            ]], "json");
        } else {
            return Error::error_param("文件类型错误，轮播文件必须是jpg、jpeg、gif、png格式的文件");
        }

    }

    public function add($link, $desc, $filename)
    {
        if (!$filename) return Error::error_param("请上传图片");
        $result = \app\index\model\Carousel::create(["filename" => $filename, "link" => $link, "desc" => $desc, "uri" => "/images/carousel/" . $filename]);
        return Response::create(['msg' => "ok", 'data' => $result], "json");
    }

    public function edit($id, $link, $desc, $filename)
    {
        $updateData = ["link" => $link, "desc" => $desc];
        //判断是否更改了图片文件，并把修改后的数据写入待更新数据中
        if ($filename) $updateData = array_merge($updateData, ["uri" => "/images/carousel/" . $filename]);
        $result = \app\index\model\Carousel::update($updateData, ["id" => $id]);
        return Response::create(["msg" => "ok", "data" => $result], "json");
    }

    public function del($id)
    {
        $result = \app\index\model\Carousel::get($id);
        if (is_null($result)) return Error::error_data_is_null("id");
        $bool = $result->delete();
        return $bool ? Response::create(["msg" => "ok", "data" => "删除成功"], "json") : Error::error_data_delete();
    }

    public function show($id)
    {
        $carousel = \app\index\model\Carousel::find(["id" => $id]);
        return Response::create(["msg" => "ok", "data" => $carousel], "json");

    }

    public function all($page = 1, $limit = 20)
    {
        $page = (int)$page;
        $length = (int)$limit;
//        if (!is_int($page) || !is_int($length) || $page < 1 || $length < 0) return Error::error_param("page与length必须是大于0整数");
        if ($limit <= 0) $list = \app\index\model\Carousel::select(); else$list = \app\index\model\Carousel::limit(($page - 1) * $length, $length)->select();
        $count = \app\index\model\Carousel::count("id");
        return Response::create(["msg" => "ok", "data" => $list, "code" => 0, "count" => $count], "json");

    }

}