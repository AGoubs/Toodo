<?php

namespace App\Http\Livewire\Lesson;

use App\Models\Course;
use App\Models\Lesson;
use App\Models\Professor;
use Livewire\Component;

class Read extends Component
{
  public $professor;
  public $course;
  public $lesson;

  public $name;
  public $content;

  public $updated = "<i class='fas fa-check text-success'></i> A jour";

  public $courseId;
  public $lessonId;
  protected $queryString = ['courseId', 'lessonId'];

  public function render()
  {
    $this->course = Course::find($this->courseId);
    $this->professor = Professor::find($this->course->professor_id);
    $this->lesson = Lesson::find($this->lessonId);
    $this->name = $this->lesson->name;
    $this->content = $this->lesson->content;
    return view('livewire.lesson.read');
  }

  public function mount()
  {
  }

  public function updateComponent()
  {
    $this->updated = "<i class='fas fa-times text-danger'></i> Pas à jour";
  }

  public function update()
  {
    $this->lesson->name = $this->name;
    $this->lesson->content = $this->content;
    $this->lesson->save();
    $this->updated = "<i class='fas fa-check text-success'></i> A jour";
  }

  public function delete($id)
  {
    Lesson::find($id)->delete();
    session()->flash('success', 'Leçon supprimée avec succès !');
    return redirect()->route('lesson.view', ['courseId' => $this->courseId]);
  }
}
