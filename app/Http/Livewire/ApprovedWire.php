<?php

namespace App\Http\Livewire;

use Livewire\Component;
use App\Models\User;
use App\Models\Profile;
use App\Http\Controlllers\Controlllers;
Use Jantinnerezo\LivewireAlert\LivewireAlert;

class ApprovedWire extends Component
{
    Use LivewireAlert;
    public $users;
    public $selectedUser;

    public function render()
    {
        $approvedUsers = User::where('approved', true)->where('name', '<>', 'admin')->with('profile')->get();
        return view('livewire.approved-wire', compact('approvedUsers'));
    }
    

    public function deleteUser($userId)
    {
        $users = User::find($userId);
    
        if ($users) {
            $users->delete();
            $this->alert('success', 'Successfully Removed!');
        }
        $this->render();
    }

    public function viewUser($userId)
    {
        $this->selectedUser = User::find($userId);
    
        $this->selectedUser->load('profile');
    }
    
    
    
    public function approvedCount()
    {
        return User::where('approved', true)->where('name', '<>', 'admin')->count();
    }
}
