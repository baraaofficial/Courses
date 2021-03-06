@extends('admin.layouts.app')

@section('titleDashboard')
    /  تعديل لغة {{$model->name_ar}}

@endsection
@section('css')
    <!-- Theme JS files -->
    <script src="{{asset('admin/global_assets/js/plugins/forms/validation/validate.min.js')}}"></script>
    <script src="{{asset('admin/global_assets/js/plugins/forms/inputs/touchspin.min.js')}}"></script>
    <script src="{{asset('admin/global_assets/js/plugins/forms/selects/select2.min.js')}}"></script>
    <script src="{{asset('admin/global_assets/js/plugins/forms/styling/switch.min.js')}}"></script>
    <script src="{{asset('admin/global_assets/js/plugins/forms/styling/switchery.min.js')}}"></script>
    <script src="{{asset('admin/global_assets/js/plugins/forms/styling/uniform.min.js')}}"></script>
    <script src="{{asset('admin/global_assets/js/demo_pages/form_checkboxes_radios.js')}}"></script>
    <script src="{{asset('admin/global_assets/js/demo_pages/form_validation.js')}}"></script>
    <!-- Theme JS files -->
    <script src="{{asset('admin/global_assets/js/demo_pages/form_inputs.js')}}"></script>
    <script src="{{asset('admin/global_assets/js/demo_pages/form_controls_extended.js')}}"></script>
    <script src="{{asset('admin/global_assets/js/plugins/forms/inputs/maxlength.min.js')}}"></script>
    <script src="{{asset('admin/global_assets/js/plugins/forms/inputs/passy.js')}}"></script>
    <script src="{{asset('admin/global_assets/js/demo_pages/form_input_groups.js')}}"></script>
    <script src="{{asset('admin/global_assets/js/plugins/editors/ckeditor/ckeditor.js')}}"></script>
    <script src="{{asset('admin/global_assets/js/demo_pages/editor_ckeditor_dark.js')}}"></script>
    <script src="{{asset('admin/global_assets/js/demo_pages/uploader_bootstrap.js')}}"></script>
    <script src="{{asset('admin/global_assets/js/plugins/uploaders/fileinput/fileinput.min.js')}}"></script>
    <!-- /theme JS files -->
@endsection
@section('header')
    <div class="page-header border-bottom-0">
        <div class="breadcrumb-line breadcrumb-line-light header-elements-md-inline border-0">
            <div class="d-flex">
                <div class="breadcrumb">
                    <a href="{{url('/dashboard')}}" class="breadcrumb-item"><i class="icon-home2 mr-2"></i> لوحة التحكم</a>
                    <a href="{{route('languages.index')}}" class="breadcrumb-item"><i class="icon-sphere3 mr-2"></i> اللغات</a>
                    <span class="breadcrumb-item active">  تعديل لغة {{$model->name_ar}}</span>
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
                <h4><i class="icon-arrow-right6 mr-2"></i> <span class="font-weight-semibold">الرئيسية</span> -   تعديل لغة {{$model->name_شق}}</h4>
                <a href="#" class="header-elements-toggle text-default d-md-none"><i class="icon-more"></i></a>
            </div>

        </div>
    </div>
@endsection

@section('content')

    <!-- Content area -->
    <div class="content">

        <!-- Form validation -->
        <div class="card">
            <div class="card-header header-elements-inline">
                <h5 class="card-title"> التعديل على لغة {{$model->name_ar}}</h5>
                <div class="header-elements">
                    <div class="list-icons">
                        <a class="list-icons-item" data-action="collapse"></a>
                        <a class="list-icons-item" id="reload" data-action="reload"></a>
                        <a class="list-icons-item" data-action="remove"></a>
                    </div>
                </div>
            </div>

            <div class="card-body">
                <p class="mb-4">أملء النموذج وتحقق جيداً من البيانات</p>
                @include('admin.layouts.partials.validation-errors')

                <form class="form-validate-jquery" action="{{route('frameworks.update',$model->id)}}" method="POST" files="true" enctype="multipart/form-data">
                    @csrf
                    {{ method_field('put') }}

                    <fieldset class="mb-3">
                        <legend class="text-uppercase font-size-sm font-weight-bold">بيانات اللغه</legend>

                        @include('admin.frameworks.form')
                        @php $inputby = "by"; @endphp
                        <div class="form-group row" dir="ltr">
                            <div class="col-lg-9">
                                <div class="form-group-feedback form-group-feedback-left">
                                    <div class="input-group">

                                        <input type="hidden" name="{{$inputby}}" id="{{$inputby}}" class="form-control maxlength-badge-position @error($inputby) border-danger-400 @enderror" maxlength="199" placeholder="Language name" value="{{Auth()->user()->name}}" required>
                                        @error($inputby)
                                        <div class="form-control-feedback text-danger-400">
                                            <i class="icon-cancel-circle2"></i>
                                        </div>
                                        @enderror
                                    </div>
                                </div>
                                @error($inputby)
                                <span class="form-text text-danger-400">{{ $message }}</span>
                                @enderror
                            </div>
                        </div><!-- End name en input -->
                    </fieldset>


                    <div class="d-flex justify-content-end align-items-center">
                        <button type="reset" class="btn btn-light" id="reset">إعاداة الإدخال <i class="icon-reload-alt ml-2"></i></button>
                        <button type="submit" class="btn btn-primary ml-3" > تعديل {{$model->name_ar}} <i class="icon-paperplane ml-2"></i></button>
                    </div>
                </form>
            </div>
        </div>
        <!-- /form validation -->

    </div>
    <!-- /content area -->
@endsection
