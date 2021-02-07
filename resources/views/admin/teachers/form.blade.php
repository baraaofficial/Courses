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


<!-- Start nick name input -->
@php $inputusername = "nick_name"; @endphp
<div class="form-group row">
    <label class="col-form-label col-lg-3">الكنية <span class="text-danger">*</span></label>
    <div class="col-lg-9">
        <div class="form-group-feedback form-group-feedback-right">
            <div class="input-group">
                <span class="input-group-prepend">
                    <span class="input-group-text"><i class="icon-mention"></i></span>
                </span>
                <input type="text" name="{{$inputusername}}" id="username" class="form-control maxlength-badge-position @error($inputusername) border-danger-400 @enderror" maxlength="199" placeholder="الكنية" value="{{Request::old($inputusername) ? Request::old($inputusername) : $model->$inputusername}}" required>
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
</div><!-- End nick name input -->


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
</div><!-- End email field -->


<!-- Start phone input -->
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
</div> <!-- End phone input -->


<!-- Start followers input -->
@php $inputfollower = "followers"; @endphp
<div class="form-group row">
    <label class="col-form-label col-lg-3">عدد المتابعين <span class="text-danger">*</span></label>
    <div class="col-lg-9">
        <div class="form-group-feedback form-group-feedback-right">
            <div class="input-group">
                <span class="input-group-prepend">
                    <span class="input-group-text"><i class="icon-podium"></i></span>
                </span>
                <input type="text" name="{{$inputfollower}}" id="followers" class="form-control maxlength-badge-position @error($inputfollower) border-danger-400 @enderror" maxlength="199" placeholder="عدد المتابعين" value="{{Request::old($inputfollower) ? Request::old($inputfollower) : $model->$inputfollower}}" required>
                @error($inputfollower)
                <div class="form-control-feedback text-danger-400">
                    <i class="icon-cancel-circle2"></i>
                </div>
                @enderror
            </div>
        </div>
        @error($inputfollower)
        <span class="form-text text-danger-400">{{ $message }}</span>
        @enderror
    </div>
</div><!-- End followers input -->


<!-- Start location input -->
@php $input_location = "location"; @endphp
<div class="form-group row form-group-feedback form-group-feedback-right ">
    <label class="col-form-label col-lg-3">الموقع <span class="text-danger">*</span></label>
    <div class="col-lg-9">
        <div class="form-group-feedback form-group-feedback-right">
            <div class="input-group">
                <span class="input-group-text bg-primary border-primary text-white">
                  <i class="icon-pin-alt"></i>
                </span>
                <input type="text" name="{{$input_location}}" class="form-control maxlength-badge-position @error($input_location) border-danger-400 @enderror" maxlength="255" id="location" placeholder="أدخل موقع المدرس لا يقل عن 10 أحرف" value="{{ Request::old($input_location) ? Request::old($input_location) : $model->$input_location  }}" required>
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
</div> <!-- End location input -->


<!-- Start bio input -->
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
</div><!-- End bio input -->


<!-- Start situation input -->
@php $inputsituation = "situation"; @endphp
<div class="form-group row">
    <label class="col-form-label col-lg-3">موقف <span class="text-danger">*</span></label>
    <div class="col-lg-9">
        <div class="form-group-feedback form-group-feedback-right">
            <div class="input-group">

                <input type="text" name="{{$inputsituation}}" id="username" class="form-control maxlength-badge-position @error($inputsituation) border-danger-400 @enderror" maxlength="199" placeholder="الموقف" value="{{Request::old($inputsituation) ? Request::old($inputsituation) : $model->$inputsituation}}" required>
                @error($inputsituation)
                <div class="form-control-feedback text-danger-400">
                    <i class="icon-cancel-circle2"></i>
                </div>
                @enderror
            </div>
        </div>
        @error($inputsituation)
        <span class="form-text text-danger-400">{{ $message }}</span>
        @enderror
    </div>
</div><!-- End situation input -->


<!-- Start facebook input -->
@php $inputfacebook = "facebook"; @endphp
<div class="form-group row">
    <label class="col-form-label col-lg-3">الفيسبوك <span class="text-danger">*</span></label>
    <div class="col-lg-9">
        <div class="form-group-feedback form-group-feedback-right">
            <div class="input-group">
                <span class="input-group-prepend">
                    <span class="input-group-text"><i class="icon-facebook"></i></span>
                </span>
                <input type="text" name="{{$inputfacebook}}" id="facebook" class="form-control maxlength-badge-position @error($inputfacebook) border-danger-400 @enderror" maxlength="199" placeholder="اسم المستخدم" value="{{Request::old($inputfacebook) ? Request::old($inputfacebook) : $model->$inputfacebook}}" required>
                @error($inputfacebook)
                <div class="form-control-feedback text-danger-400">
                    <i class="icon-cancel-circle2"></i>
                </div>
                @enderror
            </div>
        </div>
        @error($inputfacebook)
        <span class="form-text text-danger-400">{{ $message }}</span>
        @enderror
    </div>
</div><!-- End facebook input -->


<!-- Start twitter input -->
@php $inputtwitter = "twitter"; @endphp
<div class="form-group row">
    <label class="col-form-label col-lg-3">التويتر <span class="text-danger">*</span></label>
    <div class="col-lg-9">
        <div class="form-group-feedback form-group-feedback-right">
            <div class="input-group">
                <span class="input-group-prepend">
                    <span class="input-group-text"><i class="icon-twitter"></i></span>
                </span>
                <input type="text" name="{{$inputtwitter}}" id="twitter" class="form-control maxlength-badge-position @error($inputtwitter) border-danger-400 @enderror" maxlength="199" placeholder="اسم المستخدم" value="{{Request::old($inputtwitter) ? Request::old($inputtwitter) : $model->$inputtwitter}}" required>
                @error($inputtwitter)
                <div class="form-control-feedback text-danger-400">
                    <i class="icon-cancel-circle2"></i>
                </div>
                @enderror
            </div>
        </div>
        @error($inputtwitter)
        <span class="form-text text-danger-400">{{ $message }}</span>
        @enderror
    </div>
</div><!-- End twitter input -->


<!-- Start github input -->
@php $inputgithub = "github"; @endphp
<div class="form-group row">
    <label class="col-form-label col-lg-3">جيت هاب <span class="text-danger">*</span></label>
    <div class="col-lg-9">
        <div class="form-group-feedback form-group-feedback-right">
            <div class="input-group">
                <span class="input-group-prepend">
                    <span class="input-group-text"><i class="icon-github"></i></span>
                </span>
                <input type="text" name="{{$inputgithub}}" id="github" class="form-control maxlength-badge-position @error($inputgithub) border-danger-400 @enderror" maxlength="199" placeholder="اسم المستخدم" value="{{Request::old($inputgithub) ? Request::old($inputgithub) : $model->$inputgithub}}" required>
                @error($inputgithub)
                <div class="form-control-feedback text-danger-400">
                    <i class="icon-cancel-circle2"></i>
                </div>
                @enderror
            </div>
        </div>
        @error($inputgithub)
        <span class="form-text text-danger-400">{{ $message }}</span>
        @enderror
    </div>
</div><!-- End github input -->


<!-- Start linkedin input -->
@php $inputlinkedin = "linkedin"; @endphp
<div class="form-group row">
    <label class="col-form-label col-lg-3">لينكد ان <span class="text-danger">*</span></label>
    <div class="col-lg-9">
        <div class="form-group-feedback form-group-feedback-right">
            <div class="input-group">
                <span class="input-group-prepend">
                    <span class="input-group-text"><i class="icon-linkedin"></i></span>
                </span>
                <input type="text" name="{{$inputlinkedin}}" id="linkedin" class="form-control maxlength-badge-position @error($inputlinkedin) border-danger-400 @enderror" maxlength="199" placeholder="اسم المستخدم" value="{{Request::old($inputlinkedin) ? Request::old($inputlinkedin) : $model->$inputlinkedin}}" required>
                @error($inputlinkedin)
                <div class="form-control-feedback text-danger-400">
                    <i class="icon-cancel-circle2"></i>
                </div>
                @enderror
            </div>
        </div>
        @error($inputlinkedin)
        <span class="form-text text-danger-400">{{ $message }}</span>
        @enderror
    </div>
</div><!-- End linkedin input -->


<!-- Start linkedin select -->
@php $input = "status"; @endphp
<div class="form-group row">
    <label class="col-form-label col-lg-3">الحالة <span class="text-danger">*</span></label>
    <div class="col-lg-9">
        <select name="{{$input}}" data-placeholder="إختر حالة المدرس" class="form-control form-control-select2" required data-fouc>
            <option></option>
            <option value="1" {{ isset($model) && $model->{$input} == '1' ? 'selected'  : '' }}>نشط</option>
            <option value="0" {{ isset($model) && $model->{$input} == '0' ? 'selected'  : '' }}>معلق</option>
        </select>
    </div>
</div> <!-- End linkedin select -->


<div class="form-group row">
    <label class="col-lg-2 col-form-label font-weight-semibold">صورة المدرس <span class="text-danger">*</span></label>
    <div class="col-lg-10">
        <input type="file" name="image" class="file-input" multiple="multiple" data-show-upload="true" data-show-caption="true" data-show-preview="true" data-fouc>
        <span class="form-text text-muted">أضف صورة للطالب</span>
    </div>
</div>
