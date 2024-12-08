<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Image extends Model
{
    protected $fillable = ['resource_id', 'path', 'main_image', 'order']; 
    
    public function resource()
    {
        return $this->belongsTo(Resource::class, 'resource_id', 'resource_id');
    }
}
