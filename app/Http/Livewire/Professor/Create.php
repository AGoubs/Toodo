<?php

namespace App\Http\Livewire\Professor;

use App\Models\Professor;
use Livewire\Component;
use Livewire\WithFileUploads;

class Create extends Component
{
  use WithFileUploads;
  public $professor;
  public $photo;

  protected $rules = [
    'professor.firstname' => 'required|string',
    'professor.lastname' => 'required|string',
    'photo' => ''
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


    if ($this->photo) {
      $name = md5($this->photo . microtime()) . '.' . $this->photo->extension();
      $this->photo->storeAs('photos', $name);
      $this->professor->photo = $name;
    }
   

    $this->professor->save();
    return redirect()->route('dashboard');
  }
}
