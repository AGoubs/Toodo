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
    'professor.firstname' => '',
    'professor.lastname' => 'required|string'
  ];

  public function render()
  {
    $this->professor = Professor::find($this->professorId);
    return view('livewire.professor.read');
  }

  public function mount()
  {
  }


  public function submit()
  {
    $this->validate();
  }
}
