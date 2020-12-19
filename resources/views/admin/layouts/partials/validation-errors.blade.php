@if ($errors->any())


<div class="alert alert-danger ">
    <button type="button" class="close" data-dismiss="alert"><span>×</span></button>
    @foreach ($errors->all() as $error)
        <span >{{ $error }}</span><br>
    @endforeach

</div>
@endif
