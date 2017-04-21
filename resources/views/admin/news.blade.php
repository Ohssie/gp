@extends('primary')

@section('title', 'News - ' . $user->name )

@section('sidebar')
@include('admin.sidebar')
@endsection

@section('content')
<div class="main-content container-fluid">
	<!--<div class="row">-->
	    @if( count($news) < 1)
	        <div class="panel-heading panel-heading-divider">No News added!</div>
	    @else
    	    @foreach($news as $news)
                <div class="col-sm-10">
                  <div class="panel panel-default panel-border-color panel-border-color-primary">
                    <div class="panel-heading panel-heading-divider">{{ $news->title}} - [{{ $news->type }}]</div>
                    <div class="panel-body">
                      {{ $news->description }}
                    </div>
                    <div class="panel-heading panel-heading-divider">
                        <div class="row xs-pt-15">
                          <div class="col-xs-6">
                            <p class="text-right">
                              <a href="{{ url('/news/edit/' . $news->id) }}"><button type="submit" class="btn btn-space btn-primary">Edit</button></a>
                              <a href="{{ url('/news/delete/' . $news->id) }}"><button class="btn btn-space btn-danger">Delete</button></a>
                            </p>
                          </div>
                        </div>
                    </div>
                  </div>
                </div>
            @endforeach
        @endif
    <!--</div>-->
</div>
@endsection