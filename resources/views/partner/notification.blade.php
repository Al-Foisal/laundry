@extends('partner.layouts.master')
@section('title', 'Order Notification')

@section('partner')
    <!-- Content Header (Deliveryman header) -->
    <section class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1>{{ 'Order Notification' }}</h1>
                </div>
                <div class="col-sm-6">
                    <ol class="breadcrumb float-sm-right">
                        <li class="breadcrumb-item"><a href="{{ route('admin.dashboard') }}">Home</a></li>
                        <li class="breadcrumb-item active">Notification</li>
                    </ol>
                </div>
            </div>
        </div><!-- /.container-fluid -->
    </section>

    <!-- Main content -->
    <section class="content">
        <div class="container-fluid">
            <div class="row">
                @foreach ($orders as $order)
                    @if ($order->partner_id)
                        <div class="col-12">
                            <div class="info-box">
                                <span class="info-box-icon bg-info"><i class="far fa-envelope"></i></span>

                                <div class="info-box-content">
                                    <span class="info-box-text">Your Order #<b>{{ $order->order_id }}</b> including
                                        <b>{{ $order->order->orderDetails->sum('quantity') }}</b> Items bearing order status as
                                        <b>{{ $order->orderStatus->name }}</b>. <br>
                                        Your Deliveryman is <b>{{ $order->order->deliveryman->name ?? '__' }}</b></span>
                                    <span class="info-box-number">Last updated:
                                        {{ $order->updated_at->diffForHumans() }}</span>
                                </div>
                                <!-- /.info-box-content -->
                            </div>
                            <!-- /.info-box -->
                            <!-- /.col -->
                        </div>
                    @endif
                @endforeach
                <!-- /.row -->
            </div>
            <!-- /.container-fluid -->
        </div>
    </section>
    <!-- /.content -->
@endsection

@section('jsLink')
@endsection
@section('jsScript')
@endsection
