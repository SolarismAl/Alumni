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
    public $maleCount;
    public $femaleCount;
    public $employedCount;
    public $unemployedCount;
    public $studentCount;
    public $graduationYearCounts;


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

        $this->calculateSummary();

        return view('livewire.approved-wire', [
            'profile' => $this->profile,
            'maleCount' => $this->maleCount,
            'femaleCount' => $this->femaleCount,
            'employedCount' => $this->employedCount,
            'unemployedCount' => $this->unemployedCount,
            'studentCount' => $this->studentCount,
            'graduationYearCounts' => $this->graduationYearCounts,
        ]);
    }
    
    public function showUserProfile($userId)
    {
        $user = User::find($userId);
        $this->selectedUserProfile = $user->profile;
    }

    public function calculateSummary()
    {
        $this->maleCount = $this->approvedUsers->where('profile.gender', 'Male')->count();
        $this->femaleCount = $this->approvedUsers->where('profile.gender', 'Female')->count();
        $this->employedCount = $this->approvedUsers->where('profile.status', 'Employed')->count();
        $this->unemployedCount = $this->approvedUsers->where('profile.status', 'Unemployed')->count();
        $this->studentCount = $this->approvedUsers->where('profile.status', 'Student')->count();

        $this->graduationYearCounts = $this->approvedUsers
            ->groupBy('profile.graduation_year')
            ->mapWithKeys(function ($users, $year) {
                return [$year => count($users)];
            });
    }
    

    public function approvedCount()
    {
        return User::where('approved', true)->where('name', '<>', 'admin')->count();

    }
}
