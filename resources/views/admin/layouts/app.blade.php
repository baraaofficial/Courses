<!DOCTYPE html>
<html lang="en" dir="rtl">

@include('admin.layouts.head')


<body>

<!-- Main navbar -->
@include('admin.layouts.navbar')
<!-- /main navbar -->


<!-- Page header -->

@yield('header')
<!-- /page header -->


<!-- Page content -->
<div class="page-content pt-0">

    <!-- Main sidebar -->

    <div class="sidebar sidebar-light sidebar-main sidebar-expand-md align-self-start">

        <!-- Sidebar mobile toggler -->
        <div class="sidebar-mobile-toggler text-center">
            <a href="#" class="sidebar-mobile-main-toggle">
                <i class="icon-arrow-left8"></i>
            </a>
            <span class="font-weight-semibold">Main sidebar</span>
            <a href="#" class="sidebar-mobile-expand">
                <i class="icon-screen-full"></i>
                <i class="icon-screen-normal"></i>
            </a>
        </div>
        <!-- /sidebar mobile toggler -->


        <!-- Sidebar content -->
        <div class="sidebar-content">
            <div class="card card-sidebar-mobile">

                <!-- Header -->
                <div class="card-header header-elements-inline">
                    <h6 class="card-title">قائمة المستخدم</h6>
                    <div class="header-elements">
                        <div class="list-icons">
                            <a class="list-icons-item" data-action="collapse"></a>
                        </div>
                    </div>
                </div>

                <!-- User menu -->
                <div class="sidebar-user">
                    <div class="card-body">
                        <div class="media">
                            <div class="mr-3">
                                <a href="#"><img src="{{asset('admin/global_assets/images/placeholders/placeholder.jpg')}}" width="38" height="38" class="rounded-circle" alt=""></a>
                            </div>

                            <div class="media-body">
                                <div class="media-title font-weight-semibold">{{auth()->user()->name}}</div>
                                <div class="font-size-xs opacity-50">
                                    <i class="icon-pin font-size-sm"></i> {{auth()->user()->location}}&nbsp;{{--{{$data->countryCode }}, {{$data->isoCode}}<br>{{$data->metroCode}},{{$data->latitude}},{{$data->longitude}}--}}
                                </div>
                            </div>


                            <div class="ml-3 align-self-center">
                                <a href="#" class="text-white"><i class="icon-cog3"></i></a>
                            </div>
                        </div>
                    </div>
                </div>
                <!-- /user menu -->

                <!-- Main navigation -->
            @include('admin.layouts.navigation')
            <!-- /main navigation -->

            </div>
        </div>
        <!-- /sidebar content -->

    </div>

    <!-- /main sidebar -->


    <!-- Main content -->
    <div class="content-wrapper">

        <!-- Content area -->
        @yield('content')
        <!-- /content area -->

    </div>
    <!-- /main content -->

</div>
<!-- /page content -->


<!-- Footer -->
@include('admin.layouts.footer')
<!-- /footer -->

</body>
</html>
