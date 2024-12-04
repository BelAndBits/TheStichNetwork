<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Pattern extends Model
{
    //Many to one with User
    public function user()
    {
        return $this->belongsTo(User::class);
    }
}
