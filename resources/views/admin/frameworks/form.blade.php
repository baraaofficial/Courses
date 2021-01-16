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
        <!-- Start name ar input -->
        @php $inputname_ar = "name_ar"; @endphp
        <div class="form-group row">
            <label class="col-form-label col-lg-3">الإسم <span class="text-danger">*</span></label>
            <div class="col-lg-9">
                <div class="form-group-feedback form-group-feedback-right">
                    <div class="input-group">
                        <span class="input-group-prepend">
                            <span class="input-group-text"><i class="icon-sphere3"></i></span>
                        </span>
                        <input type="text" name="{{$inputname_ar}}" id="name" class="form-control maxlength-badge-position @error($inputname_ar) border-danger-400 @enderror" maxlength="199" placeholder="إسم بيئة العمل" value="{{Request::old($inputname_ar) ? Request::old($inputname_ar) : $model->$inputname_ar}}" required>
                        @error($inputname_ar)
                        <div class="form-control-feedback text-danger-400">
                            <i class="icon-cancel-circle2"></i>
                        </div>
                        @enderror
                    </div>
                </div>
                @error($inputname_ar)
                <span class="form-text text-danger-400">{{ $message }}</span>
                @enderror
            </div>
        </div><!-- End name ar input -->

        <!-- Start description ar input -->
        @php $description_ar = "description_ar"; @endphp
        <div class="form-group row">
            <label class="col-form-label col-lg-3">الوصف <span class="text-danger">*</span></label>
            <div class="col-lg-9">
                <textarea name="{{$description_ar}}" id="editor-full" rows="4" cols="4">
                    {{Request::old($description_ar) ? Request::old($description_ar) : $model->$description_ar}}
                </textarea>
            </div>
        </div><!-- End description ar input -->

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
            <label class="col-lg-2 col-form-label font-weight-semibold">الصورة <span class="text-danger">*</span></label>
            <div class="col-lg-10">
                <input type="file" name="image" class="file-input" multiple="multiple" data-show-upload="true" data-show-caption="true" data-show-preview="true" data-fouc>
                <span class="form-text text-muted">أضف صورة لبيئة العمل</span>
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
        <!-- Select2 select -->
        @php $input = "status"; @endphp
        <div class="form-group row">
            <label class="col-form-label col-lg-3">الحالة <span class="text-danger">*</span></label>
            <div class="col-lg-9">
                <select name="{{$input}}" data-placeholder="إختر حالة " class="form-control form-control-select2" required data-fouc>
                    <option></option>
                    <option value="1" {{ isset($model) && $model->{$input} == '1' ? 'selected'  : '' }}>نشط</option>
                    <option value="0" {{ isset($model) && $model->{$input} == '0' ? 'selected'  : '' }}>معلق</option>
                </select>
            </div>
        </div> <!-- /select2 select -->



    </div>
    <div class="tab-pane show" id="en">
        <!-- Start name en input -->
        @php $inputname_en = "name_en"; @endphp
        <div class="form-group row" dir="ltr">
            <label class="col-form-label col-lg-3">Framework name  <span class="text-danger">*</span></label>
            <div class="col-lg-9">
                <div class="form-group-feedback form-group-feedback-left">
                    <div class="input-group">
                        <span class="input-group-prepend">
                            <span class="input-group-text"><i class="icon-sphere3"></i></span>
                        </span>
                        <input type="text" name="{{$inputname_en}}" id="{{$inputname_en}}" class="form-control maxlength-badge-position @error($inputname_en) border-danger-400 @enderror" maxlength="199" placeholder="Language name" value="{{Request::old($inputname_en) ? Request::old($inputname_en) : $model->$inputname_en}}" required>
                        @error($inputname_en)
                        <div class="form-control-feedback text-danger-400">
                            <i class="icon-cancel-circle2"></i>
                        </div>
                        @enderror
                    </div>
                </div>
                @error($inputname_en)
                <span class="form-text text-danger-400">{{ $message }}</span>
                @enderror
            </div>
        </div><!-- End name en input -->

        <!-- Start description en input -->
        @php $description_en = "description_en"; @endphp
        <div class="form-group row" dir="ltr">
            <label class="col-form-label col-lg-3">Framework description <span class="text-danger">*</span></label>
            <div class="col-lg-9">
                <textarea name="{{$description_en}}" id="editor-readonly" rows="4" cols="4" style="float: left">
                    {{Request::old($description_en) ? Request::old($description_en) : $model->$description_en}}
                </textarea>
            </div>
        </div><!-- End description en input -->
    </div>
</div>

