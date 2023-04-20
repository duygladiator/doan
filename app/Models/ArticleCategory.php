<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ArticleCategory extends Model
{
    use HasFactory;

    protected $table = 'article_category';

    protected $fillable = [
        'name', 'slug', 'is_show'
    ];

    public function article()
    {
        return $this->hasMany(Article::class, 'article_category_id');
    }
}