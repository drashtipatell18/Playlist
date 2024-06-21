<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class VideoGroup extends Model
{
    use HasFactory, SoftDeletes;
    protected $table = 'video_groups';
    protected $fillable = ['group_name','image', 'price'];

    public function videos()
    {
        return $this->hasMany(VideoGroupJoin::class, 'group_id');
    }
    public function subscriptiom_sell()
    {
        return $this->hasMany(SubscriptionSell::class, 'subscription_id');
    }
}
