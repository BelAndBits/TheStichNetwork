<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class CartItem extends Model
{
    protected $fillable = ['user_id', 'pattern_id', 'quantity'];

    public function user()
    {
        return $this->belongsTo(User::class);
    }

    public function pattern()
    {
        return $this->belongsTo(Pattern::class);
    }
}
