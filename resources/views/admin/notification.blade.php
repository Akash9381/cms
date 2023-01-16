@extends('admin.layouts.admin_layouts')
@section('title', 'Notification')
@section('content')
    @if (count($buyers) <= 0 && count($tenents) <= 0)
        <div class="content-wrapper text-center">
            <h2>No Notification</h2>
        </div>
    @endif
    <div class="content-wrapper text-center">
        <ul class="nav nav-tabs" role="tablist">
            <li class="nav-item">
                <a class="nav-link active" href="#profile" role="tab" data-toggle="tab">
                    <h1>Buyer {{BuyerCount() }}</h1>
                </a>
            </li>
            <li class="nav-item">
                <a class="nav-link" href="#buzz" role="tab" data-toggle="tab">
                    <h1>Tenant {{TenentCount() }}</h1>
                </a>
            </li>
        </ul>

        <!-- Tab panes -->
        <div class="tab-content">
            <div role="tabpanel" class="tab-pane fade in active" id="profile">
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
                                                    <th>Apartment </th>
                                                    <th>Followup Call</th>
                                                    <th>Action</th>
                                                </tr>
                                            </thead>
                                            <tbody>
                                                @foreach ($buyers as $buyer)
                                                    <tr>
                                                        <td>{{ $buyer['date'] }}</td>
                                                        <td><strong><a
                                                                    href="{{ url('admin/buyer/profile/' . $buyer['id']) }}">{{ $buyer['name'] }}</a></strong>
                                                        </td>
                                                        <td>{{ $buyer['phone'] }}</td>
                                                        <td>{{ $buyer['apartment'] }}</td>
                                                        <td>{{ $buyer['schedule'] }}</td>
                                                        <td><a href="{{ url('admin/buyer/notification/delete/' . $buyer['id']) }}"
                                                                class="btn btn-danger"><i class="fas fa-trash"></i></a></td>
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
            </div>
            <div role="tabpanel" class="tab-pane fade" id="buzz">
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
                                                    <th>Apartment </th>
                                                    <th>Followup Call</th>
                                                    <th>Action</th>
                                                </tr>
                                            </thead>
                                            <tbody>
                                                @foreach ($tenents as $tenent)
                                                    <tr>
                                                        <td>{{ $tenent['date'] }}</td>
                                                        <td><strong><a
                                                                    href="{{ url('admin/tenant/profile/' . $tenent['id']) }}">{{ $tenent['name'] }}</a></strong>
                                                        </td>
                                                        <td>{{ $tenent['phone'] }}</td>
                                                        <td>{{ $tenent['apartment'] }}</td>
                                                        <td>{{ $tenent['schedule'] }}</td>
                                                        <td><a href="{{ url('admin/tenant/notification/delete/' . $tenent['id']) }}"
                                                                class="btn btn-danger"><i class="fas fa-trash"></i></a></td>
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
            </div>
        </div>
    </div>
    {{-- @if (count($buyers) > 0)
        <div class="content-wrapper">
            <section class="content-header">
                <div class="container-fluid">
                    <div class="row mb-2">
                        <div class="col-sm-6">
                            <h1>Buyer</h1>
                        </div>
                    </div>
                </div>
            </section>
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
                                                <th>Apartment </th>
                                                <th>Followup Call</th>
                                                <th>Action</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            @foreach ($buyers as $buyer)
                                                <tr>
                                                    <td>{{ $buyer['date'] }}</td>
                                                    <td><strong><a
                                                                href="{{ url('admin/buyer/profile/' . $buyer['id']) }}">{{ $buyer['name'] }}</a></strong>
                                                    </td>
                                                    <td>{{ $buyer['phone'] }}</td>
                                                    <td>{{ $buyer['apartment'] }}</td>
                                                    <td>{{ $buyer['schedule'] }}</td>
                                                    <td><a href="{{ url('admin/buyer/notification/delete/' . $buyer['id']) }}"
                                                            class="btn btn-danger"><i class="fas fa-trash"></i></a></td>
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

        </div>
    @endif
    @if (count($tenents) > 0)
        <div class="content-wrapper">

            <section class="content-header">
                <div class="container-fluid">
                    <div class="row mb-2">
                        <div class="col-sm-6">
                            <h1>Tenant</h1>
                        </div>
                    </div>
                </div>
            </section>

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
                                                <th>Apartment </th>
                                                <th>Followup Call</th>
                                                <th>Action</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            @foreach ($tenents as $tenent)
                                                <tr>
                                                    <td>{{ $tenent['date'] }}</td>
                                                    <td><strong><a
                                                                href="{{ url('admin/tenant/profile/' . $tenent['id']) }}">{{ $tenent['name'] }}</a></strong>
                                                    </td>
                                                    <td>{{ $tenent['phone'] }}</td>
                                                    <td>{{ $tenent['apartment'] }}</td>
                                                    <td>{{ $tenent['schedule'] }}</td>
                                                    <td><a href="{{ url('admin/tenant/notification/delete/' . $tenent['id']) }}"
                                                            class="btn btn-danger"><i class="fas fa-trash"></i></a></td>
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

        </div>
    @endif --}}
@endsection

@section('js')
    <script src="{{ asset('admin/plugins/jquery/jquery.min.js') }}"></script>

    <script src="{{ asset('admin/plugins/bootstrap/js/bootstrap.bundle.min.js') }}"></script>

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
@endsection
</body>


</html>
