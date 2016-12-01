<?php

namespace App;

use App\Traits\Searchable;
use Illuminate\Database\Eloquent\Model;

class PostMeta extends Model
{
    use Searchable;
    protected $table = 'wp_postmeta';
    
}
