@extends('layouts.app_agent')

@section('content_agent')

<div id="app">
    <container :users="{{auth()->user()}}"></container>
</div>
@endsection
