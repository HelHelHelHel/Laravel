<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Movie extends Model
{
    //
    public function reviews() 
    {
        return $this->hasMany('App\Review');
    }
    public function people()
    {
        return $this->belongsToMany('App\Person');
    }
    public function collections()
    {
        return $this->belongsToMany('App\Collection', 'fav_movies');
    }

    public function favored_by_users()
    {
        return $this->belongsToMany('App\User', 'favorite_movies');
    }

    public function genres()
    {
        return $this->belongsToMany('App\Genre');
    }
}
