<aside class="main-sidebar sidebar-dark-primary elevation-4">
    <!-- Brand Logo -->
    <a href="{{ route('deliveryman.dashboard') }}" class="brand-link">
        <img src="{{ asset($company->logo) }}" alt="deliveryman" class="brand-image  elevation-3" style="opacity: .8">
    </a>

    <!-- Sidebar -->
    <div class="sidebar">
        <!-- Sidebar user panel (optional) -->
        <div class="user-panel mt-3 pb-3 mb-3 d-flex">
            <div class="image">
                <img src="{{ asset(auth()->guard('deliveryman')->user()->image) }}" class="img-circle elevation-2"
                    alt="AI">
            </div>
            <div class="info">
                <a href="{{ route('deliveryman.dashboard') }}"
                    class="d-block">{{ auth()->guard('deliveryman')->user()->name }}</a>
            </div>
        </div>

        <!-- Sidebar Menu -->
        <nav class="mt-2">
            <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu"
                data-accordion="false">
                <!-- Add icons to the links using the .nav-icon class
       with font-awesome or any other icon font library -->
                <li class="nav-item menu-open">
                    <a href="{{ route('deliveryman.dashboard') }}" class="nav-link">
                        <i class="nav-icon fas fa-tachometer-alt"></i>
                        <p>
                            Dashboard
                        </p>
                    </a>
                </li>
                @php
                    $seen = App\Models\OrderNotification::where(
                        'deliveryman_id',
                        auth()
                            ->guard('deliveryman')
                            ->user()->id,
                    )
                        ->where('is_deliveryman_seen', 0)
                        ->count();
                    $unseen = App\Models\OrderNotification::Where('deliveryman_id', null)
                        ->where('is_deliveryman_seen', 0)
                        ->count();
                @endphp
                <li class="nav-item">
                    <a href="{{ route('deliveryman.orderPlace') }}" class="nav-link">
                        <i class="nav-icon far fa-circle text-warning"></i>
                        <p>Notification ({{ $seen+$unseen }})</p>
                    </a>
                </li>

                @foreach ($deliveryman_order_status as $ds)
                    @php
                        $count = DB::table('orders')
                            ->where([
                                'deliveryman_id' => auth()
                                    ->guard('deliveryman')
                                    ->user()->id,
                                'status' => $ds->id,
                            ])
                            ->count();
                    @endphp
                    <li class="nav-item">
                        <a href="{{ route('deliveryman.statusOrder', $ds->slug) }}" class="nav-link">
                            <i class="nav-icon far fa-circle text-warning"></i>
                            <p>{{ $ds->name }}({{ $count }})</p>
                        </a>
                    </li>
                @endforeach

                <li class="nav-item">
                    <a href="{{ route('deliveryman.payToCompany') }}" class="nav-link">
                        <i class="nav-icon far fa-circle text-warning"></i>
                        <p>Pay Company Due</p>
                    </a>
                </li>

                <li class="nav-item">
                    <a href="{{ route('deliveryman.profile') }}" class="nav-link">
                        <i class="nav-icon far fa-circle text-warning"></i>
                        <p>Profile</p>
                    </a>
                </li>



                {{-- company info --}}
                {{-- <li class="nav-item">
                    <a href="#" class="nav-link">
                        <i class="nav-icon far fa-circle text-warning"></i>
                        <p class="text">
                            Company Info
                            <i class="fas fa-angle-left right"></i>
                        </p>
                    </a>
                    <ul class="nav nav-treeview nav-header">
                        <li class="nav-item">
                            <a href="d" class="nav-link">
                                <i class="nav-icon far fa-circle text-danger"></i>
                                <p>Company Information</p>
                            </a>
                        </li>
                        <li class="nav-item">
                            <a href="d" class="nav-link">
                                <i class="nav-icon far fa-circle text-danger"></i>
                                <p>Pages</p>
                            </a>
                        </li>
                    </ul>
                </li> --}}
            </ul>
        </nav>
        <!-- /.sidebar-menu -->
    </div>
    <!-- /.sidebar -->
</aside>
