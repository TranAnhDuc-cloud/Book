<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Database\Eloquent\Relations\HasOne;
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
        return $this->belongsToMany(User::class,'book_records','book_id','user_id');
    }
    protected static function booted(){
        static::creating(function($book){
            $book->title = strtoupper($book->title);
        });
    }
}
