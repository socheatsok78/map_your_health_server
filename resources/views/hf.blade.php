@extends('layouts.demo')

@section('content')
    <h2>Health Facility Location Data</h2>
    <hr/>
    <table class="table table-bordered table-striped" id="hf-table">
        <thead>
        <tr>
            <th>Id</th>
            <th>HF Type</th>
            <th>HF Name</th>
            <th>Address</th>
            <th>Latitude</th>
            <th>Longitude</th>
            <th>Submit Date</th>
        </tr>
        </thead>
    </table>
@stop

@push('scripts')
    <script>
        $(function() {
            $('#hf-table').DataTable({
                processing: true,
                serverSide: true,
                pageLength: 25,
                ajax: '{!! route('hfdata') !!}',
                columns: [
                    { data: 'id', name: 'id', searchable: false },
                    { data: 'facility.facility_type.HFT_Desckh', name: 'HFT_Desckh', searchable: false},
                    { data: 'facility.name_kh', name: 'facility.name_kh', },
                    { data: 'gazetteer.name_kh', name: 'gazetteer.name_kh' },
                    { data: 'longitude', name: 'longitude', searchable: false },
                    { data: 'latitude', name: 'latitude', searchable: false },
                    { data: 'created_at', name: 'created_at' }
                ]
            });
        });
    </script>
@endpush
