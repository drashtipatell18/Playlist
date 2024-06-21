<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class VideoGroupJoin extends Model
{
    use HasFactory, SoftDeletes;
    protected $table = 'video_group_joins';
    protected $fillable = ['group_id','video_id'];

    public function videos()
    {
        return $this->belongsTo(Video::class, 'video_id');
    }
    public function video_groups()
    {
        return $this->belongsTo(VideoGroup::class, 'group_id');
    }
}
