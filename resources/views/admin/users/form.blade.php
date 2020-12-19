<!-- Basic text input -->
<div class="form-group row">
    <label class="col-form-label col-lg-3">الإسم <span class="text-danger">*</span></label>
    <div class="col-lg-9">
        <input type="text" name="name" class="form-control"  placeholder="إسم المستخدم">
    </div>
</div>
<!-- /basic text input -->

<!-- Email field -->
<div class="form-group row">
    <label class="col-form-label col-lg-3">البريد الإلكتروني <span class="text-danger">*</span></label>
    <div class="col-lg-9">
        <input type="email" name="email" class="form-control" id="email"  placeholder="أدخل البريد الإلكتروني للمستخدم">
    </div>
</div>
<!-- /email field -->

<!-- Password field -->
<div class="form-group row">
    <label class="col-form-label col-lg-3">كلمة المرور <span class="text-danger">*</span></label>
    <div class="col-lg-9">
        <input type="password" name="password" id="password" class="form-control"  placeholder="كلمة المرور أكثر من 5 أحرف">
    </div>
</div>
<!-- /password field -->


<!-- Repeat password -->
<div class="form-group row">
    <label class="col-form-label col-lg-3">إعادة إدخال كلمة المرور <span class="text-danger">*</span></label>
    <div class="col-lg-9">
        <input type="password" name="password_confirmation" class="form-control"  placeholder="إعادة إدخال كلمة المرور وتكون مطابقه">
    </div>
</div>
<!-- /repeat password -->


<!-- Minimum characters -->
<div class="form-group row">
    <label class="col-form-label col-lg-3">الموقع <span class="text-danger">*</span></label>
    <div class="col-lg-9">
        <input type="text" name="location" class="form-control"  placeholder="أدخل موقع المستخدم لا يقل عن 10 أحرف">
    </div>
</div>
<!-- /minimum characters-->


<!-- Minimum number -->
<div class="form-group row">
    <label class="col-form-label col-lg-3">رقم الهاتف<span class="text-danger">*</span></label>
    <div class="col-lg-9">
        <input type="text" name="phone" class="form-control"  placeholder="أدخل الرقم لا تقل عن 10">
    </div>
</div>
<!-- /minimum number -->

<!-- Select2 select -->
<div class="form-group row">
    <label class="col-form-label col-lg-3">الوظيفة <span class="text-danger">*</span></label>
    <div class="col-lg-9">
        <select name="is_admin" data-placeholder="إختر وظيفة المستخدم" class="form-control form-control-select2"  data-fouc>
            <option></option>
                <option value="user">مستخدم</option>
                <option value="admin">مدير</option>

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
            <option value="1" {{ isset($row) && $row->{$input} == '1' ? 'selected'  : '' }}>نشط</option>
            <option value="0" {{ isset($row) && $row->{$input} == '0' ? 'selected'  : '' }}>معلق</option>
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
                                <input type="checkbox" name="permissions[]" value="create_users" class="form-check-input-styled-primary"  data-fouc>
                                الإضافة
                            </label>
                        </div>

                        <div class="form-check">
                            <label class="form-check-label">
                                <input type="checkbox" name="permissions[]" value="create_update" class="form-check-input-styled-danger"  data-fouc>
                                التعديل
                            </label>
                        </div>

                        <div class="form-check">
                            <label class="form-check-label">
                                <input type="checkbox" name="permissions[]" value="create_read" class="form-check-input-styled-success"  data-fouc>
                                المشاهدة
                            </label>
                        </div>

                        <div class="form-check">
                            <label class="form-check-label">
                                <input type="checkbox" name="permissions[]" value="create_delete" class="form-check-input-styled-warning"  data-fouc>
                                الحذف
                            </label>
                        </div>
                    </div>


                </div>
            </div>
        </div>

    </div>
</div>
