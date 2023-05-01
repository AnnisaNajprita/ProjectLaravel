@extends('layout/application')

@section('content')
    <div>
        <a href='/student' class="btn btn-secondary">< Back</a>
        <h1>{{ $data->name }}</h1>
        <p>
            <b>Student Id</b> {{ $data->student_id }}
        </p>
        <p>
            <b>Address</b> {{ $data->address }}
        </p>
    </div>
@endsection