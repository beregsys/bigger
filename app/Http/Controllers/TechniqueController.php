<?php

namespace App\Http\Controllers;

use App\Models\Technique;
use Illuminate\Contracts\View\View;

class TechniqueController extends Controller
{
    public function show(Technique $technique): View
    {
        return view('pages.techniques.show', compact('technique'));
    }
}
