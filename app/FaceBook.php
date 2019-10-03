<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class FaceBook extends Model
{

    public function user()
    {
        return $this->belongsTo(User::class,'created_by', 'id');
    }
}
