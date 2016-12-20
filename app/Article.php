<?php

namespace App;

use Carbon\Carbon;
use Illuminate\Database\Eloquent\Model;

class Article extends Model
{
    protected $fillable = ['title', 'body', 'excerpt', 'published_at'];


    protected $dates = ['published_at'];
    /**
     * An article is owned by a user
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */

    public function scopePublished($query){
        $query->where('published_at', '<=', Carbon::now());
    }

    public function setPublishedAtAttribute($date){
        $this->attributes['published_at'] = Carbon::parse($date);
    }

    public function user(){
        return $this->belongsTo('App\User');
    }
}
