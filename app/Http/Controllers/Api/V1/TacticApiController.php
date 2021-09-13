<?php

namespace App\Http\Controllers\Api\V1;

use App\Http\Controllers\Controller;
use App\Http\Resources\TacticResource;
use App\Models\Tactic;
use Illuminate\Http\Resources\Json\AnonymousResourceCollection;

class TacticApiController extends Controller
{
    public function index(): AnonymousResourceCollection
    {
        return TacticResource::collection(Tactic::all());
    }
}
