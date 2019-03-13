@extends('layouts.home')

@section('content')

<form method="post" action="{{ route('media.ingresa') }}" enctype="multipart/form-data">
  {{csrf_field()}}
      <input type="file" name="file" class="myfrm form-control" multiple="">
      <button type="submit" class="btn btn-success" style="margin-top:10px">Submit</button>
</form>      
@endsection