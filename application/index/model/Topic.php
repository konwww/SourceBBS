<?php


namespace app\index\model;


use think\Model;
use think\model\concern\SoftDelete;

class Topic extends Model
{
    use SoftDelete;
    public $table = "p_topic";
    public $autoWriteTimestamp = "datetime";
    public $createTime = "createTime";
    public $updateTime = "updateTime";
    public $deleteTime="deleteTime";
    public $title;
    public $content;
    public $author_id;
}
