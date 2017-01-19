<?php

namespace App;

use Carbon\Carbon;
use Illuminate\Database\Eloquent\Model;

class Article extends Model
{
    /**
     * Fields available for mass-assignment for an Article.
     * @var array
     */
    protected $fillable = ['title', 'body', 'excerpt', 'published_at'];

    /**
     * Additional fields to create Carbon instances.
     * @var array
     */
    protected $dates = ['published_at'];

    /**
     * Scope queries to select articles which are published.
     * @param $query
     */
    public function scopePublished($query){
        $query->where('published_at', '<=', Carbon::now());
    }

    /**
     * Set the published_at attribute.
     * @param $date
     */
    public function setPublishedAtAttribute($date){
        $this->attributes['published_at'] = Carbon::parse($date);
    }

    /**
     * An article is owned by a user
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function user(){
        return $this->belongsTo('App\User');
    }

    /**
     * Get the tags associated with the given article
     * @return \Illuminate\Database\Eloquent\Relations\BelongsToMany
     */
    public function tags(){
        return $this->belongsToMany('App\Tag')->withTimestamps();
    }

    /**
     * Get a list of tag ids which associated with the given article
     * @return \Illuminate\Database\Eloquent\Relations\BelongsToMany
     */
    public function getTagListAttribute(){
        //return $this->tags->lists('id')->all();
        return $this->tags->pluck('id')->all();
    }
}
