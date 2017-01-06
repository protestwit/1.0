<?php namespace App\Contracts;


interface DispatchableInterface
{
    
    public function getAuthorProfileUrlAttribute();
    public function getAuthorProfileImageUrlAttribute();
    public function getAuthorNameAttribute();
    public function getAuthorHandleAttribute();
    public function getExternalUrlAttribute();
    public function getCreatedAgoAttribute();
    public function getBodyAttribute();
    public function getRepliesCountAttribute();
    public function getSharesCountAttribute();
    public function getLikeCountAttribute();
    public function getHottnessAttribute();
    
    
    
    
}