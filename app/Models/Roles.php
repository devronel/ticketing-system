<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Roles extends Model
{
    protected $fillable = [
        'name',
        'permissions',
        'status'
    ];

    protected $casts = [
        'permissions' => 'array'
    ];

    public function getShortPermissionsStringAttribute(): string
    {
        $chunks = [];

        foreach ($this->permissions as $section => $actions) {
            $allowed = array_keys(array_filter($actions));
            if (!empty($allowed)) {
                $chunks[] = $section . ': ' . implode(', ', $allowed);
            }
        }

        return implode(' | ', $chunks);
    }
}
