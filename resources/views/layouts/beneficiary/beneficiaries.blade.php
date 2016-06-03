@extends('layouts.app')

@section('title', 'Beneficiaries')

@section('sidebar')
    @parent

            <!--p>This is appended to the master sidebar.</p-->
@endsection

<link href="{!! asset('css/bootstrap.min.css') !!}" media="all" rel="stylesheet" type="text/css" />
<link href="{!! asset('css/datatables/dataTables.bootstrap.min.css') !!}" media="all" rel="stylesheet" type="text/css" />
<link href="{!! asset('css/datatables/buttons.dataTables.min.css') !!}" media="all" rel="stylesheet" type="text/css" />

<script type="text/javascript" src="{!! asset('js/jquery.js') !!}"></script>
<script type="text/javascript" src="{!! asset('js/datatables/jquery.dataTables.min.js') !!}"></script>
<script type="text/javascript" src="{!! asset('js/datatables/dataTables.bootstrap.min.js') !!}"></script>
<script type="text/javascript" src="{!! asset('js/datatables/dataTables.buttons.min.js') !!}"></script>
<script type="text/javascript" src="{!! asset('js/beneficiarymgt/beneficiaries.js') !!}"></script>
<script type="text/javascript" src="https://cdn.datatables.net/r/dt/jq-2.1.4,jszip-2.5.0,pdfmake-0.1.18,dt-1.10.9,af-2.0.0,b-1.0.3,b-colvis-1.0.3,b-html5-1.0.3,b-print-1.0.3,se-1.0.1/datatables.min.js"></script>


@section('content')
    <div class="row col-md-8">
        <div class="col-xs-8 col-sm-8 col-md-12 col-sm-offset-2 col-md-offset-4">
            <div class="clearfix ">Beneficiaries</div>
            <br />
            <p/>
            <div class="panel panel-default">

                <div class='col-md-12'>

                    <table id="beneficiaries" class="table table-striped table-bordered" width="100%" cellspacing="0">
                        <thead>
                        <th>S/N</th>
                        <th nowrap>Beneficiary Number</th>
                        <th nowrap>First Name</th>
                        <th nowrap>Last Name</th>
                        <th nowrap>Date of Birth</th>
                        <th nowrap>Sex</th>
                        <th nowrap>Marital Status</th>
                        <th nowrap>Phone Number</th>
                        <th nowrap>Address</th>
                        <th nowrap>State of Origin</th>
                        <th nowrap>Employment Status</th>
                        <th nowrap>Occupation</th>
                        <th nowrap>Date Registered</th>
                        </thead>
                        <tbody>

                        @foreach ($beneficiaries as $beneficiary)

                            <tr>
                                <td>{{$beneficiary->id}}</td>
                                <td>{{$beneficiary->beneficiary_num}}</td>
                                <td>{{$beneficiary->firstname}}</td>
                                <td>{{$beneficiary->lastname}}</td>
                                <td>{{$beneficiary->date_of_birth}}</td>
                                <td>{{$beneficiary->sex}}</td>
                                <td>{{$beneficiary->marital_status}}</td>
                                <td>{{$beneficiary->phone_number}}</td>
                                <td>{{$beneficiary->address}}</td>
                                <td>{{$beneficiary->state_of_origin}}</td>
                                <td>{{$beneficiary->employment_status}}</td>
                                <td>{{$beneficiary->occupation}}</td>
                                <td>{{$beneficiary->created_at}}</td>

                            </tr>
                        @endforeach

                        </tbody>
                    </table>

                </div>
            </div>

        </div>
    </div>

@endsection