<?php

namespace App\Http\Livewire;

use Livewire\Component;
use App\Models\User;
use App\Models\Profile;
use Jantinnerezo\LivewireAlert\LivewireAlert;

class ApprovedWire extends Component
{
    use LivewireAlert;

    public $approvedUsers;
    public $selectedUserProfile;
    public $profile;


    public function deleteUser($userId)
    {
        $user = User::find($userId);

        if ($user) {
            $user->delete();
            $this->alert('success', 'Successfully Removed!');
        }
    }

    public function render()
    {
        $this->approvedUsers = User::where('approved', true)
            ->where('name', '<>', 'admin')
            ->with('profile')
            ->get();

        return view('livewire.approved-wire', ['profile' => $this->profile]);
    }
    
    public function showUserProfile($userId)
    {
        $user = User::find($userId);
        $this->selectedUserProfile = $user->profile;
    }
    

    public function approvedCount()
    {
        return User::where('approved', true)->where('name', '<>', 'admin')->count();

    }
}
