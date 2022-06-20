@extends('layout.backend.index')
@section('content')
<div class="form-group">
    <label for="simpleinput">Text</label>
    <input type="text" id="simpleinput" class="form-control">
</div>
<div class="form-group">
    <label for="example-date">Date</label>
    <input class="form-control" id="example-date" type="date" name="date">
</div>

@endsection