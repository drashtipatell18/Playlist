<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class SubCategory extends Model
{
    use HasFactory , SoftDeletes;
    protected $table = 'sub_categories';
    protected $fillable = ['category_id','subcategory_name'];

    public function category()
    {
        return $this->belongsTo(Category::class);
    }

    public function popularTopics()
    {
        return $this->hasMany(PopularTopics::class, 'sub_category_id');
    }

    public function videos()
    {
        return $this->hasMany(Video::class, 'sub_category_id');
    }
}
