<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Notifications\Notifiable;


class Book extends Model
{
    use Notifiable;
    //
    protected $fillable = [
        //
        'title',
        'author',
        'description',
        'image',
        'available',
        'ISBN',
    ];

    public function users(){
        return $this->belongsToMany(User::class);
    }
}
