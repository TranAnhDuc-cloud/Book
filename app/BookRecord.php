<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Notifications\Notifiable;


class BookRecord extends Model
{
    use Notifiable;
    //
        protected $fillable = [
        'user_id',
        'book_id',
        'took_on',
        'returned_on',
        'due_date',
        ];
}
