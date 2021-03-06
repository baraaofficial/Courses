@extends('admin.layouts.app')

@section('titleDashboard')
    / اللغات
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
                    <span class="breadcrumb-item active">اللغات</span>
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
                <h4><i class="icon-arrow-right6 mr-2"></i> <span class="font-weight-semibold">الرئيسية</span> - اللغات</h4>
                <a href="#" class="header-elements-toggle text-default d-md-none"><i class="icon-more"></i></a>
            </div>

            <div class="header-elements d-none mb-3 mb-md-0">
                <div class="d-flex justify-content-center">
                   <a href="{{route('languages.create')}}" class="btn btn-link btn-float text-default">
                       <i class="icon-plus22 text-indigo-400"></i>
                       <span>إضافة للغه جديدة</span>
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
                <h5 class="mb-3">إبحث في اللغات</h5>

                <form action="#" method="get">
                    <div class="input-group mb-3">
                        <div class="form-group-feedback form-group-feedback-left">
                            <input type="text" class="form-control form-control-lg" name="keyword" value="" placeholder="إترك بحثك هنا وليكن اسم اللغه او وصف اللغه">
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
                        <h5 class="card-title">جميع اللغات بالموقع</h5>
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
                            <th>إسم اللغه</th>
                            <th>وصف اللغه</th>
                            <th>صورة اللغه</th>
                            <th>تاريخ الإضافة</th>
                            <th>حالة الإضافة</th>
                            <th>إجراءات</th>
                        </tr>
                        </thead>
                        @if (count($languages) == 0)

                        <div class="alert alert-info alert-styled-left alert-dismissible">
                            <button type="button" class="close" data-dismiss="alert"><span>&times;</span></button>
                            <span class="font-weight-semibold">لا توجد بيانات!</span>  عليك بإنشاء لغات اولا من  <a href="{{route('languages.create')}}" class="alert-link">هنا</a>.
                        </div>
                        @endif
                        <tbody>

                        @foreach($languages as $language)
                        <tr>
                            <td>{{$loop->iteration}}</td>
                            <td>{{$language->name_ar}}</td>
                            <td> {!!  \Illuminate\Support\Str::limit($language->description_ar, $limit = 30, $end = '....' ) !!}</td>
                            <td><img src="{{$language->photo}}" width="36" height="36" class="rounded-circle"  alt="{{optional($language->attachment)->path}}"></td>
                            <td title="{{$language->created_at->format('H:i')}}">{{$language->created_at->format('Y-m-d')}}</td>
                            <td>
                                @if ($language->status == 1)
                                <span class="badge badge-success">نشط</span>
                                @elseif ($language->status == 0)
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
                                            <a href="{{route('languages.edit',$language->id)}}" class="dropdown-item"><i class="icon-pencil7"></i> تعديل لغة {{$language->name_ar}}</a>
                                            <a href="{{route('languages.show',$language->id)}}" class="dropdown-item"><i class="icon-eye8"></i> شاهد لغة {{$language->name_ar}}</a>
                                            {!! Form::open([
                                                 'action' => ['Admin\LanguageController@destroy',$language->id],
                                                 'method' => 'delete'
                                             ])!!}
                                            <button class="dropdown-item" onclick="return confirm('هل أنت متأكد من حذف لغة {{$language->name_ar}} ؟');"><i class="icon-trash-alt" ></i> حذف لغة {{$language->name_ar}}</button>
                                            {!! Form::close() !!}
                                        </div>
                                    </div>
                                </div>
                            </td>
                        </tr>
                        @endforeach

                        <div class="text-center">
                            {!! $languages->render() !!}
                        </div>

                        </tbody>
                    </table>
                </div><!-- /custom handle -->
            </div>
        </div><!-- /collapsible lists -->
    </div><!-- /content area -->
@endsection
