<?php

namespace App\Http\Livewire;

use Livewire\Component;
use App\Models\Profile;
Use Jantinnerezo\LivewireAlert\LivewireAlert;

class ProfileWire extends Component
{
    Use LivewireAlert;
    public $first_name;
    public $middle_name;
    public $last_name;
    public $gender;
    public $graduation_year;
    public $status;
    public $location;
    public $work;

    public function updateInfo()
    {
        $this->validate([
            'first_name' => 'string',
            'middle_name' => 'nullable|string',
            'last_name' => 'string',
            'gender' => 'in:Male,Female,Rather not to Say',
            'graduation_year' => 'integer',
            'status' => 'in:Employed,Unemployed,Student',
            'location' => 'string',
            'work' => 'string',
        ]);
    
       
        $user = auth()->user();
        $profile = $user->profile;
    
     
        if ($profile === null) {
            $profile = Profile::create([
                'user_id' => $user->id, 
                'first_name' => $this->first_name,
                'middle_name' => $this->middle_name,
                'last_name' => $this->last_name,
                'gender' => $this->gender,
                'graduation_year' => $this->graduation_year,
                'status' => $this->status,
                'location' => $this->location,
                'work' => $this->work,
            ]);
        } else {
         
            $profile->update([
                'first_name' => $this->first_name,
                'middle_name' => $this->middle_name,
                'last_name' => $this->last_name,
                'gender' => $this->gender,
                'graduation_year' => $this->graduation_year,
                'status' => $this->status,
                'location' => $this->location,
                'work' => $this->work,
            ]);
        }
    
        $this->resetFields();
        $this->emit('closeModal');
    
        $this->alert('success', 'Profile information updated successfully!');
    }
    

    private function resetFields()
    {
        $this->first_name = '';
        $this->middle_name = '';
        $this->last_name = '';
        $this->gender = '';
        $this->graduation_year = '';
        $this->status = '';
        $this->location = '';
        $this->work = ''    ;
    }
    
    public function render()
    {
        return view('livewire.profile-wire');
    }
}
