<?php namespace Protestwit\Instagram;
use Illuminate\Config\Repository as Config;
class Instagram extends \MetzWeb\Instagram\Instagram
{
    public function __construct(Config $config)
    {
        if ($config->has('services.instagram')) {
            
            $this->setApiKey($config->get('services.instagram.client_id'));
            $this->setApiCallback($config->get('services.instagram.redirect'));
        }
    }
}