@extends('backend.layouts.master')
@section('title', 'Package List')

@section('backend')
    <!-- Content Header (Package header) -->
    <section class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1>Package</h1>
                </div>
                <div class="col-sm-6">
                    <ol class="breadcrumb float-sm-right">
                        <li class="breadcrumb-item"><a href="{{ route('admin.dashboard') }}">Home</a></li>
                        <li class="breadcrumb-item active">Package</li>
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
                            <a href="{{ route('admin.package.create') }}" class="btn btn-outline-primary">Add Package</a>
                            <br>
                            <br>
                            <table id="example1" class="table table-bordered table-responsive">
                                <thead>
                                    <tr>
                                        <th></th>
                                        <th>Action</th>
                                        <th>Statue</th>
                                        <th>Image</th>
                                        <th>Package</th>
                                        <th>Service</th>
                                        <th>Price</th>
                                        <th>Details</th>
                                        <th>Discount(%)</th>
                                        <th>Discount Price</th>
                                        <th>Validity From</th>
                                        <th>Validity To</th>
                                        <th>On Front</th>
                                        <th>Created_at</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach ($packages as $package)
                                        <tr>
                                            <td></td>
                                            <td class="d-flex justify-content-around">
                                                <a href="{{ route('admin.package.edit', $package) }}"
                                                    class="btn btn-info btn-xs mr-1" title="Edit"> <i class="fas fa-edit"></i></a>
                                                @if ($package->status === 1)
                                                    <form action="{{ route('admin.package.inactive', $package) }}"
                                                        method="post">
                                                        @csrf
                                                        <button type="submit"
                                                            onclick="return(confirm('Are you sure want to INACTIVE this item?'))"
                                                            class="btn btn-danger btn-xs mr-1" title="Inactive"> <i
                                                                class="far fa-thumbs-down"></i>
                                                        </button>
                                                    </form>
                                                @else
                                                    <form action="{{ route('admin.package.active', $package) }}"
                                                        method="post">
                                                        @csrf
                                                        <button type="submit"
                                                            onclick="return(confirm('Are you sure want to Active this item?'))"
                                                            class="btn btn-info btn-xs mr-1" title="Active"> <i class="far fa-thumbs-up"></i>
                                                        </button>
                                                    </form>
                                                @endif

                                                @if ($package->on_front === 1)
                                                    <form action="{{ route('admin.package.removeFront', $package) }}"
                                                        method="post">
                                                        @csrf
                                                        <button type="submit"
                                                            onclick="return(confirm('Are you sure want to remove from front page?'))"
                                                            class="btn btn-danger btn-xs mr-1" title="Remove from Front"> <i
                                                                class="far fa-thumbs-down"></i>
                                                        </button>
                                                    </form>
                                                @else
                                                    <form action="{{ route('admin.package.keepFront', $package) }}"
                                                        method="post">
                                                        @csrf
                                                        <button type="submit"
                                                            onclick="return(confirm('Are you sure want to keep on front page?'))"
                                                            class="btn btn-info btn-xs mr-1" title="Keep on Front"> <i class="far fa-thumbs-up"></i>
                                                        </button>
                                                    </form>
                                                @endif
                                            </td>
                                            <td>{{ $package->status == 1 ? 'Active' : 'Inactive' }}</td>
                                            <td>
                                                <img src="{{ asset($package->image) }}" style="height:50px;width:50px;">
                                            </td>
                                            <td>{{ $package->name }}</td>
                                            <td>{{ $package->service->name }}</td>
                                            <td>TK: {{ $package->price }}</td>
                                            <td>{{ $package->details }}</td>
                                            <td>{{ $package->discount }}</td>
                                            <td>TK: {{ $package->discount_price }}</td>
                                            <td>{{ $package->j_from ? $package->j_from->format('Y-m-d') : '' }}</td>
                                            <td>{{ $package->c_to ? $package->c_to->format('Y-m-d') : '' }}</td>
                                            <td>{{ $package->on_front == 1 ? 'Y' : 'N' }}</td>
                                            <td>{{ $package->created_at }}</td>
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
