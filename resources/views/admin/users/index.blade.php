@extends('admin.layouts.app')

@section('titleDashboard')
    / المستخدمين
@endsection
@section('header')
    <div class="page-header border-bottom-0">
        <div class="breadcrumb-line breadcrumb-line-light header-elements-md-inline border-0">
            <div class="d-flex">
                <div class="breadcrumb">
                    <a href="{{url('/dashboard')}}" class="breadcrumb-item"><i class="icon-home2 mr-2"></i> لوحة التحكم</a>
                    <span class="breadcrumb-item active">المستخدمين</span>
                </div>

                <a href="#" class="header-elements-toggle text-default d-md-none"><i class="icon-more"></i></a>
            </div>

            <div class="header-elements d-none">
                <div class="breadcrumb justify-content-center">
                    <a href="#" class="breadcrumb-elements-item">
                        <i class="icon-comment-discussion mr-2"></i>
                        الدعم
                    </a>

                    <div class="breadcrumb-elements-item dropdown p-0">
                        <a href="#" class="breadcrumb-elements-item dropdown-toggle" data-toggle="dropdown">
                            <i class="icon-gear mr-2"></i>
                            الإعدادات
                        </a>

                        <div class="dropdown-menu">
                            <a href="#" class="dropdown-item"><i class="icon-user-lock"></i> Account security</a>
                            <a href="#" class="dropdown-item"><i class="icon-statistics"></i> Analytics</a>
                            <a href="#" class="dropdown-item"><i class="icon-accessibility"></i> Accessibility</a>
                            <div class="dropdown-divider"></div>
                            <a href="#" class="dropdown-item"><i class="icon-gear"></i> All settings</a>
                        </div>
                    </div>
                </div>
            </div>
        </div>


        <div class="page-header-content header-elements-md-inline">

            <div class="page-title d-flex">
                <h4><i class="icon-arrow-right6 mr-2"></i> <span class="font-weight-semibold">الرئيسية</span> - المستخدمين</h4>
                <a href="#" class="header-elements-toggle text-default d-md-none"><i class="icon-more"></i></a>
            </div>

            <div class="header-elements d-none mb-3 mb-md-0">
                <div class="d-flex justify-content-center">
                   <a href="{{route('users.create')}}" class="btn btn-link btn-float text-default">
                       <i class="icon-user-plus text-indigo-400"></i>
                       <span>إضافة مستخدم جديد</span>
                   </a>
                </div>
            </div>
        </div>
    </div>
@endsection


@section('content')
    <!-- Content area -->
    <div class="content">
        <!-- Collapsible lists -->
        @if(session('message') ?? '' )
             @include('admin.layouts.alert.success')
        @elseif(session('delete') ?? '' )
            @include('admin.layouts.alert.danger')
        @endif

        <div class="row">
            <div class="col-md-12">
                <!-- Custom handle -->
                <div class="card">
                    <div class="card-header header-elements-inline">
                        <h5 class="card-title">جميع المستخدمين بالموقع</h5>
                        <div class="header-elements">
                            <div class="list-icons">
                                <a class="list-icons-item" data-action="collapse"></a>
                                <a class="list-icons-item" data-action="reload"></a>
                                <a class="list-icons-item" data-action="remove"></a>
                            </div>
                        </div>
                    </div>

                    <ul class="media-list media-list-linked">
                        <li class="media font-weight-semibold border-0 py-1">قادة الموقع</li>
                        @foreach($users as $user)
                        <li>
                            <div class="media">
                                <div class="mr-3"><img src="{{asset('admin/global_assets/images/placeholders/placeholder.jpg')}}" class="rounded-circle" width="40" height="40" alt=""></div>
                                <div class="media-body">
                                    <div class="media-title font-weight-semibold">{{$user->name}}</div>
                                    @if ($user->status == 1)
                                        <span class="badge badge-success">نشط</span>

                                    @elseif ($user->status == 0)
                                        <span class="badge badge-danger">معلق</span>

                                    @endif
                                </div>
                                <div class="align-self-center ml-3">
                                    <a href="#" class="text-default" data-toggle="collapse" data-target="#james2">
                                        <i class="icon-menu7"></i>
                                    </a>
                                </div>
                            </div>

                            <div class="collapse" id="james2">
                                <div class="card-body bg-light border-top border-bottom">
                                    <ul class="list list-unstyled mb-0">
                                        <li><i class="icon-pin mr-2"></i> {{$user->location}}</li>
                                        <li><i class="icon-user-tie mr-2"></i> Senior Designer</li>
                                        <li><i class="icon-phone mr-2"></i> {{$user->phone}}</li>
                                        <li><i class="icon-mail5 mr-2"></i> <a href="#">{{$user->email}}</a></li>
                                    </ul>
                                </div>
                            </div>
                        </li>
                    @endforeach
<!--                        <li class="media font-weight-semibold border-0 py-1">المستخدمين </li>
                        <li>
                            <div class="media">
                                <div class="mr-3"><img src="../../../../global_assets/images/placeholders/placeholder.jpg" class="rounded-circle" width="40" height="40" alt=""></div>
                                <div class="media-body">
                                    <div class="media-title font-weight-semibold">Bastian Miller</div>
                                    <span class="text-muted">Yahoo</span>
                                </div>
                                <div class="align-self-center ml-3">
                                    <a href="#" class="text-default" data-toggle="collapse" data-target="#bastian2">
                                        <i class="icon-menu7"></i>
                                    </a>
                                </div>
                            </div>

                            <div class="collapse" id="bastian2">
                                <div class="card-body bg-light border-top border-bottom">
                                    <ul class="list list-unstyled mb-0">
                                        <li><i class="icon-pin mr-2"></i> New York</li>
                                        <li><i class="icon-user-tie mr-2"></i> Lead developer</li>
                                        <li><i class="icon-phone mr-2"></i> +1(234)675 3904</li>
                                        <li><i class="icon-mail5 mr-2"></i> <a href="#">bastian@miller.com</a></li>
                                    </ul>
                                </div>
                            </div>
                        </li>-->
                    </ul>
                </div><!-- /custom handle -->
            </div>
        </div><!-- /collapsible lists -->
    </div>
    <!-- /content area -->
@endsection
