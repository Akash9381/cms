@extends('admin.layouts.admin_layouts')
@section('title','Land Loard')
@section('content')

        <div class="content-wrapper">

            <section class="content-header">
                <div class="container-fluid">
                    <div class="row mb-2">
                        <div class="col-sm-6">
                            <h1>Land loard</h1>
                        </div>
                        <div class="col-sm-6">
                            <ol class="breadcrumb float-sm-right">
                                <button type="button" class="btn btn-block btn-primary"> <i
                                        class="nav-icon fas fa-plus"></i> &nbsp;<a class="text-white"
                                        href="{{url('admin/landloard/form')}}">Add New</a></button>
                            </ol>
                        </div>
                        @hasrole('employee')
                        <input type="hidden" id="btnhide" value="employee">
                        @endhasrole
                    </div>
                    <div x-data="{show: true}" x-init="setTimeout(() => show = false, 5000)" x-show="show">
                        @if (session()->has('success'))
                        <div class="col-sm-12 alert alert-info">
                            {{session()->get('success')}}
                        </div>
                        @endif
                        @if (session()->has('error'))
                        <div class="col-sm-12 alert alert-danger">
                            {{session()->get('error')}}
                        </div>
                        @endif
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
                                                <th>Apartment</th>
                                                <th>Price(thousands)</th>
                                                <th>Location</th>
                                                <th>Avalibity</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            @foreach ($landloards as $landloard)
                                                <tr>
                                                    <td>{{$landloard['date']}}</td>
                                                    <td><strong><a href="{{url('admin/landloard/profile/'.$landloard['id'])}}">{{$landloard['name']}}</a></strong></td>
                                                    <td>{{$landloard['phone']}}</td>
                                                    <td>{{$landloard['apartment']}}</td>
                                                    <td>{{$landloard['budget']}}</td>
                                                    <td>{{$landloard['society']}}</td>
                                                    @if ($landloard['status'])
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

        </div>
@endsection

    <script src="{{asset('admin/plugins/jquery/jquery.min.js')}}"></script>
    <script src="{{asset('admin/plugins/bootstrap/js/bootstrap.bundle.min.js')}}"></script>
    <script src="{{asset('admin/plugins/datatables/jquery.dataTables.min.js')}}"></script>
    <script src="{{asset('admin/plugins/datatables-bs4/js/dataTables.bootstrap4.min.js')}}"></script>
    <script src="{{asset('admin/plugins/datatables-responsive/js/dataTables.responsive.min.js')}}"></script>
    <script src="{{asset('admin/plugins/datatables-responsive/js/responsive.bootstrap4.min.js')}}"></script>
    <script src="{{asset('admin/plugins/datatables-buttons/js/dataTables.buttons.min.js')}}"></script>
    <script src="{{asset('admin/plugins/datatables-buttons/js/buttons.bootstrap4.min.js')}}"></script>
    <script src="{{asset('admin/plugins/jszip/jszip.min.js')}}"></script>
    <script src="{{asset('admin/plugins/pdfmake/pdfmake.min.js')}}"></script>
    <script src="{{asset('admin/plugins/pdfmake/vfs_fonts.js')}}"></script>
    <script src="{{asset('admin/plugins/datatables-buttons/js/buttons.html5.min.js')}}"></script>
    <script src="{{asset('admin/plugins/datatables-buttons/js/buttons.print.min.js')}}"></script>
    <script src="{{asset('admin/plugins/datatables-buttons/js/buttons.colVis.min.js')}}"></script>
    <script src="{{asset('admin/dist/js/adminlte.min2167.js?v=3.2.0')}}"></script>
    <script src="{{asset('admin/dist/js/demo.js')}}"></script>

    <script>
        $(function () {
            $("#example1").DataTable({
                "responsive": true, "lengthChange": false, "autoWidth": false,
                "buttons": ["excel", "pdf"]
            }).buttons().container().appendTo('#example1_wrapper .col-md-6:eq(0)');
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
        $(document).ready(function(){
            var btnhide = $("#btnhide").val();
            if(btnhide=='employee'){
                $('.dt-buttons').hide();
            }
        });
    </script>
</body>


</html>
