<?php

namespace Glorax\FilamentRedirect\Models;

use Illuminate\Database\Eloquent\Model;

class Redirect extends Model
{
    protected $fillable = [
        'from_url',
        'to_url',
        'code',
        'active_flg',
        'tags',
    ];

    protected $casts = [
        'active_flg' => 'boolean',
        'tags' => 'array'
    ];
}