<?php

namespace shop;

use Illuminate\Database\Eloquent\Model;

class Language extends Model
{
    protected $table = 'languages';

    protected $fillable = [
        'active',
        'default',
        'name',
        'iso_2',
        'iso_3',
        'abbr',
        'position'
    ];
}
