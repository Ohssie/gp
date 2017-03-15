@extends('primary')

@section('title', 'Manage Packages')

@section('sidebar')
@include('admin.sidebar')
@endsection

@section('content')
<div class="main-content container-fluid">
  <h1 class="display-heading text-center">Packages</h1>
  <p class="display-description text-center">Add or delete packages here.</p>
  <div class="row pricing-tables">
    @if(count($packages) > 0)
      @foreach($packages as $package)
      <div class="col-md-3">
        <div class="pricing-table pricing-table-color pricing-table-{{ $package['color'] }}">
          <div class="pricing-table-title">{{ $package["package_name"] }}</div>
          <div class="panel-divider panel-divider-xl"></div>
          <div class="pricing-table-price"><span class="currency">&#8358;</span><span class="value">{{ $package["cost"] }}</span></div>
          <ul class="pricing-table-features">
            <li>{{ $package["description"] }}</li>
          </ul>
            <div class="btn-group btn-hspace">
              <button type="button" data-toggle="dropdown" class="btn btn-default dropdown-toggle">Action <span class="icon-dropdown mdi mdi-chevron-down"></span></button>
              <ul role="menu" class="dropdown-menu">
                <li><a href="{{ url('packages/edit/' . $package['package_id']) }}">Edit package</a></li>
                <li><a href="{{ url('packages/manage/' . $package['package_id']) }}">Manage package</a></li>
                <li class="divider"></li>
                <li><a href="{{ url('packages/delete/' . $package['package_id']) }}">Delete package</a></li>
              </ul>
            </div>
        </div>
      </div>
      @endforeach
      @else
      <h2 class="text-center text-danger">No packages created</h2>
      <div class="text-center"><a class="btn btn-primary" href="packages/create">Create package now</a></div>
      @endif
      
  </div>
</div>
@endsection