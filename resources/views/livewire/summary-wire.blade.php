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
                    <h3>Alumni Summary</h3>
                    <p class="text-subtitle text-muted">Details of all Alumni</p>
                </div>
            </div>
        </div>
        <section class="section">
            <div class="card">
                <div class="card-header">
                    <h4 class="card-title">Alumni By Batch</h4>
                </div>
                <div class="card-body">
                    {{-- Alumni Batch Year Dropdown --}}
                    <label for="batchYear">Select Batch Year:</label>
                    <select wire:model="selectedBatchYear" id="batchYear" class="form-control mb-3">
                        <option value="">All Years</option>
                        @foreach($batchYears as $year)
                            <option value="{{ $year }}">{{ $year }}</option>
                        @endforeach
                    </select>
                    
                    {{-- Alumni Table --}}
                    <table class="table">
                        <thead>
                            <tr>
                                <th>Name</th>
                                <th>Gender</th>
                                <th>Place</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach($filteredAlumni as $alumnus)
                                <tr>
                                    <td>{{ $alumnus->first_name }} {{ $alumnus->middle_name }} {{ $alumnus->last_name }}</td>
                                    <td>{{ $alumnus->gender }}</td>
                                    <td>{{ $alumnus->place }}</td>
                                </tr>
                            @endforeach
                        </tbody>
                    </table>
                    {{-- Line break --}}
                    <hr class="my-4">
                    {{-- Totals --}}
                    <div class="mt-3">
                        <table class="table">
                            <tbody>
                                <tr>
                                    <td>Total Males</td>
                                    <td>{{ $maleCount }}</td>
                                </tr>
                                <tr>
                                    <td>Total Females</td>
                                    <td>{{ $femaleCount }}</td>
                                </tr>
                                <tr>
                                    <td>Total Alumni</td>
                                    <td>{{ $totalAlumniCount }}</td>
                                </tr>
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </section>
    </div>
</div>