<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;

class Roles extends Model
{
    protected $fillable = ['name'];

    protected $with = ['permissions'];

    // public function getShortPermissionsStringAttribute(): string
    // {
    //     $chunks = [];

    //     foreach ($this->permissions as $section => $actions) {
    //         $allowed = array_keys(array_filter($actions));
    //         if (!empty($allowed)) {
    //             $chunks[] = $section . ': ' . implode(', ', $allowed);
    //         }
    //     }

    //     return implode(' | ', $chunks);
    // }

    public function permissions(): BelongsToMany
    {
        return $this->belongsToMany(Permission::class, 'permission_role', 'role_id', 'permission_id');
    }
}
