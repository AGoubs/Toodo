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
  public $name;
  public $content;

  public $courseId;
  protected $queryString = ['courseId'];


  public function render()
  {
    $this->course = Course::where('id', $this->courseId)->first();
    $this->professor = Professor::where('id', $this->course->professor_id)->first();
    return view('livewire.lesson.create');
  }

  public function mount()
  {
  }

  public function submit()
  {
    Lesson::create([
      'name' => $this->name,
      'content' => $this->content,
      'course_id' =>  $this->courseId,
      'user_id' =>  auth()->id(),
    ]);

    return redirect()->route('lesson.view', ['courseId' => $this->courseId]);
  }
}
