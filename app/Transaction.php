<?php

namespace App;

use Carbon\Carbon;
use Illuminate\Database\Eloquent\Model;

class Transaction extends Model
{
    protected $fillable = [
        'name',
        'amount',
        'date_time'
    ];

    protected $dates = ['date_time'];

    public function scopeToday($query){
        $query->where('date_time', '=', Carbon::today());
    }

    public function scopeYesterday($query){
        $query->where('date_time', '=', Carbon::yesterday());
    }

    public function user(){
        return $this->belongsTo('App\User');
    }
}
