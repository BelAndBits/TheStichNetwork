<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Pattern extends Model
{
    protected $primaryKey = 'pattern_id';
    
    protected $fillable = ['user_id', 'name', 'description', 'materials', 'base_price', 'status', 'add_date',  'upload_date'];    
    //Many to one with User
    public function user()
    {
        return $this->belongsTo(User::class, 'user_id', 'user_id');
    }

    public function resources() {
        return $this->hasMany(Resource::class, 'pattern_id', 'pattern_id');
    }

}
