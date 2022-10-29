<aside class="main-sidebar sidebar-dark-primary elevation-4">
    <!-- Brand Logo -->
    <a href="{{ route('partner.dashboard') }}" class="brand-link">
        <img src="{{ asset($company->logo) }}" alt="partner" class="brand-image  elevation-3" style="opacity: .8">
    </a>

    <!-- Sidebar -->
    <div class="sidebar">
        <!-- Sidebar user panel (optional) -->
        <div class="user-panel mt-3 pb-3 mb-3 d-flex">
            <div class="image">
                <img src="{{ asset(auth()->guard('partner')->user()->image) }}" class="img-circle elevation-2"
                    alt="AI">
            </div>
            <div class="info">
                <a href="{{ route('partner.dashboard') }}" class="d-block">{{ auth()->guard('partner')->user()->name }}</a>
            </div>
        </div>

        <!-- Sidebar Menu -->
        <nav class="mt-2">
            <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu"
                data-accordion="false">
                <!-- Add icons to the links using the .nav-icon class
       with font-awesome or any other icon font library -->
                <li class="nav-item menu-open">
                    <a href="{{ route('partner.dashboard') }}" class="nav-link">
                        <i class="nav-icon fas fa-tachometer-alt"></i>
                        <p>
                            Dashboard
                        </p>
                    </a>
                </li>

                @php
                    $seen = App\Models\OrderNotification::where(
                        'partner_id',
                        auth()
                            ->guard('partner')
                            ->user()->id,
                    )
                        ->where('is_partner_seen', 0)
                        ->count();
                @endphp
                <li class="nav-item">
                    <a href="{{ route('partner.orderPlace') }}" class="nav-link">
                        <i class="nav-icon far fa-circle text-warning"></i>
                        <p>Notification ({{ $seen }})</p>
                    </a>
                </li>

                @foreach ($partner_order_status as $ps)
                    @php
                        $count = DB::table('orders')
                            ->where([
                                'partner_id' => auth()
                                    ->guard('partner')
                                    ->user()->id,
                                'status' => $ps->id,
                            ])
                            ->count();
                    @endphp
                    <li class="nav-item">
                        <a href="{{ route('partner.statusOrder',$ps->slug) }}" class="nav-link">
                            <i class="nav-icon far fa-circle text-warning"></i>
                            <p>{{ $ps->name }}({{ $count }})</p>
                        </a>
                    </li>
                @endforeach

                <li class="nav-item">
                    <a href="{{ route('partner.profile') }}" class="nav-link">
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
                            <a href="rdfg" class="nav-link">
                                <i class="nav-icon far fa-circle text-danger"></i>
                                <p>Company Information</p>
                            </a>
                        </li>
                        <li class="nav-item">
                            <a href="dg" class="nav-link">
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
