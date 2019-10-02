<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Book extends Model
{
    protected $table = 'books';

    protected $fillable = [
        'name',
        'author',
        'price',
        'describe',
        'pic',
        'type',
        'user_id',
    ];

    public function user()
    {
        return $this->belongsToMany(User::class);
    }

}
