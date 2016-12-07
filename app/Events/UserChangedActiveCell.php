<?php

namespace App\Events;

use Illuminate\Contracts\Broadcasting\ShouldBroadcast;

class UserChangedActiveCell extends Event implements ShouldBroadcast
{

    public $rowIndex;
    public $columnIndex;


    public function __construct($rowIndex = null, $columnIndex = null)
    {
        $this->rowIndex = $rowIndex;
        $this->columnIndex = $columnIndex;
    }

    public function broadcastOn()
    {
        return ['clicked-cell-channel'];

    }
}
