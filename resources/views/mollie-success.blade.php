@extends('layouts.app')
@section('content')
<div class="pricing-header px-3 py-3 pt-md-5 pb-md-4 mx-auto text-center">
    <h1 class="display-4">Choose One Plan To Subscribe</h1>
</div>
<div class="container">
    @if (!empty($status) || Session::get('status'))
        <div class="alert alert-success alert-block">
            <button type="button" class="close" data-dismiss="alert">×</button>
            <strong>{{ $status ?? Session::get('status')}}</strong>
        </div>
    @endif
    <div class="card-deck mb-3 text-center">
      <div class="card mb-4 box-shadow">
        <div class="card-header">
          <h4 class="my-0 font-weight-normal">Free</h4>
        </div>
        <div class="card-body">
          <h1 class="card-title pricing-card-title">&#128;0 <small class="text-muted">/ mo</small></h1>
          <ul class="list-unstyled mt-3 mb-4">
            <li>10 users included</li>
            <li>2 GB of storage</li>
            <li>Email support</li>
            <li>Help center access</li>
          </ul>
          <button type="button" class="btn btn-lg btn-block btn-outline-primary">Sign up for free</button>
        </div>
      </div>
      <div class="card mb-4 box-shadow">
        <div class="card-header">
          <h4 class="my-0 font-weight-normal">Pro</h4>
        </div>
        <div class="card-body">
          <h1 class="card-title pricing-card-title">&#128;15 <small class="text-muted">/ mo</small></h1>
          <ul class="list-unstyled mt-3 mb-4">
            <li>20 users included</li>
            <li>10 GB of storage</li>
            <li>Priority email support</li>
            <li>Help center access</li>
          </ul>
            <a href="{{route('create.mollie.subscription')}}" class="btn btn-lg btn-block btn-primary">Get started</a>
        </div>
      </div>
      <div class="card mb-4 box-shadow">
        <div class="card-header">
          <h4 class="my-0 font-weight-normal">Enterprise</h4>
        </div>
        <div class="card-body">
          <h1 class="card-title pricing-card-title">&#128;29 <small class="text-muted">/ mo</small></h1>
          <ul class="list-unstyled mt-3 mb-4">
            <li>30 users included</li>
            <li>15 GB of storage</li>
            <li>Phone and email support</li>
            <li>Help center access</li>
          </ul>
            <a href="{{route('create.mollie.subscription')}}" class="btn btn-lg btn-block btn-primary">Get started</a>
        </div>
      </div>
    </div>
</div>
@endsection
