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
<script type="text/javascript" src="{!! asset('js/beneficiarymgt/beneficiarycases.js') !!}"></script>
<script type="text/javascript" src="https://cdn.datatables.net/r/dt/jq-2.1.4,jszip-2.5.0,pdfmake-0.1.18,dt-1.10.9,af-2.0.0,b-1.0.3,b-colvis-1.0.3,b-html5-1.0.3,b-print-1.0.3,se-1.0.1/datatables.min.js"></script>
<script type="text/javascript" src="{!! asset('js/moment.js') !!}"></script>
<script type="text/javascript" src="{!! asset('js/bootstrap-datetimepicker.min.js') !!}"></script>


@section('content')

    <div class="row col-md-8">

        <div class="col-xs-8 col-sm-8 col-md-12 col-sm-offset-2 col-md-offset-4">

            <div class="clearfix ">Cases</div>
            <br />
            <p/>
            </p>
            {!! Form::open(array('route' => 'cases')) !!}
                <div class="row col-md-12">
                    <div class="col-md-6">

                        <div class="form-group" id="filter-date">
                            <p/>
                            </p>
                            <label class="font-normal"><strong>Select Date Range Below:</strong></label>

                            <div class="input-daterange input-group" id="datepicker1">
                                <input type="text" class="input-sm form-control" id="dt_start" name="dt_start" value="{{$start_date}}">
                                <span class="input-group-addon">to</span>
                                <input type="text" class="input-sm form-control" id="dt_end" name="dt_end" value="{{$end_date}}">
                            </div>
                        </div>
                    </div>

                    <div class="col-md-3">
                        <div class="form-group">
                            <br />
                            {!! Form::submit('Show',
                            array('class'=>'btn btn-info center-block')) !!}
                        </div>
                    </div>
                </div>
            {!! Form::close() !!}


            <div class="panel panel-default">

                <div class='col-md-12'>

                    <table id="beneficiarycases" class="table table-striped table-bordered" width="100%" cellspacing="0">
                        <thead>
                            <th>S/N</th>
                            <th nowrap>Beneficiary Number</th>
                            <th nowrap>Beneficiary Name</th>
                            <th nowrap>Case No</th>
                            <th nowrap>Case Type</th>
                            <th nowrap>Amount Disbursed</th>
                        </thead>
                        <tbody>
                        @foreach ($cases as $case)

                            <tr>
                                <td>1</td>
                                <td>{{$case->beneficiary->beneficiary_num}}</td>
                                <td>{{$case->beneficiary->firstname . ' ' . $case->beneficiary->lastname}}</td>
                                <td>{{$case->case_num}}</td>
                                <td>{{$case->caseType->description}}</td>
                                <td>{{number_format($case->amount_released,2,'.',',')}}</td>


                            </tr>
                        @endforeach

                        </tbody>
                    </table>

                </div>
            </div>

        </div>
    </div>

@endsection