<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Task extends Model
{
    protected $fillable = [
        'task',
        'is_done'
    ];

    public function user(){
        return $this->belongsTo('App\User');
    }
}
