<?php

namespace App\Models\Admin;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use Storage;

class Slide extends Model
{
    use SoftDeletes;

    protected $table = 'slide';

    protected $fillable = [
        'title',
        'description',
        'image',
        'mobile_image',
        'label',
        'url',
        'sort'
    ];

}
