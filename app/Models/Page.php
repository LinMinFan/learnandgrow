<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Page extends Model
{
    use SoftDeletes;

    protected $table = 'page';

    protected $fillable = [
        'slug',
        'title',
        'meta_keywords',
        'meta_description',
        'content',
        'image',
        'status',
    ];
}
