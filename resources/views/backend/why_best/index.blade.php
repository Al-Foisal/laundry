@extends('backend.layouts.master')
@section('title', 'Why Best List')

@section('backend')
    <!-- Content Header (Why Best header) -->
    <section class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1>Why Best</h1>
                </div>
                <div class="col-sm-6">
                    <ol class="breadcrumb float-sm-right">
                        <li class="breadcrumb-item"><a href="{{ route('admin.dashboard') }}">Home</a></li>
                        <li class="breadcrumb-item active">Why Best</li>
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
                            <a href="{{ route('admin.why_bests.create') }}" class="btn btn-outline-primary">Add Why Best</a>
                            <br>
                            <br>
                            <table id="" class="table table-bordered table-striped">
                                <thead>
                                    <tr>
                                        <th>Action</th>
                                        <th>Image</th>
                                        <th>Name</th>
                                        <th>Details</th>
                                        <th>Created_at</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach ($why_bests as $why_best)
                                        <tr>
                                            <td class="d-flex justify-content-around">
                                                <a href="{{ route('admin.why_bests.edit', $why_best) }}"
                                                    class="btn btn-info btn-xs"> <i class="fas fa-edit"></i></a>
                                                <form action="{{ route('admin.why_bests.destroy', $why_best) }}"
                                                    method="post">
                                                    @csrf
                                                    @method('delete')
                                                    <button type="submit"
                                                        onclick="return(confirm('Are you sure want to delete this item?'))"
                                                        class="btn btn-danger btn-xs"> <i class="far fa-trash-alt"></i>
                                                    </button>
                                                </form>
                                            </td>
                                            <td>
                                                <img src="{{ asset($why_best->image) }}" style="height:50px;width:50px;">
                                            </td>
                                            <td>{{ $why_best->name }}</td>
                                            <td>{{ $why_best->details }}</td>
                                            <td>{{ $why_best->created_at }}</td>
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
