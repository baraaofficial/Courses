@extends('admin.layouts.app')

@section('titleDashboard')
    / المستويات المحذوفة
@endsection
@section('css')
    <!-- Theme JS files -->
    <script src="{{asset('admin/global_assets/js/plugins/tables/datatables/datatables.min.js')}}"></script>
    <script src="{{asset('admin/global_assets/js/plugins/tables/datatables/extensions/buttons.min.js')}}"></script>
    <script src="{{asset('admin/global_assets/js/plugins/tables/datatables/extensions/select.min.js')}}"></script>
    <script src="{{asset('admin/global_assets/js/plugins/forms/selects/select2.min.js')}}"></script>

    <script src="{{asset('admin/global_assets/js/demo_pages/datatables_extension_buttons_print.js')}}"></script>
    <!-- /theme JS files -->
@endsection
@section('header')
    <div class="page-header border-bottom-0">
        <div class="breadcrumb-line breadcrumb-line-light header-elements-md-inline border-0">
            <div class="d-flex">
                <div class="breadcrumb">
                    <a href="{{url('/dashboard')}}" class="breadcrumb-item"><i class="icon-home2 mr-2"></i> لوحة التحكم</a>
                    <span class="breadcrumb-item active">المستويات المحذوفة</span>
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
                <h4><i class="icon-arrow-right6 mr-2"></i> <span class="font-weight-semibold">الرئيسية</span> - المستويات المحذوفة</h4>
                <a href="#" class="header-elements-toggle text-default d-md-none"><i class="icon-more"></i></a>
            </div>

            <div class="header-elements d-none mb-3 mb-md-0">
                <div class="d-flex justify-content-center">
                    <a href="{{route('levels.create')}}" class="btn btn-link btn-float text-default">
                        <i class="icon-plus22 text-indigo-400"></i>
                        <span>إضافة مستوي جديد</span>
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
                <h5 class="mb-3">إبحث في المستويات</h5>

                <form action="#" method="get">
                    <div class="input-group mb-3">
                        <div class="form-group-feedback form-group-feedback-left">
                            <input type="text" class="form-control form-control-lg" name="keyword" value="" placeholder="إترك بحثك هنا وليكن المستوي">
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
        </div><!-- /search field -->
        <!-- Collapsible lists -->
        @include('admin.layouts.messages.message')
        <div class="row">
            <div class="col-md-12">
                <!-- Custom handle -->
                <div class="card ">
                    <div class="card-header header-elements-inline ">
                        <h5 class="card-title">جميع المستويات المحذوفة بالموقع</h5>
                        <div class="header-elements">
                            <div class="list-icons">
                                <a class="list-icons-item" data-action="collapse"></a>
                                <a class="list-icons-item" id="reload" data-action="reload"></a>
                                <a class="list-icons-item" data-action="remove"></a>
                            </div>
                        </div>
                    </div>
                    <table class="table datatable-button-print-rows">
                        <thead>
                        <tr>
                            <th>#</th>
                            <th>المستوي</th>
                            <th>من خلال</th>
                            <th>تاريخ الإضافة</th>
                            <th class="text-center">حالة الإضافة</th>
                            <th class="text-center">إجراءات</th>
                        </tr>
                        </thead>
                        @if (count($levels) == 0)

                            <div class="alert alert-info alert-styled-left alert-dismissible">
                                <button type="button" class="close" data-dismiss="alert"><span>&times;</span></button>
                                <span class="font-weight-semibold">لا توجد بيانات!</span>
                            </div>
                        @endif
                        <tbody>

                        @foreach($levels as $level)
                            <tr>
                                <td>{{$loop->iteration}} </td>
                                <td>{{$level->level_ar}}</td>
                                <td>{{$level->by}}</td>
                                <td title="{{$level->created_at->format('H:i')}}">{{$level->created_at->format('Y-m-d')}}</td>
                                <td class="text-center">
                                    @if ($level->status == 1)
                                        <span class="badge badge-success">نشط</span>
                                    @elseif ($level->status == 0)
                                        <span class="badge badge-secondary">معلق</span>
                                    @endif
                                </td>
                                <td class="text-center">
                                    <div class="list-icons">
                                        <div class="dropdown">
                                            <a href="javascript: void(0);" class="list-icons-item" data-toggle="dropdown">
                                                <i class="icon-menu9"></i>
                                            </a>

                                            <div class="dropdown-menu">
                                                <a href="{{route('level.recovery', $level->id)}}" onclick="return confirm('هل أنت متأكد من استرجاع المستوي  {{$level->level_ar}} ؟');" class="dropdown-item"><i class="icon-rotate-cw2"></i> استرجاع المستوي {{$level->level_ar}}</a>
                                            </div>
                                        </div>
                                    </div>
                                </td>
                            </tr>
                        @endforeach
                        </tbody>
                    </table>
                </div><!-- /custom handle -->
            </div>
        </div><!-- /collapsible lists -->
    </div><!-- /content area -->

@endsection
