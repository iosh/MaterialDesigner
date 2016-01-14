<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class MaterialOption extends Model
{
    //
    protected $fillable=[
        'material_id',
        'name',
        'image',
    ];
}
