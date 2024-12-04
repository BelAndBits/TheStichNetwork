<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Project extends Model
{
    use HasFactory;

    protected $primaryKey = 'project_id';

    protected $fillable = ['name', 'description', 'user_id']; 

    //Many to one with User
    public function user()
    {
        return $this->belongsTo(User::class);
    }
}

