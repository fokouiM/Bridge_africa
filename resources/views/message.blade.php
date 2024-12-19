@extends('layouts.app_message')

@section('content')

<div id="app" style=" background: #000824;">
    <message :name_voyants="{{json_encode($name_agent)}}" :users="{{json_encode(auth()->user())}}" ></message>
</div>

@endsection
