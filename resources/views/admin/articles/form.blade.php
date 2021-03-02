<ul class="nav nav-tabs nav-bordered">
    <li class="nav-item">
        <a href="#ar" data-toggle="tab" aria-expanded="false" class="nav-link active">
            العربية
        </a>
    </li>
    <li class="nav-item">
        <a href="#en" data-toggle="tab" aria-expanded="true" class="nav-link">
            English
        </a>
    </li>
</ul>
<div class="tab-content">
    <div class="tab-pane show active" id="ar">
        <!-- Start title ar input -->
        @php $inputtitle_ar = "title_ar"; @endphp
        <div class="form-group row">
            <label class="col-form-label col-lg-3">عنوان المقالة <span class="text-danger">*</span></label>
            <div class="col-lg-9">
                <div class="form-group-feedback form-group-feedback-right">
                    <div class="input-group">
                        <span class="input-group-prepend">
                            <span class="input-group-text"><i class="icon-sphere3"></i></span>
                        </span>
                        <input type="text" name="{{$inputtitle_ar}}" id="title_ar" class="form-control maxlength-badge-position @error($inputtitle_ar) border-danger-400 @enderror" maxlength="199" placeholder="عنوان المقالة" value="{{Request::old($inputtitle_ar) ? Request::old($inputtitle_ar) : $model->$inputtitle_ar}}" required>
                        @error($inputtitle_ar)
                        <div class="form-control-feedback text-danger-400">
                            <i class="icon-cancel-circle2"></i>
                        </div>
                        @enderror
                    </div>
                </div>
                @error($inputtitle_ar)
                <span class="form-text text-danger-400">{{ $message }}</span>
                @enderror
            </div>
        </div><!-- End title ar input -->

        <!-- Start content ar input -->
        @php $content_ar = "content_ar"; @endphp
        <div class="form-group row">
            <label class="col-form-label col-lg-3">وصف المقالة <span class="text-danger">*</span></label>
            <div class="col-lg-9">
                <textarea name="{{$content_ar}}" id="editor-full" rows="4" cols="4">
                    {{Request::old($content_ar) ? Request::old($content_ar) : $model->$content_ar}}
                </textarea>
            </div>
        </div><!-- End content ar input -->

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

        <div class="form-group row">
            <label class="col-lg-2 col-form-label font-weight-semibold">صورة المقالة <span class="text-danger">*</span></label>
            <div class="col-lg-10">
                <input type="file" name="image" class="file-input" multiple="multiple" data-show-upload="true" data-show-caption="true" data-show-preview="true" data-fouc>
                <span class="form-text text-muted">أضف صورة للمقالة</span>
            </div>
        </div>

        <div class="form-group row">
            <label class="col-form-label col-lg-3">اللغات <span class="text-danger">*</span></label>
            <div class="col-lg-9">
                @inject('language','App\Models\Language')

                {!! Form::select('language_id',$language->status()->pluck('name_ar','id'),null,[
                    'placeholder' => 'اختر من اللغات',
                    'class' => 'form-control form-control-select2'

                ]) !!}
            </div>
        </div>

        <div class="form-group row">
            <label class="col-form-label col-lg-3">بيئات العمل <span class="text-danger">*</span></label>
            <div class="col-lg-9">
                @inject('framework','App\Models\Framework')

                {!! Form::select('framework_id',$framework->status()->pluck('name_ar','id'),null,[
                    'placeholder' => 'اختر من بيئات العمل',
                    'class' => 'form-control form-control-select2'

                ]) !!}
            </div>
        </div>

        <div class="form-group row">
            <label class="col-form-label col-lg-3">المستويات <span class="text-danger">*</span></label>
            <div class="col-lg-9">
                @inject('level','App\Models\Level')

                {!! Form::select('level_id',$level->status()->pluck('level_ar','id'),null,[
                    'placeholder' => 'اختر من المستويات',
                    'class' => 'form-control form-control-select2'

                ]) !!}
            </div>
        </div>
        <!-- Select2 select -->
        @php $input = "status"; @endphp
        <div class="form-group row">
            <label class="col-form-label col-lg-3">الحالة <span class="text-danger">*</span></label>
            <div class="col-lg-9">
                <select name="{{$input}}" data-placeholder="إختر حالة المقالة" class="form-control form-control-select2" required data-fouc>
                    <option></option>
                    <option value="1" {{ isset($model) && $model->{$input} == '1' ? 'selected'  : '' }}>نشط</option>
                    <option value="0" {{ isset($model) && $model->{$input} == '0' ? 'selected'  : '' }}>معلق</option>
                </select>
            </div>
        </div> <!-- /select2 select -->


    </div>
    <div class="tab-pane show" id="en">
        <!-- Start title en input -->
        @php $inputtitle_en = "title_en"; @endphp
        <div class="form-group row" dir="ltr">
            <label class="col-form-label col-lg-3">Article name  <span class="text-danger">*</span></label>
            <div class="col-lg-9">
                <div class="form-group-feedback form-group-feedback-left">
                    <div class="input-group">
                        <span class="input-group-prepend">
                            <span class="input-group-text"><i class="icon-sphere3"></i></span>
                        </span>
                        <input type="text" name="{{$inputtitle_en}}" id="{{$inputtitle_en}}" class="form-control maxlength-badge-position @error($inputtitle_en) border-danger-400 @enderror" maxlength="199" placeholder="Article name" value="{{Request::old($inputtitle_en) ? Request::old($inputtitle_en) : $model->$inputtitle_en}}" required>
                        @error($inputtitle_en)
                        <div class="form-control-feedback text-danger-400">
                            <i class="icon-cancel-circle2"></i>
                        </div>
                        @enderror
                    </div>
                </div>
                @error($inputtitle_en)
                <span class="form-text text-danger-400">{{ $message }}</span>
                @enderror
            </div>
        </div><!-- End title en input -->

        <!-- Start content en input -->
        @php $content_en = "content_en"; @endphp
        <div class="form-group row" dir="ltr">
            <label class="col-form-label col-lg-3">Article description <span class="text-danger">*</span></label>
            <div class="col-lg-9">
                <textarea name="{{$content_en}}" id="editor-readonly" rows="4" cols="4" style="float: left">
                    {{Request::old($content_en) ? Request::old($content_en) : $model->$content_en}}
                </textarea>
            </div>
        </div><!-- End content en input -->
    </div>
</div>

