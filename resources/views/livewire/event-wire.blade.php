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
                    <h3>Events</h3>
                    <p class="text-subtitle text-muted">All Events and Gatherings</p>
                </div>
                
                <div class="col-12 col-md-6 order-md-2 order-first">
                    <nav aria-label="breadcrumb" class="breadcrumb-header float-start float-lg-end">
                        <ol class="breadcrumb">
                            <li class="breadcrumb-item"><a href="{{ route('user.home') }}">Home</a></li>
                            <li class="breadcrumb-item active" aria-current="page">Agenda</li>
                        </ol>
                    </nav>
                </div>
            </div>
        </div>
        <section class="section">
            <div class="card">
                <div class="card-header">
                Upcoming Events or any Meetings 
                    @hasrole('admin')
                    <button type="button" class="btn btn-primary float-end" data-bs-toggle="modal" data-bs-target="#addEventsModal">Add Events - Agenda</button>
                    @endrole</h4>
                </div>
                <div class="card-body">
                    <table class="table" id="table1">
                    <thead>
                        <tr>
                            <th>Upcoming Events / Gatherings</th>
                            <th>Description</th>
                            <th>When</th>
                            <th>Where</th>
                            @hasrole('admin')
                            <th class="text-end">Action</th>
                            @endrole
                        </tr>
                    </thead>
                    <tbody>
                    @foreach ($events as $event)
                        <tr>
                            <td>{{ $event->event_name }}</td>
                            <td>{{ $event->description }}</td>
                            <td>{{ $event->location }}</td>
                            <td>{{ $event->event_date }}</td>
                            @hasrole('admin')
                            <td class="text-end"> 
                                <div class="btn-group" role="group">
                                    <button wire:click="removeEvents({{ $event->id }})" class="btn btn-danger">Remove</button>
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


    <div class="modal fade text-left" id="addEventsModal" tabindex="-1" role="dialog" aria-labelledby="addEventsModalLabel" aria-hidden="true" wire:ignore>
        <div class="modal-dialog modal-dialog-centered modal-dialog-scrollable" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h4 class="modal-title" id="addEventsModalLabel">Add Jobs</h4>
                    <button type="button" class="close" data-bs-dismiss="modal" aria-label="Close">
                        <i data-feather="x"></i>
                    </button>
                </div>
                <form wire:submit.prevent="addEvents">
                    <div class="modal-body">
                        <div class="form-group">
                            <label for="event_name">Upcoming Events / Gatherings:</label>
                            <input type="text" wire:model="event_name" id="event_name" class="form-control">
                        </div>
                        <div class="form-group">
                            <label for="description">Description:</label>
                            <input type="text" wire:model="description" id="description" class="form-control">
                        </div>
                        <div class="form-group">
                            <label for="location">Where:</label>
                            <input type="text" wire:model="location" id="location" class="form-control">
                        </div>
                        <div class="form-group">
                            <label for="event_date">When:</label>
                            <input type="date" wire:model="event_date" id="event_date" class="form-control">
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
