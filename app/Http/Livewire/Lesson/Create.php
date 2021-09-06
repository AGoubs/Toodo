<?php

namespace App\Http\Livewire\Lesson;

use App\Models\Course;
use App\Models\Lesson;
use App\Models\Professor;
use Livewire\Component;

class Create extends Component
{
  public $professor;
  public $course;
  public $lessons;
  public $courseId;
  protected $queryString = ['courseId'];

  public function render()
  {
    $this->course = Course::where('id', $this->courseId)->first();
    $this->lessons = Lesson::where('course_id', $this->courseId)->get();
    $this->professor = Professor::where('id', $this->course->professor_id)->first();
    return view('livewire.lesson.create');
  }

  public function mount()
  {
  }
}
