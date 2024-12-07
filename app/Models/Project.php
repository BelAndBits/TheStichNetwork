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
        return $this->belongsTo(Library::class);
    }
}

