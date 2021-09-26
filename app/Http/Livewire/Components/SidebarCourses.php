<?php

namespace App\Http\Livewire\Components;

use App\Models\Course;
use Livewire\Component;

class SidebarCourses extends Component
{
  public $courses;
  public function render()
  {
    $this->courses = Course::where('user_id', auth()->id())->get();
    return view('livewire.components.sidebar-courses');
  }
}
