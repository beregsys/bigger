<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;
use Illuminate\Database\Eloquent\Relations\HasMany;

class Technique extends Model
{
    protected $fillable = [
        'mitre_technique_id',
        'technique_id',
        'name',
        'description',
        'mitre_created',
        'mitre_modified'
    ];

    public function tactics(): BelongsToMany
    {
        return $this->belongsToMany(Tactic::class);
    }

    public function parent(): BelongsTo
    {
        return $this->belongsTo(Technique::class, 'technique_id');
    }

    public function children(): HasMany
    {
        return $this->hasMany(Technique::class);
    }
}
