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
            <a href="{{route('admin.index')}}" class="nav-link {{active()->route('admin.index')}}">
                <i class="icon-home4"></i>
                <span>
                لوحة التحكم
            </span>
            </a>
        </li>

        @role('super_admin')
        <li class="nav-item nav-item-submenu">
            <a href="{{route('users.index')}}" class="nav-link {{active()->route('users.*')}}">
                <i class="icon-users4"></i>
                <span>المستخدمين</span>
            </a>
            <ul class="nav nav-group-sub" data-submenu-title="المستخدمين">
                <li class="nav-item"><a href="{{route('users.index')}}" class="nav-link {{active()->route('users.index')}}"><i class="icon-users4" ></i><span>جميع المستخدمين</span></a></li>
                @if (auth()->user()->hasPermission('users_read'))
                    <li class="nav-item"><a href="{{route('users.create')}}" class="nav-link {{active()->route('users.create')}}"><i class="icon-user-plus" ></i><span>إنشاء مستخدم جديد</span></a></li>
                    <li class="nav-item"><a href="{{route('users.stopped')}}" class="nav-link {{active()->route('users.stopped')}}"><i class="icon-user-block" ></i><span>مستخدمين محظورين</span></a></li>
                    <li class="nav-item"><a href="{{route('users.delete')}}" class="nav-link {{active()->route('users.delete')}}"><i class="icon-user-lock" ></i><span>مستخدمين فى المهملات</span></a></li>
                @endif
            </ul>
        </li>
        <li class="nav-item nav-item-submenu">
            <a href="{{route('languages.index')}}" class="nav-link {{active()->route('languages.*')}}">
                <i class="icon-sphere3"></i>
                <span> اللغات</span>
            </a>
            <ul class="nav nav-group-sub" data-submenu-title=" اللغات">
                <li class="nav-item"><a href="{{route('languages.index')}}" class="nav-link {{active()->route('languages.index')}}"><i class="icon-sphere3" ></i><span>جميع اللغات</span></a></li>
                @if (auth()->user()->hasPermission('users_read'))
                    <li class="nav-item"><a href="{{route('languages.create')}}" class="nav-link {{active()->route('languages.create')}}"><i class="icon-plus22" ></i><span>إنشاء لغات جديدة</span></a></li>
                @endif
            </ul>
        </li>
        <li class="nav-item nav-item-submenu">
            <a href="{{route('frameworks.index')}}" class="nav-link {{active()->route('frameworks.*')}}">
                <i class="icon-wrench2"></i>
                <span> بيئات العمل</span>
            </a>
            <ul class="nav nav-group-sub" data-submenu-title=" بيئات العمل">
                <li class="nav-item"><a href="{{route('frameworks.index')}}" class="nav-link {{active()->route('frameworks.index')}}"><i class="icon-wrench2" ></i><span>جميع بيئات العمل</span></a></li>
                @if (auth()->user()->hasPermission('users_read'))
                    <li class="nav-item"><a href="{{route('frameworks.create')}}" class="nav-link {{active()->route('frameworks.create')}}"><i class="icon-plus22" ></i><span>إنشاء جديد</span></a></li>
                    <li class="nav-item"><a href="{{route('framework.stopped')}}" class="nav-link {{active()->route('framework.stopped')}}"><i class="icon-stop" ></i><span>بيئات العمل المتوقفة</span></a></li>
                    <li class="nav-item"><a href="{{route('framework.delete')}}" class="nav-link {{active()->route('framework.delete')}}"><i class="icon-trash-alt" ></i><span>بيئات العمل المحذوفة</span></a></li>
                @endif
            </ul>
        </li>

        <li class="nav-item nav-item-submenu">
            <a href="{{route('levels.index')}}" class="nav-link {{active()->route('levels.*')}}">
                <i class="icon-stats-bars4"></i>
                <span>المستويات</span>
            </a>
            <ul class="nav nav-group-sub" data-submenu-title="المستويات">
                <li class="nav-item"><a href="{{route('levels.index')}}" class="nav-link {{active()->route('levels.index')}}"><i class="icon-stats-bars4" ></i><span>جميع المستويات </span></a></li>
                @if (auth()->user()->hasPermission('users_read'))
                    <li class="nav-item"><a href="{{route('levels.create')}}" class="nav-link {{active()->route('levels.create')}}"><i class="icon-plus22" ></i><span>إنشاء جديد</span></a></li>
                    <li class="nav-item"><a href="{{route('level.delete')}}" class="nav-link {{active()->route('level.delete')}}"><i class="icon-trash-alt" ></i><span>المستويات المحذوفة</span></a></li>
                @endif
            </ul>
        </li>

        <li class="nav-item nav-item-submenu">
            <a href="{{route('tags.index')}}" class="nav-link {{active()->route('tags.*')}}">
                <i class="icon-price-tag2"> </i>
                <span>العلامات </span>
            </a>
            <ul class="nav nav-group-sub" data-submenu-title="العلامات ">
                <li class="nav-item"><a href="{{route('tags.index')}}" class="nav-link {{active()->route('tags.index')}}"><i class="icon-price-tag2" ></i><span>جميع العلامات  </span></a></li>
                @if (auth()->user()->hasPermission('users_read'))
                    <li class="nav-item"><a href="{{route('tags.create')}}" class="nav-link {{active()->route('tags.create')}}"><i class="icon-plus22" ></i><span>إنشاء جديد</span></a></li>
                @endif
            </ul>
        </li>
        <li class="nav-item nav-item-submenu">
            <a href="{{route('users.index')}}" class="nav-link {{active()->route('users.*')}}">
                <i class="icon-users4"></i>
                <span>المدرسين</span>
            </a>
            <ul class="nav nav-group-sub" data-submenu-title="المدرسين">
                <li class="nav-item"><a href="{{route('teachers.index')}}" class="nav-link {{active()->route('teachers.index')}}"><i class="icon-users4" ></i><span>جميع المدرسين</span></a></li>
                @if (auth()->user()->hasPermission('users_read'))
                    <li class="nav-item"><a href="{{route('teachers.create')}}" class="nav-link {{active()->route('teachers.create')}}"><i class="icon-user-plus" ></i><span>إنشاء مدرس جديد</span></a></li>
                    <li class="nav-item"><a href="{{route('teacher.stopped')}}" class="nav-link {{active()->route('teacher.stopped')}}"><i class="icon-user-block" ></i><span>مدرسين محظورين</span></a></li>
                    <li class="nav-item"><a href="{{route('teacher.delete')}}" class="nav-link {{active()->route('teacher.delete')}}"><i class="icon-user-lock" ></i><span>مدرسين فى المهملات</span></a></li>
                @endif
            </ul>
        </li>
        <li class="nav-item nav-item-submenu">
            <a href="{{route('users.index')}}" class="nav-link {{active()->route('users.*')}}">
                <i class="icon-users4"></i>
                <span>الطلاب</span>
            </a>
            <ul class="nav nav-group-sub" data-submenu-title="الطلاب">
                <li class="nav-item"><a href="{{route('students.index')}}" class="nav-link {{active()->route('students.index')}}"><i class="icon-users4" ></i><span>جميع الطلاب</span></a></li>
                @if (auth()->user()->hasPermission('users_read'))
                    <li class="nav-item"><a href="{{route('students.create')}}" class="nav-link {{active()->route('students.create')}}"><i class="icon-user-plus" ></i><span>إنشاء طالب جديد</span></a></li>
                    <li class="nav-item"><a href="{{route('student.stopped')}}" class="nav-link {{active()->route('student.stopped')}}"><i class="icon-user-block" ></i><span>طلاب محظورين</span></a></li>
                    <li class="nav-item"><a href="{{route('student.delete')}}" class="nav-link {{active()->route('student.delete')}}"><i class="icon-user-lock" ></i><span>طلاب فى المهملات</span></a></li>
                @endif
            </ul>
        </li>

        <li class="nav-item nav-item-submenu">
            <a href="{{route('articles.index')}}" class="nav-link {{active()->route('articles.*')}}">
                <i class="icon-file-text3"></i>
                <span>المقالات</span>
            </a>
            <ul class="nav nav-group-sub" data-submenu-title="المقالات">
                <li class="nav-item"><a href="{{route('articles.index')}}" class="nav-link {{active()->route('articles.index')}}"><i class="icon-file-text3" ></i><span>جميع المقالات</span></a></li>
                @if (auth()->user()->hasPermission('users_read'))
                    <li class="nav-item"><a href="{{route('articles.create')}}" class="nav-link {{active()->route('articles.create')}}"><i class="icon-file-plus2" ></i><span>إنشاء مقالة جديد</span></a></li>
                    <li class="nav-item"><a href="{{route('article.stopped')}}" class="nav-link {{active()->route('article.stopped')}}"><i class="icon-file-minus2" ></i><span>مقالات متوقفة</span></a></li>
                    <li class="nav-item"><a href="{{route('article.delete')}}" class="nav-link {{active()->route('article.delete')}}"><i class="icon-trash-alt" ></i><span>مقالات فى المهملات</span></a></li>
                @endif
            </ul>
        </li>
        @endrole<!-- /main -->
        <li class="nav-item-header mt-0"><div class="text-uppercase font-size-xs line-height-xs">قائمة الإعدادت</div> <i class="icon-menu" title="Main"></i></li>
        <li class="nav-item nav-item-submenu">
            <a href="{{route('settings.index')}}" class="nav-link {{active()->route('settings.*')}}">
                <i class="icon-cog3"></i>
                <span>الإعدادات</span>
            </a>
            <ul class="nav nav-group-sub" data-submenu-title="المستخدمين">
                <li cplass="nav-item"><a href="{{route('settings.index')}}" class="nav-link {{active()->route('settings.index')}}"><i class="icon-cog3" ></i><span>جميع الإعدادات</span></a></li>
                @if (auth()->user()->hasPermission('users_read'))
                    <li class="nav-item"><a href="{{route('settings.create')}}" class="nav-link {{active()->route('settings.create')}}"><i class="icon-plus22" ></i><span>إنشاء إعدادات جديدة</span></a></li>
                @endif
            </ul>
        </li>
    </ul>
</div>
