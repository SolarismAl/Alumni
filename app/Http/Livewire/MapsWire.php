<?php

namespace App\Http\Livewire;

use Livewire\Component;
use App\Models\Profile;

class MapsWire extends Component
{
    public $userLocations;
    
    public function getUserLocations()
    {
      
        // Fetch user profiles that have a location
        $userLocations = Profile::whereNotNull('location')->with('user')->get();    
    
        return $userLocations;
    }
    
    public function render()
    {
        $userLocations = $this->getUserLocations();
    
        return view('livewire.maps-wire', ['userLocations' => $userLocations]);
    }

    public function mount()
    {
        // Fetch user profiles that have a location
        $this->userLocations = Profile::whereNotNull('location')->with('user')->get();
    
        // Log the user locations to the Laravel log
        \Log::info('User Locations:', $this->userLocations->toArray());
    }
    

}
