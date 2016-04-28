@extends('layouts.app')

@section('title', 'New Beneficiary Case')

@section('sidebar')
    @parent
@endsection

<link href="{!! asset('css/select2/select2.min.css') !!}" media="all" rel="stylesheet" type="text/css" />


<script type="text/javascript" src="{!! asset('js/jquery.js') !!}"></script>
<script type="text/javascript" src="{!! asset('js/select2/select2.min.js') !!}"></script>

<script type="text/javascript" src="{!! asset('js/beneficiarymgt/createcase.js') !!}"></script>



@section('content')
    <div class="row">
        <div class="col-xs-12 col-sm-8 col-md-4 col-sm-offset-2 col-md-offset-4">
            <div class="panel panel-default">
                @if (isset($message))
                    <div class="{{$messageClass}}">
                        {{ $message }}
                    </div>
                @endif
                <div class="panel-heading">
                    <h3 class="panel-title">Create Beneficiary Case</h3>
                </div>
                <div class="panel-body">
                    <div class="form-group">
                        {!! Form::label('Select a beneficiary:') !!}
                        {{ Form::select('beneficiary', [], null, ['id' => 'beneficiary', 'class' => 'form-control']) }}
                    </div>

                    <div class="col-xs-12">

                    <div><span id='ben_id' style="display: none"></span><br/></div>
                    <div id='beneficiary'>
                        <span id='ben_num' class='text-primary'><strong><em>Beneficiary Number : </em></strong></span><br/>
                        <span id='ben_fname' class='text-primary'><strong><em>Beneficiary First Name : </em></strong></span><br/>
                        <span id='ben_lname' class='text-primary'><strong><em>Beneficiary Last Name : </em></strong></span><br/>
                        <span id='ben_addr' class='text-primary'><strong><em>Beneficiary Address : </em></strong></span><br/>
                    </div>
                        </div>


                    {!! Form::open(array('route' => 'createcase')) !!}

                    <input type="hidden" name="beneficiary_id" id="beneficiary_id">
                    <div id='case_details'>

                        <hr style="width: 100%; color: black; height: 1px; background-color:black;" />
                        <div class="col-xs-12">
                        <div class="form-group">
                            {!! Form::label('Case Description:') !!}
                            {!! Form::textarea('case_descr', null,
                            array('required',
                            'class'=>'form-control',
                            'placeholder'=>'Case Description','rows'=>'5')) !!}

                        </div>
                            </div>

                        <div class="col-xs-12">
                            <div class="form-group">
                                {!! Form::label('Type:') !!}
                                {!! Form::select('case_type', array('E'=>'Empowerment','A'=>'Accommodation','M'=>'Medical','T'=>'Tuition'),
                                array('required',
                                'class'=>'form-control')) !!}
                            </div>
                        </div>
                        <div class="col-xs-6">
                            <div class="form-group">
                                {!! Form::label('Amount Requested:') !!}
                                {!! Form::text('amount_req', '0.00',
                                array('required',
                                'class'=>'form-control input-sm',
                                'placeholder'=>'Amount Required')) !!}

                            </div>
                        </div>
                        <div class="col-xs-12">
                        <div class="form-group form-group-lg">
                            {!! Form::label('Select Back up Case Officer:') !!}<br/>
                            {{ Form::select('bkup_case_officer', [], null, ['id' => 'bkup_case_officer', 'class' => 'form-control']) }}
                        </div>
                            </div>
                        <div class="col-xs-12">
                        <div class="form-group">
                            {!! Form::submit('Create Case',
                            array('class'=>'btn btn-info center-block')) !!}
                        </div>
                            </div>
                    </div>

                    {!! Form::close() !!}
                </div>
            </div>
        </div>
    </div>
@endsection