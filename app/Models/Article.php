<?php

namespace App\Models;

use Cviebrock\EloquentSluggable\Sluggable;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Support\Facades\DB;

class Article extends Model
{
    use HasFactory, SoftDeletes, sluggable;

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
        DB::table('articles')->insert([
            'title' => $request->title,
            'description' => $request->description,
        ]);
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