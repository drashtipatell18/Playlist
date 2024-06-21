<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Video extends Model
{
    use HasFactory , SoftDeletes;
    protected $table = 'videos';
    protected $fillable = ['category_id','sub_category_id','popular_topic_id','video','video_course_name','price','description','author','perview'];

    public function category()
    {
        return $this->belongsTo(Category::class, 'category_id');
    }

    public function subCategory()
    {
        return $this->belongsTo(SubCategory::class, 'sub_category_id');
    }

    public function popularTopic()
    {
        return $this->belongsTo(PopularTopics::class, 'popular_topic_id');
    }

    public function video_groups()
    {
        return $this->hasMany(VideoGroupJoin::class, 'video_id');
    }
}
