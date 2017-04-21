@extends('primary')

@section('title', 'Choose Package')

@section('content')
<div class="main-content container-fluid">
	<div class="row">
		<div class="col-xs-12 col-md-12">
	    <div class="panel panel-default">
	      <div class="panel-heading">Latest News</div>
	      <div class="panel-body">
	        <ul class="user-timeline user-timeline-compact">
	          @foreach($news as $news)
	            <li class="latest">
	              <div class="user-timeline-date"> <?php echo date('d-m-Y', strtotime($news->created_at)); ?></div>
	              <div class="user-timeline-title">{{ $news->title }}</div>
	              <div class="user-timeline-description">{{ $news->description }}</div>
	            </li>
	          @endforeach
	        </ul>
	      </div>
	    </div>
	  </div>
	</div>
  <div class="row">
      <h1 class="display-heading text-center">Packages</h1>
      <p class="display-description text-center">Select a packages here.</p>
      @if(Session::has('select_package'))
      	<div class="col-sm-offset-3 col-sm-6"><div class="alert alert-warning">{!! session('select_package') !!}</div></div>
      @endif
      @if(Session::has('subscribe_error'))
      	<div class="col-sm-offset-3 col-sm-6"><div class="alert alert-warning">{!! session('subscribe_error') !!}</div></div>
      @endif
    </div>
  <div class="row pricing-tables">
    @if(!$packages->isEmpty())
	    @foreach($packages as $package)
	    <div class="col-md-3">
	      <div class="pricing-table pricing-table-{{ $package->color }}">
	        <div class="pricing-table-title">{{ $package->package_name }}</div>
	        <div class="panel-divider panel-divider-xl"></div>
	        <div class="pricing-table-price"><span class="currency">&#8358;</span><span class="value">{{ $package->cost }}</span></div>
	        <ul class="pricing-table-features">
	          <li>{{ $package->description }}</li>
	          <li>Downlinks: {{ $package->size }}</li>
	        </ul>
	          <div class="btn-group btn-hspace">
	            {{ Form::open(['url' => url('/packages/choose'), 'method' => 'post']) }}
	            {{ Form::hidden('package_id', $package->package_id) }}
	            <button type="submit" class="btn btn-{{ $package->color }}">Choose</button>
	            {{ Form::close() }}
	          </div>
	      </div>
	    </div>
	    @endforeach
    @else
    <h2 class="text-center text-danger">No packages created yet.</h2>
    @endif
    
  </div>
</div>
@endsection

@section('sidebar')
	@include('users.sidebar')
@endsection