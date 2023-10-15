<script src="{{ asset('assets2/vendors/perfect-scrollbar/perfect-scrollbar.min.js') }}"></script>
<script src="{{ asset('assets2/js/bootstrap.bundle.min.js') }}"></script>
@livewireScripts
<script src=//cdn.jsdelivr.net/npm/sweetalert2@11></script>
 <x-livewire-alert::scripts />
 <x-livewire-alert::flash />

<script src="{{ asset('assets2/vendors/apexcharts/apexcharts.js') }}"></script>
<script src="{{ asset('assets2/js/pages/dashboard.js') }}"></script>

<script src="{{ asset('assets2/js/main.js') }}"></script>




    <script src="{{ asset('assets2/vendors/simple-datatables/simple-datatables.js') }}"></script>
    <script>
        // Simple Datatable
        let table1 = document.querySelector('#table1');
        let dataTable = new simpleDatatables.DataTable(table1);
    </script>

<script>
    document.addEventListener('livewire:load', function () {
        Livewire.on('show-add-alumni-modal', () => {
            $('#addAlumniModal').modal('show');
        });

        Livewire.on('hide-add-alumni-modal', () => {
            $('#addAlumniModal').modal('hide');
        });
    });
</script>



    <script src="{{ asset('assets2/vendors/quill/quill.min.js') }}"></script>
    <script src="{{ asset('assets2/js/pages/form-editor.js') }}"></script>

    
<script src='https://api.mapbox.com/mapbox-gl-js/v2.9.1/mapbox-gl.js'></script>
<meta name="viewport" content="initial-scale=1,maximum-scale=1,user-scalable=no">
<link href="https://api.mapbox.com/mapbox-gl-js/v2.14.1/mapbox-gl.css" rel="stylesheet">
<script src="https://api.mapbox.com/mapbox-gl-js/v2.14.1/mapbox-gl.js"></script>

<script src="https://api.mapbox.com/mapbox-gl-js/plugins/mapbox-gl-geocoder/v5.0.0/mapbox-gl-geocoder.min.js"></script>
<link rel="stylesheet" href="https://api.mapbox.com/mapbox-gl-js/plugins/mapbox-gl-geocoder/v5.0.0/mapbox-gl-geocoder.css" type="text/css">







