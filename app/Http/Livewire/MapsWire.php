<?php

namespace App\Http\Livewire;

use Livewire\Component;
use App\Models\Profile;

class MapsWire extends Component
{
    public $userLocations;
    
    public function getUserLocations()
    {
        $userLocations = Profile::whereNotNull('location')->whereHas('user')->with('user')->get();
        return $userLocations;
    }
    
    public function render()
    {
        $userLocations = $this->getUserLocations();
    
        return view('livewire.maps-wire', ['userLocations' => $userLocations]);
    }

    public function mount()
    {
        $this->userLocations = Profile::whereNotNull('location')->with('user')->get();
        \Log::info('User Locations:', $this->userLocations->toArray());
    }

}
