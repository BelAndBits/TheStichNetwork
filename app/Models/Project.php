<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Project extends Model
{
    use HasFactory;

    protected $primaryKey = 'project_id';

    protected $fillable = ['library_id','creation_date', 'name', 'craft', 'pattern']; 

    //Many to one with Library
    public function library()
    {
        return $this->belongsTo(Library::class, 'library_id', 'library_id');
    }

    public function resources()
    {
        return $this->hasMany(Resource::class, 'project_id', 'project_id');
    }

}

