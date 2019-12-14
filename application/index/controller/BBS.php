<?php


namespace app\index\controller;


use app\index\model\Msg;
use app\index\model\Topic;
use think\App;
use think\Response;

class BBS extends Auth
{

    public function __construct(App $app = null)
    {
        parent::__construct($app);
        $this->model = new Topic();
    }

    public function publish($content, $title, $category)
    {
        Topic::create(["title" => $title, "content" => $content, "gid" => $category, "author_id" => $this->request->session("user_id")]);
        return Response::create(["msg" => "ok"], "json");
    }

    public function reply($recipient_id, $content, $floor, $t_id, $msg_id)
    {
        Msg::create(["content" => $content, "recipient_id" => $recipient_id, "msg_id" => $msg_id, "user_id" => $this->request->session("user_id"), "floor" => $floor, "t_id" => $t_id, "category" => 1]);
        return Response::create(["msg" => "ok"], "json");
    }

    public function comment($content, $id)
    {
        $data = Msg::create(["content" => $content, "t_id" => $id, "user_id" => $this->request->session("user_id"), "category" => 3]);
        return Response::create(["status" => 0, "data" => $data], "json");
    }

    public function commentRender($id, $page = 1, $limit = 10)
    {
        $data = Msg::where(["t_id" => $id])->where("category in (1,3)")->alias("reply")
            ->leftJoin("(select username as reply_name,id from p_user) user", "reply.recipient_id=user.id")
            ->leftJoin("(select username as author_name,id as author_id from p_user) a_user", "reply.user_id=a_user.author_id")
            ->leftJoin("(select left(content,30) as target_content,Id as cid from p_msg) c", "reply.msg_id=c.cid")
            ->order("createTime", "asc")
//            ->page($page, $limit)
            ->select();
        return Response::create(["data" => $data], "json");
    }

    public function topic($id)
    {
        $result = Topic::get($id);
        if (is_null($result)) return Response::create(["msg" => "错误的主题ID", "status" => 4], "json");
        return Response::create(["data" => $result->getData(), "status" => 0], "json");
    }
}
