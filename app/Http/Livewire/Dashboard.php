<?php

namespace App\Http\Livewire;

use App\Models\Course;
use App\Models\Lesson;
use App\Models\Professor;
use Livewire\Component;

class Dashboard extends Component
{
  public $courses;
  public $lessons;
  public $nbLessons;
  public $professors;
  public $nbProfessors;
  public $nbCourses;

  public function render()
  {
    $this->courses = Course::all();
    $this->professors = Professor::all();
    $this->nbProfessors = Professor::count();
    $this->lessons = Lesson::take(5)->orderBy('created_at', 'desc')->get();
    $this->nbLessons = Lesson::count();
    $this->nbCourses = count($this->courses);
    return view('livewire.dashboard');
  }
}
