<div id="main">
    <header class="mb-3">
        <a href="#" class="burger-btn d-block d-xl-none">
            <i class="bi bi-justify fs-3"></i>
        </a>
    </header>
    <div class="page-heading">
        <div class="page-title">
            <div class="row">
                <div class="col-12 col-md-6 order-md-1 order-last">
                    <h3>Jobs Offering</h3>
                    <p class="text-subtitle text-muted">Availabe Jobs, Online and Onsite</p>
                </div>
                <div class="col-12 col-md-6 order-md-2 order-first">
                    <nav aria-label="breadcrumb" class="breadcrumb-header float-start float-lg-end">
                        <ol class="breadcrumb">
                            <li class="breadcrumb-item"><a href="{{ route('user.home') }}">Home</a></li>
                            <li class="breadcrumb-item active" aria-current="page">Alumni List</li>
                        </ol>
                    </nav>
                </div>
            </div>
        </div>
        <section class="section">
            <div class="card">
                <div class="card-header">
                Jobs Availabity 
                    @hasrole('admin')
                    <button type="button" class="btn btn-primary float-end" data-bs-toggle="modal" data-bs-target="#addJobsModal">Add Jobs</button>
                    @endrole
                </div>
                <div class="card-body">
                    <table class="table" id="table1">
                    <thead>
                        <tr>
                            <th>Company Name:</th>
                            <th>Description</th>
                            <th>Positions Available</th>
                            <th>Qualifications</th>
                            @hasrole('admin')
                            <th class="text-end">Action</th>
                            @endrole
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($jobs as $job)
                        <tr>
                            <td>{{ $job->company_name }}</td>
                            <td>
                                @if (strpos($job->description, 'http') === 0 || strpos($job->description, 'www.') === 0)
                                    <a href="{{ $job->description }}" target="_blank">{{ $job->description }}</a>
                                @else
                                    {{ $job->description }}
                                @endif
                            </td>
                            <td>{{ $job->positions_available }}</td>
                            <td>{{ $job->qualifications }}</td>
                            @hasrole('admin')
                            <td class="text-end"> 
                                <div class="btn-group" role="group">
                                    <button wire:click="removeJobs({{ $job->id }})" class="btn btn-danger">Remove</button>
                                </div>
                            </td>
                            @endrole
                        </tr>
                        @endforeach
                    </tbody>
                </table>
                </div>
            </div>
        </section>
    <div class="modal fade text-left" id="addJobsModal" tabindex="-1" role="dialog" aria-labelledby="addJobsModalLabel" aria-hidden="true" wire:ignore>
        <div class="modal-dialog modal-dialog-centered modal-dialog-scrollable" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h4 class="modal-title" id="addJobsModalLabel">Add Jobs</h4>
                    <button type="button" class="close" data-bs-dismiss="modal" aria-label="Close">
                        <i data-feather="x"></i>
                    </button>
                </div>
                <form wire:submit.prevent="addJobs">
                    <div class="modal-body">
                        <div class="form-group">
                            <label for="company_name">Company Name:</label>
                            <input type="text" wire:model="company_name" id="company_name" class="form-control">
                        </div>
                        <div class="form-group">
                            <label for="description">Description:</label>
                            <input type="text" wire:model="description" id="description" class="form-control">
                        </div>
                        <div class="form-group">
                            <label for="positions_available">Positions Available:</label>
                            <input type="text" wire:model="positions_available" id="positions_available" class="form-control">
                        </div>
                        <div class="form-group">
                            <label for="qualifications">Qualifications:</label>
                            <input type="text" wire:model="qualifications" id="qualifications" class="form-control">
                        </div>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-light-secondary" data-bs-dismiss="modal">
                            <i class="bx bx-x d-block d-sm-none"></i>
                            <span class="d-none d-sm-block">Close</span>
                        </button>
                        <button type="submit" class="btn btn-primary ml-1">
                            <i class="bx bx-check d-block d-sm-none"></i>
                            <span class="d-none d-sm-block">Add</span>
                        </button>
                    </div>
                </form>

            </div>
        </div>
    </div>

                        

            

