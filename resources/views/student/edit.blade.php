@extends('layout/application')

@section('content')
<a href='/student' class="btn btn-secondary">Back</a>
<form method="post" action="{{ '/student/' .$data->student_id }}">
    @csrf
    <div class="mb-3">
      <h1>Student Id: {{ $data->student_id }}</h1>
    </div>
    <div class="mb-3">
        <label for="name" class="form-label">Name</label>
        <input type="text" class="form-control" name='name' id="name" value="{{ $data->name }}">
      </div>
      <div class="mb-3">
        <label for="address" class="form-label">Address</label>
        <textarea class="form-control" name='address'>{{ $data->address }}</textarea>
      </div>
      <div class="mb-3">
        <button type="submit" class="btn btn-primary">Update</button>
      </div>
</form>
@endsection