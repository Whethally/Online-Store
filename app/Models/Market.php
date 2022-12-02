<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Notifications\Notifiable;
use Laravel\Sanctum\HasApiTokens;

class Market extends Model
{
    use HasApiTokens, HasFactory, Notifiable;

    protected $table = 'market';
    protected $primaryKey = 'id';
    protected $fillable = [
        'name',
        'description',
        'price',
        'image',
        'published',
        'user_id',
        'category_id',
        'amount',
    ];

    protected $casts = [
        'published' => 'boolean',
    ];

    protected $dates = [
        'published_at',
        'created_at',
        'updated_at',
    ];

    public function category()
    {
        return $this->belongsTo(Category::class);
    }
}
