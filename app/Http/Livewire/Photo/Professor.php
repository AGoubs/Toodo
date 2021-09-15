<?php

namespace App\Http\Livewire\Photo;

use App\Models\Professor as ModelsProfessor;
use Livewire\Component;

class Professor extends Component
{
  public $professorId;
  public $size;
  public $professor;
  public function render()
  {
    $this->professor = ModelsProfessor::find($this->professorId);
    return view('livewire.photo.professor');
  }
}
