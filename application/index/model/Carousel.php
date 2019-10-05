<?php

namespace app\index\model;

use think\Model;

class Carousel extends Model
{
    //
    public $uri;
    public $link;
    protected $createTi;
    protected $updateTi;
    public $autoWriteTimestamp = "datetime";
    protected $updateTime="updateTi";
    protected $createTime="createTi";
}
