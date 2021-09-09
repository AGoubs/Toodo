<?php

namespace App\Http\Livewire\Professor;

use App\Models\Professor;
use Livewire\Component;

class Create extends Component
{
  public $professor;

  protected $rules = [
    'professor.firstname' => 'required|string',
    'professor.lastname' => 'required|string',
  ];

  public function render()
  {
    return view('livewire.professor.create');
  }

  public function mount()
  {
    $this->professor = new Professor();
  }

  public function submit()
  {
    $this->validate();
    $this->professor->save();
    return redirect()->route('dashboard');
  }
}
