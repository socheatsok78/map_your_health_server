@extends('layouts.demo')

@section('content')
    <h2>ទិន្ន័យទីតាំង​មូលដ្ឋាន​សុខាភិបាល</h2>
    <hr/>
    <table class="table table-bordered table-striped display" id="hf-table">
        <thead>
        <tr>
            <th>ID</th>
            <th>ប្រភេទ</th>
            <th>ឈ្មោះមូលដ្ឋានសុខាភិបាល</th>
            <th>ស្រុកប្រតិបត្តិ</th>
            <th>អាសយដ្ឋាន</th>
            <th>Latitude</th>
            <th>Longitude</th>
            <th>កាលបរិច្ឆេទទទួលទិន្នន័យ</th>
            <th>រាយការណ៍ដោយ</th>
        </tr>
        </thead>
    </table>
@stop

@push('scripts')


    <script src="//cdn.datatables.net/1.10.19/js/jquery.dataTables.min.js"></script>
    <script src="//cdn.datatables.net/buttons/1.5.6/js/dataTables.buttons.min.js"></script>
    <script src="//cdn.datatables.net/buttons/1.5.6/js/buttons.flash.min.js"></script>
    <script src="//cdnjs.cloudflare.com/ajax/libs/jszip/3.1.3/jszip.min.js"></script>
    <script src="//cdn.datatables.net/buttons/1.5.6/js/buttons.html5.min.js"></script>
    <script src="//cdn.datatables.net/buttons/1.5.6/js/buttons.print.min.js"></script>

    <script>
        $(function() {
            $('#hf-table').DataTable({
                processing: true,
                serverSide: true,
                pageLength: 25,
                dom: 'Bfrtip',
                buttons: [
                    'copy', 'excel', 'print'
                ],
                ajax: '{!! route('hfdata') !!}',
                columns: [
                    { data: 'id', name: 'id', searchable: false, visibility: false, render: function (d, t, r) {
                        var lat = r.latitude;
                        var long = r.longitude;
                        return '<a target="_blank" href="https://maps.google.com/?q=' + lat +',' + long + '&z=16">'+ d + '</a>';
                        } },
                    { data: 'facility.facility_type.HFT_Desckh', name: 'facility.facility_type.HFT_Desckh', searchable: false},
                    { data: 'facility.name_kh', name: 'facility.name_kh'},
                    { data: 'facility.operational_district.name_kh', name: 'facility.operational_district.name_kh', searchable: false, render: function (data, type, row) {
                        return "ស្រុកប្រតិបត្តិ " + data;
                        }},
                    { data: 'gazetteer.name_kh', name: 'gazetteer.name_kh' },
                    { data: 'longitude', name: 'longitude', searchable: false },
                    { data: 'latitude', name: 'latitude', searchable: false },
                    { data: 'created_at', name: 'created_at' },
                    { data: 'report_by', name: 'report_by', searchable: false, render: function (d, t, r) {
                        console.log(d);
                            switch (d) {
                                case '1':
                                    return "ប្រធានមូលដ្ឋានសុខាភិបាល";
                                case '2':
                                    return "អ្នកជំងឺ";
                                case '3':
                                    return "អ្នកមកមើលអ្នកជំងឺ";
                                default:
                                    return "ផ្សេងៗ";
                            }
                        } },
                ]
            });
        });
    </script>
@endpush
