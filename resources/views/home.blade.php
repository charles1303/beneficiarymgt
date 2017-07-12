@extends('layouts.app')


<link href="{!! asset('css/bootstrap.min.css') !!}" media="all" rel="stylesheet" type="text/css" />
<link href="{!! asset('css/datatables/dataTables.bootstrap.min.css') !!}" media="all" rel="stylesheet" type="text/css" />
<script type="text/javascript" src="{!! asset('js/jquery.js') !!}"></script>
<script type="text/javascript" src="{!! asset('js/datatables/jquery.dataTables.min.js') !!}"></script>
<script type="text/javascript" src="{!! asset('js/datatables/dataTables.bootstrap.min.js') !!}"></script>
<script type="text/javascript" src="{!! asset('js/beneficiarymgt/mypendingcases.js') !!}"></script>

@section('content')
<div class="container">
    <div class="row">
        <div class="col-md-10 col-md-offset-1">
            <div class="panel panel-default">
                <div class="panel-heading">Dashboard</div>

                <div class="panel-body">
                    You are logged in!&nbsp;&nbsp;&nbsp;&nbsp; <h3>{{$activeMsg}}</h3>
                    <div class="row">
                        <div class="col-md-12">
                            <div class="panel panel-default">

                                <div class='col-md-12'>

                                    <div class="clearfix">My Pending Cases</div>
                                        <br />
                                        <table id="myPendingCases" class="table table-striped table-bordered" width="100%" cellspacing="0">
                                            <thead>
                                                <th>S/N</th>
                                                <th nowrap>Beneficiary Number</th>
                                                <th nowrap>Beneficiary Name</th>
                                                <th nowrap>Case No</th>
                                                <th nowrap>Case Type</th>
                                                <th nowrap>Duration</th>
                                                <th nowrap>Trail</th>
                                                
                                            </thead>
                                            <tbody>
                                            @foreach ($cases as $case)

                                                <tr>
                                                    <td>1</td>
                                                    <td>{{$case->beneficiary->beneficiary_num}}</td>
                                                    <td>{{$case->beneficiary->firstname . ' ' . $case->beneficiary->lastname}}</td>
                                                    <td>{{$case->case_num}}</td>
                                                    <td>{{$case->caseType->description}}</td>
                                                    <td>{{$case->getDuration() . '  days'}}</td>
                                                    <td><a href='{{ url('/viewcase/'. $case->id) }}'>View Trail</a></td>

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
</div>



@endsection


