<?php


namespace app\index\model;


use think\Model;
use think\model\concern\SoftDelete;
use think\model\relation\HasMany;

class User extends Model
{
    use SoftDelete;
    public $id;
    public $username;
    public $email;
    public $phone;
    public $password;
    public $integral;
    public $avatar;
    protected $update_time;
    protected $create_time;
    protected $table = 'p_user';
    protected $updateTime = "update_time";
    protected $createTime = "create_time";
    protected $autoWriteTimestamp = "datetime";

    /**
     * 获取所有的购买物品
     * @return HasMany
     */
    public function bill()
    {
        return $this->hasMany("Bill", "uid", "id");
    }

    /**
     * 获取所有发布的资源
     * @return HasMany
     */
    public function publish()
    {
        return $this->hasMany("Source", "author_id");
    }

}