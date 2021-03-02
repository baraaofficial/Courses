@extends('admin.layouts.app')

@section('titleDashboard')
    / المقالات المحذوفة
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
                    <span class="breadcrumb-item active">المقالات المحذوفة</span>
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
                <h4><i class="icon-arrow-right6 mr-2"></i> <span class="font-weight-semibold">الرئيسية</span> - المقالات المحذوفة</h4>
                <a href="#" class="header-elements-toggle text-default d-md-none"><i class="icon-more"></i></a>
            </div>

            <div class="header-elements d-none mb-3 mb-md-0">
                <div class="d-flex justify-content-center">
                    <a href="{{route('articles.create')}}" class="btn btn-link btn-float text-default">
                        <i class="icon-file-plus2 text-indigo-400"></i>
                        <span>إضافة مقالات جديدة</span>
                    </a>
                </div>
            </div>
        </div>
    </div>
@endsection


@section('content')
    <!-- Search field -->
    <div class="card">
        <div class="card-body">
            <h5 class="mb-3">إبحث في المقالت</h5>

            <form action="" method="get">
                <div class="input-group mb-3">
                    <div class="form-group-feedback form-group-feedback-left">
                        <input type="text" class="form-control form-control-lg" name="keyword" value="" placeholder="إترك بحثك هنا وليكن اسم المقال او الوصف">
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
    @if (count($articles) == 0)

        <div class="alert alert-info alert-styled-left alert-dismissible">
            <button type="button" class="close" data-dismiss="alert"><span>&times;</span></button>
            <span class="font-weight-semibold">لا توجد مقالات محذوفة بعد!</span>
        </div>
    @else

    <!-- Content area -->
    <div class="content">
        <!-- Post grid -->
        <div class="row">
            @foreach($articles as $article)
                <div class="col-md-4">
                    <div class="card">
                        <div class="card-body">
                            <div class="card-img-actions mb-3">
                                <img class="card-img img-fluid" src="{{$article->photo}}" alt="{{$article->photo}}">
                                <div class="card-img-actions-overlay card-img">
                                    <a href="{{route('article.recovery', $article->id)}}" class="btn btn-outline bg-white text-white border-white border-2 btn-icon rounded-round">
                                        <i class="icon-rotate-cw2"></i>
                                    </a>
                                    {!! Form::open(array(
                                          'style' => 'display: inline-block;',
                                          'method' => 'DELETE',
                                          'onsubmit' => "return confirm('".trans("هل أنت متأكد من حذف $article->title_ar نهائياَ؟")."');",
                                          'route' => ['article.forcedelete', $article->id]))
                                     !!}
                                    <button class="btn btn-outline bg-white text-white border-white border-2 btn-icon rounded-round">
                                        <i class="icon-trash-alt"></i>
                                    </button>
                                    {!! Form::close() !!}

                                </div>
                            </div>

                            <h5 class="font-weight-semibold mb-1">
                                <a href="#" class="text-default">{{$article->title_ar}}</a>
                            </h5>

                            <ul class="list-inline list-inline-dotted text-muted mb-3">
                                <li class="list-inline-item">من خلال <a href="#" class="text-muted">{{$article->by}}</a></li>
                                <li class="list-inline-item" title="{{$article->created_at->isoFormat('MMMM Do YYYY, h:mm:ss a')}}">{{$article->created_at->format('F jS ,Y')}}</li>
                            </ul>
                            {!!  \Illuminate\Support\Str::limit($article->content_ar, $limit = 264, $end = '....' ) !!}
                        </div>
                    </div>
                </div>
            @endforeach
        </div><!-- /post grid -->

        <!-- Pagination -->
        <div class="d-flex justify-content-center mt-3 mb-3">
            <ul class="pagination shadow-1">
                {!! $articles->render() !!}
            </ul>
        </div><!-- /pagination -->
    </div><!-- /content area -->
    @endif
@endsection
