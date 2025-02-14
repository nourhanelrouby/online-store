<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Cart extends Model
{
    use HasFactory;
    protected $fillable = [
        'user_id',
        'status',
        'opened',
    ];
    public function products()
    {
        return $this->belongsToMany(Product::class,'cart_products')
            ->withPivot(['is_deleted']);
    }
    public function user()
    {
        return $this->belongsTo(User::class,'user_id');
    }
    public function order()
    {
        return $this->hasOne(Order::class,'cart_id');
    }
}
