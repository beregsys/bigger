<?php

namespace App\Http\Livewire;

use App\Models\Tactic;
use App\Models\Technique;
use Illuminate\Contracts\View\View;
use Livewire\Component;

class Search extends Component
{
    public string $search = '';


    protected $queryString = ['search' => ['except' => '']];

    public function render(): View
    {
        $tactics = Tactic::query();
        $tactics = $tactics->where('name', 'like', '%'.$this->search.'%')
            ->orWhere('description', 'like', '%'.$this->search.'%')->get();

        $techniques = Technique::query();
        $techniques = $techniques->where('name', 'like', '%'.$this->search.'%')
            ->orWhere('description', 'like', '%'.$this->search.'%')->get();

        return view('livewire.search', compact('tactics', 'techniques'));
    }
}
