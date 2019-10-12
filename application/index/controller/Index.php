<?php

namespace app\index\controller;

use app\index\model\SourceGroup;
use think\Controller;

class Index extends Controller
{
    public function index()
    {
        $column = SourceGroup::select();
        $carousel=\app\index\model\Carousel::select();
        $this->assign("carousel",$carousel);
        $this->assign("column", $column);
        return $this->fetch("Index/index");
    }

    public function hello($name = 'ThinkPHP5')
    {
        return 'hello,' . $name;
    }
}
