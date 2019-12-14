<?php


namespace app\index\model;


use think\Model;
use think\model\concern\SoftDelete;

class Comment extends Model
{
    use SoftDelete;
    protected $table = "p_comment";
    public $id;
    public $user_id;
    public $recipient_id;
    public $updateTime = "updateTime";
    public $createTime = "createTime";
    public $deleteTime;
    public $group_id;
    public $content;
    public $title;
    public $category;
    public $topic_id;
    public $autoWriteTimestamp = "datetime";
}