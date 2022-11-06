@extends('partner.layouts.master')
@section('title', 'Dashboard')

@section('partner')
    <!-- Content Header (Page header) -->
    <section class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1>Dashboard</h1>
                </div>
                <div class="col-sm-6">
                    <ol class="breadcrumb float-sm-right">
                        <li class="breadcrumb-item"><a href="{{ route('partner.dashboard') }}">Home</a></li>
                        <li class="breadcrumb-item active">Dashboard</li>
                    </ol>
                </div>
            </div>
        </div><!-- /.container-fluid -->
    </section>

    <section class="content">
        <div class="container-fluid">
            <div class="row">
                @if (auth()->guard('partner')->user()->status === 0)
                    <div class="col-md-12">
                        <div class="card card-default">
                            <div class="card-header">
                                <h3 class="card-title">
                                    <i class="fas fa-exclamation-triangle"></i>
                                    Account Activity Status
                                </h3>
                            </div>
                            <!-- /.card-header -->
                            <div class="card-body">
                                <div class="alert alert-danger alert-dismissible">

                                    <h4><i class="icon fas fa-ban"></i> Alert!</h4>
                                    Dear laundry partner, your account is <span class="badge bg-light">INACTIVE</span> now.
                                    If you are new or fetching
                                    this unexpected alert please contact with us as soon as possible other wise you not get
                                    any order. <br>
                                    Mobile: {{ $company->phone_one }}
                                </div>
                            </div>
                            <!-- /.card-body -->
                        </div>
                        <!-- /.card -->
                    </div>
                @endif
            </div>
        </div>
    </section>

    <section class="content">
        <div class="container-fluid">
            <h4>Order Received Today</h4>
            <div class="row">
                <div class="col-md-6">
                    <!-- small card -->
                    <div class="small-box bg-info">
                        <div class="inner">
                            <h3>{{ $order_received->count() }}</h3>

                            <p>Order</p>
                        </div>
                        <div class="icon">
                            <i class="fas fa-shopping-cart"></i>
                        </div>
                    </div>
                </div>
                <div class="col-md-6">
                    <!-- small card -->
                    <div class="small-box bg-info">
                        <div class="inner">
                            <h3>
                                @php
                                    $count = 0;
                                @endphp
                                @foreach ($order_received as $item)
                                    @foreach ($item->orderDetails as $details)
                                        @php
                                            
                                            $count = $count + $details->quantity;
                                        @endphp
                                    @endforeach
                                @endforeach
                                {{ $count }}
                            </h3>

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
            <h4>Delivery Pending</h4>
            <div class="row">
                <div class="col-md-6">
                    <!-- small card -->
                    <div class="small-box bg-info">
                        <div class="inner">
                            <h3>{{ $delivery_pending->count() }}</h3>

                            <p>Order</p>
                        </div>
                        <div class="icon">
                            <i class="fas fa-shopping-cart"></i>
                        </div>
                    </div>
                </div>
                <div class="col-md-6">
                    <!-- small card -->
                    <div class="small-box bg-info">
                        <div class="inner">
                            <h3>
                                @php
                                    $count = 0;
                                @endphp
                                @foreach ($delivery_pending as $item)
                                    @foreach ($item->orderDetails as $details)
                                        @php
                                            
                                            $count = $count + $details->quantity;
                                        @endphp
                                    @endforeach
                                @endforeach
                                {{ $count }}
                            </h3>

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
            <h4>Delivered Today</h4>
            <div class="row">
                <div class="col-md-6">
                    <!-- small card -->
                    <div class="small-box bg-info">
                        <div class="inner">
                            <h3>{{ $delivered_today->count() }}</h3>

                            <p>Order</p>
                        </div>
                        <div class="icon">
                            <i class="fas fa-shopping-cart"></i>
                        </div>
                    </div>
                </div>
                <div class="col-md-6">
                    <!-- small card -->
                    <div class="small-box bg-info">
                        <div class="inner">
                            <h3>
                                @php
                                    $count = 0;
                                @endphp
                                @foreach ($delivered_today as $item)
                                    @foreach ($item->orderDetails as $details)
                                        @php
                                            
                                            $count = $count + $details->quantity;
                                        @endphp
                                    @endforeach
                                @endforeach
                                {{ $count }}
                            </h3>

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
            <h4>Payment: Monthly and Half Month</h4>
            <div class="row">
                <div class="col-md-6">
                    <!-- small card -->
                    <div class="small-box bg-info">
                        <div class="inner">
                            <h3>{{ $monthly_payment_received }}</h3>

                            <p>Payment received by company</p>
                        </div>
                        <div class="icon">
                            <i class="fas fa-shopping-cart"></i>
                        </div>
                    </div>
                </div>
                <div class="col-md-6">
                    <!-- small card -->
                    <div class="small-box bg-info">
                        <div class="inner">
                            <h3>
                                {{ $monthly_payment_pending }}
                            </h3>

                            <p>Payment pending</p>
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
            <h4>Payment: {{ date('d') < $half_month ? 'First ' : 'Second ' }} Half Month</h4>
            <div class="row">
                <div class="col-md-6">
                    <!-- small card -->
                    <div class="small-box bg-info">
                        <div class="inner">
                            <h3>{{ $half_monthly_payment_received }}</h3>

                            <p>Payment received by company</p>
                        </div>
                        <div class="icon">
                            <i class="fas fa-shopping-cart"></i>
                        </div>
                    </div>
                </div>
                <div class="col-md-6">
                    <!-- small card -->
                    <div class="small-box bg-info">
                        <div class="inner">
                            <h3>
                                {{ $half_monthly_payment_pending }}
                            </h3>

                            <p>Payment pending</p>
                        </div>
                        <div class="icon">
                            <i class="fas fa-shopping-cart"></i>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
@endsection
