<?php

namespace App\Http\Livewire\Lesson;

use App\Models\Course;
use App\Models\Professor;
use App\Models\Lesson as LessonModel;
use Livewire\Component;

class Lesson extends Component
{
  public $professor;
  public $course;
  public $lessons;
  public $courseId;
  protected $queryString = ['courseId'];

  public function render()
  {
    $this->course = Course::where('id', $this->courseId)->first();
    $this->lessons = LessonModel::where('course_id', $this->courseId)->get();
    $this->professor = Professor::where('id', $this->course->professor_id)->first();
    return view('livewire.lesson.lesson');
  }

  public function mount()
  {
  }
}
