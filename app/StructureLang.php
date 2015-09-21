<?php

namespace shop;

use Illuminate\Database\Eloquent\Model;

class StructureLang extends Model
{
    protected $table='structure_lang';

    protected $fillable = [
        'name',
        'description',
        'language_id'
    ];

    public function structure(){
        return $this->belongsTo('shop\Structure');
    }
}
