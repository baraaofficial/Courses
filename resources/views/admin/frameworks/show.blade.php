@extends('admin.layouts.app')

@section('titleDashboard')
    /    {{$languages->name_ar}}
@endsection

@section('css')
    <script src="{{asset('admin/global_assets/js/plugins/ui/fullcalendar/core/main.min.js')}}"></script>
    <script src="{{asset('admin/global_assets/js/plugins/ui/fullcalendar/daygrid/main.min.js')}}"></script>
    <script src="{{asset('admin/global_assets/js/plugins/ui/fullcalendar/timegrid/main.min.js')}}"></script>
    <script src="{{asset('admin/global_assets/js/plugins/ui/fullcalendar/interaction/main.min.js')}}"></script>
    <script src="{{asset('admin/global_assets/js/plugins/visualization/echarts/echarts.min.js')}}"></script>
    @include('admin.charts.languages')
    <script src="{{asset('admin/global_assets/js/demo_pages/timelines.js')}}"></script>
    <script src="{{asset('admin/global_assets/js/demo_charts/echarts/dark/bars/tornado_negative_stack.js')}}"></script>


    <script src="{{asset('admin/global_assets/js/demo_pages/blog_single.js')}}"></script>
    <script src="{{asset('admin/global_assets/js/plugins/media/fancybox.min.js')}}"></script>


    @endsection
@section('header')
    <div class="page-header border-bottom-0">
        <div class="breadcrumb-line breadcrumb-line-light header-elements-md-inline border-0">
            <div class="d-flex">
                <div class="breadcrumb">
                    <a href="{{url('/dashboard')}}" class="breadcrumb-item"><i class="icon-home2 mr-2"></i> لوحة التحكم</a>
                    <a href="{{route('languages.index')}}" class="breadcrumb-item"><i class="icon-sphere3 mr-2"></i> اللغات</a>
                    <span class="breadcrumb-item active">{{$languages->name_ar}}</span>
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
                <h4><i class="icon-arrow-right6 mr-2"></i> <span class="font-weight-semibold">الرئيسية</span> - إضافة لغة جديدة</h4>
                <a href="#" class="header-elements-toggle text-default d-md-none"><i class="icon-more"></i></a>
            </div>
            <div class="header-elements d-none mb-3 mb-md-0">
                <div class="d-flex justify-content-center">
                    <a href="{{route('languages.create')}}" class="btn btn-link btn-float text-default">
                        <i class="icon-plus22 text-indigo-400"></i>
                        <span>إضافة</span>
                    </a>
                    <a href="{{route('languages.edit',$languages->id)}}" class="btn btn-link btn-float text-default">
                        <i class="icon-pencil7 text-indigo-400"></i>
                        <span>التعديل</span>
                    </a>
                    {!! Form::open([
                         'action' => ['Admin\LanguageController@destroy',$languages->id],
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

        <div class="card">
        <div class="card-body">
            <div class="mb-4">
                <div class="mb-3 text-center">
                    <a href="#" class="d-inline-block">
                        <img src="{{asset($languages->image)}}" class="img-fluid" alt="">
                    </a>
                </div>

                <h4 class="font-weight-semibold mb-1">
                    <a href="#" class="text-default">{{$languages->name_ar}}</a>
                </h4>

                <ul class="list-inline list-inline-dotted text-muted mb-3">
                    <li class="list-inline-item">من خلال : <a href="#" class="text-muted">{{$languages->by}}</a></li>
                    <li class="list-inline-item" title="{{$languages->created_at->format('H:i')}}" >{{$languages->created_at->isoFormat('Do MMMM YYYY', 'MMMM YYYY')}}</li>
                    <li class="list-inline-item"><a href="#" class="text-muted">12 comments</a></li>
                    <li class="list-inline-item"><a href="#" class="text-muted"><i class="icon-heart6 font-size-base text-pink-300 mr-2"></i> 281</a></li>
                </ul>
                <hr>
                <div class="mb-3">
                    <h3 class="font-weight-semibold">الوصف باللغه العربيه</h3>
                    <hr>
                    {!! $languages->description_ar !!}
                    <br>
                    <hr>


                    <h3 class="font-weight-semibold text-left"  >The description is in English</h3>
                    <hr>
                    <div dir="ltr" class="text-left" style="float: left">
                        {!! $languages->description_en !!}
                    </div>
                </div>

            </div>

            <div class="mb-4">


                <p>Raising say express had chiefly detract demands she. Quiet led own cause three him. Front no party young abode state up. Saved he do fruit woody of to. Met defective are allowance two perceived listening consulted contained. It chicken oh colonel pressed excited suppose to shortly. He improve started no we manners however effects. Prospect humoured mistress to by proposal marianne attended. Simplicity the far admiration preference everything. Up help home head spot an he room in.</p>

                <p>Unpleasant nor diminution excellence apartments imprudence the met new. Draw part them he an to he roof only. Music leave say doors him. Tore bred form if sigh case as do. Staying he no looking if do opinion. Sentiments way understood end partiality and his.</p>
            </div>

        </div>
    </div>

        <div class="card">
            <div class="card-header header-elements-inline">
                <h6 class="card-title">Daily statistics</h6>
                <div class="header-elements">
                    <span><i class="icon-history mr-2 text-success"></i> Updated 3 hours ago</span>

                    <div class="list-icons ml-3">
                        <a class="list-icons-item" data-action="reload"></a>
                    </div>
                </div>
            </div>

            <div class="card-body">
                <div class="chart-container">
                    <div class="chart has-fixed-height" id="daily_statistics"></div>
                </div>
            </div>
        </div>

        <div class="row">
            <div class="col-lg-6">
                <div class="card">
                    <div class="card-header header-elements-sm-inline">
                        <h6 class="card-title">Himalayan sunset</h6>
                        <div class="header-elements">
                            <span><i class="icon-checkmark-circle mr-2 text-success"></i> 49 minutes ago</span>
                            <div class="list-icons ml-3">
                                <div class="dropdown">
                                    <a href="#" class="list-icons-item caret-0 dropdown-toggle" data-toggle="dropdown">
                                        <i class="icon-arrow-down12"></i>
                                    </a>

                                    <div class="dropdown-menu">
                                        <a href="#" class="dropdown-item"><i class="icon-user-lock"></i> Hide user posts</a>
                                        <a href="#" class="dropdown-item"><i class="icon-user-block"></i> Block user</a>
                                        <a href="#" class="dropdown-item"><i class="icon-user-minus"></i> Unfollow user</a>
                                        <div class="dropdown-divider"></div>
                                        <a href="#" class="dropdown-item"><i class="icon-embed"></i> Embed post</a>
                                        <a href="#" class="dropdown-item"><i class="icon-blocked"></i> Report this post</a>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>

                    <div class="card-body">
                        <div class="card-img-actions mb-3">
                            <img class="card-img img-fluid" src="{{asset('admin/global_assets/images/placeholders/cover.jpg')}}" alt="">
                            <div class="card-img-actions-overlay card-img">
                                <a href="blog_single.html" class="btn btn-outline bg-white text-white border-white border-2 btn-icon rounded-round">
                                    <i class="icon-link"></i>
                                </a>
                            </div>
                        </div>

                        <h6 class="mb-3">
                            <i class="icon-comment-discussion mr-2"></i>
                            <a href="#">Jason Ansley</a> commented:
                        </h6>

                        <blockquote class="blockquote blockquote-bordered py-2 pl-3 mb-0">
                            <p class="mb-2 font-size-base">When suspiciously goodness labrador understood rethought yawned grew piously endearingly inarticulate oh goodness jeez trout distinct hence cobra despite taped laughed the much audacious less inside tiger groaned darn stuffily metaphoric unihibitedly inside cobra.</p>
                            <footer class="blockquote-footer">Jason, <cite title="Source Title">10:39 am</cite></footer>
                        </blockquote>
                    </div>

                    <div class="card-footer bg-transparent d-sm-flex justify-content-sm-between align-items-sm-center border-top-0 pt-0 pb-3">
                        <ul class="list-inline mb-0">
                            <li class="list-inline-item"><a href="#" class="text-default"><i class="icon-eye4 mr-2"></i> 438</a></li>
                            <li class="list-inline-item"><a href="#" class="text-default"><i class="icon-comment-discussion mr-2"></i> 71</a></li>
                        </ul>

                        <a href="#" class="d-inline-block text-default mt-2 mt-sm-0">Read post <i class="icon-arrow-left13 ml-2"></i></a>
                    </div>
                </div>
            </div>

            <div class="col-lg-6">
                <div class="card">
                    <div class="card-header header-elements-sm-inline">
                        <h6 class="card-title">Diving lesson in Dubai</h6>
                        <div class="header-elements">
                            <span><i class="icon-checkmark-circle mr-2 text-success"></i> 3 hours ago</span>
                            <div class="list-icons ml-3">
                                <div class="dropdown">
                                    <a href="#" class="list-icons-item caret-0 dropdown-toggle" data-toggle="dropdown">
                                        <i class="icon-arrow-down12"></i>
                                    </a>

                                    <div class="dropdown-menu">
                                        <a href="#" class="dropdown-item"><i class="icon-user-lock"></i> Hide user posts</a>
                                        <a href="#" class="dropdown-item"><i class="icon-user-block"></i> Block user</a>
                                        <a href="#" class="dropdown-item"><i class="icon-user-minus"></i> Unfollow user</a>
                                        <div class="dropdown-divider"></div>
                                        <a href="#" class="dropdown-item"><i class="icon-embed"></i> Embed post</a>
                                        <a href="#" class="dropdown-item"><i class="icon-blocked"></i> Report this post</a>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>

                    <div class="card-body">
                        <div class="card-img-actions mb-3">
                            <img class="card-img img-fluid" src="{{asset('admin/global_assets/images/placeholders/cover.jpg')}}" alt="">
                            <div class="card-img-actions-overlay card-img">
                                <a href="blog_single.html" class="btn btn-outline bg-white text-white border-white border-2 btn-icon rounded-round">
                                    <i class="icon-link"></i>
                                </a>
                            </div>
                        </div>

                        <h6 class="mb-3">
                            <i class="icon-comment-discussion mr-2"></i>
                            <a href="#">Melanie Watson</a> commented:
                        </h6>

                        <blockquote class="blockquote blockquote-bordered py-2 pl-3 mb-0">
                            <p class="mb-2 font-size-base">Pernicious drooled tryingly over crud peaceful gosh yet much following brightly mallard hey gregariously far gosh until earthworm python some impala belched darn a sighed unicorn much changed and astride cat and burned grizzly when jeez wonderful the outside tedious.</p>
                            <footer class="blockquote-footer">Melanie, <cite title="Source Title">12:56 am</cite></footer>
                        </blockquote>
                    </div>

                    <div class="card-footer bg-transparent d-sm-flex justify-content-sm-between align-items-sm-center border-top-0 pt-0 pb-3">
                        <ul class="list-inline mb-0">
                            <li class="list-inline-item"><a href="#" class="text-default"><i class="icon-eye4 mr-2"></i> 438</a></li>
                            <li class="list-inline-item"><a href="#" class="text-default"><i class="icon-comment-discussion mr-2"></i> 71</a></li>
                        </ul>

                        <a href="#" class="d-inline-block text-default mt-2 mt-sm-0">Read post <i class="icon-arrow-left13 ml-2"></i></a>
                    </div>
                </div>
            </div>
        </div>
    </div><!-- /content area -->
@endsection
