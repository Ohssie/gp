@extends('primary')

@section('title', 'Create Package')

@section('sidebar')
@include('admin.sidebar')
@endsection

@section('content')
<div class="main-content container-fluid">
  <h1 class="display-heading text-center">Packages</h1>
  <p class="display-description text-center">Add or delete packages here.</p>
  <div class="row">
    <div class="col-md-12">
      <div class="panel panel-default panel-border-color panel-border-color-primary">
        <div class="panel-heading panel-heading-divider">Create Package<span class="panel-subtitle">Create new package here</span></div>
        <div class="panel-body">
        <div class="row">
          <div class="col-sm-offset-3 col-sm-6">
          {!! error_message($errors) !!}
          {!! flash_message('create_package_success') !!}
          </div>
        </div>
          {{ Form::open(['url' => url('/admin/packages/create'), 'style' => 'border-radius: 0px;', 'class' => 'form-horizontal group-border-dashed', 'method' => 'post']) }}
            <div class="form-group">
              <label class="col-sm-3 control-label">Name</label>
              <div class="col-sm-6">
                {{ Form::text('package_name', old('package_name'), ['class' => 'form-control', 'required' => 'required', 'placeholder' => 'Basic']) }}
              </div>
            </div>
            <div class="form-group">
              {{ Form::label('', 'Cost', ['class' => 'col-sm-3 control-label']) }}
              <div class="col-sm-6">
                <div class="input-group xs-mb-15"><span class="input-group-addon">&#8358;</span>
                 	{{ Form::number('cost', old('cost'), ['placeholder' => '3000', 'class' => 'form-control', 'required' => 'required']) }}
                </div>
              </div>
            </div>
            <div class="form-group">
              <label class="col-sm-3 control-label">Number of downlines</label>
              <div class="col-sm-6">
                {{ Form::number('size', old('size'), ['class' => 'form-control', 'required ' => 'required', 'placeholder' => '3']) }}
              </div>
            </div>
            <div class="form-group">
              {{ Form::label('package_head', 'Top user', ['class' => 'col-sm-3 control-label']) }}
              <div class="col-sm-6">
                {{ Form::text('package_head', old('package_head'), ['class' => 'form-control', 'required' => 'required', 'id' => 'package_head']) }}
              </div>
            </div>
            <div class="form-group">
              <label class="col-sm-3 control-label">Steps</label>
              <div class="col-sm-6">
                {{ Form::number('depth', old('depth', 1), ['class' => 'form-control', 'required' => 'required']) }}
              </div>
            </div>
            <div class="form-group">
              <label class="col-sm-3 control-label">Package Accent Color</label>
              <div class="col-sm-6">
                {{ Form::select('color', ['primary' => 'Blue', 'warning' => 'Yellow', 'success' => 'Green', 'danger', 'Red'], old('color', 'primary'), ['class' => 'select2 form-control']) }}
              </div>
            </div>
            <div class="form-group">
              <label class="col-sm-3 control-label">Package Description</label>
              <div class="col-sm-6">
                {{ Form::textarea('description', old('description'), ['class' => 'form-control']) }}
              </div>
            </div>
            <div class="form-group">
              <label class="col-sm-3 control-label"></label>
              <div class="col-sm-6">
                <button type="submit" class="btn btn-primary">Create Package</button>
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