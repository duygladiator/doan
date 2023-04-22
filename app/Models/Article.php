<?php

namespace App\Models;

use Cviebrock\EloquentSluggable\Sluggable;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Article extends Model
{
    use HasFactory, SoftDeletes, Sluggable;

    protected $table = 'article';

    protected $fillable = [
        'title',
        'slug',
        'description',
        'author',
        'is_show',
        'is_approved',
        'article_category_id'
    ];

    public function addArticle($request)
    {
    }

    public function article_category()
    {
        return $this->belongsTo(ArticleCategory::class, 'article_category_id');
    }

    public function sluggable(): array
    {
        return [
            'slug' => [
                'source' => 'title'
            ]
        ];
    }
}
