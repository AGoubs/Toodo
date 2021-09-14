<?php

namespace App\Http\Livewire\Components;

use App\Models\Event;
use Livewire\Component;

class Calendar extends Component
{
  public $events;

  public function render()
  {
    $events = Event::select('id', 'title', 'start')->get();

    $this->events = json_encode($events);

    return view('livewire.components.calendar');
  }

  public function getevent()
  {
    $events = Event::select('id', 'title', 'start')->get();

    return  json_encode($events);
  }

  /**
   * Write code on Method
   *
   * @return response()
   */
  public function addevent($event)
  {
    $input['title'] = $event['title'];
    $input['start'] = $event['start'];
    Event::create($input);
  }

  /**
   * Write code on Method
   *
   * @return response()
   */
  public function eventDrop($event, $oldEvent)
  {
    dd($event);
    $eventdata = Event::find($event['id']);
    $eventdata->start = $event['start'];
    $eventdata->save();
  }
}
