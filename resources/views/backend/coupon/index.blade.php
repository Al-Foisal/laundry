@extends('backend.layouts.master')
@section('title', 'Coupon List')

@section('backend')
    <!-- Content Header (Coupon header) -->
    <section class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1>Coupon</h1>
                </div>
                <div class="col-sm-6">
                    <ol class="breadcrumb float-sm-right">
                        <li class="breadcrumb-item"><a href="{{ route('admin.dashboard') }}">Home</a></li>
                        <li class="breadcrumb-item active">Coupon</li>
                    </ol>
                </div>
            </div>
        </div><!-- /.container-fluid -->
    </section>

    <!-- Main content -->
    <section class="content">
        <div class="container-fluid">
            <div class="row">
                <div class="col-12">
                    <div class="card">
                        <!-- /.card-header -->
                        <div class="card-body">
                            <a href="{{ route('admin.coupons.create') }}" class="btn btn-outline-primary">Add Coupon</a>
                            <br>
                            <br>
                            <table id="" class="table table-bordered table-striped">
                                <thead>
                                    <tr>
                                        <th>Action</th>
                                        <th>Code</th>
                                        <th>Discount</th>
                                        <th>Cart Amount</th>
                                        <th>Validity</th>
                                        <th>Coupon Type</th>
                                        <th>Packages</th>
                                        <th>Created_at</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach ($coupons as $coupon)
                                        <tr>
                                            <td class="d-flex justify-content-around">

                                                <form action="{{ route('admin.coupons.destroy', $coupon) }}" method="post">
                                                    @csrf
                                                    @method('delete')
                                                    <button type="submit"
                                                        onclick="return(confirm('Are you sure want to Delete this item?'))"
                                                        class="btn btn-danger btn-xs"> <i class="far fa-thumbs-down"></i>
                                                        Delete
                                                    </button>
                                                </form>

                                            </td>
                                            <td>{{ $coupon->code }}</td>
                                            <td>{{ $coupon->percentage }}{{ $coupon->coupon_type == 1 ? '%' : ' TK' }}</td>
                                            <td>{{ $coupon->cart_amount }}</td>
                                            <td>{{ $coupon->validity }}</td>
                                            <td>{{ $coupon->coupon_type == 1 ? 'Percentage' : 'Flat' }}</td>
                                            @php
                                                $packages = DB::table('packages')->whereIn('id',explode(" ",$coupon->package_id))->get();
                                            @endphp
                                            <td>
                                                @foreach($packages as $package)
                                                {{ '=> '.$package->name }} <br>
                                                @endforeach
                                            </td>
                                            <td>{{ $coupon->created_at }}</td>
                                        </tr>
                                    @endforeach
                                </tbody>
                            </table>
                        </div>
                        <!-- /.card-body -->
                    </div>
                    <!-- /.card -->
                </div>
                <!-- /.col -->
            </div>
            <!-- /.row -->
        </div>
        <!-- /.container-fluid -->
    </section>
    <!-- /.content -->
@endsection

@section('jsLink')
@endsection
@section('jsScript')
@endsection
