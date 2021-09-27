<?php

namespace App\Http\Livewire\Professor;

use App\Models\Professor;
use Livewire\Component;
use Livewire\WithFileUploads;

class Read extends Component
{
  use WithFileUploads;

  public $professor;
  public $photo;

  public $professorId;
  protected $queryString = ['professorId'];

  protected $rules = [
    'professor.firstname' => 'required|string',
    'professor.lastname' => 'required|string',
    'photo' => ''
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

    if ($this->photo) {
      $name = md5($this->photo . microtime()) . '.' . $this->photo->extension();
      $this->photo->storeAs('photos', $name);
      $this->professor->photo = $name;
    }

    $this->professor->save();
    session()->flash('success', 'Modification effectuée avec succès !');
    return redirect()->to('dashboard');
  }

  public function delete($id)
  {
    Professor::find($id)->delete();

    session()->flash('success', 'Professeur supprimé avec succès !');
    return redirect()->to('dashboard');
  }
}
