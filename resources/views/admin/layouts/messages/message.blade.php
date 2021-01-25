@if(session('message') ?? '' )
    @include('admin.layouts.alert.success')
@elseif(session('delete') ?? '' )
    @include('admin.layouts.alert.danger')
@endif
