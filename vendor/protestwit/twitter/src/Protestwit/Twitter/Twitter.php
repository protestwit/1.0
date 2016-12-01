<?php namespace Protestwit\Twitter;

use Exception;
use Illuminate\Session\Store as SessionStore;
use Illuminate\Config\Repository as Config;

class Twitter extends \Thujohn\Twitter\Twitter
{
    public function postFollow($parameters = [])
    {
        return parent::postFollow($parameters);
    }

    //Retweet a tweet passing in id
    public function postRt($id, $parameters = [])
    {
        return parent::postRt($id,$parameters);
    }


}