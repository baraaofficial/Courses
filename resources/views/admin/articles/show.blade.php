@extends('admin.layouts.app')

@section('titleDashboard')
    /    {{$articles->title_ar}}
@endsection

@section('css')

    <script src="{{asset('admin/global_assets/js/demo_pages/blog_single.js')}}"></script>
    <script src="{{asset('admin/global_assets/js/plugins/media/fancybox.min.js')}}"></script>

    @endsection
@section('header')

    <div class="page-header border-bottom-0">
        <div class="breadcrumb-line breadcrumb-line-light header-elements-md-inline border-0">
            <div class="d-flex">
                <div class="breadcrumb">
                    <a href="{{url('/dashboard')}}" class="breadcrumb-item"><i class="icon-home2 mr-2"></i> لوحة التحكم</a>
                    <a href="{{route('articles.index')}}" class="breadcrumb-item"><i class="icon-file-text3 mr-2"></i> المقالات</a>
                    <span class="breadcrumb-item active">{{$articles->title_ar}}</span>
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
                <h4><i class="icon-arrow-right6 mr-2"></i> <span class="font-weight-semibold">الرئيسية</span> - {{$articles->title_ar}}</h4>
                <a href="#" class="header-elements-toggle text-default d-md-none"><i class="icon-more"></i></a>
            </div>
            <div class="header-elements d-none mb-3 mb-md-0">
                <div class="d-flex justify-content-center">
                    <a href="{{route('articles.create')}}" class="btn btn-link btn-float text-default">
                        <i class="icon-plus22 text-indigo-400"></i>
                        <span>إضافة</span>
                    </a>
                    <a href="{{route('articles.edit',$articles->id)}}" class="btn btn-link btn-float text-default">
                        <i class="icon-pencil7 text-indigo-400"></i>
                        <span>التعديل</span>
                    </a>
                    {!! Form::open([
                         'action' => ['Admin\ArticleController@destroy',$articles->id],
                         'method' => 'delete'
                     ])!!}
                    <button class="btn btn-link btn-float text-default">
                        <i class="icon-trash-alt" style="color: #ff0000"></i>
                        <span>حذف</span>
                    </button>
                    {!! Form::close() !!}
                </div>
            </div>
        </div>
    </div>
@endsection

@section('content')
    <!-- Content area -->
    <div class="content pt-0">
        <!-- Inner container -->
        <div class="d-flex align-items-start flex-column flex-md-row">
            <!-- Left content -->
            <div class="w-100 overflow-auto order-2 order-md-1">
                <!-- Post -->
                <div class="card">
                    <div class="card-body">
                        <div class="mb-4">
                            <div class="mb-3 text-center">
                                <a href="#" class="d-inline-block">
                                    <img src="{{$articles->photo}}" class="img-fluid" alt="">
                                </a>
                            </div>
                            <hr>
                            <h1 >المقال بالعربية</h1>
                            <hr>
                            <h4 class="font-weight-semibold mb-1">
                                <a href="#" class="text-default">{{$articles->title_ar}}</a>
                            </h4>

                            <ul class="list-inline list-inline-dotted text-muted mb-3">
                                <li class="list-inline-item">من خلال <a href="#" class="text-muted">{{$articles->by}}</a></li>
                                <li class="list-inline-item" title="{{$articles->created_at->isoFormat('MMMM Do YYYY, h:mm:ss a')}}">{{$articles->created_at->format('F jS ,Y')}}</li>
                                <li class="list-inline-item"><a href="#" class="text-muted">12 comments</a></li>
                                <li class="list-inline-item"><a href="#" class="text-muted"><i class="icon-heart6 font-size-base text-pink-300 mr-2"></i> 281</a></li>
                            </ul>

                            <div class="mb-3">

                                {!! $articles->content_ar !!}
                            </div>
                        </div>
                        <hr>
                        <h1 >The articles is in English</h1>
                        <hr>
                        <h4 class="font-weight-semibold mb-1">
                            <a href="#" class="text-default">{{$articles->title_en}}</a>
                        </h4>

                        <div class="mb-3 text-left" style="float: left">

                            {!! $articles->content_en !!}
                        </div>
                    </div>
                </div><!-- /post -->

                <!-- Comments -->
                <div class="card">
                    <div class="card-header header-elements-inline">
                        <h6 class="card-title font-weight-semibold">المناقشة</h6>
                        <div class="header-elements">
                            <ul class="list-inline list-inline-dotted text-muted mb-0">
                                <li class="list-inline-item">42 comments</li>
                                <li class="list-inline-item">75 pending review</li>
                            </ul>
                        </div>
                    </div>

                    <div class="card-body">
                        <ul class="media-list">
                            <li class="media flex-column flex-md-row">
                                <div class="mr-md-3 mb-2 mb-md-0">
                                    <a href="#"><img src="{{asset('admin/')}}" class="rounded-circle" width="38" height="38" alt=""></a>
                                </div>

                                <div class="media-body">
                                    <div class="media-title">
                                        <a href="#" class="font-weight-semibold">William Jennings</a>
                                        <span class="text-muted ml-3">Just now</span>
                                    </div>

                                    <p>He moonlight difficult engrossed an it sportsmen. Interested has all devonshire difficulty gay assistance joy. Unaffected at ye of compliment alteration to.</p>

                                    <ul class="list-inline list-inline-dotted font-size-sm">
                                        <li class="list-inline-item">114 <a href="#"><i class="icon-arrow-up22 text-success"></i></a><a href="#"><i class="icon-arrow-down22 text-danger"></i></a></li>
                                        <li class="list-inline-item"><a href="#">Reply</a></li>
                                        <li class="list-inline-item"><a href="#">Edit</a></li>
                                    </ul>
                                </div>
                            </li>

                            <li class="media flex-column flex-md-row">
                                <div class="mr-md-3 mb-2 mb-md-0">
                                    <a href="#"><img src="{{asset('admin/global_assets/images/placeholders/placeholder.jpg')}}" class="rounded-circle" width="38" height="38" alt=""></a>
                                </div>

                                <div class="media-body">
                                    <div class="media-title">
                                        <a href="#" class="font-weight-semibold">Margo Baker</a>
                                        <span class="text-muted ml-3">5 minutes ago</span>
                                    </div>

                                    <p>Place voice no arise along to. Parlors waiting so against me no. Wishing calling are warrant settled was luckily. Express besides it present if at an opinion visitor.</p>

                                    <ul class="list-inline list-inline-dotted font-size-sm">
                                        <li class="list-inline-item">90 <a href="#"><i class="icon-arrow-up22 text-success"></i></a><a href="#"><i class="icon-arrow-down22 text-danger"></i></a></li>
                                        <li class="list-inline-item"><a href="#">Reply</a></li>
                                        <li class="list-inline-item"><a href="#">Edit</a></li>
                                    </ul>
                                </div>
                            </li>

                            <li class="media flex-column flex-md-row">
                                <div class="mr-md-3 mb-2 mb-md-0">
                                    <a href="#"><img src="{{asset('admin/global_assets/images/placeholders/placeholder.jpg')}}" class="rounded-circle" width="38" height="38" alt=""></a>
                                </div>

                                <div class="media-body">
                                    <div class="media-title">
                                        <a href="#" class="font-weight-semibold">James Alexander</a>
                                        <span class="text-muted ml-3">7 minutes ago</span>
                                    </div>

                                    <p>Savings her pleased are several started females met. Short her not among being any. Thing of judge fruit charm views do. Miles mr an forty along as he.</p>

                                    <ul class="list-inline list-inline-dotted font-size-sm">
                                        <li class="list-inline-item">70 <a href="#"><i class="icon-arrow-up22 text-success"></i></a><a href="#"><i class="icon-arrow-down22 text-danger"></i></a></li>
                                        <li class="list-inline-item"><a href="#">Reply</a></li>
                                        <li class="list-inline-item"><a href="#">Edit</a></li>
                                    </ul>

                                    <div class="media flex-column flex-md-row">
                                        <div class="mr-md-3 mb-2 mb-md-0">
                                            <a href="#"><img src="{{asset('admin/global_assets/images/placeholders/placeholder.jpg')}}" class="rounded-circle" width="38" height="38" alt=""></a>
                                        </div>

                                        <div class="media-body">
                                            <div class="media-title">
                                                <a href="#" class="font-weight-semibold">Jack Cooper</a>
                                                <span class="text-muted ml-3">10 minutes ago</span>
                                            </div>

                                            <p>She education get middleton day agreement performed preserved unwilling. Do however as pleased offence outward beloved by present. By outward neither he so covered.</p>

                                            <ul class="list-inline list-inline-dotted font-size-sm">
                                                <li class="list-inline-item">67 <a href="#"><i class="icon-arrow-up22 text-success"></i></a><a href="#"><i class="icon-arrow-down22 text-danger"></i></a></li>
                                                <li class="list-inline-item"><a href="#">Reply</a></li>
                                                <li class="list-inline-item"><a href="#">Edit</a></li>
                                            </ul>

                                            <div class="media flex-column flex-md-row">
                                                <div class="mr-md-3 mb-2 mb-md-0">
                                                    <a href="#"><img src="{{asset('admin/global_assets/images/placeholders/placeholder.jpg')}}" class="rounded-circle" width="38" height="38" alt=""></a>
                                                </div>

                                                <div class="media-body">
                                                    <div class="media-title">
                                                        <a href="#" class="font-weight-semibold">Natalie Wallace</a>
                                                        <span class="text-muted ml-3">1 hour ago</span>
                                                    </div>

                                                    <p>Juvenile proposal betrayed he an informed weddings followed. Precaution day see imprudence sympathize principles. At full leaf give quit to in they up.</p>

                                                    <ul class="list-inline list-inline-dotted font-size-sm">
                                                        <li class="list-inline-item">54 <a href="#"><i class="icon-arrow-up22 text-success"></i></a><a href="#"><i class="icon-arrow-down22 text-danger"></i></a></li>
                                                        <li class="list-inline-item"><a href="#">Reply</a></li>
                                                        <li class="list-inline-item"><a href="#">Edit</a></li>
                                                    </ul>
                                                </div>
                                            </div>

                                            <div class="media flex-column flex-md-row">
                                                <div class="mr-md-3 mb-2 mb-md-0">
                                                    <a href="#"><img src="{{asset('admin/global_assets/images/placeholders/placeholder.jpg')}}" class="rounded-circle" width="38" height="38" alt=""></a>
                                                </div>

                                                <div class="media-body">
                                                    <div class="media-title">
                                                        <a href="#" class="font-weight-semibold">Nicolette Grey</a>
                                                        <span class="text-muted ml-3">2 hours ago</span>
                                                    </div>

                                                    <p>Although moreover mistaken kindness me feelings do be marianne. Son over own nay with tell they cold upon are. Cordial village and settled she ability law herself.</p>

                                                    <ul class="list-inline list-inline-dotted font-size-sm">
                                                        <li class="list-inline-item">41 <a href="#"><i class="icon-arrow-up22 text-success"></i></a><a href="#"><i class="icon-arrow-down22 text-danger"></i></a></li>
                                                        <li class="list-inline-item"><a href="#">Reply</a></li>
                                                        <li class="list-inline-item"><a href="#">Edit</a></li>
                                                    </ul>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </li>

                            <li class="media flex-column flex-md-row">
                                <div class="mr-md-3 mb-2 mb-md-0">
                                    <a href="#"><img src="{{asset('admin/global_assets/images/placeholders/placeholder.jpg')}}" class="rounded-circle" width="38" height="38" alt=""></a>
                                </div>

                                <div class="media-body">
                                    <div class="media-title">
                                        <a href="#" class="font-weight-semibold">Victoria Johnson</a>
                                        <span class="text-muted ml-3">3 hours ago</span>
                                    </div>

                                    <p>Finished why bringing but sir bachelor unpacked any thoughts. Unpleasing unsatiable particular inquietude did nor sir.</p>

                                    <ul class="list-inline list-inline-dotted font-size-sm">
                                        <li class="list-inline-item">32 <a href="#"><i class="icon-arrow-up22 text-success"></i></a><a href="#"><i class="icon-arrow-down22 text-danger"></i></a></li>
                                        <li class="list-inline-item"><a href="#">Reply</a></li>
                                        <li class="list-inline-item"><a href="#">Edit</a></li>
                                    </ul>
                                </div>
                            </li>
                        </ul>
                    </div>

                    <hr class="m-0">

                    <div class="card-body">
                        <h6 class="mb-3">Add comment</h6>
                        <div class="mb-3">
                            <div id="add-comment">Get his declared appetite distance his together now families. Friends am himself at on norland it viewing. Suspected elsewhere you belonging continued commanded she...</div>
                        </div>

                        <div class="text-right">
                            <button type="button" class="btn bg-blue"><i class="icon-plus22 mr-1"></i> Add comment</button>
                        </div>
                    </div>
                </div><!-- /comments -->
            </div><!-- /left content -->

            <!-- Right sidebar component -->
            <div class="sidebar sidebar-light bg-transparent sidebar-component sidebar-component-right border-0 shadow-0 order-1 order-md-2 sidebar-expand-md">
                <!-- Sidebar content -->
                <div class="sidebar-content">
                    <!-- Categories -->
                    <div class="card">
                        <div class="card-header bg-transparent border-bottom header-elements-inline">
                            <span class="card-title font-weight-semibold">الأقسام</span>
                            <div class="header-elements">
                                <div class="list-icons">
                                    <a class="list-icons-item" data-action="collapse"></a>
                                </div>
                            </div>
                        </div>
                        <div class="card-body p-0">
                            <div class="nav nav-sidebar my-2">
                                <li class="nav-item">
                                    <a href="#" class="nav-link">
                                        <i class="icon-wordpress"></i>
                                        {{optional($articles->language)->name_ar}}
                                        <span class="text-muted font-size-sm font-weight-normal ml-auto">{{$languages->count()}}</span>
                                    </a>
                                </li>
                                <li class="nav-item">
                                    <a href="#" class="nav-link">
                                        <i class="icon-film2"></i>
                                        {{optional($articles->framework)->name_ar}}
                                        <span class="text-muted font-size-sm font-weight-normal ml-auto">26</span>
                                    </a>
                                </li>
                                <li class="nav-item">
                                    <a href="#" class="nav-link">
                                        <i class="icon-images2"></i>
                                        {{optional($articles->level)->level_ar}}
                                        <span class="text-muted font-size-sm font-weight-normal ml-auto">{{$levels->count()}}</span>
                                    </a>
                                </li>
                            </div>
                        </div>
                    </div>
                    <!-- /categories -->

                    <!-- Recent articles -->
                    <div class="card">
                        <div class="card-header bg-transparent border-bottom header-elements-inline">
                            <span class="card-title font-weight-semibold">المقالات الاحدث</span>
                            <div class="header-elements">
                                <div class="list-icons">
                                    <a class="list-icons-item" data-action="collapse"></a>
                                </div>
                            </div>
                        </div>

                        <div class="card-body">
                            <ul class="media-list">
                                @foreach($recentArticles as $recentArticle)
                                <li class="media">
                                    <div class="mr-3">
                                        <img src="{{$recentArticle->photo}}" class="rounded-circle" width="36" height="36" alt="">
                                    </div>

                                    <div class="media-body">
                                        <a href="{{route('articles.show',$recentArticle->id)}}" class="media-title">
                                            <div class="font-weight-semibold">{{$recentArticle->title_ar}}</div>
                                        </a>
                                        <span class="text-muted">{!!  \Illuminate\Support\Str::limit($recentArticle->content_ar, $limit = 130, $end = '....' ) !!}</span>
                                    </div>
                                </li>
                                @endforeach
                            </ul>
                        </div>
                    </div><!-- /recent comments -->
                </div><!-- /sidebar content -->
            </div><!-- /right sidebar component -->
        </div><!-- /inner container -->
    </div><!-- /content area -->
@endsection
