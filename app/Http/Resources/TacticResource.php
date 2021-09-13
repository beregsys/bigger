<?php

namespace App\Http\Resources;

use App\Models\Tactic;
use Illuminate\Http\Resources\Json\JsonResource;

/** @mixin Tactic */
class TacticResource extends JsonResource
{
    public function toArray($request)
    {
        return [
            'id' => $this->id,
            'mitre_tactic_id' => $this->mitre_tactic_id,
            'name' => $this->name,
            'slug' => $this->slug,
            'description' => $this->description,
            'mitre_created' => $this->mitre_created,
            'mitre_modified' => $this->mitre_modified,
        ];
    }
}
