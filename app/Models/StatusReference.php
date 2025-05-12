<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;

class StatusReference extends Model
{
    protected $fillable = [
        'name',
        'color'
    ];

    public function tickets(): HasMany
    {
        return $this->hasMany(Ticket::class, 'status_id', 'id');
    }
}
