@extends('backend.layouts.master')
@section('title', 'Deliveryman List')

@section('backend')
    <!-- Content Header (Deliveryman header) -->
    <section class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1>Deliveryman</h1>
                </div>
                <div class="col-sm-6">
                    <ol class="breadcrumb float-sm-right">
                        <li class="breadcrumb-item"><a href="{{ route('admin.dashboard') }}">Home</a></li>
                        <li class="breadcrumb-item active">Deliveryman</li>
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
                            <a href="{{ route('admin.deliveryman.create') }}" class="btn btn-outline-primary">Add Deliveryman</a>
                            <br>
                            <br>
                            <table id="" class="table table-bordered table-striped">
                                <thead>
                                    <tr>
                                        <th>Action</th>
                                        <th>Image</th>
                                        <th>Name</th>
                                        <th>Phone</th>
                                        <th>City</th>
                                        <th>Area</th>
                                        <th>Commission</th>
                                        <th>Statue</th>
                                        <th>Created_at</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach ($deliverymen as $deliveryman)
                                        <tr>
                                            <td class="d-flex justify-content-around">
                                                <a href="{{ route('admin.deliveryman.edit', $deliveryman) }}"
                                                    class="btn btn-info btn-xs" title="Edit"> <i class="fas fa-edit"></i></a>
                                                @if ($deliveryman->status === 1)
                                                    <form action="{{ route('admin.deliveryman.inactive', $deliveryman) }}"
                                                        method="post">
                                                        @csrf
                                                        <button title="Inactive" type="submit"
                                                            onclick="return(confirm('Are you sure want to INACTIVE this item?'))"
                                                            class="btn btn-danger btn-xs"> <i
                                                                class="far fa-thumbs-down"></i>
                                                        </button>
                                                    </form>
                                                @else
                                                    <form action="{{ route('admin.deliveryman.active', $deliveryman) }}"
                                                        method="post">
                                                        @csrf
                                                        <button title="Active" type="submit"
                                                            onclick="return(confirm('Are you sure want to Active this item?'))"
                                                            class="btn btn-info btn-xs"> <i class="far fa-thumbs-up"></i>
                                                        </button>
                                                    </form>
                                                @endif
                                            </td>
                                            <td>
                                                <img src="{{ asset($deliveryman->image) }}" style="height:50px;width:50px;">
                                            </td>
                                            <td>{{ $deliveryman->name }}</td>
                                            <td>{{ $deliveryman->phone }}</td>
                                            <td>{{ $deliveryman->city->name }}</td>
                                            <td>{{ $deliveryman->area->name }}</td>
                                            <td>{{ $deliveryman->commission }}%</td>
                                            <td>{{ $deliveryman->status==1?'Active':'Inactive' }}</td>
                                            <td>{{ $deliveryman->created_at }}</td>
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
