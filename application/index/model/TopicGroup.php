<?php


namespace app\index\model;


use think\Model;

class TopicGroup extends Model
{
    public $table = "p_topic_group";
    public $group_name;
    public $id;
    public $group_description;
}
