<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Become a seller - {{ config('app.name') }}</title>

    <!-- Google Font: Source Sans Pro -->
    <link rel="stylesheet"
        href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400i,700&display=fallback">
    <!-- Font Awesome -->
    <link rel="stylesheet" href="{{ asset('backend/fontawesome-free/all.min.css') }}">
    <!-- icheck bootstrap -->
    {{-- <link rel="stylesheet" href="{{ asset('backend/icheck-bootstrap/icheck-bootstrap.min.css') }}"> --}}
    <!-- Theme style -->
    <link rel="stylesheet" href="{{ asset('backend/css/adminlte.min.css') }}">
</head>

<body class="hold-transition login-page">
    @include('sweetalert::alert', ['cdn' => 'https://cdn.jsdelivr.net/npm/sweetalert2@9'])
    <div class="">
        <div class="card card-outline card-primary">
            <div class="card-header text-center">
                <a href="javascript:;" class="h1">
                    Laundry Man <b>BD</b>
                </a>
            </div>
            <div class="card-body" style="width: 80%;margin:auto;">
                <p class="login-box-msg">Register a new membership</p>

                <form action="{{ route('seller.auth.storeSeller') }}" method="post" enctype="multipart/form-data">
                    @csrf
                    <div class="input-group mb-3">
                        <input type="text" class="form-control" placeholder="Full name" name="name">
                    </div>
                    <div class="row">
                        <div class="col-md-6">
                            <div class="input-group mb-3">
                                <input type="email" class="form-control" placeholder="Email" name="email">
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="input-group mb-3">
                                <input type="password" class="form-control" placeholder="Password" name="password">
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-md-6">
                            <div class="input-group mb-3">
                                <input type="text" class="form-control" placeholder="Phone Number" name="phone">
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="input-group mb-3">
                                <input type="file" class="form-control" name="image">
                            </div>
                        </div>
                    </div>
                    <div class="input-group mb-3">
                        <textarea type="text" class="form-control" placeholder="Address" name="address"></textarea>
                    </div>


                    <div class="row">
                        <div class="col-8">
                            <div class="icheck-primary">
                                <a href="{{ route('seller.auth.login') }}">
                                    <label for="remember" style="cursor: pointer">
                                        Already have an account?
                                    </label>
                                </a>
                            </div>
                        </div>
                        <!-- /.col -->
                        <div class="col-4">
                            <button type="submit" class="btn btn-primary btn-block">Register</button>
                        </div>
                        <!-- /.col -->
                    </div>
                </form>
            </div>
            <!-- /.form-box -->
        </div><!-- /.card -->
    </div>
    <!-- jQuery -->
    <script src="{{ asset('backend/js/jquery.min.js') }}"></script>
    <!-- Bootstrap 4 -->
    <script src="{{ asset('backend/js/bootstrap.bundle.min.js') }}"></script>
    <!-- AdminLTE App -->
    <script src="{{ asset('backend/js/adminlte.min.js') }}"></script>
</body>

</html>
