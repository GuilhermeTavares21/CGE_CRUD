<?php

namespace App\Http\Livewire;

use Livewire\Component;
use Livewire\WithPagination;
use App\Models\Pensamento;

class PensamentosList extends Component
{
    use WithPagination;

    public $search = '';

    protected $updatesQueryString = ['search'];

    public function updatingSearch()
    {
        $this->resetPage();
    }

    public function render()
    {
        $pensamentos = Pensamento::where('pensamento', 'like', '%' . $this->search . '%')->paginate(10);

        return view('livewire.pensamentos-list', [
            'pensamentos' => $pensamentos,
        ]);
    }
}
