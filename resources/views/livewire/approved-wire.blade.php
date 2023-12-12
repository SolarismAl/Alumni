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
                            <h3>Approved</h3>
                            <p class="text-subtitle text-muted">Modify Users</p>
                        </div>
                        <div class="col-12 col-md-6 order-md-2 order-first">
                            <nav aria-label="breadcrumb" class="breadcrumb-header float-start float-lg-end">
                                <ol class="breadcrumb">
                                    <li class="breadcrumb-item"><a href="{{ route('admin.index') }}">Dashboard</a></li>
                                    <li class="breadcrumb-item active" aria-current="page">Approved</li>
                                </ol>
                            </nav>
                        </div>
                    </div>
                </div>
                <section class="section">
                    <div class="card">
                        <div class="card-header">
                            All Approved Request
                        </div>
                        <div class="card-body">
                        <table class="table" id="table1">
                            <thead>
                                <tr>
                                    <th>Name</th>
                                    <th>Email</th>
                                    <th>Action</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($approvedUsers as $user)
                                    <tr>
                                        <td>{{ $user->name }}</td>
                                        <td>{{ $user->email }}</td>
                                        <td>
                                            <button wire:click="showUserProfile({{ $user->id }})" type="button" class="btn btn-info" data-bs-toggle="modal" data-bs-target="#userProfileModal">View Profile</button>
                                            <button wire:click="deleteUser({{ $user->id }})" class="btn btn-danger">Remove</button>
                                        </td>
                                    </tr>
                                @endforeach
                            </tbody>
                        </table>
                    </div>
                </section>
                <section class="section">
                    <div class="card">
                        <div class="card-header">
                            Summary of All Users
                        </div>
                        <div class="card-body">
                            <div class="row">
                                <div class="col-md-6">
                                    <h5>Gender Distribution</h5>
                                    <table class="table">
                                        <thead>
                                            <tr>
                                                <th>Gender</th>
                                                <th>Count</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            <tr>
                                                <td>Male</td>
                                                <td>{{ $maleCount }}</td>
                                            </tr>
                                            <tr>
                                                <td>Female</td>
                                                <td>{{ $femaleCount }}</td>
                                            </tr>
                                        </tbody>
                                    </table>
                                </div>
                                <div class="col-md-6">
                                    <h5>Status Distribution</h5>
                                    <table class="table">
                                        <thead>
                                            <tr>
                                                <th>Status</th>
                                                <th>Count</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            <tr>
                                                <td>Employed</td>
                                                <td>{{ $employedCount }}</td>
                                            </tr>
                                            <tr>
                                                <td>Unemployed</td>
                                                <td>{{ $unemployedCount }}</td>
                                            </tr>
                                            <tr>
                                                <td>Student</td>
                                                <td>{{ $studentCount }}</td>
                                            </tr>
                                        </tbody>
                                    </table>
                                </div>
                            </div>

                            <div class="mt-4">
                        <h5>Graduation Year Distribution</h5>
                        <table class="table">
                            <thead>
                                <tr>
                                    <th>Year</th>
                                    <th>Count</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($graduationYearCounts as $year => $count)
                                    <tr>
                                        <td>{{ $year ?: 'User does not provide' }}</td>
                                        <td>{{ $count }}</td>
                                    </tr>
                                @endforeach
                            </tbody>
                        </table>
                    </div>

                        </div>
                    </div>
                </section>

            </div>
            <div class="modal fade" id="userProfileModal" tabindex="-1" role="dialog" aria-labelledby="userProfileModalLabel" aria-hidden="true" wire:ignore.self>
                <div class="modal-dialog modal-dialog-centered modal-dialog-scrollable" role="document">
                    <div class="modal-content">
                        <div class="modal-header">
                            <h5 class="modal-title" id="userProfileModalLabel">User Profile Information</h5>
                        </div>
                        <div class="modal-body">
                            @if($selectedUserProfile)
                                <p><strong>First Name:</strong> {{ $selectedUserProfile->first_name ?? '' }}</p>
                                <p><strong>Middle Name:</strong> {{ $selectedUserProfile->middle_name ?? '' }}</p>
                                <p><strong>Last Name:</strong> {{ $selectedUserProfile->last_name ?? '' }}</p>
                                <p><strong>Gender:</strong> {{ $selectedUserProfile->gender ?? '' }}</p>
                                <p><strong>Graduation Year:</strong> {{ $selectedUserProfile->graduation_year ?? '' }}</p>
                                <p><strong>Status:</strong> {{ $selectedUserProfile->status ?? '' }}</p>
                                <p><strong>Location:</strong> {{ $selectedUserProfile->location ?? '' }}</p>
                                <p><strong>Work:</strong> {{ $selectedUserProfile->work ?? '' }}</p>
                            @else
                                <p>No data available.</p>
                            @endif
                        </div>  
                        <div class="modal-footer">
                                <button type="button" class="btn btn-light-secondary" data-bs-dismiss="modal">
                                    <i class="bx bx-x d-block d-sm-none"></i>
                                    <span class="d-none d-sm-block">Close</span>
                                </button>
                            </div>
                    </div>
                </div>
            </div>
</div>

