<?php

namespace App\Http\Livewire;

use Livewire\Component;
use App\Models\Jobs;
Use Jantinnerezo\LivewireAlert\LivewireAlert;

class JobsOfferingWire extends Component
{
    Use LivewireAlert;
    public $company_name;
    public $description;
    public $positions_available;
    public $qualifications;

    public function addJobs()
    {
        $this->validate([
            'company_name' => 'required',
            'description' => 'required',
            'positions_available' => 'required',
            'qualifications' => 'required',
        ]);

        Jobs::create([
            'company_name' => $this->company_name,
            'description' => $this->description,
            'positions_available' => $this->positions_available,
            'qualifications' => $this->qualifications,
        ]);
        $this->alert('success', 'Successfully Added!');
        $this->resetFields();
        $this->emit('closeModal');
    }

    public function removeJobs($id)
    {
        $jobs = Jobs::find($id);
        if ($jobs) {
            $jobs->delete();
            $this->alert('success', 'Jobs removed successfully!');
        }
    }

    private function resetFields()
    {
        $this->company_name = '';
        $this->description = '';
        $this->positions_available = '';
        $this->qualifications = '';
    }

public function render()
{
    $jobs = Jobs::all();
    return view('livewire.jobs-offering-wire', compact('jobs'));
}
 
    
}
