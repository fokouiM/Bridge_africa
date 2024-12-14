@extends('layouts.app_message')

@section('content')

{{-- <div id="app">
    <message></message>
</div> --}}
<div id="app">
    <messagej :users="{{auth()->user()}}"></messagej>
</div>

@endsection
