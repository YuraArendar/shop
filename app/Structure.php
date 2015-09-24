<?php

namespace shop;

use Illuminate\Database\Eloquent\Model;
use Kalnoy\Nestedset\Node;

class Structure extends Node
{
    protected $table = 'structure';

    protected $fillable =[
        'alias',
        'parent_id',
        'controller',
        'position'
    ];

    public function structureLang(){
        return $this->hasMany('shop\StructureLang','structure_id');
    }
}
