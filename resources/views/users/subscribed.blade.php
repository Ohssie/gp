@extends('primary')

@section('title', 'Subscribed Packages')

@section('content')
<div class="main-content container-fluid">
  <div class="row">
      <h1 class="display-heading text-center">Packages</h1>
      <p class="display-description text-center">Subscribed packages.</p>
      @if(Session::has('select_package'))
      	<div class="col-sm-offset-3 col-sm-6"><div class="alert alert-warning">{!! session('select_package') !!}</div></div>
      @endif
      @if(Session::has('subscribe_error')): ?>
      	<div class="col-sm-offset-3 col-sm-6"><div class="alert alert-warning">{!! session('subscribe_error') !!}</div></div>
      @endif
    </div>
  <div class="row pricing-tables">
    @if($packages)
	    @foreach($packages as $package)
	    <div class="col-md-3">
	      <div class="pricing-table pricing-table-{{ $package->color }}">
	        <div class="pricing-table-title">{{ $package->package_name }}</div>
	        <div class="panel-divider panel-divider-xl"></div>
	        <div class="pricing-table-price"><span class="currency">&#8358;</span><span class="value">{{ $package->cost }}</span></div>
	        <ul class="pricing-table-features">
	          <li>{{ $package->description }}</li>
	          <li>Downlines: {{ $package->size }}</li>
	        </ul>
	          <div class="btn-group btn-hspace">
	          </div>
	      </div>
	    </div>
	    @endforeach
    @else
    <h2 class="text-center text-danger">You are not subscribed to any packages.</h2>
    @endif
    
  </div>
</div>
@endsection

@section('sidebar')
	@include('users.sidebar')
 @endsection