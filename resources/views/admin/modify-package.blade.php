@extends('primary')

@section('title', 'Modify Package')

@section('sidebar')
@include('admin.sidebar')
@endsection

@section('content')
<div class="main-content container-fluid">
  <h1 class="display-heading text-center">Packages</h1>
  <p class="display-description text-center">Modify packages here.</p>
  <div class="row">
    <div class="col-md-12">
      <div class="panel panel-default panel-border-color panel-border-color-primary">
        <div class="panel-heading panel-heading-divider">Modify Package<span class="panel-subtitle">Modify existing packages here</span></div>
        <div class="panel-body">
        <div class="row">
          <div class="col-sm-offset-3 col-sm-6">
          {!! error_message($errors) !!}
          {!! flash_message('modify_package_success') !!}
          </div>
        </div>
          {{ Form::open(['url' => url('/admin/packages/update/' . $package->package_id), 'style' => 'border-radius: 0px;', 'class' => 'form-horizontal group-border-dashed', 'method' => 'put']) }}
            <div class="form-group">
              <label class="col-sm-3 control-label">Name</label>
              <div class="col-sm-6">
                {{ Form::text('package_name', $package->package_name, ['class' => 'form-control', 'required' => 'required', 'placeholder' => 'Basic']) }}
              </div>
            </div>
            <div class="form-group">
              {{ Form::label('', 'Cost', ['class' => 'col-sm-3 control-label']) }}
              <div class="col-sm-6">
                <div class="input-group xs-mb-15"><span class="input-group-addon">&#8358;</span>
                 	{{ Form::number('cost', $package->cost, ['placeholder' => '3000', 'class' => 'form-control', 'required' => 'required']) }}
                </div>
              </div>
            </div>
            <div class="form-group">
              <label class="col-sm-3 control-label">Number of downlines</label>
              <div class="col-sm-6">
                {{ Form::number('size', $package->size, ['class' => 'form-control', 'required ' => 'required', 'placeholder' => '3']) }}
              </div>
            </div>
            <div class="form-group">
              {{ Form::label('package_head', 'Top user', ['class' => 'col-sm-3 control-label']) }}
              <div class="col-sm-6">
                {{ Form::text('package_head', $head->username, ['class' => 'form-control', 'required' => 'required', 'id' => 'package_head']) }}
              </div>
            </div>
            <div class="form-group">
              <label class="col-sm-3 control-label">Steps</label>
              <div class="col-sm-6">
                {{ Form::number('depth', $package->depth, ['class' => 'form-control', 'required' => 'required']) }}
              </div>
            </div>
            <div class="form-group">
              <label class="col-sm-3 control-label">Package Accent Color</label>
              <div class="col-sm-6">
                {{ Form::select('color', ['primary' => 'Blue', 'warning' => 'Yellow', 'success' => 'Green', 'danger' => 'Red'], old('color', 'primary'), ['class' => 'select2 form-control']) }}
              </div>
            </div>
            <div class="form-group">
              <label class="col-sm-3 control-label">Package Description</label>
              <div class="col-sm-6">
                {{ Form::textarea('description', $package->description, ['class' => 'form-control']) }}
              </div>
            </div>
            <div class="form-group">
              <label class="col-sm-3 control-label"></label>
              <div class="col-sm-6">
                <button type="submit" class="btn btn-primary">Modify Package</button>
              </div>
            </div>
          {{ Form::close() }}
        </div>
      </div>
    </div>
    </div>
</div>
@endsection

@section('scripts')
{{ HTML::script('assets/js/create-package.js') }}
@endsection