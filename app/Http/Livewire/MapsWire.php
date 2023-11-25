<?php

namespace App\Http\Livewire;

use Livewire\Component;
use App\Models\Profile;


class MapsWire extends Component
{
    public function getUserLocations()
    {
        // Fetch user profiles that have a location
        $userLocations = Profile::whereNotNull('location')->with('user')->get();    
    
        return $userLocations;
    }
    

    public function render()
    {
        $userLocations = $this->getUserLocations();
    
        return view('livewire.maps-wire', compact('userLocations'));
    }
    
}