<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Cart extends Model
{
    use HasFactory;

    protected $table = 'carts';
    protected $primaryKey = 'id';

    protected $fillable = [
        'user_id',
        'market_id',
        'quantity',
        'price',
        'status_id',
    ];

    protected $dates = [
        'created_at',
        'updated_at',
    ];

    public function market()
    {
        return $this->belongsTo(Market::class);
    }

    public function user()
    {
        return $this->belongsTo(User::class);
    }

    public function getTotalAttribute()
    {
        return $this->price * $this->quantity;
    }

    // public function getSubtotalAttribute()
    // {
    //     return $this->total;
    // }

    // public function getTaxAttribute()
    // {
    //     return $this->total * 0.2;
    // }
}
