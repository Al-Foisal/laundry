@extends('backend.layouts.master')
@section('title', 'Edit Working Process')
@section('backend')
    <!-- Content Header (Working Process header) -->
    <section class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1>Edit Working Process</h1>
                </div>
                <div class="col-sm-6">
                    <ol class="breadcrumb float-sm-right">
                        <li class="breadcrumb-item"><a href="{{ route('admin.dashboard') }}">Home</a></li>
                        <li class="breadcrumb-item active">Edit Working Process</li>
                    </ol>
                </div>
            </div>
        </div><!-- /.container-fluid -->
    </section>

    <!-- Main content -->
    <section class="content">
        <div class="container-fluid">
            <div class="row">
                <div class="col-lg-12">
                    <div class="card card-primary">
                        <!-- /.card-header -->
                        <!-- form start -->
                        <form action="{{ route('admin.working_processes.update', $working_process) }}" method="POST"
                            enctype="multipart/form-data">
                            @csrf
                            @method('put')
                            <div class="card-body">
                                
                                <div class="form-group">
                                    <label for="exampleInputEmail1">Name*</label>
                                    <input type="text" class="form-control" id="exampleInputEmail1"
                                        value="{{ $working_process->name }}" name="name" required>
                                </div>
                                <div class="form-group">
                                    <label for="exampleInputEmail1">Short Details*</label>
                                    <input type="text" class="form-control" id="exampleInputEmail1"
                                        value="{{ $working_process->details }}" name="details" required>
                                </div>
                                <div class="form-group">
                                    <label for="exampleInputEmail1">Image*</label>
                                    <input type="file" class="form-control" id="exampleInputEmail1" name="image">
                                    <img src="{{ asset($working_process->image) }}" style="height:50px;width:50px;">
                                </div>
                            </div>
                            <!-- /.card-body -->

                            <div class="card-footer">
                                <button type="submit" class="btn btn-primary">Submit</button>
                            </div>
                        </form>
                    </div>
                    <!-- /.card -->
                </div>
            </div>
        </div>
        <!-- /.container-fluid -->
    </section>
    <!-- /.content -->
@endsection
