<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Category extends Model
{
    use HasFactory, SoftDeletes;

    protected $table = 'categories';
    protected $fillable = ['category_name'];

    public function videos()
    {
        return $this->hasMany(Video::class, 'category_id');
    }
    
    public function subcategories()
    {
        return $this->hasMany(SubCategory::class);
    }

    public function popularTopics()
    {
        return $this->hasMany(PopularTopics::class, 'category_id');
    }
}
