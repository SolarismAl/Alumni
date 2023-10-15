<?php

namespace App\Http\Livewire;

use Livewire\Component;
use App\Models\User;
use App\Http\Controlllers\Controlllers;
Use Jantinnerezo\LivewireAlert\LivewireAlert;


class UsersWire extends Component
{
    public $users;
    Use LivewireAlert;
    
    public function render()
    {
        $this->users = User::where('approved', false)->where('name', '<>', 'admin')->get();
        return view('livewire.users-wire');
    }

    public function approveUser($userId)
    {
        $user = User::find($userId);
    
        if ($user) {
            $user->update(['approved' => true]);
            $this->alert('success', 'Successfully Approved!');
        } else {
            $this->alert('error', 'Users not Found!');
        }
        $this->render();
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

    public function pendingCount()
    {
        return User::where('approved', false)->where('name', '<>', 'admin')->count();
    }
    
}
