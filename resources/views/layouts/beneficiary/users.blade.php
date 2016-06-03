@extends('layouts.app')

@section('title', 'Users')

@section('sidebar')
    @parent

            <!--p>This is appended to the master sidebar.</p-->
@endsection

<link href="{!! asset('css/bootstrap.min.css') !!}" media="all" rel="stylesheet" type="text/css" />
<link href="{!! asset('css/datatables/dataTables.bootstrap.min.css') !!}" media="all" rel="stylesheet" type="text/css" />
<script type="text/javascript" src="{!! asset('js/jquery.js') !!}"></script>
<script type="text/javascript" src="{!! asset('js/datatables/jquery.dataTables.min.js') !!}"></script>
<script type="text/javascript" src="{!! asset('js/datatables/dataTables.bootstrap.min.js') !!}"></script>
<script type="text/javascript" src="{!! asset('js/beneficiarymgt/users.js') !!}"></script>


@section('content')
    <div class="row col-md-8">
        <div class="col-xs-12 col-sm-8 col-md-12 col-sm-offset-2 col-md-offset-4">
            <div id="ajaxResponse"></div>
            <div class="clearfix">Users</div>
            <br />
            <div class="panel panel-default">

                <div class='col-md-12'>


                    <table id="users" class="table table-striped table-bordered" width="100%" cellspacing="0">
                        <thead>
                        <th>S/N</th>
                        <th nowrap>First name</th>
                        <th nowrap>Last Name</th>
                        <th nowrap>Email</th>
                        <th nowrap>Phone Number</th>
                        <th nowrap>Date Registered</th>
                        <th nowrap>Group</th>
                        <th nowrap>Status</th>
                        <th nowrap>Action</th>
                        <th nowrap>View</th>
                        </thead>
                        <tbody>
                        @foreach ($users as $user)

                            <tr>
                                <td>{{$user->id}}</td>
                                <td>{{$user->name}}</td>
                                <td>{{$user->name}}</td>
                                <td>{{$user->email}}</td>
                                <td></td>
                                <td>{{$user->created_at}}</td>
                                <td>{{$user->group}}</td>
                                <td>{{$user->active}}</td>
                                <td><input type="checkbox" value="{{$user->id}}" id="userid" name="userid"></td>
                                <td><a href='{{ url('/viewuser/'. $user->id) }}'>Details</a></td>

                            </tr>
                        @endforeach

                        </tbody>
                    </table>

                </div>
            </div>
            <div class="row">
                <div class="form-group">
                    <div class='col-md-3'>
                        {!! Form::submit('Approve Selected',
                        array('class'=>'btn btn-info center-block approve')) !!}
                    </div>
                    <div class='col-md-3'>
                        {!! Form::submit('Deactivate Selected',
                        array('class'=>'btn btn-info center-block deactivate')) !!}
                    </div>
               </div>
            </div>
        </div>
    </div>

@endsection