@extends('admin.layouts.app')

@section('titleDashboard')
    / مدرسين محذوفين
@endsection
@section('css')

    <!-- Theme JS files -->
    <script src="{{asset('admin/global_assets/js/plugins/tables/datatables/datatables.min.js')}}"></script>

    <script src="{{asset('admin/global_assets/js/demo_pages/datatables_basic.js')}}"></script>
    <!-- /theme JS files -->
@endsection
@section('header')
    <div class="page-header border-bottom-0">
        <div class="breadcrumb-line breadcrumb-line-light header-elements-md-inline border-0">
            <div class="d-flex">
                <div class="breadcrumb">
                    <a href="{{url('/dashboard')}}" class="breadcrumb-item"><i class="icon-home2 mr-2"></i> لوحة التحكم</a>
                    <a href="{{route('students.index')}}" class="breadcrumb-item"><i class="icon-home2 mr-2"></i>جميع المدرسين</a>
                    <span class="breadcrumb-item active">عرض المدرسين في سلة المهملات</span>
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
                <h4><i class="icon-arrow-right6 mr-2"></i> <span class="font-weight-semibold">الرئيسية</span> - المدرسين المحذوفين</h4>
                <a href="#" class="header-elements-toggle text-default d-md-none"><i class="icon-more"></i></a>
            </div>

            <div class="header-elements d-none mb-3 mb-md-0">
                <div class="d-flex justify-content-center">
                    <a href="{{route('students.create')}}" class="btn btn-link btn-float text-default">
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
        <!-- Search field -->
        <div class="card">
            <div class="card-body">
                <h5 class="mb-3">إبحث في المدرسين</h5>

                <form action="" method="get">
                    <div class="input-group mb-3">
                        <div class="form-group-feedback form-group-feedback-left">
                            <input type="text" class="form-control form-control-lg" name="keyword" placeholder="إترك بحثك هنا وليكن اسم المدرسين او البريد الإلكتروني">
                            <div class="form-control-feedback form-control-feedback-lg">
                                <i class="icon-search4 text-muted"></i>
                            </div>
                        </div>
                        <div class="input-group-append">
                            <button type="submit" class="btn btn-primary btn-lg">بحث</button>
                        </div>
                    </div>
                </form>
            </div>
        </div>
        <!-- /search field -->

        <!-- Collapsible lists -->
        @if(session('message') ?? '' )
            @include('admin.layouts.alert.success')
        @elseif(session('delete') ?? '' )
            @include('admin.layouts.alert.danger')
        @endif

        <div class="row">
            <div class="col-md-12">
                <!-- Custom handle -->
                <div class="card ">
                    <div class="card-header header-elements-inline ">
                        <h5 class="card-title">ما تم حذفه من المدرسين</h5>
                        <div class="header-elements">
                            <div class="list-icons">
                                <a class="list-icons-item" data-action="collapse"></a>
                                <a class="list-icons-item" id="reload" data-action="reload"></a>
                                <a class="list-icons-item" data-action="remove"></a>
                            </div>
                        </div>
                    </div>

                    <div class="row">
                        @foreach($teachers as $teacher)
                            <div class="col-xl-3 col-sm-6 ">
                                <div class="card bg-slate-600" style="background-image: url(admin/global_assets/images/backgrounds/panel_bg.png); background-size: contain;">
                                    <div class="card-body text-center">
                                        <div class="card-img-actions d-inline-block mb-3">
                                            <img class="img-fluid rounded-circle" src="{{asset('admin/global_assets/images/placeholders/placeholder.jpg')}}" width="170" height="170" alt="">
                                            <div class="card-img-actions-overlay card-img rounded-circle">
                                                <div class="ml-3 align-self-center">
                                                    <div class="list-icons">
                                                        <div class="dropdown">
                                                            <a href="#" class="btn btn-outline bg-white text-white border-white border-2 btn-icon rounded-round" data-toggle="dropdown"><i class="icon-menu7"></i></a>
                                                            <div class="dropdown-menu">

                                                                {!! Form::open(array(
                                                                       'style' => 'display: inline-block;',
                                                                       'method' => 'DELETE',
                                                                       'onsubmit' => "return confirm('".trans("هل أنت متأكد من حذف $teacher->name نهائياَ؟")."');",
                                                                       'route' => ['teacher.forcedelete', $teacher->id]))
                                                                  !!}
                                                                <button class="dropdown-item"><i class="icon-user-cancel" style="color: #fa0000"></i> حذف {{$teacher->name}} نهائيا </button>

                                                                {!! Form::close() !!}

                                                                <a href="{{route('teacher.recovery', $teacher->id)}}" class="dropdown-item"><i class=icon-rotate-cw2" style="color: #87caff"></i>  استرجاع الطالب {{$teacher->name}}</a>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>

                                            </div>

                                        </div>
                                        <h6 class="font-weight-semibold mb-0">{{$teacher->name}}</h6>
                                        <span class="d-block opacity-75">{{$teacher->email}}</span>
                                        <div class="list-icons list-icons-extended mt-3">
                                            <a href="#" class="list-icons-item text-white" data-popup="tooltip" title="Google Drive" data-container="body"><i class="icon-google-drive"></i></a>
                                            <a href="#" class="list-icons-item text-white" data-popup="tooltip" title="Twitter" data-container="body"><i class="icon-twitter"></i></a>
                                            <a href="#" class="list-icons-item text-white" data-popup="tooltip" title="Github" data-container="body"><i class="icon-github"></i></a>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        @endforeach
                    </div>
                </div><!-- /custom handle -->
            </div>
        </div><!-- /collapsible lists -->
    </div>
    <!-- /content area -->
@endsection
