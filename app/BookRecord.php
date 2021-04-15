<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Notifications\Notifiable;


class BookRecord extends Model
{
    use Notifiable;
    //
        protected $fillable = [
            'user',
        'book',
        'took_on',
        'return_on',
        'due_date',
        ];
}
