<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\MorphTo;

class File extends Model
{

    protected $fillable = [
        'file_name',
        'path',
        'fileable_type',
        'fileable_id'
    ];

    public function fileable(): MorphTo
    {
        return $this->morphTo();
    }
}
