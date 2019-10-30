<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Person extends Model
{
    //dont need this if following conventions
    protected $table = 'people'; 
    public $timestamps = false;
    //whitelist
    protected $fillable = [
        'name',
        'photo_url',
        'biography',
        'profession_id'
    ];

    //black list of columns if it is empty=> everything is on whitelist- this approach is not as good as white list
    //protected $quarded = [];
}
