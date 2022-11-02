<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Become a partner - {{ config('app.name') }}</title>

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
                <p class="login-box-msg">Register to become laundry partner</p>

                <form action="{{ route('partner.auth.storePartner') }}" method="post" enctype="multipart/form-data">
                    @csrf
                    <label for="email">Full name*</label>
                    <div class="input-group mb-3">
                        <input type="text" class="form-control" placeholder="Full name" name="name" required>
                    </div>
                    <div class="row">
                        <div class="col-md-6">
                            <label for="email">Email*</label>
                            <div class="input-group mb-3">
                                <input type="email" class="form-control" placeholder="Email" name="email" required>
                            </div>
                        </div>
                        <div class="col-md-6">
                            <label for="email">Password*</label>
                            <div class="input-group mb-3">
                                <input type="password" class="form-control" placeholder="Password" name="password" required>
                            </div>
                        </div>
                    </div>
                    @php
                        $dt = strtotime(date('Y-m-d'));
                        $to = date('Y-m-d', strtotime('+10 year', $dt));

                        $e_from = date('Y-m-d', strtotime('+1 day', $dt));
                    @endphp
                    <div class="row">
                        <div class="col-md-6">
                            <label for="email">Joining date*</label>
                            <div class="input-group mb-3">
                                <input type="date" class="form-control" value="{{ date('Y-m-d') }}"
                                    placeholder="Joining date" name="j_from" min="{{ date('Y-m-d') }}"
                                    max="{{ $to }}" required>
                            </div>
                        </div>
                        <div class="col-md-6">
                            <label for="email">End contract*</label>
                            <div class="input-group mb-3">
                                <input type="date" class="form-control" placeholder="End Contract" name="c_to"
                                    min="{{ $e_from }}" max="{{ $to }}" required>
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-md-6">
                            <label for="email">Personal phone*</label>
                            <div class="input-group mb-3">
                                <input type="text" class="form-control" placeholder="Phone Number" name="phone" required>
                            </div>
                        </div>
                        <div class="col-md-6">
                            <label for="email">Emergency phone*</label>
                            <div class="input-group mb-3">
                                <input type="text" class="form-control" placeholder="Emergency Phone Number" name="e_phone" required>
                            </div>
                        </div>
                    </div>
                    <label for="email">Profile image*</label>
                            <div class="input-group mb-3">
                                <input type="file" class="form-control" name="image" required>
                            </div>
                    <div class="row">
                        <div class="col-md-6">
                            <label for="email">NID*</label>
                            <div class="input-group mb-3">
                                <input type="file" class="form-control" placeholder="Your NID image" name="nid" required>
                            </div>
                        </div>
                        <div class="col-md-6">
                            <label for="email">NID of one emergency (optional)</label>
                            <div class="input-group mb-3">
                                <input type="file" class="form-control" name="e_nid">
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-md-6">
                            <label for="email">City*</label>
                            <div class="input-group mb-3">
                                <select class="form-control" placeholder="City" name="city_id" required>
                                    <option value="">Select city</option>
                                    @foreach ($cities as $city)
                                        <option value="{{ $city->id }}">{{ $city->name }}</option>
                                    @endforeach
                                </select>
                            </div>
                        </div>
                        <div class="col-md-6">
                            <label for="email">Area*</label>
                            <div class="input-group mb-3">
                                <select class="form-control" placeholder="Area" name="area_id" required>
                                    <option value="">Select area</option>
                                </select>
                            </div>
                        </div>
                    </div>
                    <label for="email">Address*</label>
                    <div class="input-group mb-3">
                        <textarea type="text" class="form-control" placeholder="Address" name="address" required></textarea>
                    </div>


                    <div class="row">
                        <div class="col-8">
                            <div class="icheck-primary">
                                <a href="{{ route('partner.auth.login') }}">
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

    {{-- submenu dependency --}}
    <script type="text/javascript">
        $(document).ready(function() {
            $('select[name="city_id"]').on('change', function() {
                var city_id = $(this).val();
                if (city_id) {
                    $.ajax({
                        url: "{{ url('/g/get-area/') }}/" + city_id,
                        type: "GET",
                        dataType: "json",
                        success: function(data) {
                            var d = $('select[name="area_id"]').empty();
                            $.each(data, function(key, value) {
                                $('select[name="area_id"]').append(
                                    '<option value="" selected>==Select==</option><option value="' +
                                    value.id + '">' + value
                                    .name + '</option>');
                            });
                        },
                    });
                } else {
                    alert('danger');
                }
            });
        });
    </script>
</body>

</html>
