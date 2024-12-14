<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class TypeResource extends Model
{
    protected $primaryKey = 'type_id';
    protected $fillable = ['resource_id', 'is_image', 'is_pdf'];    

    public function resources()
    {
        return $this->belongsTo(Resource::class, 'resource_id', 'resource_id');
    }
}
