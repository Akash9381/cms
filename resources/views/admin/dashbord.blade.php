
@extends('admin.layouts.admin_layouts')
@section('content')

        <div class="content-wrapper">

            <section class="content">
                <div class="container-fluid">
                    <h2 class="text-center display-4"> Search</h2>
                    <form action="#">
                        <div class="row">
                            <div class="col-md-10 offset-md-1">
                                <div class="row">
                                    <div class="col-6">
                                        <div class="form-group">
                                            <label> Type:</label>
                                            <select class="select2" data-placeholder="Any" style="width: 100%;">
                                                <option>Seller</option>
                                                <option>Land loard</option>

                                            </select>
                                        </div>
                                    </div>
                                    <div class="col-6">
                                        <div class="form-group">
                                            <label>Price Range</label>
                                            <select class="select2" style="width: 100%;">
                                                <option selected>10k-15k</option>
                                                <option>15k-20k</option>
                                                <option>20k-30k</option>
                                                <option>30k-50k</option>
                                                <option>50k-80k</option>
                                            </select>
                                        </div>
                                    </div>

                                </div>
                                <!--<div class="form-group">
<div class="input-group input-group-lg">
<input type="search" class="form-control form-control-lg" placeholder="Type your keywords here" value="searh">
<div class="input-group-append">
<button type="submit" class="btn btn-lg btn-default">
<i class="fa fa-search"></i>
</button>
</div>
</div>
</div>-->


                                <div class="form-group">
                                    <label>choice apartment</label>
                                    <select class="select2" style="width: 100%;">
                                        <option selected>Studio</option>
                                        <option>1 BHK</option>
                                        <option>2 BHK</option>
                                        <option>3 BHK</option>
                                        <option>4 BHK</option>
                                        <option>5 BHK</option>
                                        <option>Penthouse</option>
                                    </select>
                                </div>

                                <button type="Search" class="btn btn-primary">Search</button>

                            </div>
                        </div>
                    </form>
                </div>
            </section>
        </div>
@endsection
