<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;

class News extends Model
{
    use HasFactory;

    protected $table = 'news';

    protected $fillable = [
        'title',
        'author',
        'status',
        'image',
        'description',
    ];

    protected $casts = [
        'category_id' => 'array',
    ];

    //Асессор
//    protected function author(): Attribute
//    {
//        return Attribute::make(
//            get: fn($value): string => strtoupper($value)
//        );
//    }

    public function categories(): BelongsToMany
    {
        return $this->belongsToMany(
            Category::class,
            'category_has_news',
            'news_id',
            'category_id',
        );
    }
}
