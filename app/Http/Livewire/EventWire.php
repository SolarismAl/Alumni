<?php

namespace App\Http\Livewire;

use Livewire\Component;
use App\Models\Events;
Use Jantinnerezo\LivewireAlert\LivewireAlert;

class EventWire extends Component
{
    Use LivewireAlert;
    public $event_name;
    public $description;
    public $location;
    public $event_date;

    public function addEvents()
    {
       
        Events::create([
            'event_name' => $this->event_name,
            'description' => $this->description,
            'location' => $this->location,
            'event_date' => $this->event_date,
        ]);
    
        $this->alert('success', 'Upcoming Events Added!');
        $this->resetForm();
    
    }

    public function removeEvents($id)
    {
       
        $event = Events::find($id);
        if ($event) {
            $event->delete();
            $this->alert('success', 'Event removed successfully!');
        }
    }
    
    private function resetForm()
    {
        $this->event_name = '';
        $this->description = '';
        $this->location = '';
        $this->event_date = '';
    }
    
    public function render()
    {
        $event = events::all();
        return view('livewire.event-wire', ['events' => $event]);
    }
}
