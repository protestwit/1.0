<?php namespace Protestwit\Frontend;

use Jenssegers\Mongodb\Eloquent\Model;

class VueView extends Model{

    protected $connection = 'archive';
    protected $collection = 'vue_views';

    
    public function getViewName()
    {
        return str_replace('.','-',$this->getRouteName());
    }


    public function getViewAttribute()
    {
        $path = $this->getPath();
        $this->getAction();
    }
    
    

    public function getRouteName()
    {
       return \Request::route()->getName();
    }
    

    public function getPath()
    {
        $path = \Request::path();
        return $path;
    }

    public function getAction()
    {
        $action = \Request::action();
        return $action;
    }

}