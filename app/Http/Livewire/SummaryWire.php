<?php

namespace App\Http\Livewire;

use Livewire\Component;
use App\Models\Alumni;
use Jantinnerezo\LivewireAlert\LivewireAlert;

class SummaryWire extends Component
{
    public $alumni; // Define a property to store all alumni data
    public $batchYears; // Define a property to store batch years
    public $selectedBatchYear; // Define a property to store the selected batch year
    public $filteredAlumni; // Define a property to store filtered alumni
    public $maleCount;
    public $femaleCount;
    public $totalAlumniCount;

    public function mount()
    {
        $this->alumni = Alumni::all(); // Retrieve all alumni data
        $this->batchYears = $this->alumni->pluck('graduation_year')->unique(); // Get unique batch years
        $this->selectedBatchYear = ''; // Initialize selected batch year
        $this->calculateTotals();
    }

    public function render()
    {
        $this->filteredAlumni = $this->selectedBatchYear
            ? $this->alumni->where('graduation_year', $this->selectedBatchYear)
            : $this->alumni;

        $this->calculateTotals();

        return view('livewire.summary-wire', [
            'filteredAlumni' => $this->filteredAlumni,
            'maleCount' => $this->maleCount,
            'femaleCount' => $this->femaleCount,
            'totalAlumniCount' => $this->totalAlumniCount,
        ]);
    }

    public function calculateTotals()
    {
        if ($this->selectedBatchYear) {
            $filteredAlumni = $this->alumni->where('graduation_year', $this->selectedBatchYear);
            $this->maleCount = $filteredAlumni->where('gender', 'Male')->count();
            $this->femaleCount = $filteredAlumni->where('gender', 'Female')->count();
            $this->totalAlumniCount = $filteredAlumni->count();
        } else {
            $this->maleCount = $this->alumni->where('gender', 'Male')->count();
            $this->femaleCount = $this->alumni->where('gender', 'Female')->count();
            $this->totalAlumniCount = $this->alumni->count();
        }
    }
}
