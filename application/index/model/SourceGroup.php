<?php


namespace app\index\model;


use think\Model;

class SourceGroup extends Model
{
    public $id;
    public $groupName;
    public $description;
    protected $updateTime = "updateTime";
    protected $createTime = "updateTime";
    protected $autoWriteTimestamp = "datetime";
    protected $table="p_source_group";

    public function sources()
    {
        return $this->hasMany("Source", "gid");
    }
}