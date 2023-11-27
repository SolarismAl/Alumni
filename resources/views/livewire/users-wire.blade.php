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
                            <h3>Unapproved</h3>
                            <p class="text-subtitle text-muted">Pending Request</p>
                        </div>
                        <div class="col-12 col-md-6 order-md-2 order-first">
                            <nav aria-label="breadcrumb" class="breadcrumb-header float-start float-lg-end">
                                <ol class="breadcrumb">
                                    <li class="breadcrumb-item"><a href="{{ route('admin.index') }}">Dashboard</a></li>
                                    <li class="breadcrumb-item active" aria-current="page">Unapproved</li>
                                </ol>
                            </nav>
                        </div>
                    </div>
                </div>
                <section class="section">
                    <div class="card">
                        <div class="card-header">
                            Accept the alumni request
                        </div>
                        <div class="card-body">
                            <table class="table " id="table1">
                            <thead>
                                <tr>
                                    <th>Name</th>
                                    <th>Email</th>
                                    <th class="text-end">Action</th> 
                                </tr>
                            </thead>
                                <tbody>
                                @foreach ($users as $user)
                                    <tr>
                                        <td>{{ $user->name }}</td>
                                        <td>{{ $user->email }}</td>
                                        <td class="text-end">
                                        <div class="btn-group" role="group">
                                            <button wire:click="approveUser({{ $user->id }})" class="btn btn-success">Approve</button>
                                       </div>
                                        <div class="btn-group" role="group">
                                           <button wire:click="deleteUser({{ $user->id }})" class="btn btn-danger">Delete</button>
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