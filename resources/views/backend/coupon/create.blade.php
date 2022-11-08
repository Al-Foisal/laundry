@extends('backend.layouts.master')
@section('title', 'Create Coupon')
@section('backend')
    <!-- Content Header (Coupon header) -->
    <section class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1>Create Coupon</h1>
                </div>
                <div class="col-sm-6">
                    <ol class="breadcrumb float-sm-right">
                        <li class="breadcrumb-item"><a href="{{ route('admin.dashboard') }}">Home</a></li>
                        <li class="breadcrumb-item active">Create Coupon</li>
                    </ol>
                </div>
            </div>
        </div><!-- /.container-fluid -->
    </section>

    <!-- Main content -->
    <section class="content">
        <div class="container-fluid">
            <div class="row">
                <div class="col-lg-12">
                    <div class="card card-primary">
                        <!-- /.card-header -->
                        <!-- form start -->
                        <form action="{{ route('admin.coupons.store') }}" method="POST" enctype="multipart/form-data">
                            @csrf
                            <div class="card-body">
                                <div class="row">
                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <label for="buying">Coupon Code:</label>
                                            <input type="text" name="code" class="form-control" id="buying"
                                                placeholder="Coupon Code" />
                                        </div>
                                    </div>
                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <label for="selling">Coupon Validity Date:</label>
                                            <input type="date" name="validity" class="form-control" id="selling"
                                                placeholder="Coupon Validity Date" />
                                        </div>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <label for="buying">Coupon Percentage:</label>
                                            <input type="text" name="percentage" class="form-control" id="buying"
                                                placeholder="Coupon percentage" />
                                        </div>
                                    </div>
                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <label for="discount">Cart Amount:</label>
                                            <input type="number" name="cart_amount" class="form-control"
                                                id="discount_price" placeholder="Cart amount" />
                                        </div>
                                    </div>
                                </div>
                                <div class="form-group">
                                    <label>Coupon Type:</label>
                                    <select class="form-control  select2bs4" data-placeholder="Select subcategory"
                                        style="width: 100%" name="coupon_type">
                                        <option value="">--select coupon type--</option>
                                        <option value="1">Discount in Percentage</option>
                                        <option value="2">Discount in Flat Price</option>
                                    </select>
                                </div>
                                <div class="form-group">
                                    <label for="exampleFormControlSelect2">Select packages</label>
                                    <select multiple class="form-control" id="exampleFormControlSelect2" name="package_id[]">
                                        @foreach($packages as $package)
                                        <option value="{{ $package->id }}">{{ $package->name }}</option>
                                        @endforeach
                                    </select>
                                </div>
                            </div>
                            <!-- /.card-body -->

                            <div class="card-footer">
                                <button type="submit" class="btn btn-primary">Submit</button>
                            </div>
                        </form>
                    </div>
                </div>
                <!-- /.card -->
            </div>
        </div>
        </div>
        <!-- /.container-fluid -->
    </section>
    <!-- /.content -->
@endsection
