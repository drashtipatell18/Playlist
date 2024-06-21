<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class SubscriptionSell extends Model
{
    use HasFactory, SoftDeletes;
    protected $table = 'subscription_sells';
    protected $fillable = ['subscription_id','user_id','validity', 'price', 'payment_id', 'group_id', 'video_id'];

    public function subscription()
    {
        return $this->belongsTo(Subscription::class, 'subscription_id');
    }
    public function user()
    {
        return $this->belongsTo(User::class, 'user_id');
    }
    public function group()
    {
        return $this->belongsTo(VideoGroup::class, 'group_id');
    }
    public function video()
    {
        return $this->belongsTo(Video::class, 'video_id');
    }
}
