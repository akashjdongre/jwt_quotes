<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Social extends Model
{
    //use SoftDeletes;

    public $table = 'socials';

    protected $dates = [
        'created_at',
        'updated_at',
        'deleted_at',
    ];

    protected $fillable = [
        'quote_id',
        'likes',
        'facebook',
        'twitter',
        'instagram',
        'linkedin',
        'whatsapp',
        'pinterest',
        'total_share',
        'created_at',
        'updated_at',
        'deleted_at',
    ];
}
