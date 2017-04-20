@extends('primary')

@section('title', 'Blocked Accounts')

@section('sidebar')
@include('admin.sidebar')
@endsection

@section('content')
<div class="main-content container-fluid">
    <div class="row">
        <div class="col-sm-12">
            <div class="panel panel-default panel-table">
                <div class="panel-heading">Blocked Accounts
                    <div class="tools"><span class="icon mdi mdi-download"></span><span class="icon mdi mdi-more-vert"></span></div>
                </div>
                <div class="panel-body">
                    <div id="table3_wrapper" class="dataTables_wrapper form-inline dt-bootstrap no-footer">
                        <div class="row be-datatable-body">
                            <div class="col-sm-12">
                                <table id="table3" class="table table-striped table-hover table-fw-widget dataTable no-footer" role="grid" aria-describedby="table3_info">
                                    <thead>
                                        <tr role="row">
                                            <th class="sorting_asc" tabindex="0" aria-controls="table3" rowspan="1" colspan="1" aria-sort="ascending" aria-label="Rendering engine: activate to sort column descending" style="width: 174px;">Name</th>
                                            <th class="sorting" tabindex="0" aria-controls="table3" rowspan="1" colspan="1" aria-label="Browser: activate to sort column ascending" style="width: 225px;">Username</th>
                                            <th class="sorting" tabindex="0" aria-controls="table3" rowspan="1" colspan="1" aria-label="Platform(s): activate to sort column ascending" style="width: 205px;">Phone(s)</th>
                                            <th class="sorting" tabindex="0" aria-controls="table3" rowspan="1" colspan="1" aria-label="Engine version: activate to sort column ascending" style="width: 146px;">Joined</th>
                                            <th class="sorting" tabindex="0" aria-controls="table3" rowspan="1" colspan="1" aria-label="CSS grade: activate to sort column ascending" style="width: 111px;">Action</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        @foreach($users as $person)
              
                                          <tr class="">
                                            <td>{{ $person->name }}</td>
                                            <td>{{ $person->username }}</td>
                                            <td>{{ $person->phone }} <br/> {{ $person->phone2 }}</td>
                                            <td>{{ $person->created_at }}</td>
                                            <td class="center">
                                              <div class="btn-group btn-hspace">
                                                <a href="{{ url('admin/people/unblock/' . $person->username) }}"><button type="button" class="btn btn-primary dropdown-toggle">Unblock</button></a>
                                              </div>
                                            </td>
                                          </tr>
                                        @endforeach
                                    </tbody>
                                </table>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection

@section('scripts')
<script type="text/javascript" src="/assets/js/manage.js"></script>
@endsection