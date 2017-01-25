<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Group_of_transactions extends Model
{
    /**
     * Fields available for mass-assignment for a Group_of_transactions.
     * @var array
     */
    protected $fillable = ['name'];

    public function user(){
        $this->belongsTo('App\User');
    }

    public function transactions(){
        return $this->hasMany('App\Transaction');
    }
}
