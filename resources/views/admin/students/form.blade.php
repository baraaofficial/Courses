<!-- Start name input -->
@php $inputname = "name"; @endphp
<div class="form-group row">
    <label class="col-form-label col-lg-3">الإسم <span class="text-danger">*</span></label>
    <div class="col-lg-9">
        <div class="form-group-feedback form-group-feedback-right">
            <div class="input-group">
                <span class="input-group-prepend">
                    <span class="input-group-text"><i class="icon-user"></i></span>
                </span>
                <input type="text" name="{{$inputname}}" id="name" class="form-control maxlength-badge-position @error($inputname) border-danger-400 @enderror" maxlength="199" placeholder="الإسم" value="{{Request::old($inputname) ? Request::old($inputname) : $model->$inputname}}" required>
                @error($inputname)
                <div class="form-control-feedback text-danger-400">
                    <i class="icon-cancel-circle2"></i>
                </div>
                @enderror
            </div>
        </div>
        @error($inputname)
        <span class="form-text text-danger-400">{{ $message }}</span>
        @enderror
    </div>
</div><!-- End name input -->

<!-- Start name input -->
@php $inputusername = "username"; @endphp
<div class="form-group row">
    <label class="col-form-label col-lg-3">إسم الطالب <span class="text-danger">*</span></label>
    <div class="col-lg-9">
        <div class="form-group-feedback form-group-feedback-right">
            <div class="input-group">
                <span class="input-group-prepend">
                    <span class="input-group-text bg-pink border-pink text-white">@</span>
                </span>
                <input type="text" name="{{$inputusername}}" id="username" class="form-control maxlength-badge-position @error($inputusername) border-danger-400 @enderror" maxlength="199" placeholder="إسم الطالب" value="{{Request::old($inputusername) ? Request::old($inputusername) : $model->$inputusername}}" required>
                @error($inputusername)
                <div class="form-control-feedback text-danger-400">
                    <i class="icon-cancel-circle2"></i>
                </div>
                @enderror
            </div>
        </div>
        @error($inputusername)
        <span class="form-text text-danger-400">{{ $message }}</span>
        @enderror
    </div>
</div><!-- End name input -->

<!-- Start email field -->
@php $input_email = "email"; @endphp
<div class="form-group row">
    <label class="col-form-label col-lg-3">البريد الإلكتروني <span class="text-danger">*</span></label>
    <div class="col-lg-9">
        <div class="form-group-feedback form-group-feedback-right">
            <div class="input-group">
                <span class="input-group-text bg-primary border-primary text-white">
                    $
                </span>
                <input type="email" name="{{$input_email}}" class="form-control maxlength-badge-position @error($input_email) border-danger-400 @enderror" maxlength="255" id="email" placeholder="أدخل البريد الإلكتروني للطلاب" value="{{Request::old($input_email) ? Request::old($input_email) : $model->$input_email}}" required>
                @error($input_email)
                <div class="form-control-feedback text-danger-400">
                    <i class="icon-cancel-circle2"></i>
                </div>
                @enderror
            </div>
        </div>
        @error($input_email)
        <span class="form-text text-danger-400">{{ $message }}</span>
        @enderror
    </div>
</div><!-- /email field -->

<!-- Password field -->
@php $input_password = "password"; @endphp
<div class="form-group row">
    <label class="col-form-label col-lg-3">كلمة المرور <span class="text-danger">*</span></label>
    <div class="col-lg-9">
        <div class="input-group group-indicator">
            <input type="password" name="password" id="password" class="form-control" value="{{ old('password') }}" placeholder="كلمة المرور أكثر من 5 أحرف" required>
            <span class="input-group-append">
                <span class="input-group-text">لا يوجد كلمة سر</span>
            </span>
        </div>
    </div>
</div><!-- /password field -->


<!-- Start name input -->
@php $inputbio = "bio"; @endphp
<div class="form-group row">
    <label class="col-form-label col-lg-3">نبذة تعريفية <span class="text-danger">*</span></label>
    <div class="col-lg-9">
        <div class="form-group-feedback form-group-feedback-right">
            <div class="input-group">
                <textarea name="{{$inputbio}}" id="bio" class="form-control maxlength-badge-position @error($inputusername) border-danger-400 @enderror" maxlength="250" placeholder="نبذة تعريفية" value="{{Request::old($inputbio) ? Request::old($inputbio) : $model->$inputbio}}" required></textarea>
                @error($inputbio)
                <div class="form-control-feedback text-danger-400">
                    <i class="icon-cancel-circle2"></i>
                </div>
                @enderror
            </div>
        </div>
        @error($inputbio)
        <span class="form-text text-danger-400">{{ $message }}</span>
        @enderror
    </div>
</div><!-- End name input -->

<!-- Minimum characters -->
@php $input_location = "location"; @endphp
<div class="form-group row form-group-feedback form-group-feedback-right ">
    <label class="col-form-label col-lg-3">الموقع <span class="text-danger">*</span></label>
    <div class="col-lg-9">
        <div class="form-group-feedback form-group-feedback-right">
            <div class="input-group">
                <span class="input-group-text bg-primary border-primary text-white">
                  <i class="icon-pin-alt"></i>
                </span>
                <input type="text" name="{{$input_location}}" class="form-control maxlength-badge-position @error($input_location) border-danger-400 @enderror" maxlength="255" id="location" placeholder="أدخل موقع الطالب لا يقل عن 10 أحرف" value="{{ Request::old($input_location) ? Request::old($input_location) : $model->$input_location  }}" required>
                @error($input_location)
                <div class="form-control-feedback text-danger-400">
                    <i class="icon-cancel-circle2"></i>
                </div>
                @enderror
            </div>
        </div>
        @error($input_location)
        <span class="form-text text-danger-400">{{ $message }}</span>
        @enderror
    </div>
</div> <!-- /minimum characters-->

<!-- Minimum number -->
@php $input_phone = "phone"; @endphp
<div class="form-group row">
    <label class="col-form-label col-lg-3">رقم الهاتف<span class="text-danger">*</span></label>
    <div class="col-lg-9">
        <div class="form-group-feedback form-group-feedback-right">
            <div class="input-group">
                <span class="input-group-prepend">
                    <span class="input-group-text bg-success-400 text-white border-success-400"><i class="icon-mobile"></i></span>
                </span>
                <input type="text" name="{{$input_phone}}" class="form-control maxlength-badge-position @error($input_phone) border-danger-400 @enderror" id="phone" maxlength="11" placeholder="أدخل الرقم لا تقل عن 10" value="{{Request::old($input_phone) ? Request::old($input_phone) : $model->$input_phone}}" required>
                @error($input_phone)
                <div class="form-control-feedback text-danger-400">
                    <i class="icon-cancel-circle2"></i>
                </div>
                @enderror
            </div>
        </div>
        @error($input_phone)
        <span class="form-text text-danger-400">{{ $message }}</span>
        @enderror
    </div>
</div> <!-- /minimum number -->

<!-- Select2 select -->
@php $input = "status"; @endphp
<div class="form-group row">
    <label class="col-form-label col-lg-3">الحالة <span class="text-danger">*</span></label>
    <div class="col-lg-9">
        <select name="{{$input}}" data-placeholder="إختر حالة الطالب" class="form-control form-control-select2" required data-fouc>
            <option></option>
            <option value="1" {{ isset($model) && $model->{$input} == '1' ? 'selected'  : '' }}>نشط</option>
            <option value="0" {{ isset($model) && $model->{$input} == '0' ? 'selected'  : '' }}>معلق</option>
        </select>
    </div>
</div> <!-- /select2 select -->

<!-- Select2 select -->
@php $input = "theme"; @endphp
<div class="form-group row">
    <label class="col-form-label col-lg-3">الشكل <span class="text-danger">*</span></label>
    <div class="col-lg-9">
        <select name="{{$input}}" data-placeholder="إختر شكل الطالب" class="form-control form-control-select2" required data-fouc>
            <option></option>
            <option value="1" {{ isset($model) && $model->{$input} == '1' ? 'selected'  : '' }}>فاتح</option>
            <option value="0" {{ isset($model) && $model->{$input} == '0' ? 'selected'  : '' }}>داكن</option>
        </select>
    </div>
</div> <!-- /select2 select -->



<!-- Select2 select -->
@php $input = "language"; @endphp
<div class="form-group row">
    <label class="col-form-label col-lg-3">اللغة <span class="text-danger">*</span></label>
    <div class="col-lg-9">
        <select name="{{$input}}" data-placeholder="إختر اللفة للطالب" class="form-control form-control-select2" required data-fouc>
            <option></option>
            <option value="1" {{ isset($model) && $model->{$input} == '1' ? 'selected'  : '' }}>العربية</option>
            <option value="0" {{ isset($model) && $model->{$input} == '0' ? 'selected'  : '' }}>الإنجليزية</option>
        </select>
    </div>
</div> <!-- /select2 select -->
<div class="form-group row">
    <label class="col-lg-2 col-form-label font-weight-semibold">صورة الطالب <span class="text-danger">*</span></label>
    <div class="col-lg-10">
        <input type="file" name="image" class="file-input" multiple="multiple" data-show-upload="true" data-show-caption="true" data-show-preview="true" data-fouc>
        <span class="form-text text-muted">أضف صورة للطالب</span>
    </div>
</div>
