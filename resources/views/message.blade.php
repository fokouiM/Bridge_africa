@extends('layouts.app_message')

@section('content')

{{-- <div id="app">
    <message></message>
</div> --}}
<div id="app">
    <message :users="{{auth()->user()}}"></message>
</div>

@endsection
