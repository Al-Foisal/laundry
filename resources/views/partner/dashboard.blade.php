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
                                    Dear laundry partner, your account is <span class="badge bg-light">INACTIVE</span> now. If you are new or fetching
                                    this unexpected alert please contact with us as soon as possible other wise you not get any order. <br>
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
            <div class="row">
                @foreach ($next_status as $status)
                    @php
                        $count = DB::table('orders')
                            ->where([
                                'partner_id' => auth()
                                    ->guard('partner')
                                    ->user()->id,
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
                            <a href="{{ route('partner.statusOrder', $status->slug) }}" class="small-box-footer">
                                More info <i class="fas fa-arrow-circle-right"></i>
                            </a>
                        </div>
                    </div>
                @endforeach
            </div>
        </div>
    </section>
@endsection
