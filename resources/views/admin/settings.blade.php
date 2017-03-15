@extends('primary')

@section('title', 'App Settings')

@section('sidebar')
@include('admin.sidebar')
@endsection

@section('content')
<div class="main-content container-fluid">
	<div class="row">
        <div class="col-md-12">
          <div class="panel panel-default panel-border-color panel-border-color-primary">
            <div class="panel-heading panel-heading-divider">Application Settings<span class="panel-subtitle">Please, do not enter incorrect values</span>
            	<div class="col-sm-offset-2 col-sm-8">
            		{!! flash_message() !!}
            	</div>
            </div>
            <div class="panel-body">
              {{ Form::open(['url' => url('admin/settings'), 'method' => 'post', 'style' => 'border-radius: 0px;', 'class' => 'form-horizontal group-border-dashed']) }}
                <div class="form-group">
                  <label class="col-sm-3 control-label">App Name</label>
                  <div class="col-sm-6">
                    {{ Form::text('app_name', config('settings.app_name'), ['class' => 'form-control', 'method' => 'post']) }}
                  </div>
                </div>
                <div class="form-group">
                  <label class="col-sm-3 control-label">Contact Number</label>
                  <div class="col-sm-6">
                    {{ Form::text('contact_number', config('settings.contact_number'), ['class' => 'form-control']) }}
                  </div>
                </div>
                <div class="form-group">
                  <label class="col-sm-3 control-label">Contact Email</label>
                  <div class="col-sm-6">
                    {{ Form::text('contact_email', config('settings.contact_email'), ['class' => 'form-control']) }}
                  </div>
                </div>
                <div class="form-group">
                  <label class="col-sm-3 control-label">SMS username</label>
                  <div class="col-sm-6">
                    {{ Form::text('sms_username', config('settings.sms_username'), ['class' => 'form-control']) }}
                  </div>
                </div>
                <div class="form-group">
                  <label class="col-sm-3 control-label">SMS API Key</label>
                  <div class="col-sm-6">
                    {{ Form::text('sms_apikey', config('settings.sms_apikey'), ['class' => 'form-control']) }}
                  </div>
                </div>
                <div class="form-group">
                  <label class="col-sm-3 control-label">SMS URL</label>
                  <div class="col-sm-6">
                    {{ Form::text('sms_url', config('settings.sms_url'), ['class' => 'form-control']) }}
                  </div>
                </div>
                <div class="form-group">
                  <label class="col-sm-3 control-label">Delete Records After (days)</label>
                  <div class="col-sm-6">
                    {{ Form::text('delete_records_after', config('settings.delete_records_after'), ['class' => 'form-control']) }}
                  </div>
                </div>

	            <div class="form-group">
	              <div class="col-sm-offset-3 col-sm-6">
	                  <button type="submit" class="btn btn-space btn-primary">Update Settings</button>
	              </div>
	            </div>
              {{ Form::close() }}
            </div>
          </div>
        </div>
      </div>
</div>
@endsection