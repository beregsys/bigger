<?php

namespace App\Http\Controllers\Api\V1;

use App\Http\Controllers\Controller;
use App\Http\Resources\TechniqueResource;
use App\Models\Technique;
use Illuminate\Http\Resources\Json\AnonymousResourceCollection;

class TechniqueApiController extends Controller
{
    public function index(): AnonymousResourceCollection
    {
        return TechniqueResource::collection(Technique::all());
    }

    public function show(Technique $technique): TechniqueResource
    {
        return new TechniqueResource($technique);
    }
}
