<?php

namespace App\Http\Livewire;

use Livewire\Component;
use Spatie\Permission\Models\Role;
use App\Http\Controlllers\Controlllers;

class RolesWire extends Component
{
    public function render()
    {
        $roles = role::whereNotIn('name', ['admin'])->get();
        return view('livewire.roles-wire', compact('roles'));
    }
}
