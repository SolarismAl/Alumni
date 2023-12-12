<div id="main">
    <header class="mb-3">
        <a href="#" class="burger-btn d-block d-xl-none">
            <i class="bi bi-justify fs-3"></i>
        </a>
    </header>
    <div class="page-heading">
        <h3>Alumni Statistics</h3>
    </div>
    <div class="page-content">
        <section class="row">
            <div class="col-6 col-lg-3 col-md-6">
                <a href="{{ route('admin.approved') }}">
                    <div class="card">
                        <div class="card-body px-3 py-4-5">
                            <div class="row">
                                <div class="col-md-4">
                                    <div class="stats-icon purple">
                                        <i class="iconly-boldShow"></i>
                                    </div>
                                </div>
                                <div class="col-md-8">
                                    <h6 class="text-muted font-semibold">Approved Request</h6>
                                    <h6 class="font-extrabold mb-0">{{ $approvedCount }}</h6>
                                </div>
                            </div>
                        </div>
                    </div>
                </a>
            </div>
            <div class="col-6 col-lg-3 col-md-6">
                <a href="{{ route('admin.user') }}">
                    <div class="card">
                        <div class="card-body px-3 py-4-5">
                            <div class="row">
                                <div class="col-md-4">
                                    <div class="stats-icon blue">
                                        <i class="iconly-boldAdd-User"></i>
                                    </div>
                                </div>   
                                <div class="col-md-8">
                                    <h6 class="text-muted font-semibold">Pending Request</h6>
                                    <h6 class="font-extrabold mb-0">{{ $pendingCount }}</h6>
                                </div>
                            </div>
                        </div>
                    </div>
                </a>
            </div>
            <div class="col-6 col-lg-3 col-md-6">
                <a href="{{ route('user.event') }}">
                    <div class="card">
                        <div class="card-body px-3 py-4-5">
                            <div class="row">
                                <div class="col-md-4">
                                    <div class="stats-icon green">
                                        <i class="iconly-boldProfile "></i>
                                    </div>
                                </div>
                                <div class="col-md-8">
                                    <h6 class="text-muted font-semibold">Upcoming Events</h6>
                                    <h6 class="font-extrabold mb-0">{{ $upcomingEventsCount }}
                                    </h6>
                                </div>
                            </div>
                        </div>
                    </div>
                </a>
            </div>
            <div class="col-6 col-lg-3 col-md-6">
                <a href="{{ route('user.jobs-offering') }}">
                    <div class="card">
                        <div class="card-body px-3 py-4-5">
                            <div class="row">
                                <div class="col-md-4">
                                    <div class="stats-icon red">
                                        <i class="iconly-boldBookmark"></i>
                                    </div>
                                </div>
                                <div class="col-md-8">
                                    <h6 class="text-muted font-semibold">Jobs Posting</h6>
                                    <h6 class="font-extrabold mb-0">{{ $jobsCount }}</h6>
                                </div>
                            </div>
                        </div>
                    </div>
                </a>
            </div>
        </section>
    </div>
        
</div>