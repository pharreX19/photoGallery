<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Image extends Model
{
    protected $fillable=[
        'name',
        'image',
        'description'
    ];

    public function album(){
        return $this->belongsTo(Album::class);
    }
}
