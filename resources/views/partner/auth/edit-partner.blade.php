@extends('partner.layouts.master')
@section('title', 'Update Partner')

@section('partner')
    <div class="">
        <div class="register-logo">
            <a href="{{ route('partner.dashboard') }}" class="h1">
                Laundry Man BD
            </a>
        </div>

        <div class="card">
            <div class="card-body register-card-body">
                <p class="login-box-msg">Edit Profile</p>

                <form action="{{ route('partner.auth.updatePartner', $partner) }}" method="post" enctype="multipart/form-data">
                    @csrf
                    <div class="row">
                        <div class="col-md-4">
                            <label for="">Full name*</label>
                            <div class="input-group mb-3">
                                <input type="text" class="form-control" value="{{ $partner->name }}" name="name" required>
                            </div>
                        </div>
                        <div class="col-md-4">
                            <label for="">Personal phone*</label>
                            <div class="input-group mb-3">
                                <input type="text" class="form-control" value="{{ $partner->phone }}" name="phone" required>
                            </div>
                        </div>
                        <div class="col-md-4">
                            <label for="">Emergency phone*</label>
                            <div class="input-group mb-3">
                                <input type="text" class="form-control" value="{{ $partner->e_phone }}" name="e_phone" required>
                            </div>
                        </div>
                    </div>

                    <div class="row">
                        <div class="col-md-6">
                            <div class="input-group mb-3">
                                <input type="email" class="form-control" value="{{ $partner->email }}" name="email">
                            </div>
                        </div>
                        <div class="col-md-6">

                            <div class="input-group mb-3">
                                <input type="file" class="form-control" name="image">
                            </div>
                            @if ($partner->image)
                                <img src="{{ asset($partner->image) }}" height="100" width="100" alt="User logo">
                            @endif
                        </div>
                    </div>
                    <div class="input-group mb-3">
                        <textarea type="text" rows="2" class="form-control" name="address">{{ $partner->address }}</textarea>
                    </div>
                    <div class="row">
                        <div class="col-8">
                        </div>
                        <!-- /.col -->
                        <div class="col-4">
                            <button type="submit" class="btn btn-primary btn-block">Update</button>
                        </div>
                        <!-- /.col -->
                    </div>
                </form>
            </div>
            <!-- /.form-box -->
        </div><!-- /.card -->
    </div>
    <br>
    <br>
@endsection
