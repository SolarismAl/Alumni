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
                    <h3>Alumni List</h3>
                    <p class="text-subtitle text-muted">By Batch - Year Graduated</p>
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
                    Accept the alumni request
                    @hasrole('admin')
                    <button type="button" class="btn btn-primary float-end" data-bs-toggle="modal" data-bs-target="#addAlumniModal">Add Alumni</button>
                    @endrole
                </div>
                <div class="card-body">
                    <table class="table" id="table1">
                    <thead>
                        <tr>
                            <th>Name</th>
                            <th>Gender</th>
                            <th>Year Graduated</th>
                            <th>Place</th>
                            @hasrole('admin')
                            <th class="text-end">Action</th>
                            @endrole
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($alumni as $alumnis)
                        <tr>
                            <td>{{ $alumnis->first_name }} {{ $alumnis->middle_name }} {{ $alumnis->last_name }}</td>
                            <td>{{ $alumnis->gender }}</td>
                            <td>{{ $alumnis->graduation_year }}</td>
                            <td>{{ $alumnis->place }}</td>
                            @hasrole('admin')
                            <td class="text-end"> 
                                <div class="btn-group" role="group">
                                    <button wire:click="openEditModal({{ $alumnis->id }})" class="btn btn-success" data-bs-toggle="modal" data-bs-target="#editModal">Edit</button>
                                </div>
                                <div class="btn-group" role="group">
                                    <button wire:click="removeAlumni({{ $alumnis->id }})" class="btn btn-danger">Remove</button>
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
            <div class="modal fade text-left" id="addAlumniModal" tabindex="-1" role="dialog" aria-labelledby="addAlumniModalLabel" aria-hidden="true" wire:ignore>
                <div class="modal-dialog modal-dialog-centered modal-dialog-scrollable" role="document">
                    <div class="modal-content">
                        <div class="modal-header">
                            <h4 class="modal-title" id="addAlumniModalLabel">Add Alumni</h4>
                            <button type="button" class="close" data-bs-dismiss="modal" aria-label="Close">
                                <i data-feather="x"></i>
                            </button>
                        </div>
                        <form wire:submit.prevent="addAlumni">
                        <div class="modal-body">
                            <div class="form-group">
                                <label for="first_name">First Name:</label>
                                <input type="text" wire:model="first_name" id="first_name" class="form-control">
                            </div>
                            <div class="form-group">
                                <label for="middle_name">Middle Name:</label>
                                <input type="text" wire:model="middle_name" id="middle_name" class="form-control">
                            </div>
                            <div class="form-group">
                                <label for="last_name">Last Name:</label>
                                <input type="text" wire:model="last_name" id="last_name" class="form-control">
                            </div>
                            <div class="form-group">
                                <label for="gender">Gender:</label>
                                <select wire:model="gender" id="gender" class="form-control">
                                    <option value="">Select Gender</option>
                                    <option value="Male">Male</option>
                                    <option value="Female">Female</option>
                                    <option value="Other">Other</option>
                                </select>
                            </div>
                            <div class="form-group">
                                <label for="graduation_year">Graduation Year:</label>
                                <select wire:model="graduation_year" id="graduation_year" class="form-control">
                                    <option value="">Select Graduation Year</option>
                                    @php
                                        $currentYear = date('Y');
                                        $startYear = 1976;
                                    @endphp
                                    @for ($year = $currentYear; $year >= $startYear; $year--)
                                        <option value="{{ $year }}">{{ $year }}</option>
                                    @endfor
                                </select>
                            </div>
                            <div class="form-group">
                                <label for="place">Place:</label>
                                <input type="text" wire:model="place" id="place" class="form-control">
                            </div>
                        </div>
                        <div class="modal-footer">
                            <button type="button" class="btn btn-light-secondary" data-bs-dismiss="modal">
                                <i class="bx bx-x d-block d-sm-none"></i>
                                <span class="d-none d-sm-block">Close</span>
                            </button>
                            <button type="submit" class="btn btn-primary ml-1">
                                <i class="bx bx-check d-block d-sm-none"></i>
                                <span class="d-none d-sm-block">Submit</span>
                            </button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
        <div class="modal fade text-left" id="editModal" tabindex="-1" role="dialog" aria-labelledby="editModalLabel" aria-hidden="true" wire:ignore>
            <div class="modal-dialog modal-dialog-centered modal-dialog-scrollable" role="document">
                <div class="modal-content">
                    <div class="modal-header">
                        <h4 class="modal-title" id="editModalLabel">Edit Alumni</h4>
                        <button type="button" class="close" data-bs-dismiss="modal" aria-label="Close">
                            <i data-feather="x"></i>
                        </button>
                    </div>
                    <form wire:submit.prevent="updateAlumni">
                        <div class="modal-body">
                            <div class="form-group">
                                <label for="edit_first_name">First Name:</label>
                                <input type="text" wire:model="first_name" id="edit_first_name" class="form-control">
                            </div>
                            <div class="form-group">
                                <label for="edit_middle_name">Middle Name:</label>
                                <input type="text" wire:model="middle_name" id="edit_middle_name" class="form-control">
                            </div>
                            <div class="form-group">
                                <label for="edit_last_name">Last Name:</label>
                                <input type="text" wire:model="last_name" id="edit_last_name" class="form-control">
                            </div>
                            <div class="form-group">
                                <label for="edit_gender">Gender:</label>
                                <select wire:model="gender" id="edit_gender" class="form-control">
                                    <option value="">Select Gender</option>
                                    <option value="Male">Male</option>
                                    <option value="Female">Female</option>
                                    <option value="Other">Other</option>
                                </select>
                            </div>
                            <div class="form-group">
                                <label for="edit_graduation_year">Graduation Year:</label>
                                <select wire:model="graduation_year" id="edit_graduation_year" class="form-control">
                                    <option value="">Select Graduation Year</option>
                                    @php
                                        $currentYear = date('Y');
                                        $startYear = 1976;
                                    @endphp
                                    @for ($year = $currentYear; $year >= $startYear; $year--)
                                        <option value="{{ $year }}">{{ $year }}</option>
                                    @endfor
                                </select>
                            </div>
                            <div class="form-group">
                                <label for="edit_place">Place:</label>
                                <input type="text" wire:model="place" id="edit_place" class="form-control">
                            </div>
                        </div>
                        <div class="modal-footer">
                            <button type="button" class="btn btn-light-secondary" data-bs-dismiss="modal">
                                <i class="bx bx-x d-block d-sm-none"></i>
                                <span class="d-none d-sm-block">Close</span>
                            </button>
                            <button type="submit" class="btn btn-primary ml-1">
                                <i class="bx bx-check d-block d-sm-none"></i>
                                <span class="d-none d-sm-block">Update</span>
                            </button>
                        </div>
                    </form>
                </div>
            </div>
        </div>



                        

            

