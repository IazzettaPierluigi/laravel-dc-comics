@extends ('layouts.app')

@section('title', 'Comics | Read Index')

@section('main')
    <main>
        <h2>index di comics</h2>
        {{dd ($comics)}}
    </main>
@endsection