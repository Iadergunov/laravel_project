<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Finance_group extends Model
{
    /**
     * Fields available for mass-assignment for a finance group.
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
