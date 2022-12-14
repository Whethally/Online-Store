<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Category extends Model
{
    use HasFactory;

    protected $fillable = [
        'parent_id', 
        'name',
    ];

    protected $dates = [
        'created_at',
        'updated_at',
    ];

    public function children()
    {
        return $this->hasMany('App\Models\Category', 'parent_id');
    }
}
