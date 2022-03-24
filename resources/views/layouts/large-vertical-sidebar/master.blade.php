<!-- ============ Large SIdebar Layout start ============= -->

<div class="app-admin-wrap layout-sidebar-large clearfix">
    @include('layouts.large-vertical-sidebar.header')

    <!-- ============ end of header menu ============= -->

    @include('layouts.large-vertical-sidebar.sidebar')

    <!-- ============ end of left sidebar ============= -->

    <!-- ============ Body content start ============= -->
    <div class="main-content-wrap sidenav-open d-flex flex-column flex-grow-1">

        <div class="main-content">
            @if ($errors->any())
                <div class="alert alert-danger">
                    <ul>
                        @foreach ($errors->all() as $error)
                            <li>{{ $error }}</li>
                        @endforeach
                    </ul>
                </div>
            @endif

            @if( Session::has('flash_message') )
                <div class="col-md-12">
                    <div class="alert alert-card {{ Session::get('flash_type') }}" role="alert">
                        {{-- <strong class="text-capitalize">Success!</strong> --}}
                        {{ Session::get('flash_message') }}
                        <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                </div>
            @endif

            @yield('main-content')
        </div>

        <div class="flex-grow-1"></div>
        @include('layouts.common.footer')
    </div>
    <!-- ============ Body content End ============= -->
</div>
<!--=============== End app-admin-wrap ================-->

<!-- ============ Search UI Start ============= -->
@include('layouts.common.search')
<!-- ============ Search UI End ============= -->




<!-- ============ Large Sidebar Layout End ============= -->
