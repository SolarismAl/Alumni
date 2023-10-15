<?php

namespace App\Http\Livewire;

use Livewire\Component;
use Spatie\Permission\Models\Permission;
use App\Http\Controlllers\Controlllers;

class PermissionWire extends Component
{
    public function render()
    {
        $permissions = Permission::all();
        return view('livewire.permission-wire', compact('permissions'));
    }
}
