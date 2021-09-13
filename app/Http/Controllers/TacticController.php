<?php

namespace App\Http\Controllers;

use App\Models\Tactic;
use Illuminate\Contracts\View\View;

class TacticController extends Controller
{
    public function index(): View
    {
        return view('pages.tactics.index');
    }

    public function show(Tactic $tactic): View
    {
        $tactic->load('techniques');
        return view('pages.tactics.show', compact('tactic'));
    }

}
