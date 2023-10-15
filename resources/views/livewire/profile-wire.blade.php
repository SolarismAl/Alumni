<div id="main">
    <header class="mb-3">
        <a href="#" class="burger-btn d-block d-xl-none">
            <i class="bi bi-justify fs-3"></i>
        </a>
    </header>

    <section>
        <div class="rt-container">
            <div class="col-rt-12">
                <div class="Scriptcontent">
                    <div class="student-profile py-4">
                        <div class="container">
                            <div class="row">
                                <div class="col-lg-6"> <!-- Personal Information Column -->
                                <div class="card shadow">
                                    <div class="card-header bg-transparent border-0">
                                        <h3 class="mb-0">Personal Information</h3>
                                    </div>
                                    <div class="card-header bg-transparent text-center">
                                        <h3>{{ Auth::user()->name }}</h3>
                                    </div>
                                    <div class="card-body">
                                        <p class="mb-0"><strong class="pr-1">First Name:</strong> {{ Auth::user()->profile->first_name ?? '' }}</p>
                                        <p class="mb-0"><strong class="pr-1">Middle Name:</strong> {{ Auth::user()->profile->middle_name ?? '' }}</p>
                                        <p class="mb-0"><strong class="pr-1">Last Name:</strong> {{ Auth::user()->profile->last_name ?? '' }}</p>
                                    </div>
                                    <div class="card-body pt-0">
                                        <table class="table table-bordered">
                                            <tr>
                                                <th width="30%">Gender</th>
                                                <td width="2%">:</td>
                                                <td>{{ Auth::user()->profile->gender ?? '' }}</td>
                                            </tr>
                                            <tr>
                                                <th width="30%">Year Graduated</th>
                                                <td width="2%">:</td>
                                                <td>{{ Auth::user()->profile->graduation_year ?? '' }}</td>
                                            </tr>
                                            <tr>
                                                <th width="30%">Status</th>
                                                <td width="2%">:</td>
                                                <td>{{ Auth::user()->profile->status ?? '' }}</td>
                                            </tr>
                                            <tr>
                                                <th width="30%">Location</th>
                                                <td width="2%">:</td>
                                                <td>{{ Auth::user()->profile->location ?? '' }}</td>
                                            </tr>
                                            <tr>
                                                <th width="30%">Work</th>
                                                <td width="2%">:</td>
                                                <td>{{ Auth::user()->profile->work ?? '' }}</td>
                                            </tr>
                                        </table>
                                        <button type="button" class="btn btn-success float-end" data-bs-toggle="modal" data-bs-target="#updateInfoModal">Update Info</button>
                                    </div>
                                </div>
                                </div>
                                <div class="col-lg-6">
                                    <div class="card shadow">
                                        <div class="card-header bg-transparent border-0">
                                            <h3 class="mb-0"><i class="far fa-clone pr-1"></i>Other Information</h3>
                                        </div>
                                        <div class="card-body pt-0">
                                            <p>None
                                           </p>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
    
<div class="modal fade text-left" id="updateInfoModal" tabindex="-1" role="dialog" aria-labelledby="updateInfoModalLabel" aria-hidden="true" wire:ignore>
        <div class="modal-dialog modal-dialog-centered modal-dialog-scrollable" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h4 class="modal-title" id="updateInfoModalLabel">Update Info</h4>
                    <button type="button" class="close" data-bs-dismiss="modal" aria-label="Close">
                        <i data-feather="x"></i>
                    </button>
                </div>
            <form wire:submit.prevent="updateInfo">
                <div class="modal-body" style="max-height: 500px; overflow-y: auto;">
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
                                    <option value="Female">Rather not to Say</option>
                                </select>
                            </div>
                            <div class="form-group">
                                <label for="year_graduated">Year Graduated:</label>
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
                                <label for="status">Status:</label>
                                <select wire:model="status" id="status" class="form-control">
                                    <option value="">Select Status</option>
                                    <option value="Employed">Employed</option>
                                    <option value="Unemployed">Unemployed</option>
                                    <option value="Student">Student</option>
                                </select>
                            </div>
                            <p>Click on the map to select a location:</p>
                            <div id="map" style="width: 100%; height: 400px;" wire:ignore></div>
                            <div class="form-group">
                                <label for="location">Location:</label>
                                <input type="text" wire:model="location" id="location" class="form-control">
                            </div>
                            <div class="form-group">
                                <label for="work">Work:</label>
                                <input type="text" wire:model="work" id="work" class="form-control">
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
                    </div>
                </div>
            </form>
        </div>
    </div>
</div>

</div>

<script src="https://api.mapbox.com/mapbox-gl-js/plugins/mapbox-gl-geocoder/v5.0.0/mapbox-gl-geocoder.min.js"></script>
<link rel="stylesheet" href="https://api.mapbox.com/mapbox-gl-js/plugins/mapbox-gl-geocoder/v5.0.0/mapbox-gl-geocoder.css" type="text/css">

<script>
	mapboxgl.accessToken = 'pk.eyJ1Ijoic29sYXJpc20iLCJhIjoiY2xuaTlqMGl6MW5oaTJrcmxrZzVjNW5sbCJ9.HtW3ap5WPeOfaZNXHCF4ag';
    const map = new mapboxgl.Map({
        container: 'map', 
        style: 'mapbox://styles/mapbox/streets-v12',
        center: [125.544984, 9.6594233], 
        zoom: 12 
    });
    map.addControl(
        new MapboxGeocoder({
            accessToken: mapboxgl.accessToken,
            mapboxgl: mapboxgl
        })
    );
    let marker = new mapboxgl.Marker({
        draggable: true,
    })
        .setLngLat([0, 0])
        .addTo(map);

    function updateLocationInput(coordinates) {
        document.getElementById('location').value = coordinates.lat + ', ' + coordinates.lng;
    }
    map.on('click', function (e) {
    marker.setLngLat(e.lngLat);
        @this.set('location', e.lngLat.lat + ', ' + e.lngLat.lng);
    });

    marker.on('dragend', function () {
        const coordinates = marker.getLngLat();
        @this.set('location', coordinates.lat + ', ' + coordinates.lng);
    });
</script>