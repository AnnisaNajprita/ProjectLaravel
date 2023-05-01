@extends('layout/application')

@section('content')
<form method="GET" action="/student">
    @csrf
    <div class="mb-3">
      <label for="student_id" class="form-label">Student Id</label>
      <input type="text" class="form-control" name='student_id' id="student_id" value="{{ Session::get('student_id') }}">
    </div>
    <div class="mb-3">
        <label for="name" class="form-label">Name</label>
        <input type="text" class="form-control" name='name' id="name" value="{{ Session::get('name') }}">
      </div>
      <div class="mb-3">
        <label for="address" class="form-label">Address</label>
        <textarea class="form-control" name='address'>{{ Session::get('address') }}</textarea>
      </div>
      <div class="mb-3">
        <button type="submit" class="btn btn-primary">Save</button>
      </div>
</form>
@endsection