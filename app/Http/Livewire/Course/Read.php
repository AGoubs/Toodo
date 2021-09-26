<?php

namespace App\Http\Livewire\Course;

use App\Models\Course;
use App\Models\Professor;
use Livewire\Component;

class Read extends Component
{
  public $course;
  public $courseProfessor;
  public $professors;

  public $courseId;
  protected $queryString = ['courseId'];

  protected $rules = [
    'course.name' => 'required|string',
    'course.professor_id' => 'integer'
  ];

  public function render()
  {
    $this->professors = Professor::where('user_id', auth()->id())->get();
    return view('livewire.course.read');
  }

  public function mount()
  {
    $this->course = Course::find($this->courseId);
    if (isset($this->course->professor_id))
      $this->courseProfessor = Professor::find($this->course->professor_id);
  }

  public function update()
  {
    if (isset($this->course->professor_id["value"])) {
      if ($this->course->professor_id["value"] != "") {
        $this->course->professor_id = $this->course->professor_id["value"];
      } else {
        $this->course->professor_id = null;
      }
    }
    $this->validate();
    $this->course->save();
    return redirect()->route('dashboard');
  }
}
