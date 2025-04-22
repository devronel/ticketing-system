<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class StatusReference extends Model
{
    protected $fillable = [
        'name',
        'color'
    ];
}
