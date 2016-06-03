@extends('layouts.app')

@section('title', 'User')

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
    <div class="container">
        <div class="row">
            <div class="col-md-8 col-md-offset-2">
                <div class="panel panel-default">
                    <div class="panel-heading">Update User</div>
                    <div class="panel-body">
                        <form class="form-horizontal" role="form" method="POST" action="{{ url('/updateuser') }}">
                            {!! csrf_field() !!}

                            <div class="form-group{{ $errors->has('name') ? ' has-error' : '' }}">
                                <label class="col-md-4 control-label">Name</label>

                                <div class="col-md-6">
                                    <input type="text" class="form-control" name="name" value="{{$user->name}}">

                                    @if ($errors->has('name'))
                                        <span class="help-block">
                                        <strong>{{ $errors->first('name') }}</strong>
                                    </span>
                                    @endif
                                </div>
                            </div>

                            <div class="form-group{{ $errors->has('email') ? ' has-error' : '' }}">
                                <label class="col-md-4 control-label">E-Mail Address</label>

                                <div class="col-md-6">
                                    <input type="email" class="form-control" name="email" value="{{$user->email}}">

                                    @if ($errors->has('email'))
                                        <span class="help-block">
                                        <strong>{{ $errors->first('email') }}</strong>
                                    </span>
                                    @endif
                                </div>
                            </div>

                            <div class="form-group{{ $errors->has('group') ? ' has-error' : '' }}">
                                <label class="col-md-4 control-label">Group</label>

                                <div class="col-md-6">
                                    <select name="group">
                                        <option value="1" @if ($user->group == '1') selected @endif>Member</option>
                                        <option value="2"  @if ($user->group == '2') selected @endif>Admin</option>
                                        <option value="3"  @if ($user->group == '3') selected @endif>Church Office</option>
                                    </select>

                                    @if ($errors->has('group'))
                                        <span class="help-block">
                                        <strong>{{ $errors->first('group') }}</strong>
                                    </span>
                                    @endif
                                </div>
                            </div>
                            <input type="hidden" name="userid" value="{{$user->id}}">

                            <div class="form-group">
                                <div class="col-md-6 col-md-offset-4">
                                    <button type="submit" class="btn btn-primary">
                                        <i class="fa fa-btn fa-user"></i>Update
                                    </button>

                                </div>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
