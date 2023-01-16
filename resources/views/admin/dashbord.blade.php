@extends('admin.layouts.admin_layouts')
@section('title', 'Admin DashBoard')
@section('content')

    <div class="content-wrapper">
        <section class="content">
            <div class="container-fluid">
                <h2 class="text-center display-4"> Search</h2>
                <form action="{{ url()->current() }}">
                    <div class="row">
                        <div class="col-md-10 offset-md-1">
                            <div class="row">
                                <div class="col-6">
                                    <div class="form-group">
                                        <label> Type:</label>
                                        <select class="select2" name="type" data-placeholder="Any" style="width: 100%;">
                                            <option @if (request('type') == 'Seller') selected @endif>Seller</option>
                                            <option @if (request('type') == 'Land loard') selected @endif>Land loard</option>

                                        </select>
                                    </div>
                                </div>
                                <div class="col-6">
                                    <div class="form-group">
                                        <label>Price Range</label>
                                        <select class="select2" name="budget" style="width: 100%;">
                                            <option @if (request('budget') == '10k-15k') selected @endif>10k-15k</option>
                                            <option @if (request('budget') == '15k-20k') selected @endif>15k-20k</option>
                                            <option @if (request('budget') == '20k-30k') selected @endif>20k-30k</option>
                                            <option @if (request('budget') == '30k-50k') selected @endif>30k-50k</option>
                                            <option @if (request('budget') == '50k-80k') selected @endif>50k-80k</option>
                                        </select>
                                    </div>
                                </div>

                            </div>
                            <div class="form-group">
                                <label>choice apartment</label>
                                <select class="select2" name="apartment" style="width: 100%;">
                                    <option @if (request('apartment') == 'Studio') selected @endif>Studio</option>
                                    <option @if (request('apartment') == '1 BHK') selected @endif>1 BHK</option>
                                    <option @if (request('apartment') == '2 BHK') selected @endif>2 BHK</option>
                                    <option @if (request('apartment') == '3 BHK') selected @endif>3 BHK</option>
                                    <option @if (request('apartment') == '4 BHK') selected @endif>4 BHK</option>
                                    <option @if (request('apartment') == '5 BHK') selected @endif>5 BHK</option>
                                    <option @if (request('apartment') == 'Penthouse') selected @endif>Penthouse</option>
                                </select>
                            </div>

                            <button type="Search" class="btn btn-primary">Search</button>

                        </div>
                    </div>
                </form>
            </div>
        </section>
        @if(count($search)>=0)
        <section class="content">
            <div class="container-fluid">
                <div class="row">
                    <div class="col-12">
                        <div class="card">
                            <div class="card-body">
                                <table id="example1" class="table table-bordered table-striped">
                                    <thead>
                                        <tr>
                                            <th>Date</th>
                                            <th>Name</th>
                                            <th>Number</th>
                                            <th>Apartment</th>
                                            <th>Price</th>
                                            <th>Location</th>
                                            <th>Avalibity</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        @foreach ($search as $seller)
                                        <tr>
                                            <td>{{$seller['date']}}</td>
                                            @if (request('type') == 'Seller')
                                            <td><strong><a href="{{url('admin/seller/profile/'.$seller['id'])}}">{{$seller['name']}}</a></strong></td>
                                            @else
                                            <td><strong><a href="{{url('admin/landloard/profile/'.$seller['id'])}}">{{$seller['name']}}</a></strong></td>
                                            @endif
                                            <td>{{$seller['phone']}}</td>
                                            <td>{{$seller['apartment']}}</td>
                                            <td>{{$seller['budget']}}</td>
                                            <td>{{$seller['society']}}</td>
                                            @if ($seller['status'])
                                            <td style="background-color: #dc3545;color:white"><b>No</b></td>
                                                @else
                                                <td style="background-color: #28a745;color:white"><b>Yes</b></td>
                                            @endif
                                        </tr>
                                    @endforeach
                                    </tbody>

                                </table>
                            </div>

                        </div>

                    </div>

                </div>

            </div>

        </section>
        @endif
    </div>
@endsection
<script src="{{ asset('admin/plugins/jquery/jquery.min.js') }}"></script>
<script src="{{ asset('admin/plugins/bootstrap/js/bootstrap.bundle.min.js') }}"></script>
<script src="{{ asset('admin/plugins/select2/js/select2.full.min.js') }}"></script>
<script src="{{ asset('admin/plugins/datatables/jquery.dataTables.min.js') }}"></script>
<script src="{{ asset('admin/plugins/datatables-bs4/js/dataTables.bootstrap4.min.js') }}"></script>
<script src="{{ asset('admin/plugins/datatables-responsive/js/dataTables.responsive.min.js') }}"></script>
<script src="{{ asset('admin/plugins/datatables-responsive/js/responsive.bootstrap4.min.js') }}"></script>
<script src="{{ asset('admin/plugins/datatables-buttons/js/dataTables.buttons.min.js') }}"></script>
<script src="{{ asset('admin/plugins/datatables-buttons/js/buttons.bootstrap4.min.js') }}"></script>
<script src="{{ asset('admin/plugins/jszip/jszip.min.js') }}"></script>
<script src="{{ asset('admin/plugins/pdfmake/pdfmake.min.js') }}"></script>
<script src="{{ asset('admin/plugins/pdfmake/vfs_fonts.js') }}"></script>
<script src="{{ asset('admin/plugins/datatables-buttons/js/buttons.html5.min.js') }}"></script>
<script src="{{ asset('admin/plugins/datatables-buttons/js/buttons.print.min.js') }}"></script>
<script src="{{ asset('admin/plugins/datatables-buttons/js/buttons.colVis.min.js') }}"></script>
<script src="{{ asset('admin/dist/js/adminlte.min2167.js?v=3.2.0') }}"></script>
<script src="{{ asset('admin/dist/js/demo.js') }}"></script>
<script>
    $(function() {
        $("#example1").DataTable({
            "responsive": true,
            "lengthChange": false,
            "autoWidth": false,
        }).container().appendTo('#example1_wrapper .col-md-6:eq(0)');
        $('#example2').DataTable({
            "paging": true,
            "lengthChange": false,
            "searching": false,
            "ordering": true,
            "info": true,
            "autoWidth": false,
            "responsive": true,
        });
    });
</script>
<script>
    $(function() {
        $('.select2').select2()
    });
</script>
</body>


</html>
