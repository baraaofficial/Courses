
<div class="card-body p-0">
    <ul class="nav nav-sidebar" data-nav-type="accordion">
        <!-- Main -->
        <li class="nav-item-header mt-0"><div class="text-uppercase font-size-xs line-height-xs">قائمة التنقل والإعدادت</div> <i class="icon-menu" title="Main"></i></li>
        <li class="nav-item">
            <a href="{{url('/')}}" class="nav-link">
                <i class="icon-home5"></i>
                <span>
                زيارة الموقع
            </span>
            </a>
        </li>
        <li class="nav-item">
            <a href="{{url('dashboard')}}" class="nav-link active">
                <i class="icon-home4"></i>
                <span>
                لوحة التحكم
            </span>
            </a>
        </li>

        @role('administrator')
            <li class="nav-item nav-item-submenu">
                <a href="{{route('users.index')}}" class="nav-link">
                    <i class="icon-users4"></i>
                    <span>المستخدمين</span>
                </a>
                <ul class="nav nav-group-sub" data-submenu-title="المستخدمين">
                    <li class="nav-item"><a href="{{route('users.index')}}" class="nav-link"><i class="icon-users4" ></i><span>جميع المستخدمين</span></a></li>
                    <li class="nav-item"><a href="{{route('users.create')}}" class="nav-link"><i class="icon-user-plus" ></i><span>إنشاء مستخدم جديد</span></a></li>
                    <li class="nav-item nav-item-submenu">
                        <a href="{{route('users.index')}}" class="nav-link">
                            <i class="icon-users4"></i>
                            <span>الأدوار والأذونات</span>
                        </a>
                        <ul class="nav nav-group-sub" data-submenu-title="المستخدمين">
                            <li class="nav-item"><a href="{{route('users.index')}}" class="nav-link"><i class="critical-role" ></i><span>إضافة دور لمستخدم</span></a></li>
                            <li class="nav-item"><a href="{{route('users.index')}}" class="nav-link"><i class="icon-users4" ></i><span>إضافة إذن لمستخدم</span></a></li>
                        </ul>
                    </li>
                </ul>
            </li>

        @endrole

        <!-- /main -->
    </ul>
</div>
