<?php

namespace App\Http\Livewire\Professor;

use App\Models\Professor;
use Livewire\Component;

class Read extends Component
{
  public $professor;

  public $professorId;
  protected $queryString = ['professorId'];

  protected $rules = [
    'professor.firstname' => 'required|string',
    'professor.lastname' => 'required|string'
  ];

  public function render()
  {
    return view('livewire.professor.read');
  }

  public function mount()
  {
    $this->professor = Professor::find($this->professorId);
  }


  public function submit()
  {
    $this->validate();
    $this->professor->save();
    session()->flash('success', 'Modification effectuée avec succès !');
  }
}
