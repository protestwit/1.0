<?php

namespace Protestwit\Finance\Models;

use App\Traits\Searchable;
use Carbon\Carbon;
use Jenssegers\Mongodb\Eloquent\Model as Model;
use Jenssegers\Mongodb\Eloquent\HybridRelations;

class Quote extends Model
{
    use HybridRelations;
    use Searchable;
    protected $connection = 'archive';
    protected $collection = 'stock_quotes';
    protected $fillable = [
        'symbol',
        'date',
        'open',
        'high',
        'low',
        'close',
        'volume',
        'adj_close',
    ];



}
