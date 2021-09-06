<?php

namespace App\Http\Livewire\Lesson;

use App\Models\Course;
use App\Models\Professor;
use Livewire\Component;

class Lesson extends Component
{
  public $professor;
  public $course;
  public $courseId;
  public function render()
  {
    $this->course = Course::where('id', $this->courseId)->first();
    $this->professor = Professor::where('id', $this->course->professor_id)->first();
    // dd($this->course);
    return view('livewire.lesson.lesson');
  }

  public function mount()
  {
  }
}
