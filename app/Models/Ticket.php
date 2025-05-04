<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class Ticket extends Model
{
    protected $fillable = [
        'customer_id',
        'assigned_to',
        'department_id',
        'status_id',
        'priority_id',
        'subject',
        'description',
        'closed_at',
    ];

    public function status(): BelongsTo
    {
        return $this->belongsTo(StatusReference::class, 'status_id', 'id');
    }

    public function priority(): BelongsTo
    {
        return $this->belongsTo(PriorityReference::class, 'priority_id', 'id');
    }

    public function department(): BelongsTo
    {
        return $this->belongsTo(Department::class, 'department_id', 'id');
    }

    public function customer(): BelongsTo
    {
        return $this->belongsTo(User::class, 'customer_id', 'id');
    }

    public function assignTo(): BelongsTo
    {
        return $this->belongsTo(User::class, 'assigned_to', 'id');
    }
}
