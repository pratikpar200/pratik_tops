<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Gallery extends Model
{
    // The table name is gallery as specified by user
    protected $table = 'gallery';

    protected $fillable = [
        'title',
        'image'
    ];
}
