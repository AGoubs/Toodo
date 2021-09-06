<?php

namespace App\Http\Livewire;

use App\Models\Course;
use App\Models\Lesson;
use Livewire\Component;

class Dashboard extends Component
{
  public $courses;
  public $lessons;
  public $nbLessons;
  public $nbCourses;

  public function render()
  {
    $this->courses = Course::all();
    $this->lessons = Lesson::take(6)->orderBy('created_at', 'desc')->get();
    $this->nbLessons = Lesson::count();
    $this->nbCourses = count($this->courses);
    return view('livewire.dashboard');
  }
}
