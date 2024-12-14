@extends('layouts.app_message')

@section('content')

<div id="app">
    <message :users="{{auth()->user()}}" :name_voyant="{{$name_agent}}"></message>
</div>

@endsection
