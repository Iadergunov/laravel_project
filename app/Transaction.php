<?php

namespace App;

use Carbon\Carbon;
use Illuminate\Database\Eloquent\Model;

class Transaction extends Model
{
    protected $fillable = [
        'name',
        'amount',
        'date_time',
        'account_id'
    ];

    protected $dates = ['date_time'];

    public function scopeToday($query){
        $query->where('date_time', '=', Carbon::today());
    }

    public function scopeYesterday($query){
        $query->where('date_time', '=', Carbon::yesterday());
    }

    /**
     * Get a user, to whom belongs transaction
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function user(){
        return $this->belongsTo('App\User');
    }

    /**
     * Get a account, associated with current transaction
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function account(){
        return $this->belongsTo('App\Account');
    }

    /**
     * Get a group, associated with current transaction
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function group(){
        return $this->belongsTo('App\Group_of_transactions');
    }
}
