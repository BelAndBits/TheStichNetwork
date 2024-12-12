<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Pattern extends Model
{
    protected $fillable = ['library_id', 'name', 'description', 'materials', 'base_price', 'status', 'add_date',  'upload_date'];    
    //Many to one with User
    public function user()
    {
        return $this->belongsTo(User::class);
    }

    public function resources() {
        return $this->hasMany(Resource::class, 'project_id', 'pattern_id');
    }

}
