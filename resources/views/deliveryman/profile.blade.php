@extends('deliveryman.layouts.master')
@section('title', 'Deliveryman profile')
@section('deliveryman')
    <!-- Content Header (Deliveryman header) -->
    <section class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-9">
                    <h1>Deliveryman profile (<b>Commission: ৳ {{ number_format($deliveryman->commission,2) }} BDT Per Order</b>)</h1>
                </div>
                <div class="col-sm-3">
                    <ol class="breadcrumb float-sm-right">
                        <li class="breadcrumb-item"><a href="{{ route('admin.dashboard') }}">Home</a></li>
                        <li class="breadcrumb-item active">Deliveryman profile</li>
                    </ol>
                </div>
            </div>
        </div><!-- /.container-fluid -->
    </section>

    <section class="content">
        <div class="container-fluid">
            <div class="row">

                <div class="col-md-6">
                    <!-- small card -->
                    <div class="small-box bg-danger">
                        <div class="inner">
                            <h3>৳ {{ number_format($due_from_company, 2) }} BDT</h3>

                            <p>Payment due from company</p>
                        </div>
                        <div class="icon">
                            <i class="fas fa-money-check-alt"></i>
                        </div>
                    </div>
                </div>
                <div class="col-md-6">
                    <!-- small card -->
                    <div class="small-box bg-success">
                        <div class="inner">
                            <h3>৳ {{ number_format($payment_from_company, 2) }} BDT</h3>

                            <p>Payment received from company</p>
                        </div>
                        <div class="icon">
                            <i class="fas fa-money-check-alt"></i>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <!-- Main content -->
    <section class="content">
        <div class="container-fluid">
            <div class="row">
                <div class="col-lg-12">
                    <div class="card card-primary">
                        <!-- /.card-header -->
                        <!-- form start -->
                        <form name="formData">
                            @csrf
                            @method('put')
                            <div class="card-body">

                                <div class="row">
                                    <div class="col-md-3">
                                        <div class="form-group">
                                            <label for="name">Name*</label>
                                            <input type="text" class="form-control" id="name"
                                                value="{{ $deliveryman->name }}" readonly name="name" required>
                                        </div>
                                    </div>
                                    <div class="col-md-3">
                                        <div class="form-group">
                                            <label for="phone">Phone*</label>
                                            <input type="text" class="form-control" id="phone"
                                                value="{{ $deliveryman->phone }}" readonly name="phone" required>
                                        </div>
                                    </div>
                                    <div class="col-md-3">
                                        <div class="form-group">
                                            <label for="phone">Emergency phone*</label>
                                            <input type="text" class="form-control" id="phone"
                                                value="{{ $deliveryman->e_phone }}" readonly name="phone" required>
                                        </div>
                                    </div>
                                </div>

                                <div class="row">
                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <label for="email">Email*</label>
                                            <input type="email" class="form-control" id="email"
                                                value="{{ $deliveryman->email }}" readonly name="email" required>
                                        </div>
                                    </div>
                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <label for="password">For Changing Password</label>
                                            <input type="password" class="form-control" id="password"
                                                placeholder="Enter password " readonly name="password">
                                        </div>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <label for="email">City*</label>
                                            <select class="form-control" placeholder="City" name="city_id" required>
                                                <option value="">Select city</option>
                                                @foreach ($cities as $city)
                                                    <option value="{{ $city->id }}"
                                                        @if ($city->id === $deliveryman->city_id) {{ 'selected' }} @endif>
                                                        {{ $city->name }}</option>
                                                @endforeach
                                            </select>
                                        </div>
                                    </div>
                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <label for="email">Area*</label>
                                            <select class="form-control" placeholder="Area" name="area_id" required>
                                                <option value="">Select area</option>
                                                @foreach ($areas as $area)
                                                    <option value="{{ $area->id }}"
                                                        @if ($area->id === $deliveryman->area_id) {{ 'selected' }} @endif>
                                                        {{ $area->name }}</option>
                                                @endforeach
                                            </select>
                                        </div>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <label for="address">Address*</label>
                                            <textarea class="form-control" id="address" rows="2" placeholder="Enter address" readonly name="address"
                                                required>{{ $deliveryman->address }}</textarea>
                                        </div>
                                    </div>
                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <label for="image">Image*</label>
                                            <input type="file" class="form-control" id="image"
                                                placeholder="Enter image" readonly name="image">
                                            <img src="{{ asset($deliveryman->image) }}"
                                                style="height:100px;width:100px;">
                                        </div>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <label for="nid">Nid*</label>
                                            <input type="file" class="form-control" id="nid"
                                                placeholder="Enter nid" readonly name="nid">
                                            <img src="{{ asset($deliveryman->nid) }}" style="height:100px;width:100px;">
                                        </div>
                                    </div>
                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <label for="e_nid">NID one of emergency*</label>
                                            <input type="file" class="form-control" id="e_nid"
                                                placeholder="Enter e_nid" readonly name="e_nid">
                                            <img src="{{ asset($deliveryman->e_nid) }}"
                                                style="height:100px;width:100px;">
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <!-- /.card-body -->
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
        document.forms['formData'].elements['area_id'].value = "{{ $deliveryman->area_id }}";
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
