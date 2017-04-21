@extends('primary')

@section('title', 'Users Detail - ' . $user->name )

@section('sidebar')
@include('admin.sidebar')
@endsection

@section('content')
    <br/>
    <div class="col-md-9">
        <div class="user-info-list panel panel-default">
          <div class="panel-heading panel-heading-divider">About {{ $details->username }}
              <!--<span class="panel-subtitle">I am a web developer and designer based in Montreal - Canada, I like read books, good music and nature.</span>-->
            </div>
          <div class="panel-body">
            <table class="no-border no-strip skills">
              <tbody class="no-border-x no-border-y">
                <tr>
                  <td class="icon"><span class="mdi mdi-face"></span></td>
                  <td class="item">Name<span class="icon s7-gift"></span></td>
                  <td>{{ $details->name }}</td>
                </tr>
                <tr>
                  <td class="icon"><span class="mdi mdi-face"></span></td>
                  <td class="item">Username<span class="icon s7-gift"></span></td>
                  <td>{{ $details->username }}</td>
                </tr>
                <tr>
                  <td class="icon"><span class="mdi mdi-smartphone-android"></span></td>
                  <td class="item">Phone<span class="icon s7-phone"></span></td>
                  <td>{{ $details->phone }}</td>
                </tr>
                <tr>
                  <td class="icon"><span class="mdi mdi-smartphone-android"></span></td>
                  <td class="item">Phone 2<span class="icon s7-phone"></span></td>
                  <td>{{ $details->phone2 }}</td>
                </tr>
                <tr>
                  <td class="icon"><span class="mdi mdi-balance-wallet"></span></td>
                  <td class="item">Bank Name<span class="icon s7-balance-wallet"></span></td>
                  <td>{{ $details->bank_name }}</td>
                </tr>
                <tr>
                  <td class="icon"><span class="mdi mdi-balance-wallet"></span></td>
                  <td class="item">Account Name<span class="icon s7-balance-wallet"></span></td>
                  <td>{{ $details->account_name }}</td>
                </tr>
                <tr>
                  <td class="icon"><span class="mdi mdi-balance-wallet"></span></td>
                  <td class="item">Account Number<span class="icon s7-balance-wallet"></span></td>
                  <td>{{ $details->account_number }}</td>
                </tr>
                balance-wallet
                <tr>
                  <td class="icon"><span class="mdi mdi-case"></span></td>
                  <td class="item">Package(s)<span class="icon s7-portfolio"></span></td>
                    @foreach($packagesub as $sub)
                        @foreach($packages as $pack)
                            @if($sub->package_id == $pack->package_id)
                              <td>{{ $pack->package_name }}</td>
                            @endif
                        @endforeach
                    @endforeach
                </tr>
              </tbody>
            </table>
          </div>
        </div>
    </div>
@endsection