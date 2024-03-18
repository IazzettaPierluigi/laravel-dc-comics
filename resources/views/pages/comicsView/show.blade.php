@extends ('layouts.app')

@section('title', 'Comics | Read Show')

@section ('main')
<h2>{{$comic->title}}</h2>
<p>{{$comic->description}}</p>
@endsection