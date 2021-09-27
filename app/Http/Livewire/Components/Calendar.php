<?php

namespace App\Http\Livewire\Components;

use App\Models\Event;
use Livewire\Component;

class Calendar extends Component
{
  public $events;
  public $height;

  public function render()
  {
    $events = Event::select('id', 'title', 'start')->where('user_id', auth()->id())->get();

    $this->events = json_encode($events);

    return view('livewire.components.calendar');
  }

  public function getevent()
  {
    $events = Event::select('id', 'title', 'start')->where('user_id', auth()->id())->get();

    return  json_encode($events);
  }

  public function addevent($event)
  {
    $input['title'] = $event['title'];
    $input['start'] = $event['start'];
    $input['user_id'] = auth()->id();
    // dd($input);
    $newEvent = Event::create($input);
    return $newEvent->id;
  }

  public function deleteEvent($event)
  {
    Event::find($event['id'])->delete();
  }

  public function eventDrop($event, $oldEvent)
  {
    $eventdata = Event::find($event['id']);
    $eventdata->start = $event['start'];
    $eventdata->save();
  }
}
