@extends('backend.layouts.master')
@section('title', 'dashboard')

@section('backend')
    <!-- Content Header (Page header) -->
    <section class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1>Dashboard</h1>
                </div>
                <div class="col-sm-6">
                    <ol class="breadcrumb float-sm-right">
                        <li class="breadcrumb-item"><a href="{{ route('admin.dashboard') }}">Home</a></li>
                        <li class="breadcrumb-item active">Dashboard</li>
                    </ol>
                </div>
            </div>
        </div><!-- /.container-fluid -->
    </section>

    <section class="content">
        <div class="container-fluid">
            <div class="row">
                <div class="col-md-6">
                    <form action="{{ route('admin.dashboard') }}">
                        <div class="row">
                            <div class="col-md-4">
                                <label for="">From</label>
                                <div class="form-group">
                                    <input type="date" class="form-control" name="date_from" required>
                                </div>

                            </div>
                            <div class="col-md-4">
                                <label for="">To</label>
                                <div class="form-group">
                                    <input type="date" class="form-control" name="date_to" required>
                                </div>
                            </div>
                            <div class="col-md-4">
                                <label for="">Action</label>
                                <div class="form-group">
                                    <button class="btn btn-primary btn-block" type="submit">Submit</button>
                                </div>
                            </div>
                        </div>
                    </form>
                </div>
                <div class="col-md-6">
                    <div class="row">
                        <div class="col-md-4">
                            <label for="">Today Data</label>
                            <a href="{{ route('admin.dashboard', ['selected' => 'today']) }}"
                                class="btn btn-outline-info btn-block">Today</a>

                        </div>
                        <div class="col-md-4">
                            <label for="">This Month</label>
                            <a href="{{ route('admin.dashboard', ['selected' => 'month']) }}"
                                class="btn btn-outline-info btn-block">Month</a>
                        </div>
                        <div class="col-md-4">
                            <label for="">Current Year</label>
                            <a href="{{ route('admin.dashboard', ['selected' => 'year']) }}"
                                class="btn btn-outline-info btn-block">Year</a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <hr>
    <section class="content">
        <div class="container-fluid">
            <h4>Recent placed order</h4>
            <div class="row">
                <div class="col-md-4">
                    <!-- small card -->
                    <div class="small-box bg-info">
                        <div class="inner">
                            <h3>{{ $order_received }}</h3>

                            <p>Order Received</p>
                        </div>
                        <div class="icon">
                            <i class="fas fa-shopping-cart"></i>
                        </div>
                    </div>
                </div>
                <div class="col-md-4">
                    <!-- small card -->
                    <div class="small-box bg-info">
                        <div class="inner">
                            <h3>{{ $pickup_pending }}</h3>

                            <p>Pick Up Pending</p>
                        </div>
                        <div class="icon">
                            <i class="fas fa-shopping-cart"></i>
                        </div>
                    </div>
                </div>
                <div class="col-md-4">
                    <!-- small card -->
                    <div class="small-box bg-info">
                        <div class="inner">
                            <h3>{{ $delivery_pending }}</h3>

                            <p>Dlivery Pending</p>
                        </div>
                        <div class="icon">
                            <i class="fas fa-shopping-cart"></i>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <hr>
    <section class="content">

        <div class="container-fluid">
            <h4>Cloths received- total quantity for Iron, wash, dry clean</h4>
            <div class="row">
                <div class="col-md-4">
                    <!-- small card -->
                    <div class="small-box bg-info">
                        <div class="inner">
                            <h3>{{ $crt_iron }}</h3>

                            <p>Iron</p>
                        </div>
                        <div class="icon">
                            <i class="fas fa-shopping-cart"></i>
                        </div>
                    </div>
                </div>
                <div class="col-md-4">
                    <!-- small card -->
                    <div class="small-box bg-info">
                        <div class="inner">
                            <h3>{{ $crt_wash }}</h3>

                            <p>Wash</p>
                        </div>
                        <div class="icon">
                            <i class="fas fa-shopping-cart"></i>
                        </div>
                    </div>
                </div>
                <div class="col-md-4">
                    <!-- small card -->
                    <div class="small-box bg-info">
                        <div class="inner">
                            <h3>{{ $crt_dry }}</h3>

                            <p>Dry</p>
                        </div>
                        <div class="icon">
                            <i class="fas fa-shopping-cart"></i>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <hr>
    <section class="content">

        <div class="container-fluid">
            <h4>Pending delivery by laundry partner</h4>
            <div class="row">
                <div class="col-md-4">
                    <!-- small card -->
                    <div class="small-box bg-info">
                        <div class="inner">
                            <h3>{{ $pending_delivery_laundry_count }}</h3>

                            <p>Laundry Partner</p>
                        </div>
                        <div class="icon">
                            <i class="fas fa-shopping-cart"></i>
                        </div>
                    </div>
                </div>
                <div class="col-md-4">
                    <!-- small card -->
                    <div class="small-box bg-info">
                        <div class="inner">
                            <h3>{{ $pending_delivery_laundry->count() }}</h3>

                            <p>Order</p>
                        </div>
                        <div class="icon">
                            <i class="fas fa-shopping-cart"></i>
                        </div>
                    </div>
                </div>
                <div class="col-md-4">
                    <!-- small card -->
                    <div class="small-box bg-info">
                        <div class="inner">
                            <h3>{{ $pdl_total_cloths }}</h3>

                            <p>Cloths</p>
                        </div>
                        <div class="icon">
                            <i class="fas fa-shopping-cart"></i>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <hr>
    <section class="content">

        <div class="container-fluid">
            <h4>Ready to deliver by Laundry partner</h4>
            <div class="row">
                <div class="col-md-4">
                    <!-- small card -->
                    <div class="small-box bg-info">
                        <div class="inner">
                            <h3>{{ $ready_to_delivery_by_laundry_count }}</h3>

                            <p>Laundry Partner</p>
                        </div>
                        <div class="icon">
                            <i class="fas fa-shopping-cart"></i>
                        </div>
                    </div>
                </div>
                <div class="col-md-4">
                    <!-- small card -->
                    <div class="small-box bg-info">
                        <div class="inner">
                            <h3>{{ $ready_to_delivery_by_laundry->count() }}</h3>

                            <p>Order</p>
                        </div>
                        <div class="icon">
                            <i class="fas fa-shopping-cart"></i>
                        </div>
                    </div>
                </div>
                <div class="col-md-4">
                    <!-- small card -->
                    <div class="small-box bg-info">
                        <div class="inner">
                            <h3>{{ $rtdbl_total_cloths }}</h3>

                            <p>Cloths</p>
                        </div>
                        <div class="icon">
                            <i class="fas fa-shopping-cart"></i>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <hr>
    <section class="content">

        <div class="container-fluid">
            <h4>Delivered by Laundry Partner</h4>
            <div class="row">
                <div class="col-md-4">
                    <!-- small card -->
                    <div class="small-box bg-info">
                        <div class="inner">
                            <h3>{{ $delivered_by_laundry_count }}</h3>

                            <p>Laundry Partner</p>
                        </div>
                        <div class="icon">
                            <i class="fas fa-shopping-cart"></i>
                        </div>
                    </div>
                </div>
                <div class="col-md-4">
                    <!-- small card -->
                    <div class="small-box bg-info">
                        <div class="inner">
                            <h3>{{ $delivered_by_laundry->count() }}</h3>

                            <p>Order</p>
                        </div>
                        <div class="icon">
                            <i class="fas fa-shopping-cart"></i>
                        </div>
                    </div>
                </div>
                <div class="col-md-4">
                    <!-- small card -->
                    <div class="small-box bg-info">
                        <div class="inner">
                            <h3>{{ $dbl_total_cloths }}</h3>

                            <p>Cloths</p>
                        </div>
                        <div class="icon">
                            <i class="fas fa-shopping-cart"></i>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <hr>
    <section class="content">

        <div class="container-fluid">
            <h4>Successfully delivered by deliveryman man</h4>
            <div class="row">
                <div class="col-md-4">
                    <!-- small card -->
                    <div class="small-box bg-info">
                        <div class="inner">
                            <h3>{{ $successfully_delivered_count }}</h3>

                            <p>Laundry Partner</p>
                        </div>
                        <div class="icon">
                            <i class="fas fa-shopping-cart"></i>
                        </div>
                    </div>
                </div>
                <div class="col-md-4">
                    <!-- small card -->
                    <div class="small-box bg-info">
                        <div class="inner">
                            <h3>{{ $successfully_delivered->count() }}</h3>

                            <p>Order</p>
                        </div>
                        <div class="icon">
                            <i class="fas fa-shopping-cart"></i>
                        </div>
                    </div>
                </div>
                <div class="col-md-4">
                    <!-- small card -->
                    <div class="small-box bg-info">
                        <div class="inner">
                            <h3>{{ $sd_total_cloths }}</h3>

                            <p>Cloths</p>
                        </div>
                        <div class="icon">
                            <i class="fas fa-shopping-cart"></i>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <hr>
    <section class="content">
        <div class="container-fluid">
            <h4>Total order status overview</h4>
            <div class="row">
                @foreach ($next_status as $status)
                    @php
                        $count = DB::table('orders')
                            ->where([
                                'status' => $status->id,
                            ])
                            ->count();
                    @endphp
                    <div class="col-lg-3 col-6">
                        <!-- small card -->
                        <div class="small-box bg-info">
                            <div class="inner">
                                <h3>{{ $count }}</h3>

                                <p>{{ $status->name }}</p>
                            </div>
                            <div class="icon">
                                <i class="fas fa-shopping-cart"></i>
                            </div>
                            <a href="{{ route('admin.statusOrder', $status->slug) }}" class="small-box-footer">
                                More info <i class="fas fa-arrow-circle-right"></i>
                            </a>
                        </div>
                    </div>
                @endforeach
            </div>
        </div>
    </section>

@endsection
