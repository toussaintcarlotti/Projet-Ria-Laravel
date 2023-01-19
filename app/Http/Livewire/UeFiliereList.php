<?php

namespace App\Http\Livewire;

use App\Models\Filiere;
use Livewire\Component;

class UeFiliereList extends Component
{
    public Filiere $filiere;
    public $ues;

    public $libelle = null;
    public $description = null;
    public function render()
    {
        return view('livewire.ue-filiere-list');
    }

    protected $listeners = ['refreshComponent' => '$refresh'];

    public function submit()
    {
        $this->validate([
            'libelle' => 'required',
            'description' => 'required',
        ]);

        $this->filiere->ues()->create([
            'libelle' => $this->libelle,
            'description' => $this->description,
        ]);
        $this->libelle = null;
        $this->description = null;

        $this->ues = $this->filiere->ues;

        $this->emit('refreshComponent');

        session()->flash('success', 'L\'UE a été ajoutée avec succès.');
    }

    public function delete($id)
    {
        $ue = $this->filiere->ues->find($id);
        $ue->delete();
        $this->ues = $this->filiere->ues;
        $this->emit('refreshComponent');
        session()->flash('success', 'L\'UE a été supprimée avec succès.');
    }


}
