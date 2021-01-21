<!-- Start name input -->
@php $inputname_ar = "name_ar"; @endphp
<div class="form-group row">
    <label class="col-form-label col-lg-3">العلامة <span class="text-danger">*</span></label>
    <div class="col-lg-9">
        <div class="form-group-feedback form-group-feedback-right">
            <div class="input-group">
                <input type="text" name="{{$inputname_ar}}" id="name_ar" class="form-control maxlength-badge-position @error($inputname_ar) border-danger-400 @enderror" maxlength="199" placeholder="العلامة بالعربية" value="{{Request::old($inputname_ar) ? Request::old($inputname_ar) : $model->$inputname_ar}}" required>
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
</div><!-- End name input -->

<!-- Start name input -->
@php $inputname_en = "name_en"; @endphp
<div class="form-group row">
    <label class="col-form-label col-lg-3">العلامة <span class="text-danger">*</span></label>
    <div class="col-lg-9">
        <div class="form-group-feedback form-group-feedback-right">
            <div class="input-group">
                <input type="text" name="{{$inputname_en}}" id="name_en" class="form-control maxlength-badge-position @error($inputname_en) border-danger-400 @enderror" maxlength="199" placeholder="العلامة بالانجليزية" value="{{Request::old($inputname_en) ? Request::old($inputname_en) : $model->$inputname_en}}" required>
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


