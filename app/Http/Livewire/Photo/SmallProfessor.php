<?php

namespace App\Http\Livewire\Photo;

use App\Models\Professor;
use Livewire\Component;

class SmallProfessor extends Component
{
  public $professorId;
  public $photo;

  public function render()
  {
    $professor = Professor::find($this->professorId);
    $this->photo = $professor->photo;
    return view('livewire.photo.small-professor');
  }
}
