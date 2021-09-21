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
    $this->courses = Course::where('user_id', auth()->id())->get();
    $this->professors = Professor::where('user_id', auth()->id())->get();
    $this->nbProfessors = count($this->professors);
    $this->lessons = Lesson::take(5)->orderBy('created_at', 'desc')->where('user_id', auth()->id())->get();
    $this->nbLessons = count($this->lessons);
    $this->nbCourses = count($this->courses);
    return view('livewire.dashboard');
  }

  public function deleteCourse($id)
  {
    Course::find($id)->delete();
    return redirect()->route('dashboard');
  }
}
