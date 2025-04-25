<?php

namespace App\Livewire\Admin\StatusReference;

use App\Models\StatusReference;
use Livewire\Component;

class Index extends Component
{

    public $isAddModalOpen = false;

    public $statusReferenceId;
    public $name;
    public $color;

    public function save()
    {
        $this->validate([
            'name' => 'required',
            'color' => 'required',
        ]);
        try {
            $statusReference = StatusReference::updateOrCreate(
                ['id' => $this->statusReferenceId],
                [
                    'name' => $this->name,
                    'color' => $this->color
                ]
            );
            if ($statusReference) {
                $this->resetComponent();
            }
        } catch (\Throwable $th) {
            dd($th->getMessage());
        }
    }

    public function fetchEdit($id)
    {
        try {
            $this->isAddModalOpen = true;
            $statusReference = StatusReference::find($id);
            $this->statusReferenceId = $statusReference->id;
            $this->name = $statusReference->name;
            $this->color = $statusReference->color;
        } catch (\Throwable $th) {
            dd($th->getMessage());
        }
    }

    public function resetComponent()
    {
        $this->reset();
        $this->resetErrorBag();
    }

    public function render()
    {
        return view('livewire.admin.status-reference.index', [
            'statuses' => StatusReference::all()
        ]);
    }
}
