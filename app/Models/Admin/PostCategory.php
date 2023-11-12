<?php

namespace App\Models\Admin;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Encore\Admin\Traits\ModelTree;
use Illuminate\Database\Eloquent\SoftDeletes;
use App\Models\Admin\Post;

class PostCategory extends Model
{
    use SoftDeletes,ModelTree;

    protected $table = 'post_category';

    protected $fillable = [
        'title',
        'slug',
        'parent_id',
        'description',
        'keywords',
        'sort',
        'size'
    ];

    public function __construct(array $attributes = [])
    {
        parent::__construct($attributes);

        $this->setParentColumn('parent_id');
        $this->setOrderColumn('sort');
        $this->setTitleColumn('title');
    }

    /**
     * 上層分類
     *
     * @return 
     */
    public function parent()
    {
        return $this->belongsTo(PostCategory::class, 'parent_id', 'id');
    }

    /**
     * 下層分類
     *
     * @return 
     */
    public function children()
    {
        return $this->hasMany(PostCategory::class, 'parent_id');
    }

    /**
     * 該分類文章
     *
     * @return 
     */
    public function posts()
    {
        return $this->belongsToMany(Post::class, 'post_to_category', 'category_id', 'post_id');
    }
}
