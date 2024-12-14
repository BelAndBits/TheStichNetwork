<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Resource extends Model
{
    protected $primaryKey = 'resource_id';
    
    protected $fillable = ['project_id', 'pattern_id', 'is_public'];
    
    public function project()
    {
        return $this->belongsTo(Project::class, 'project_id', 'project_id');
    }

    public function images()
    {
        return $this->hasMany(Image::class, 'resource_id', 'resource_id');
    }

    public function mainImage()
    {
        
        return $this->hasOne(Image::class, 'resource_id', 'resource_id')->where('main_image', true);
    }

    public function pdfFiles()
    {
        return $this->hasMany(PdfFile::class, 'resource_id', 'resource_id');
    }

    public function pattern()
    {
        return $this->belongsTo(Pattern::class, 'pattern_id', 'pattern_id');
    }



}
