@extends('layouts.app_message')

@section('content')

{{-- <div id="app">
    <message></message>
</div> --}}
<div id="app">
    <messagesi :users="{{auth()->user()}}"></messagesi>
</div>

@endsection
