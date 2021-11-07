<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Blog extends Model
{
    use HasFactory,SoftDeletes;
    
    public $guarded = [];

    public function categories()
    {
        return $this->belongsToMany(Category::class,'blogs_categories',
        'blog_id','category_id');
    }
}
