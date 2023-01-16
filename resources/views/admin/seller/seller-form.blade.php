@extends('admin.layouts.admin_layouts')
@section('title','Seller Form')
@section('content')


        <div class="content-wrapper">

            <section class="content-header">
                <div class="container-fluid">
                    <div class="row mb-2">
                        <div class="col-sm-6">
                            <h1>New Query Form</h1>
                        </div>
                    </div>
                </div>
            </section>

            <section class="content">
                <div class="container-fluid">
                    <div class="row">

                        <div class="col-md-12">
                            @if (session()->has('success'))
                            <div class="col-sm-12 alert alert-success">
                                {{session()->get('success')}}
                            </div>
                            @endif
                            @if (session()->has('error'))
                            <div class="col-sm-12 alert alert-danger">
                                {{session()->get('error')}}
                            </div>
                            @endif
                            <div class="card card-primary">
                                <div class="card-header">
                                    <h3 class="card-title">Contact Details</h3>
                                </div>
                                @isset($sellerdata)
                                <form method="POST" action="{{url('admin/submitseller/'.$sellerdata['id'])}}">
                                    @else
                                    <form method="POST" action="{{url('admin/submitseller')}}">
                                @endisset
                                    @csrf
                                    <div class="card-body">

                                        <div class="row">
                                            <div class="col-md-3">
                                                <div class="form-group">
                                                    <label for="exampleInputName">Full Name</label>
                                                    <input type="text" name="name" @isset($sellerdata)
                                                   value ="{{$sellerdata['name']}}"
                                                @endisset class="form-control" id="exampleInputName"
                                                        placeholder="Enter Name">
                                                </div>
                                            </div>

                                            <div class="col-md-3">
                                                <div class="form-group">
                                                    <label for="exampleInputEmail1">Email address</label>
                                                    <input type="email" @isset($sellerdata)
                                                    value ="{{$sellerdata['email']}}"
                                                 @endisset name="email" class="form-control"
                                                        id="exampleInputEmail1" placeholder="Enter email">
                                                </div>
                                            </div>

                                            <div class="col-md-3">
                                                <div class="form-group">
                                                    <label for="exampleInputNumber">Contact Number</label>
                                                    <input type="tel" @isset($sellerdata)
                                                    value ="{{$sellerdata['phone']}}"
                                                 @endisset name="phone" pattern="[789][0-9]{9}" class="form-control"
                                                        id="exampleInputNumber" placeholder="Contact Number">
                                                </div>
                                            </div>

                                            <div class="col-md-3">
                                                <div class="form-group">
                                                    <label for="exampleInputNumber">Date</label>
                                                    <div class="input-group date" id="reservationdate"
                                                        data-target-input="nearest">
                                                        <input type="text" name="date"
                                                        @isset($sellerdata)
                                                        value="{{ \Carbon\Carbon::parse($sellerdata->date)->format('m/d/Y')}}"
                                                @endisset
                                                            class="form-control datetimepicker-input"
                                                            data-target="#reservationdate" />
                                                        <div class="input-group-append" data-target="#reservationdate"
                                                            data-toggle="datetimepicker">
                                                            <div class="input-group-text"><i
                                                                    class="fa fa-calendar"></i></div>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>

                                {{-- </form> --}}
                            </div>
                        </div>
                    </div>
                </div>
            </section>


            <section class="content">
                <div class="container-fluid">
                    <div class="row">

                        <div class="col-md-12">

                            <div class="card card-primary">
                                <div class="card-header">
                                    <h3 class="card-title">Apartment Details</h3>
                                </div>

                                {{-- <form> --}}
                                    <div class="card-body">

                                        <div class="row">
                                            <div class="col-md-6">
                                                <div class="form-group">
                                                    <label>Apartment</label>
                                                    <select class="form-control select2" name="apartment" style="width: 100%;">
                                                        <option @isset($sellerdata) @if ($sellerdata['apartment']=='Studio')
                                                        selected
                                                    @endif @endisset >Studio</option>
                                                    <option @isset($sellerdata) @if ($sellerdata['apartment']=='1 BHK')
                                                        selected
                                                    @endif @endisset>1 BHK</option>
                                                    <option @isset($sellerdata) @if ($sellerdata['apartment']=='2 BHK')
                                                        selected
                                                    @endif @endisset>2 BHK</option>
                                                    <option @isset($sellerdata) @if ($sellerdata['apartment']=='3 BHK')
                                                        selected
                                                    @endif @endisset>3 BHK</option>
                                                    <option @isset($sellerdata) @if ($sellerdata['apartment']=='4 BHK')
                                                        selected
                                                    @endif @endisset>4 BHK</option>
                                                    <option @isset($sellerdata) @if ($sellerdata['apartment']=='5 BHK')
                                                        selected
                                                    @endif @endisset>5 BHK</option>
                                                    <option @isset($sellerdata) @if ($sellerdata['apartment']=='Penthouse')
                                                        selected
                                                    @endif @endisset>Penthouse</option>
                                                    </select>
                                                </div>
                                            </div>

                                            <div class="col-md-6">
                                                <div class="form-group">
                                                    <label for="inputSq.ft">Sq.ft</label>
                                                    <input type="text" id="" @isset($sellerdata)
                                                    value="{{$sellerdata['area']}}"
                                                    @endisset  name="area" class="form-control">
                                                </div>
                                            </div>

                                        </div>


                                        <div class="row">
                                            <div class="col-md-3">
                                                <div class="form-group">
                                                    <label for="inputSociety">Society</label>
                                                    <input type="text" id=""
                                                    @isset($sellerdata)
                                                    value="{{$sellerdata['society']}}"
                                                    @endisset
                                                     name="society" class="form-control">
                                                </div>
                                            </div>

                                            <div class="col-md-3">
                                                <div class="form-group">
                                                    <label for="inputBlock">Block/Tower</label>
                                                    <input type="text" id=""
                                                    @isset($sellerdata)
                                                    value="{{$sellerdata['block']}}"
                                                    @endisset
                                                     name="block" class="form-control">
                                                </div>
                                            </div>

                                            <div class="col-md-3">
                                                <div class="form-group">
                                                    <label for="Floor">Floor</label>
                                                    <input type="text" id="" name="floor"
                                                    @isset($sellerdata)
                                                    value="{{$sellerdata['floor']}}"
                                                    @endisset class="form-control">
                                                </div>
                                            </div>

                                            <div class="col-md-3">
                                                <div class="form-group">
                                                    <label for="Flat No">Flat No</label>
                                                    <input type="text" id=""
                                                    @isset($sellerdata)
                                                    value="{{$sellerdata['flat_no']}}"
                                                    @endisset
                                                     name="flat_no" class="form-control">
                                                </div>
                                            </div>
                                        </div>


                                        <div class="row">
                                            <div class="col-md-3">
                                                <div class="form-group">
                                                    <label for="inputBathroom">Bathroom</label>
                                                    <select class="form-control select2" name="bathroom" style="width: 100%;">
                                                        <option @isset($sellerdata) @if ($sellerdata['bathroom']=='1')
                                                        selected
                                                    @endif @endisset >1</option>
                                                    <option @isset($sellerdata) @if ($sellerdata['bathroom']=='2')
                                                        selected
                                                    @endif @endisset >2</option>
                                                    <option @isset($sellerdata) @if ($sellerdata['bathroom']=='3')
                                                        selected
                                                    @endif @endisset >3</option>
                                                    <option @isset($sellerdata) @if ($sellerdata['bathroom']=='4')
                                                        selected
                                                    @endif @endisset >4</option>
                                                    </select>
                                                </div>
                                            </div>

                                            <div class="col-md-3">
                                                <div class="form-group">
                                                    <label for="inputbalcony">Balcony</label>
                                                    <select class="form-control select2" name="balcony" style="width: 100%;">
                                                        <option @isset($sellerdata) @if ($sellerdata['balcony']=='1')
                                                            selected
                                                        @endif @endisset >1</option>
                                                        <option @isset($sellerdata) @if ($sellerdata['balcony']=='2')
                                                            selected
                                                        @endif @endisset >2</option>
                                                        <option @isset($sellerdata) @if ($sellerdata['balcony']=='3')
                                                            selected
                                                        @endif @endisset >3</option>
                                                        <option @isset($sellerdata) @if ($sellerdata['balcony']=='4')
                                                            selected
                                                        @endif @endisset >4</option>
                                                    </select>
                                                </div>
                                            </div>

                                            <div class="col-md-3">
                                                <div class="form-group">
                                                    <label for="Lift">Lift</label>
                                                    <select class="form-control select2" name="lift" style="width: 100%;">
                                                        <option @isset($sellerdata) @if ($sellerdata['lift']=='1')
                                                            selected
                                                        @endif @endisset >1</option>
                                                        <option @isset($sellerdata) @if ($sellerdata['lift']=='2')
                                                            selected
                                                        @endif @endisset >2</option>
                                                        <option @isset($sellerdata) @if ($sellerdata['lift']=='3')
                                                            selected
                                                        @endif @endisset >3</option>
                                                        <option @isset($sellerdata) @if ($sellerdata['lift']=='4')
                                                            selected
                                                        @endif @endisset >4</option>
                                                    </select>
                                                </div>
                                            </div>

                                            <div class="col-md-3">
                                                <div class="form-group">
                                                    <label for="Flat No">Parking</label>
                                                    <select class="form-control select2" name="parking" style="width: 100%;">
                                                        <option @isset($sellerdata) @if ($sellerdata['parking']=='Sun Roof Parking')
                                                            selected
                                                        @endif @endisset >Sun Roof Parking</option>
                                                        <option @isset($sellerdata) @if ($sellerdata['parking']=='Under Ground Parking')
                                                            selected
                                                        @endif @endisset >Under Ground Parking</option>
                                                        <option @isset($sellerdata) @if ($sellerdata['parking']=='Floor Parking')
                                                            selected
                                                        @endif @endisset >Floor Parking</option>
                                                    </select>
                                                </div>
                                            </div>
                                        </div>


                                        <div class="row">
                                            <div class="col-md-6">
                                                <div class="form-group">
                                                    <label>Apartment Type</label>
                                                    <select class="form-control select2" name="apartment_type" style="width: 100%;">
                                                        <option @isset($sellerdata) @if ($sellerdata['apartment_type']=='Fully Furnished')
                                                        selected
                                                    @endif @endisset >Fully Furnished</option>
                                                    <option @isset($sellerdata) @if ($sellerdata['apartment_type']=='Un Furnished')
                                                        selected
                                                    @endif @endisset >Un Furnished</option>
                                                    <option @isset($sellerdata) @if ($sellerdata['apartment_type']=='Semi Furnished')
                                                        selected
                                                    @endif @endisset >Semi Furnished</option>
                                                    </select>
                                                </div>
                                            </div>

                                            <div class="col-md-6">
                                                <div class="form-group">
                                                    <label for="inputSq.ft">Rental/Sell Price</label>
                                                    <input type="text" id=""
                                                    @isset($sellerdata)
                                                    value="{{$sellerdata['budget']}}"
                                                    @endisset
                                                     name="budget" class="form-control">
                                                </div>
                                            </div>

                                        </div>


                                    </div>
                                    <div class="card-footer">
                                        <button type="submit" class="btn btn-primary">
                                            @isset($sellerdata)
                                            Update
                                                @else
                                                Submit
                                            @endisset
                                            </button>
                                    </div>
                                </form>
                            </div>
                        </div>
                    </div>
                </div>
            </section>


        </div>
@endsection

<script src="{{asset('admin/plugins/jquery/jquery.min.js')}}"></script>
<script src="{{asset('admin/plugins/bootstrap/js/bootstrap.bundle.min.js')}}"></script>
<script src="{{asset('admin/plugins/select2/js/select2.full.min.js')}}"></script>
<script src="{{asset('admin/plugins/bootstrap4-duallistbox/jquery.bootstrap-duallistbox.min.js')}}"></script>
<script src="{{asset('admin/plugins/moment/moment.min.js')}}"></script>
<script src="{{asset('admin/plugins/inputmask/jquery.inputmask.min.js')}}"></script>
<script src="{{asset('admin/plugins/daterangepicker/daterangepicker.js')}}"></script>
<script src="{{asset('admin/plugins/bootstrap-colorpicker/js/bootstrap-colorpicker.min.js')}}"></script>
<script src="{{asset('admin/plugins/tempusdominus-bootstrap-4/js/tempusdominus-bootstrap-4.min.js')}}"></script>
<script src="{{asset('admin/plugins/bootstrap-switch/js/bootstrap-switch.min.js')}}"></script>
<script src="{{asset('admin/plugins/bs-stepper/js/bs-stepper.min.js')}}"></script>
<script src="{{asset('admin/plugins/dropzone/min/dropzone.min.js')}}"></script>
<script src="{{asset('admin/dist/js/adminlte.min2167.js?v=3.2.0')}}"></script>
<script src="{{asset('admin/dist/js/demo.js')}}"></script>

<script>
    $(function() {
        //Initialize Select2 Elements
        $('.select2').select2()

        //Initialize Select2 Elements
        $('.select2bs4').select2({
            theme: 'bootstrap4'
        })

        //Datemask dd/mm/yyyy
        $('#datemask').inputmask('dd/mm/yyyy', {
            'placeholder': 'dd/mm/yyyy'
        })
        //Datemask2 mm/dd/yyyy
        $('#datemask2').inputmask('mm/dd/yyyy', {
            'placeholder': 'mm/dd/yyyy'
        })
        //Money Euro
        $('[data-mask]').inputmask()

        //Date picker
        $('#reservationdate').datetimepicker({
            format: 'L'
        });

        //Date and time picker
        $('#reservationdatetime').datetimepicker({
            icons: {
                time: 'far fa-clock'
            }
        });

        //Date range picker
        $('#reservation').daterangepicker()
        //Date range picker with time picker
        $('#reservationtime').daterangepicker({
            timePicker: true,
            timePickerIncrement: 30,
            locale: {
                format: 'MM/DD/YYYY hh:mm A'
            }
        })
        //Date range as a button
        $('#daterange-btn').daterangepicker({
                ranges: {
                    'Today': [moment(), moment()],
                    'Yesterday': [moment().subtract(1, 'days'), moment().subtract(1, 'days')],
                    'Last 7 Days': [moment().subtract(6, 'days'), moment()],
                    'Last 30 Days': [moment().subtract(29, 'days'), moment()],
                    'This Month': [moment().startOf('month'), moment().endOf('month')],
                    'Last Month': [moment().subtract(1, 'month').startOf('month'), moment().subtract(1,
                        'month').endOf('month')]
                },
                startDate: moment().subtract(29, 'days'),
                endDate: moment()
            },
            function(start, end) {
                $('#reportrange span').html(start.format('MMMM D, YYYY') + ' - ' + end.format(
                    'MMMM D, YYYY'))
            }
        )

        //Timepicker
        $('#timepicker').datetimepicker({
            format: 'LT'
        })

        //Bootstrap Duallistbox
        $('.duallistbox').bootstrapDualListbox()

        //Colorpicker
        $('.my-colorpicker1').colorpicker()
        //color picker with addon
        $('.my-colorpicker2').colorpicker()

        $('.my-colorpicker2').on('colorpickerChange', function(event) {
            $('.my-colorpicker2 .fa-square').css('color', event.color.toString());
        })

        $("input[data-bootstrap-switch]").each(function() {
            $(this).bootstrapSwitch('state', $(this).prop('checked'));
        })

    })
    // BS-Stepper Init
    document.addEventListener('DOMContentLoaded', function() {
        window.stepper = new Stepper(document.querySelector('.bs-stepper'))
    })

    // DropzoneJS Demo Code Start
    Dropzone.autoDiscover = false

    // Get the template HTML and remove it from the doumenthe template HTML and remove it from the doument
    var previewNode = document.querySelector("#template")
    previewNode.id = ""
    var previewTemplate = previewNode.parentNode.innerHTML
    previewNode.parentNode.removeChild(previewNode)

    var myDropzone = new Dropzone(document.body, { // Make the whole body a dropzone
        url: "/target-url", // Set the url
        thumbnailWidth: 80,
        thumbnailHeight: 80,
        parallelUploads: 20,
        previewTemplate: previewTemplate,
        autoQueue: false, // Make sure the files aren't queued until manually added
        previewsContainer: "#previews", // Define the container to display the previews
        clickable: ".fileinput-button" // Define the element that should be used as click trigger to select files.
    })

    myDropzone.on("addedfile", function(file) {
        // Hookup the start button
        file.previewElement.querySelector(".start").onclick = function() {
            myDropzone.enqueueFile(file)
        }
    })

    // Update the total progress bar
    myDropzone.on("totaluploadprogress", function(progress) {
        document.querySelector("#total-progress .progress-bar").style.width = progress + "%"
    })

    myDropzone.on("sending", function(file) {
        // Show the total progress bar when upload starts
        document.querySelector("#total-progress").style.opacity = "1"
        // And disable the start button
        file.previewElement.querySelector(".start").setAttribute("disabled", "disabled")
    })

    // Hide the total progress bar when nothing's uploading anymore
    myDropzone.on("queuecomplete", function(progress) {
        document.querySelector("#total-progress").style.opacity = "0"
    })

    // Setup the buttons for all transfers
    // The "add files" button doesn't need to be setup because the config
    // `clickable` has already been specified.
    document.querySelector("#actions .start").onclick = function() {
        myDropzone.enqueueFiles(myDropzone.getFilesWithStatus(Dropzone.ADDED))
    }
    document.querySelector("#actions .cancel").onclick = function() {
        myDropzone.removeAllFiles(true)
    }
    // DropzoneJS Demo Code End
</script>
</body>

</html>
