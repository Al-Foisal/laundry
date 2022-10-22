@extends('deliveryman.layouts.master')
@section('title', 'Order Invoice')

@section('deliveryman')
    <!-- Content Header (Deliveryman header) -->
    <section class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1>{{ 'Order Invoice' }}</h1>
                </div>
                <div class="col-sm-6">
                    <ol class="breadcrumb float-sm-right">
                        <li class="breadcrumb-item"><a href="{{ route('admin.dashboard') }}">Home</a></li>
                        <li class="breadcrumb-item active">Invoice</li>
                    </ol>
                </div>
            </div>
        </div><!-- /.container-fluid -->
    </section>

    <section class="content">
        <div class="container-fluid">
            <div class="row">
                <div class="col-12">
                    <div class="callout callout-info">
                        <h5><i class="fas fa-info"></i> Note:</h5>
                        {{$company->about}}
                    </div>


                    <!-- Main content -->
                    <div class="invoice p-3 mb-3">
                        <!-- title row -->
                        <div class="row">
                            <div class="col-12">
                                <h4>
                                    <i class="fas fa-globe"></i> {{ config('app.name') }}
                                    <small class="float-right">Date: {{ Date('Y/m/d') }}</small>
                                </h4>
                            </div>
                            <!-- /.col -->
                        </div>
                        <!-- info row -->
                        <div class="row invoice-info">
                            <div class="col-sm-4 invoice-col">
                                From
                                <address>
                                    <strong>{{ config('app.name') }}</strong><br>
                                    {{ $company->address }}<br>
                                    Phone: {{ $company->phone_two }}<br>
                                    DeliveryMan: {{ $deliveryman }}
                                </address>
                            </div>
                            <!-- /.col -->
                            <div class="col-sm-4 invoice-col">
                                To
                                <address>
                                    <strong>{{ $order->orderIdentity->name }}</strong><br>
                                    {{ $order->orderIdentity->address }}<br>
                                    Phone: {{ $order->orderIdentity->phone }}<br>
                                    Email: {{ $order->orderIdentity->email }}
                                </address>
                            </div>
                            <!-- /.col -->
                            <div class="col-sm-4 invoice-col">
                                <br>
                                <b>Invoice #{{ $order->id }}</b><br>
                                <b>Order:</b> {{ $order->orderDetails->sum('quantity') }} Items<br>
                                <b>Payment Due:</b> ৳
                                {{ $order->user_payment_status == 0 ? number_format($order->paid_amount, 2) : 0.0 }}
                                BDT<br>
                            </div>
                            <!-- /.col -->
                        </div>
                        <!-- /.row -->

                        <!-- Table row -->
                        <div class="row">
                            <div class="col-12 table-responsive">
                                <table class="table table-striped">
                                    <thead>
                                        <tr>
                                            <th>Qty</th>
                                            <th>Product</th>
                                            <th>Service</th>
                                            <th>Subtotal</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        @foreach ($order->orderDetails as $details)
                                            <tr>
                                                <td>{{ $details->quantity }}</td>
                                                <td>{{ $details->name }}</td>
                                                <td>{{ $details->service }}</td>
                                                <td>৳ {{ number_format($details->price * $details->quantity, 2) }}</td>
                                            </tr>
                                        @endforeach
                                    </tbody>
                                </table>
                            </div>
                            <!-- /.col -->
                        </div>
                        <!-- /.row -->

                        <div class="row">
                            <!-- accepted payments column -->
                            <div class="col-6">
                                {{-- <p class="lead">Payment Methods:</p>
                                <img src="../../dist/img/credit/visa.png" alt="Visa">
                                <img src="../../dist/img/credit/mastercard.png" alt="Mastercard">
                                <img src="../../dist/img/credit/american-express.png" alt="American Express">
                                <img src="../../dist/img/credit/paypal2.png" alt="Paypal">

                                <p class="text-muted well well-sm shadow-none" style="margin-top: 10px;">
                                    Etsy doostang zoodles disqus groupon greplin oooj voxy zoodles, weebly ning heekya
                                    handango imeem
                                    plugg
                                    dopplr jibjab, movity jajah plickers sifteo edmodo ifttt zimbra.
                                </p> --}}
                            </div>
                            <!-- /.col -->
                            <div class="col-6">
                                {{-- <p class="lead">Amount Due 2/22/2014</p> --}}

                                <div class="table-responsive">
                                    <table class="table">
                                        <tr>
                                            <th style="width:50%">Subtotal:</th>
                                            <td>৳ {{ number_format($order->total, 2) }}</td>
                                        </tr>
                                        <tr>
                                            <th>Discount ({{ $order->coupon_percentage ?? 0 }})</th>
                                            <td>৳ {{ number_format($order->discount, 2) }}</td>
                                        </tr>
                                        <tr>
                                            <th>Shipping:</th>
                                            <td>৳ {{ number_format($order->shipping_charge, 2) }}</td>
                                        </tr>
                                        <tr>
                                            <th>Total:</th>
                                            <td>৳ {{ number_format($order->paid_amount, 2) }}</td>
                                        </tr>
                                    </table>
                                </div>
                            </div>
                            <!-- /.col -->
                        </div>
                        <!-- /.row -->

                        <!-- this row will not appear when printing -->
                        <div class="row no-print">
                            <div class="col-12">
                                <button onclick="window.print()" rel="noopener" target="_blank" class="btn btn-default"><i
                                        class="fas fa-print"></i> Print</button>
                                
                            </div>
                        </div>
                    </div>
                    <!-- /.invoice -->
                </div><!-- /.col -->
            </div><!-- /.row -->
        </div><!-- /.container-fluid -->
    </section>
@endsection

@section('jsLink')
@endsection
@section('jsScript')

    <script>
        invoice() {
            window.print()
            // window.addEventListener("load", window.print());
        }
    </script>
@endsection
