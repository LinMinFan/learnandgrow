<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Encore\Admin\Traits\DefaultDatetimeFormat;
use Encore\Admin\Traits\ModelTree;

class SiteMenu extends Model
{
    use DefaultDatetimeFormat;

    use ModelTree {
        ModelTree::boot as treeBoot;
        ModelTree::selectOptions as parentSelectOptions;
    }

    protected $fillable = [
        'parent_id',
        'order',
        'title',
        'uri'
    ];

    
}
