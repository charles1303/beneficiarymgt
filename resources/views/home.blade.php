@extends('layouts.app')


<link href="{!! asset('css/datatables/jquery.dataTables.min.css') !!}" media="all" rel="stylesheet" type="text/css" />
<script type="text/javascript" src="{!! asset('js/jquery.js') !!}"></script>
<script type="text/javascript" src="{!! asset('js/datatables/jquery.dataTables.min.js') !!}"></script>
<script type="text/javascript" src="{!! asset('js/beneficiarymgt/mypendingcases.js') !!}"></script>

@section('content')
<div class="container">
    <div class="row">
        <div class="col-md-10 col-md-offset-1">
            <div class="panel panel-default">
                <div class="panel-heading">Dashboard</div>

                <div class="panel-body">
                    You are logged in!
                </div>
            </div>
        </div>
    </div>
</div>

<div class="row">
    <div class="col-md-10 col-md-offset-1">
    <div class="panel panel-default">

                <div class='col-md-12'>

                    <div class="clearfix">My Pending Cases</div>
                    <br />
                    <table id="myPendingCases" cellspacing="0" width="100%" class="table table-responsive table-bordered table-striped table-small-font table-hover">
                        <thead>
                            <th>S/N</th>
                            <th nowrap>Beneficiary Number</th>
                            <th nowrap>Beneficiary Name</th>
                            <th nowrap>Case No</th>
                            <th nowrap>Case Type</th>
                            <th nowrap>Duration</th>
                            
                        </thead>
                        <tbody>
                        @foreach ($cases as $case)

                            <tr>
                                <td>1</td>
                                <td>{{$case->beneficiary->beneficiary_num}}</td>
                                <td>{{$case->beneficiary->firstname . ' ' . $case->beneficiary->lastname}}</td>
                                <td>{{$case->case_num}}</td>
                                <td>{{$case->caseType->description}}</td>
                                <td>15 days</td>

                            </tr>
                        @endforeach

                        </tbody>
                    </table>

                </div>
            </div>
        </div>
    </div>

@endsection


