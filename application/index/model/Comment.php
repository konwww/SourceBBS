<?php


namespace app\index\model;


use think\Model;
use think\model\concern\SoftDelete;

class Msg extends Model
{
    use SoftDelete;
    protected $table = "p_msg";
    public $id;
    public $user_id;
    public $recipient_id;
    public $updateTime = "updateTime";
    public $createTime = "createTime";
    public $deleteTime;
    public $content;
    public $title;
    public $category;
    public $source_id;
    public $autoWriteTimestamp = "datetime";
}