<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Portfolio extends Model
{
    use SoftDeletes;

    protected $table = 'portfolio';

    protected $fillable = [
        'title',
        'description',
        'category',
        'image',
        'mobile_image',
        'label',
        'url',
        'sort'
    ];
}
