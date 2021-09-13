<?php

namespace App\Http\ViewComposers;

use App\Models\Tactic;
use Illuminate\Database\Eloquent\Collection;
use Illuminate\View\View;

class SidebarMenuViewComposer
{
    protected Collection $tactics;

    public function __construct()
    {
        $this->tactics = Tactic::all();
    }
    public function compose(View $view)
    {
        $view->with('tactics', $this->tactics);
    }
}
