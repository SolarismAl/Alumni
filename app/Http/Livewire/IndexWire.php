<?php

namespace App\Http\Livewire;

use Livewire\Component;
use App\Models\Jobs;
use Illuminate\Support\Facades\DB;

class IndexWire extends Component
{

    public function render()
    {
        $approvedWire = app(ApprovedWire::class);
        $usersWire = app(UsersWire::class);
        $approvedCount = $approvedWire->approvedCount();
        $pendingCount = $usersWire->pendingCount();
        $upcomingEventsCount = $this->getCount('events');
        $jobsCount = $this->getJobs('jobs');

        return view('livewire.index-wire', compact('approvedCount', 'pendingCount', 'upcomingEventsCount' , 'jobsCount'));
    }

    public function getCount($tableName)
    {
        $count = DB::table($tableName)
            ->where('event_date', '>', now())
            ->count();

        return $count;
    }

    public function getJobs($tableName)
    {
        $count = DB::table($tableName)
            ->where('company_name', '>', now())
            ->count();

        return $count;
    }
}
