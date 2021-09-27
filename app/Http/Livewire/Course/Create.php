<?php

namespace App\Http\Livewire\Course;

use App\Models\Course;
use App\Models\Professor;
use Livewire\Component;

class Create extends Component
{
  public $course;
  public $professors;

  protected $rules = [
    'course.name' => 'required|string',
    'course.professor_id' => '',
    'course.user_id' => 'required|integer',
  ];

  public function render()
  {
    $this->professors = Professor::where('user_id', auth()->id())->get();
    return view('livewire.course.create');
  }

  public function mount()
  {
    $this->course = new Course();
  }

  public function submit()
  {
    if (isset($this->course->professor_id["value"]))
      $this->course->professor_id = $this->course->professor_id["value"];
    $this->course->user_id = auth()->id();
    $this->validate();

    $this->course->save();

    session()->flash('success', 'Cours ajouté avec succès !');
    return redirect()->to('dashboard');
  }
}
