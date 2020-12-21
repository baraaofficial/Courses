<!-- Start name input -->
@php $inputname = "name"; @endphp
<div class="form-group row">
    <label class="col-form-label col-lg-3">الإسم <span class="text-danger">*</span></label>
    <div class="col-lg-9">
        <input type="text" name="name" class="form-control"  placeholder="إسم المستخدم" value="{{Request::old($inputname) ? Request::old($inputname) : $model->$inputname}}">
    </div>
</div>
<!-- End name input -->

<!-- Start email field -->
@php $input_email = "email"; @endphp

<div class="form-group row">
    <label class="col-form-label col-lg-3">البريد الإلكتروني <span class="text-danger">*</span></label>
    <div class="col-lg-9">
        <input type="email" name="{{$input_email}}" class="form-control" id="email" placeholder="أدخل البريد الإلكتروني للمستخدم" value="{{Request::old($input_email) ? Request::old($input_email) : $model->$input_email}}">
    </div>
</div>
<!-- /email field -->

<!-- Password field -->
<div class="form-group row">
    <label class="col-form-label col-lg-3">كلمة المرور <span class="text-danger">*</span></label>
    <div class="col-lg-9">
        <input type="password" name="password" id="password" class="form-control" value="{{ old('password') }}" placeholder="كلمة المرور أكثر من 5 أحرف">
    </div>
</div>
<!-- /password field -->


<!-- Repeat password -->
<div class="form-group row">
    <label class="col-form-label col-lg-3">إعادة إدخال كلمة المرور <span class="text-danger">*</span></label>
    <div class="col-lg-9">
        <input type="password" name="password_confirmation" class="form-control" value="{{ old('password') }}" placeholder="إعادة إدخال كلمة المرور وتكون مطابقه">
    </div>
</div>
<!-- /repeat password -->


<!-- Minimum characters -->
@php $input_location = "location"; @endphp

<div class="form-group row">
    <label class="col-form-label col-lg-3">الموقع <span class="text-danger">*</span></label>
    <div class="col-lg-9">
        <input type="text" name="{{$input_location}}" class="form-control"  placeholder="أدخل موقع المستخدم لا يقل عن 10 أحرف" value="{{Request::old($input_location) ? Request::old($input_location) : $model->$input_location}}">
    </div>
</div>
<!-- /minimum characters-->


<!-- Minimum number -->
@php $input_phone = "phone"; @endphp

<div class="form-group row">
    <label class="col-form-label col-lg-3">رقم الهاتف<span class="text-danger">*</span></label>
    <div class="col-lg-9">
        <input type="text" name="{{$input_phone}}" class="form-control"  placeholder="أدخل الرقم لا تقل عن 10" value="{{Request::old($input_phone) ? Request::old($input_phone) : $model->$input_phone}}">
    </div>
</div>
<!-- /minimum number -->

<!-- Select2 select -->
@php $input_is_admin = "is_admin"; @endphp

<div class="form-group row">
    <label class="col-form-label col-lg-3">الوظيفة <span class="text-danger">*</span></label>
    <div class="col-lg-9">
        <select name="{{$input_is_admin}}" data-placeholder="إختر وظيفة المستخدم" class="form-control form-control-select2"  data-fouc>
            <option></option>
                <option value="user" {{ isset($model) && $model->{$input_is_admin} == 'user' ? 'selected'  : '' }}>مستخدم</option>
                <option value="admin" {{ isset($model) && $model->{$input_is_admin} == 'admin' ? 'selected'  : '' }}>مدير</option>

        </select>
    </div>
</div>
<!-- /select2 select -->


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
</div>
<!-- /select2 select -->

<div class="card-body">
    <p class="mb-3">هل تريد أن تعطى لهذه المستخدم إذن بالدخول لمشاهدة وتعديل وإضافة وحذف بياناتك فى لوحة التحكم؟</p>

    <div class="row">
        <div class="col-md-6">
            <div class="form-group mb-3 mb-md-2">
                <label class="font-weight-semibold">الإذونات</label>
                <div class="row">
                    <div class="col-md-6">
                        <div class="form-check">
                            <label class="form-check-label">
                                <input type="checkbox" name="permissions[]" value="users_create" class="form-check-input-styled-primary"  data-fouc>
                                الإضافة
                            </label>
                        </div>

                        <div class="form-check">
                            <label class="form-check-label">
                                <input type="checkbox" name="permissions[]" value="users_update" class="form-check-input-styled-danger"  data-fouc>
                                التعديل
                            </label>
                        </div>

                        <div class="form-check">
                            <label class="form-check-label">
                                <input type="checkbox" name="permissions[]" value="users_read" class="form-check-input-styled-success"  data-fouc>
                                العرض
                            </label>
                        </div>

                        <div class="form-check">
                            <label class="form-check-label">
                                <input type="checkbox" name="permissions[]" value="users_delete" class="form-check-input-styled-warning"  data-fouc>
                                الحذف
                            </label>
                        </div>
                    </div>
                </div>
            </div>
        </div>

    </div>
</div>
