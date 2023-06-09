
@if($errors->any())
    @foreach($errors->all() as $error)
        <div class="alert alert-danger">
            {{ $error }}
        </div>
    @endforeach
@endif
@if (Session::has('message'))
<div class="alert alert-success">
   {{
      Session::get('message')
   }}
</div>
@endif
@if (Session::has('error'))
<div class="alert alert-alert">
   {{
      Session::get('error')
   }}
</div>
@endif