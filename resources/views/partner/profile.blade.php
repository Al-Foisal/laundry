@extends('partner.layouts.master')
@section('title', 'Partner profile')
@section('partner')
    <!-- Content Header (Deliveryman header) -->
    <section class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-9">
                    <h1>Partner profile (<b>Admin Commission: {{ $partner->commission }}% Per Order</b>)</h1>
                </div>
                <div class="col-sm-3">
                    <ol class="breadcrumb float-sm-right">
                        <li class="breadcrumb-item"><a href="{{ route('admin.dashboard') }}">Home</a></li>
                        <li class="breadcrumb-item active">Partner profile</li>
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
                        <form action="{{ route('partner.profileUpdate', $partner) }}" method="POST" enctype="multipart/form-data" name="formData">
                            @csrf
                            @method('put')
                            <div class="card-body">

                                <div class="row">
                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <label for="name">Name*</label>
                                            <input type="text" class="form-control" id="name"
                                                value="{{ $partner->name }}" name="name" required>
                                        </div>
                                    </div>
                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <label for="phone">Phone*</label>
                                            <input type="text" class="form-control" id="phone"
                                            value="{{ $partner->phone }}" name="phone" required>
                                        </div>
                                    </div>
                                </div>

                                <div class="row">
                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <label for="email">Email*</label>
                                            <input type="email" class="form-control" id="email"
                                            value="{{ $partner->email }}" name="email" required>
                                        </div>
                                    </div>
                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <label for="password">For Changing Password</label>
                                            <input type="password" class="form-control" id="password"
                                                placeholder="Enter password " name="password">
                                        </div>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <label for="address">Address*</label>
                                            <textarea class="form-control" id="address" rows="2" placeholder="Enter address" name="address" required>{{ $partner->address }}</textarea>
                                        </div>
                                    </div>
                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <label for="image">Image*</label>
                                            <input type="file" class="form-control" id="image"
                                                placeholder="Enter image" name="image">
                                                <img src="{{ asset($partner->image) }}" style="height:100px;width:100px;">
                                        </div>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-md-6">
                                        <div class="input-group mb-3">
                                            <select class="form-control" placeholder="City" name="city_id" required>
                                                <option value="">Select city</option>
                                                @foreach ($cities as $city)
                                                    <option value="{{ $city->id }}" @if($partner->city_id == $city->id) selected @endif>{{ $city->name }}</option>
                                                @endforeach
                                            </select>
                                        </div>
                                    </div>
                                    <div class="col-md-6">
                                        <div class="input-group mb-3">
                                            <select class="form-control" placeholder="Area" name="area_id" required>
                                                @foreach($areas as $area)
                                                <option value="{{ $area->id }}">{{ $area->name }}</option>
                                                @endforeach
                                            </select>
                                        </div>
                                    </div>
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
    <script>
        document.forms['formData'].elements['area_id'].value = "{{ $partner->area_id }}";
    </script>
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
@endsection
