<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Album extends Model
{
    protected $fillable = [
        'name',
        'description',
        'coverImage'
    ];

    public $rules = [
        'name'=> ['required', 'string', 'max:20'],
        'description'=> ['string','max:255'],
        'coverImage' => [ 'string', 'required']
    ];

    public function images(){
        return $this->hasMany(Image::class);
    }
}
