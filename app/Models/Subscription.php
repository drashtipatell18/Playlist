<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Subscription extends Model
{
    use HasFactory, SoftDeletes;
    protected $table = 'subscriptions';
    protected $fillable = ['plan_name','duration','description'];

    public function subscriptiom_sell()
    {
        return $this->hasMany(SubscriptionSell::class, 'subscription_id');
    }
}
