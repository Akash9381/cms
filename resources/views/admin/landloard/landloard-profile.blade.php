@extends('admin.layouts.admin_layouts')
@section('title','Land Loard Profile')
@section('content')

        <div class="content-wrapper">

            <section class="content-header">
                <div class="container-fluid">
                    <div class="row mb-2">
                        <div class="col-sm-6">
                            <h1>Profile</h1>
                        </div>
                        <div class="col-sm-6">
                            <ol class="breadcrumb float-sm-right">
                                <div class="btn-group btn-group-sm">
                                    <a href="{{url('admin/landloard/form/'.$landloardprofile['id'])}}" class="btn btn-info"><i class="fas fa-edit"></i></a>
                                    @hasrole('admin')
                                    <a href="{{url('admin/landloard/delete/'.$landloardprofile['id'])}}" onclick="return confirm('Are you Sure to Delete this Landloard?')" class="btn btn-danger"><i class="fas fa-trash"></i></a>
                                    @endhasrole
                                </div>
                            </ol>
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
                                    <h3 class="card-title">Contact Details</h3>
                                </div>

                                <form>
                                    <div class="card-body">

                                        <div class="row">
                                            <div class="col-md-3">
                                                <div class="form-group">
                                                    <label for="exampleInputName">Full Name</label>
                                                    <p>{{$landloardprofile['name']}}</p>
                                                </div>
                                            </div>

                                            <div class="col-md-3">
                                                <div class="form-group">
                                                    <label for="exampleInputEmail1">Email address</label>
                                                    <p>{{$landloardprofile['email']}}</p>
                                                </div>
                                            </div>

                                            <div class="col-md-3">
                                                <div class="form-group">
                                                    <label for="exampleInputNumber">Contact Number</label>
                                                    <p>{{$landloardprofile['phone']}}</p>
                                                </div>
                                            </div>

                                            <div class="col-md-3">
                                                <div class="form-group">
                                                    <label for="exampleInputNumber">Date</label>
                                                    <div class="input-group date" id="reservationdate"
                                                        data-target-input="nearest">
                                                        <p>{{$landloardprofile['date']}}</p>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>

                                </form>
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

                                <form>
                                    <div class="card-body">

                                        <div class="row">
                                            <div class="col-md-3">
                                                <div class="form-group">
                                                    <label>Apartment</label>
                                                    <p>{{$landloardprofile['apartment']}}</p>
                                                </div>
                                            </div>

                                            <div class="col-md-3">
                                                <div class="form-group">
                                                    <label for="inputSq.ft">Sq.ft</label>
                                                    <p>{{$landloardprofile['area']}}</p>
                                                </div>
                                            </div>

                                            <div class="col-md-3">
                                                <div class="form-group">
                                                    <label for="inputSociety">Society</label>
                                                    <p>{{$landloardprofile['society']}}</p>
                                                </div>
                                            </div>

                                            <div class="col-md-3">
                                                <div class="form-group">
                                                    <label for="inputBlock">Block/Tower</label>
                                                    <p>{{$landloardprofile['block']}}</p>
                                                </div>
                                            </div>

                                        </div>


                                        <div class="row">

                                            <div class="col-md-3">
                                                <div class="form-group">
                                                    <label for="Floor">Floor</label>
                                                    <p>{{$landloardprofile['floor']}}</p>
                                                </div>
                                            </div>

                                            <div class="col-md-3">
                                                <div class="form-group">
                                                    <label for="Flat No">Flat No</label>
                                                    <p>{{$landloardprofile['flat_no']}}</p>
                                                </div>
                                            </div>

                                            <div class="col-md-3">
                                                <div class="form-group">
                                                    <label for="inputBathroom">Bathroom</label>
                                                    <p>{{$landloardprofile['bathroom']}}</p>
                                                </div>
                                            </div>

                                            <div class="col-md-3">
                                                <div class="form-group">
                                                    <label for="inputbalcony">Balcony</label>
                                                    <p>{{$landloardprofile['balcony']}}</p>
                                                </div>
                                            </div>
                                            <input type="hidden" id="buyerid" value="{{$landloardprofile['id']}}">
                                        </div>


                                        <div class="row">

                                            <div class="col-md-3">
                                                <div class="form-group">
                                                    <label for="Lift">Lift</label>
                                                    <p>{{$landloardprofile['lift']}}</p>
                                                </div>
                                            </div>

                                            <div class="col-md-3">
                                                <div class="form-group">
                                                    <label for="Flat No">Parking</label>
                                                    <p>{{$landloardprofile['parking']}}</p>
                                                </div>
                                            </div>

                                            <div class="col-md-3">
                                                <div class="form-group">
                                                    <label>Apartment Type</label>
                                                    <p>{{$landloardprofile['apartment_type']}}</p>
                                                </div>
                                            </div>

                                            <div class="col-md-3">
                                                <div class="form-group">
                                                    <label for="inputSq.ft">Rental/Sell Price</label>
                                                    <p>{{$landloardprofile['budget']}} thousand</p>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="card-footer">
                                        <input id="chkbtn" type="checkbox" data-toggle="switchbutton" @if($landloardprofile['status']==0)
                                        checked
                                        @endif  data-onlabel="Available"
                                            data-offlabel="Boked" data-onstyle="success" data-offstyle="danger">
                                            <label style="color: red;display:none" id="booked" >Booked successfully</label>
                                            <label style="color:green;display:none" id="available">Available successfully</label>
                                            <label style="color:red;display:none" id="someerror" >Something went wrong</label>
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
    <script src="{{asset('admin/plugins/jquery-validation/jquery.validate.min.js')}}"></script>
    <script src="{{asset('admin/plugins/jquery-validation/additional-methods.min.js')}}"></script>
    <script src="{{asset('admin/dist/js/adminlte.min2167.js?v=3.2.0')}}"></script>
    <script src="{{asset('admin/dist/js/demo.js')}}"></script>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.1/jquery.min.js"></script>

    <script>
        $(document).ready(function(){
            $("#chkbtn").change(function(){
                var ischecked = 1;
                var id = $("#buyerid").val();
                if(this.checked){
                    ischecked = 0;
                }
                $.ajax({
                    url:'/admin/landlord/booked',
                    type:'get',
                    data:{id:id,status:ischecked},
                    success:function(res){
                        if(res.success){
                           if(ischecked==0){
                            $("#available").show();
                            $("#booked").hide();
                            $("#someerror").hide();
                        }else{
                               $("#available").hide();
                               $("#someerror").hide();
                               $("#booked").show();
                            }
                        }else{
                            $("#someerror").show();
                            $("#available").hide();
                            $("#booked").hide();
                        }
                    }
                })
            });
        })
        $(function () {
            $.validator.setDefaults({
                submitHandler: function () {
                    alert("Form successful submitted!");
                }
            });
            $('#quickForm').validate({
                rules: {
                    email: {
                        required: true,
                        email: true,
                    },
                    password: {
                        required: true,
                        minlength: 5
                    },
                    terms: {
                        required: true
                    },
                },
                messages: {
                    email: {
                        required: "Please enter a email address",
                        email: "Please enter a valid email address"
                    },
                    password: {
                        required: "Please provide a password",
                        minlength: "Your password must be at least 5 characters long"
                    },
                    terms: "Please accept our terms"
                },
                errorElement: 'span',
                errorPlacement: function (error, element) {
                    error.addClass('invalid-feedback');
                    element.closest('.form-group').append(error);
                },
                highlight: function (element, errorClass, validClass) {
                    $(element).addClass('is-invalid');
                },
                unhighlight: function (element, errorClass, validClass) {
                    $(element).removeClass('is-invalid');
                }
            });
        });
    </script>

</html>
