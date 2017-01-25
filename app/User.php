<?php

namespace App;

use Illuminate\Notifications\Notifiable;
use Illuminate\Foundation\Auth\User as Authenticatable;

class User extends Authenticatable
{
    use Notifiable;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'name', 'email', 'password',
    ];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'password', 'remember_token',
    ];

    /**
     * A user can have many articles
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     */
    public function articles(){
        return $this->hasMany('App\Article');
    }

    /**
     * A user can have many task
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     */
    public function tasks(){
        return $this->hasMany('App\Task');
    }

    /**
     * A user can have many transactions
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     */
    public function transactions(){
        return $this->hasMany('App\Transaction');
    }

    /**
     * A user can have many accounts
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     */
    public function accounts(){
        return $this->hasMany('App\Account');
    }

    public function finance_groups(){
        return$this->hasMany('App\Finance_group');
    }
}
