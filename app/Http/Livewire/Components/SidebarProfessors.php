<?php

namespace App\Http\Livewire\Components;

use App\Models\Professor;
use Livewire\Component;

class SidebarProfessors extends Component
{
  public $professors;
  public function render()
  {
    $this->professors = Professor::where('user_id', auth()->id())->get();
    return view('livewire.components.sidebar-professors');
  }
}
