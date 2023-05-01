@extends('layout/application')

@section('content')
    <a href="/student/create" class="btn btn-primary">Add Student Data</a>
    <table class="table">
        <thead>
            <tr>
                <th>Student Id</th>
                <th>Name</th>
                <th>Address</th>
                <th>Action</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($data as $item)
                <tr>
                    <td>{{ $item->student_id }}</td>
                    <td>{{ $item->name }}</td>
                    <td>{{ $item->address }}</td>
                    <td>
                        <a class='btn btn-secondary' href='{{ url('/student/'.$item->student_id) }}'>Detail</a>
                        <a class='btn btn-warning' href='{{ url('/student/'.$item->student_id.'/edit') }}'>Edit</a>
                        <form onsubmit="return confirm('Are you sure want to delete this data?')" class='d-inline' action="{{ '/student/' .$item->student_id }}" method='post'>
                        @csrf
                        @method('delete')
                        <button class="btn btn-danger btn-sm" type="submit">Delete</button>
                        </form>
                    </td>
                </tr>
            @endforeach
        </tbody>
    </table>
    {{ $data->links() }}
@endsection