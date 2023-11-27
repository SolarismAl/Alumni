<?php

namespace App\Http\Livewire;

use Livewire\Component;
use App\Models\Alumni;
Use Jantinnerezo\LivewireAlert\LivewireAlert;


class AlumniListWire extends Component
{
    Use LivewireAlert;
    public $first_name;
    public $middle_name;
    public $last_name;
    public $gender;
    public $graduation_year;
    public $place;
    public $editAlumniId;
 

    public function render()
    {
        
        $alumni = Alumni::all();

        return view('livewire.alumni-list-wire', ['alumni' => $alumni]);
    }

    public function addAlumni()
    {
      
        $this->validate([
            'first_name' => 'required',
            'last_name' => 'required',
            'gender' => 'required',
            'graduation_year' => 'required',
            'place' => 'required',
        ]);

       
        Alumni::create([
            'first_name' => $this->first_name,
            'middle_name' => $this->middle_name,
            'last_name' => $this->last_name,
            'gender' => $this->gender,
            'graduation_year' => $this->graduation_year,
            'place' => $this->place,
        ]);
        $this->alert('success', 'Successfully Added!');
      
        $this->resetFields();

        
        $this->emit('closeModal');

       
    }


    public function removeAlumni($id)
    {
        
        $alumni = Alumni::find($id);
        if ($alumni) {
            $alumni->delete();
            $this->alert('success', 'Alumni removed successfully!');
        }
    }


    
public function openEditModal($id)
{
    $alumni = Alumni::find($id);

    // Check if the alumni record exists before opening the modal
    if ($alumni) {
        $this->editAlumniId = $id;
        $this->first_name = $alumni->first_name;
        $this->middle_name = $alumni->middle_name;
        $this->last_name = $alumni->last_name;
        $this->gender = $alumni->gender;
        $this->graduation_year = $alumni->graduation_year;
        $this->place = $alumni->place;
        $this->emit('showEditModal');
    }
}

public function updateAlumni()
{
    // Validate the form fields if needed
    $this->validate([
        'first_name' => 'required',
        'last_name' => 'required',
        'gender' => 'required',
        'graduation_year' => 'required',
        'place' => 'required',
    ]);

    // Find the alumni record by ID
    $alumni = Alumni::find($this->editAlumniId);

    if ($alumni) {
        // Update the alumni record with the edited data
        $alumni->update([
            'first_name' => $this->first_name,
            'middle_name' => $this->middle_name,
            'last_name' => $this->last_name,
            'gender' => $this->gender,
            'graduation_year' => $this->graduation_year,
            'place' => $this->place,
        ]);

        // Clear the form fields and editAlumniId
        $this->resetFields();
        $this->editAlumniId = null;

        // Close the modal
        $this->emit('closeEditModal');

        // Optionally, you can display a success message or perform other actions.
        $this->alert('success', 'Alumni updated successfully!');
    }
}
    private function resetFields()
    {
        $this->first_name = '';
        $this->middle_name = '';
        $this->last_name = '';
        $this->gender = '';
        $this->graduation_year = '';
        $this->place = '';
    }
}