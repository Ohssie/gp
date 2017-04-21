@extends('primary')

@section('title', 'Subscribed - ' . $user->name )

@section('sidebar')
@include('users.sidebar')
@endsection

@section('content')
<div class="main-content container-fluid">
  <div class="row">
    <h1 class="display-heading text-center">Packages</h1>
    <p class="display-description text-center text-sucess">Next action. Please read the instructions below <b>CAREFULLY!</b></p>
    <div class="col-sm-offset-3 col-sm-6">{!! flash_message() !!}</div></div>
</div>
@endsection
