<?php

namespace App\Http\Resources;

use App\Models\Technique;
use Illuminate\Http\Resources\Json\JsonResource;

/** @mixin Technique */
class TechniqueResource extends JsonResource
{
    public function toArray($request)
    {
        return [
            'id' => $this->id,
            'mitre_technique_id' => $this->mitre_technique_id,
            'name' => $this->name,
            'description' => $this->description,
            'mitre_created' => $this->mitre_created,
            'mitre_modified' => $this->mitre_modified,
            'parent_id' => $this->technique_id,
            'children' => TechniqueResource::collection($this->whenLoaded('children')),
            'parent' => new TechniqueResource($this->whenLoaded('parent')),
            'tactics' => TacticResource::collection($this->whenLoaded('tactics')),
        ];
    }
}
