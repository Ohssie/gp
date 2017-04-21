@extends('primary')

@section('title', 'Add News - ' . $user->name )

@section('sidebar')
@include('admin.sidebar')
@endsection

@section('content')
<div class="main-content container-fluid">
    <div class="col-sm-6">
      <div class="panel panel-default panel-border-color panel-border-color-primary">
        <div class="panel-heading panel-heading-divider">Add News</div>
        <div class="panel-body">
          {{ Form::open(['url' => url('admin/news/store'), 'method' => 'post', 'style' => 'border-radius: 0px;', 'class' => 'form-horizontal group-border-dashed']) }}
            <div class="form-group">
              <select class="form-control" name="type" required>
                <label>News Type</label>
                <option value="">Select audience...</option>
                <option value="general">General</option>
                <option value="users">Users</option>
              </select>
            </div>
            <div class="form-group xs-pt-10">
              <label>Title</label>
              <input type="text" name="title" placeholder="Enter title" class="form-control" required>
            </div>
            <div class="form-group">
              <label>News</label>
              <textarea name="description" required placeholder="News" class="form-control"></textarea>
            </div>
            <div class="row xs-pt-15">
              <div class="col-xs-6">
                <p class="text-right">
                  <button type="submit" class="btn btn-space btn-primary">Submit</button>
                  <!--<button class="btn btn-space btn-default">Cancel</button>-->
                </p>
              </div>
            </div>
          {{ Form::close() }}
        </div>
      </div>
    </div>
</div>
@endsection