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
    'professor.user_id' => 'required|integer',
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
    $this->professor->user_id = auth()->id();
    $this->validate();


    if ($this->photo) {
      $name = md5($this->photo . microtime()) . '.' . $this->photo->extension();
      $this->photo->storeAs('photos', $name);
      $this->professor->photo = $name;
    }


    $this->professor->save();

    session()->flash('success', 'Professeur ajouté avec succès !');
    return redirect()->to('dashboard');
  }
}
