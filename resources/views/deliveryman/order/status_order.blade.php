@extends('deliveryman.layouts.master')
@section('title', $order_status->name . 'Order List')

@section('deliveryman')
    <!-- Content Header (Deliveryman header) -->
    <section class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1>{{ $order_status->name . 'Order List' }}</h1>
                </div>
                <div class="col-sm-6">
                    <ol class="breadcrumb float-sm-right">
                        <li class="breadcrumb-item"><a href="{{ route('admin.dashboard') }}">Home</a></li>
                        <li class="breadcrumb-item active">{{ $order_status->name }}</li>
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
                            <table id="" class="table table-bordered table-striped">
                                <thead>
                                    <tr>
                                        <th>Action</th>
                                        <th>User Name</th>
                                        <th>User Address</th>
                                        <th>User Phone</th>
                                        <th>Amount</th>
                                        <th>Payment Status</th>
                                        <th>Partner</th>
                                        <th>Created_at</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach ($orders as $order)
                                        <tr>
                                            <td class="d-flex justify-content-around">
                                                <a href="{{ route('deliveryman.orderInvoice',$order->id) }}" class="btn btn-info btn-xs mr-1">
                                                    <i class="fas fa-tasks"></i>
                                                </a>
                                                <button class="btn btn-warning btn-xs" data-toggle="modal"
                                                    data-target="#orderStatusUpdate">
                                                    <i class="fas fa-edit"></i>
                                                </button>
                                                <!-- Order status update Modal -->
                                                <div class="modal fade" id="orderStatusUpdate" tabindex="-1" role="dialog"
                                                    aria-labelledby="exampleModalLabel" aria-hidden="true">
                                                    <div class="modal-dialog" role="document">
                                                        <div class="modal-content">
                                                            <div class="modal-header">
                                                                <h5 class="modal-title" id="exampleModalLabel">Order Status
                                                                    Update</h5>
                                                                <button type="button" class="close" data-dismiss="modal"
                                                                    aria-label="Close">
                                                                    <span aria-hidden="true">&times;</span>
                                                                </button>
                                                            </div>
                                                            <div class="modal-body">
                                                                <form action="{{ route('deliveryman.updateOrderStatus') }}"
                                                                    method="post">
                                                                    @csrf
                                                                    <input type="hidden" name="order_id"
                                                                        value="{{ $order->id }}">
                                                                    <div class="form-group">
                                                                        <label for="order_status">Select Status</label>
                                                                        <select class="form-control" id="order_status"
                                                                            name="order_status_id" required>
                                                                            <option>Select</option>
                                                                            @foreach ($next_status as $n_status)
                                                                                <option value="{{ $n_status->id }}">
                                                                                    {{ $n_status->name }}</option>
                                                                            @endforeach
                                                                        </select>
                                                                    </div>
                                                                    <button type="submit"
                                                                        class="btn btn-primary">Submit</button>
                                                                </form>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                            </td>
                                            <td>{{ $order->orderIdentity->name }}</td>
                                            <td>{{ $order->orderIdentity->phone }}</td>
                                            <td>{{ $order->orderIdentity->address }}</td>
                                            <td>{{ $order->paid_amount }}</td>
                                            <td>
                                                @if ($order->user_payment_status == 0)
                                                    <div class="badge bg-danger">
                                                        Unpaid
                                                    </div>
                                                @else
                                                    <div class="badge bg-success">
                                                        Paid
                                                    </div>
                                                @endif
                                            </td>
                                            <td>
                                                @if ($order->partner_id)
                                                    <div class="btn btn-info">
                                                        {{ $order->partner->name }}
                                                    </div>
                                                @else
                                                    <div class="btn btn-primary" data-toggle="modal"
                                                        data-target="#assignPartner">
                                                        Assign
                                                    </div>
                                                @endif

                                                <!-- Assign Partner Modal -->
                                                <div class="modal fade" id="assignPartner" tabindex="-1" role="dialog"
                                                    aria-labelledby="exampleModalLabel" aria-hidden="true">
                                                    <div class="modal-dialog" role="document">
                                                        <div class="modal-content">
                                                            <div class="modal-header">
                                                                <h5 class="modal-title" id="exampleModalLabel">Assign Your
                                                                    Nearest Partner</h5>
                                                                <button type="button" class="close" data-dismiss="modal"
                                                                    aria-label="Close">
                                                                    <span aria-hidden="true">&times;</span>
                                                                </button>
                                                            </div>
                                                            <div class="modal-body">
                                                                <form action="{{ route('deliveryman.assignPartner') }}"
                                                                    method="post">
                                                                    @csrf
                                                                    <input type="hidden" name="order_id"
                                                                        value="{{ $order->id }}">
                                                                    <div class="form-group">
                                                                        <label for="select_partner">Select Partner</label>
                                                                        <select class="form-control" id="select_partner"
                                                                            name="partner_id" required>
                                                                            <option>Select</option>
                                                                            @foreach ($partners as $partner)
                                                                                <option value="{{ $partner->id }}">
                                                                                    {{ $partner->name . ' - ' . $partner->phone }}
                                                                                </option>
                                                                            @endforeach
                                                                        </select>
                                                                    </div>
                                                                    <button type="submit"
                                                                        class="btn btn-primary">Submit</button>
                                                                </form>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                            </td>
                                            <td>{{ $order->created_at }}</td>
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
