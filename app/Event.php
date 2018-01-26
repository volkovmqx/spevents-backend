<?php

namespace SPE;

use Illuminate\Database\Eloquent\Model;

class Event extends Model
{
	protected $table = 'events';
    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = ['name', 'dateandtime','place', 'description', 'imgpath'];

    public function users()
    {
        return $this->belongsToMany('SPE\User')->withTimestamps();
    }
}
