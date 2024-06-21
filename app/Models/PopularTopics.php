<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class PopularTopics extends Model
{
    use HasFactory, SoftDeletes;
    protected $table = 'popular_topics';
    protected $fillable = ['category_id','sub_category_id','popular_topics_name'];

    public function category()  
    {
        return $this->belongsTo(Category::class, 'category_id');
    }

    public function subCategory()
    {
        return $this->belongsTo(SubCategory::class, 'sub_category_id');
    }

    public function videos()
    {
        return $this->hasMany(Video::class, 'popular_topic_id');
    }
}
