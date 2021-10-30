@extends('layouts.app_message')

@section('content')

{{-- <div id="app">
    <message></message>
</div> --}}
<div id="app">
    <messageb :users="{{auth()->user()}}"></messageb>
</div>

@endsection
