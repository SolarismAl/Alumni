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
                                    <th class="text-end">Action</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($approvedUsers as $user)
                                <tr>
                                    <td>{{ $user->name }}</td>
                                    <td>{{ $user->email }}</td>
                                    <td class="text-end">
                                    <div class="btn-group" role="group">
                                        <button wire:click="viewUser({{ $user->id }})" class="btn btn-success float-start" data-bs-toggle="modal" data-bs-target="#viewUser">View Details</button>
                                        </div>
                                        <div class="btn-group" role="group">
                                             <button wire:click="deleteUser({{ $user->id }})" class="btn btn-danger">Remove</button>
                                        </div>
                                    </td>
                                </tr>
                                @endforeach
                            </tbody>
                        </table>

                        </div>
                    </div>

                </section>
            </div>
            <div class="modal fade text-left" id="viewUser" tabindex="-1" role="dialog" aria-labelledby="viewUserLabel" aria-hidden="true" wire:ignore>
    <div class="modal-dialog modal-dialog-centered modal-dialog-scrollable" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h4 class="modal-title" id="viewUserLabel">User Details</h4>
                <button type="button" class="close" data-bs-dismiss="modal" aria-label="Close">
                    <i data-feather="x"></i>
                </button>
            </div>
            <form>
                <div class="modal-body">
                    @if ($selectedUser)
                        <p><strong>Name:</strong> {{ $selectedUser->name }}</p>
                        <p><strong>Email:</strong> {{ $selectedUser->email }}</p>
                        @if ($selectedUser->profile)
                            <p><strong>First Name:</strong> {{ $selectedUser->profile->first_name }}</p>
                            <p><strong>Middle Name:</strong> {{ $selectedUser->profile->middle_name ?? 'N/A' }}</p>
                            <p><strong>Last Name:</strong> {{ $selectedUser->profile->last_name }}</p>
                            <p><strong>Gender:</strong> {{ $selectedUser->profile->gender }}</p>
                            <p><strong>Graduation Year:</strong> {{ $selectedUser->profile->graduation_year }}</p>
                            <p><strong>Status:</strong> {{ $selectedUser->profile->status }}</p>
                            <p><strong>Location:</strong> {{ $selectedUser->profile->location }}</p>
                            <p><strong>Work:</strong> {{ $selectedUser->profile->work }}</p>
                        @else
                            <p>User profile not available.</p>
                        @endif
                    @endif
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-light-secondary" data-bs-dismiss="modal">
                        <i class="bx bx-x d-block d-sm-none"></i>
                        <span class="d-none d-sm-block">Close</span>
                    </button>
                </div>
            </form>
        </div>
    </div>
</div>
