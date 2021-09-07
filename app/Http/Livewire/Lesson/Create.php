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
  public $lesson;

  public $courseId;
  // protected $queryString = ['courseId'];

  protected $rules = [
    'lesson.name' => 'required',
    'lesson.content' => 'required'
  ];

  public function render()
  {
    // $this->lesson = new Lesson();

    // $this->course = Course::where('id', $this->courseId)->first();
    // $this->professor = Professor::where('id', $this->course->professor_id)->first();
    return view('livewire.lesson.create');
  }

  public function mount()
  {
    $this->lesson = new Lesson();
  }

  public function createLesson()
  {
    $this->validate();
    dd($this->lesson);
    $this->lesson->save();
  }
}
