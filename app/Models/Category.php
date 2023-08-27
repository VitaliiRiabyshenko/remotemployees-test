<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Category extends Model
{
    use HasFactory;

    protected $guarded = [];

    public function lots()
    {
        return $this->belongsToMany(Lot::class, 'category_lots', 'category_id');
    }
}
