<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use App\Models\PostCategory;
use Carbon\Carbon;

class Post extends Model
{

    use SoftDeletes;

    protected $table = 'post';

    protected $fillable = [
        'slug',
        'title',
        'meta_keywords',
        'meta_description',
        'content',
        'image',
        'top',
        'sort',
        'status',
        'published_at'
    ];

    public function categories()
    {
        return $this->belongsToMany(PostCategory::class, 'post_to_category', 'post_id', 'category_id');
    }
}
