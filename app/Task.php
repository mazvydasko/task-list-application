<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Task extends Model
{
    //

    protected $table = 'tasks';

    public function status() {
        return $this->hasOne('App\Status', 'id', 'status_id');
    }
}
