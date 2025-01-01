<?php

namespace App\Models;

use Cviebrock\EloquentSluggable\Sluggable;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Item extends Model
{
    use HasFactory;
    use Sluggable;


protected $fillable = ['name', 'slug', 'category_id', 'description', 'stock', 'image'];


    public function sluggable(): array
    {
        return [
            'slug' => [
                'source' => 'name'
            ]
        ];
    }

    public function getRouteKeyName()
{
    return 'slug';
}

    public function category()
    {
    return $this->belongsTo(Category::class);
    }


    public function logPinjaman()
{
    return $this->hasMany(LogPinjaman::class);
}
}
