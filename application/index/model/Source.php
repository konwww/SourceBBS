<?php

namespace app\index\model;

use think\Model;

class Source extends Model
{
    protected $table = "p_source";
    protected $updateTime = "updateTime";
    protected $createTime = "createTime";
    protected $deleteTime;
    public $id;
    public $source_name;
    public $path;
    public $image;
    public $author_id;
    public $description_content;
    public $size;
    public $price;
    public $discount;
    public $autoWriteTimestamp = "datetime";


    public function author()
    {
        return $this->belongsTo("User", "author_id");
    }

    public function customers()
    {
        return $this->hasMany("Bill", "sid");
    }


}