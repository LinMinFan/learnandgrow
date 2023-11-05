<?php

namespace App\Models\Admin;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Site extends Model
{
    use HasFactory;

    protected $table = 'site';

    protected $fillable = [
        'title',
        'keywords',
        'description',
        'google_ga4',
        'google_gtag',
        'copyright',
        'email',
        'favicon',
        'logo',
        'og_image',
    ];

}
