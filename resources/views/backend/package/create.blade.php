@extends('backend.layouts.master')
@section('title', 'Create Package')
@section('backend')
    <!-- Content Header (Package header) -->
    <section class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1>Create Package</h1>
                </div>
                <div class="col-sm-6">
                    <ol class="breadcrumb float-sm-right">
                        <li class="breadcrumb-item"><a href="{{ route('admin.dashboard') }}">Home</a></li>
                        <li class="breadcrumb-item active">Create Package</li>
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
                        <form action="{{ route('admin.package.store') }}" method="POST" enctype="multipart/form-data">
                            @csrf
                            <div class="card-body">

                                <div class="row">
                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <label for="">Select Service</label>
                                            <select name="service_id" id="" class="form-control" required>
                                                <option value="">Service</option>
                                                @foreach ($services as $service)
                                                    <option value="{{ $service->id }}">{{ $service->name }}</option>
                                                @endforeach
                                            </select>
                                        </div>
                                    </div>
                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <label for="exampleInputEmail1">Name*</label>
                                            <input type="text" class="form-control" id="exampleInputEmail1"
                                                placeholder="Enter name" name="name" required>
                                        </div>
                                    </div>
                                </div>

                                <div class="row">
                                    <div class="col-md-4">
                                        <div class="form-group">
                                            <label for="exampleInputEmail1">Price*</label>
                                            <input type="text" class="form-control" id="exampleInputEmail1"
                                                placeholder="Enter price" name="price" id="price" required>
                                        </div>
                                    </div>
                                    <div class="col-md-4">
                                        <div class="form-group">
                                            <label for="exampleInputEmail1">Discount</label>
                                            <input type="text" class="form-control" id="exampleInputEmail1"
                                                placeholder="Enter discount" name="discount" id="discount">
                                        </div>
                                    </div>
                                    <div class="col-md-4">
                                        <div class="form-group">
                                            <label for="exampleInputEmail1">Discount price</label>
                                            <input type="text" class="form-control" id="exampleInputEmail1"
                                                placeholder="Enter discount price" id="discount_price" readonly>
                                        </div>
                                    </div>
                                </div>

                                @php
                                    $dt = strtotime(date('Y-m-d'));
                                    $to = date('Y-m-d', strtotime('+10 year', $dt));
                                    
                                    $e_from = date('Y-m-d', strtotime('+1 day', $dt));
                                @endphp
                                <div class="row">
                                    <div class="col-md-4">
                                        <div class="form-group">
                                            <label for="exampleInputEmail1">Image*</label>
                                            <input type="file" class="form-control" id="exampleInputEmail1"
                                                placeholder="Enter name" name="image">
                                        </div>
                                    </div>
                                    <div class="col-md-4">
                                        <label for="email">Valid from</label>
                                        <div class="input-group mb-3">
                                            <input type="date" class="form-control" value="{{ date('Y-m-d') }}"
                                                placeholder="Valid from" name="j_from" min="{{ date('Y-m-d') }}"
                                                max="{{ $to }}">
                                        </div>
                                    </div>
                                    <div class="col-md-4">
                                        <label for="email">Valid to</label>
                                        <div class="input-group mb-3">
                                            <input type="date" class="form-control" placeholder="Valid to" name="c_to"
                                                min="{{ $e_from }}" max="{{ $to }}">
                                        </div>
                                    </div>
                                </div>

                                <label for="">Details(remain:<span class="count">255</span> )*</label>
                                <div class="input-group mb-3">
                                    <input type="text" class="form-control" name="details" id="details"
                                        placeholder="Enter short details" required>
                                </div>


                            </div>
                            <!-- /.card-body -->

                            <div class="card-footer">
                                <button type="submit" class="btn btn-primary">Submit</button>
                            </div>
                        </form>
                    </div>
                </div>
                <!-- /.card -->
            </div>
        </div>
        </div>
        <!-- /.container-fluid -->
    </section>
    <!-- /.content -->
@endsection

@section('jsScript')
    <script>
        function textLength(value) {
            var maxLenght = 255;
            return maxLenght - value.length;
        }
        document.getElementById('details').onkeyup = function() {
            $('.count').html(textLength(this.value));
            if(textLength(this.value)<=0){
                alert('Limit over!')
            }
        }
    </script>
    <script>
        $(function() {
            $("#price, #discount").on("keydown keyup", sum);


            function sum() {
                var price = $("#price").val();
                var discount = $("#discount").val();
                alert('ll')

                var discount_price = ((price * discount) / 100);
                if (discount > 0) {
                    $("#discount_price").val(price - discount_price);
                } else {
                    $("#discount_price").val(null);
                }

            }
        });
    </script>
@endsection
