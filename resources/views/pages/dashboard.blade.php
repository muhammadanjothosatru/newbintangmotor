@extends('template.master')
@section('konten')
@auth
<h1>welcome, {{ Auth::user()->username  }}</h1>
@endauth

@endsection