<?php


namespace app\index\model;


use think\Model;

class Bill extends Model
{
    public $uid;
    public $sid;
    public $oid;
    protected $pk = "oid";
    protected $updateTime = "updateTime";
    protected $createTime = "createTime";
    protected $autoWriteTimestamp = "datetime";
    protected $table = "p_bill";
}