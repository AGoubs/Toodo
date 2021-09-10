<?php

namespace App\Http\Livewire\Photo;

use App\Models\Professor as ModelsProfessor;
use Livewire\Component;

class Professor extends Component
{
  public $professorId;
  public $photo;
  public function render()
  {
    $professor = ModelsProfessor::find($this->professorId);
    $this->photo = $professor->photo;
    return view('livewire.photo.professor');
  }
}
