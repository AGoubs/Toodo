<?php

namespace App\Http\Livewire;

use App\Models\Course;
use App\Models\Lesson;
use Livewire\Component;

class Dashboard extends Component
{
  public $courses;
  public $nbCourses;
  public $lessons;

  public function render()
  {
    $this->courses = Course::all();
    $this->nbCourses = count($this->courses);
    return view('livewire.dashboard');
  }
}
