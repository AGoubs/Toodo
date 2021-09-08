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
    $this->course = Course::find($this->courseId);
    $this->lessons = LessonModel::where('course_id', $this->courseId)->orderBy('updated_at', 'desc')->get();
    $this->professor = Professor::find($this->course->professor_id);
    return view('livewire.lesson.lesson');
  }

  public function mount()
  {
  }

  public function lessonRead($id)
  {
    return redirect()->route('lesson.read', ['lessonId' => $id, 'courseId' => $this->courseId]);
  }
}
