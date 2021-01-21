<!-- Start name input -->
@php $inputlevel_ar = "level_ar"; @endphp
<div class="form-group row">
    <label class="col-form-label col-lg-3">المستوي <span class="text-danger">*</span></label>
    <div class="col-lg-9">
        <div class="form-group-feedback form-group-feedback-right">
            <div class="input-group">
                <input type="text" name="{{$inputlevel_ar}}" id="level_ar" class="form-control maxlength-badge-position @error($inputlevel_ar) border-danger-400 @enderror" maxlength="199" placeholder="المستوي بالعربية" value="{{Request::old($inputlevel_ar) ? Request::old($inputlevel_ar) : $model->$inputlevel_ar}}" required>
                @error($inputlevel_ar)
                <div class="form-control-feedback text-danger-400">
                    <i class="icon-cancel-circle2"></i>
                </div>
                @enderror
            </div>
        </div>
        @error($inputlevel_ar)
        <span class="form-text text-danger-400">{{ $message }}</span>
        @enderror
    </div>
</div><!-- End name input -->

<!-- Start name input -->
@php $inputlevel_en = "level_en"; @endphp
<div class="form-group row">
    <label class="col-form-label col-lg-3">المستوي <span class="text-danger">*</span></label>
    <div class="col-lg-9">
        <div class="form-group-feedback form-group-feedback-right">
            <div class="input-group">
                <input type="text" name="{{$inputlevel_en}}" id="level_en" class="form-control maxlength-badge-position @error($inputlevel_en) border-danger-400 @enderror" maxlength="199" placeholder="المستوي بالانجليزية" value="{{Request::old($inputlevel_en) ? Request::old($inputlevel_en) : $model->$inputlevel_en}}" required>
                @error($inputlevel_en)
                <div class="form-control-feedback text-danger-400">
                    <i class="icon-cancel-circle2"></i>
                </div>
                @enderror
            </div>
        </div>
        @error($inputlevel_en)
        <span class="form-text text-danger-400">{{ $message }}</span>
        @enderror
    </div>
</div><!-- End name input -->

<!-- Start name input -->
@php $inputuserby = "by"; @endphp
<div class="form-group row">
    <div class="col-lg-9">
        <div class="form-group-feedback form-group-feedback-right">
            <div class="input-group">

                <input type="hidden" name="{{$inputuserby}}" id="by" class="form-control maxlength-badge-position @error($inputuserby) border-danger-400 @enderror"  value="{{Auth()->user()->name}}" >
                @error($inputuserby)
                <div class="form-control-feedback text-danger-400">
                    <i class="icon-cancel-circle2"></i>
                </div>
                @enderror
            </div>
        </div>
        @error($inputuserby)
        <span class="form-text text-danger-400">{{ $message }}</span>
        @enderror
    </div>
</div><!-- End name input -->

<!-- Select2 select -->
@php $input = "status"; @endphp
<div class="form-group row">
    <label class="col-form-label col-lg-3">الحالة <span class="text-danger">*</span></label>
    <div class="col-lg-9">
        <select name="{{$input}}" data-placeholder="إختر حالة المستخدم" class="form-control form-control-select2" required data-fouc>
            <option></option>
            <option value="1" {{ isset($model) && $model->{$input} == '1' ? 'selected'  : '' }}>نشط</option>
            <option value="0" {{ isset($model) && $model->{$input} == '0' ? 'selected'  : '' }}>معلق</option>
        </select>
    </div>
</div> <!-- /select2 select -->

