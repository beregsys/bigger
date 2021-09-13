<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;

class Tactic extends Model
{
    protected $fillable = [
        'mitre_tactic_id',
        'name',
        'slug',
        'description',
        'mitre_created',
        'mitre_modified'
    ];


    public function techniques(): BelongsToMany
    {
        return $this->belongsToMany(Technique::class);
    }
}
