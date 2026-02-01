<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class SiteSetting extends Model
{
    protected $fillable = [
        'site_name',
        'kabupaten_name',
        'site_logo',
        'hero_title',
        'hero_description',
        'hero_image'
    ];
}
