@extends('layout/application')

@section('content')
<h1>{{ $title }}</h1>
<p>welcome to contact page</p>
<p>
  <ul>
      <li>Email: {{ $contact['email']}}</li>
      <li>Instagram: {{ $contact['instagram']}}</li>
  </ul>
  
</p> 
@endsection

