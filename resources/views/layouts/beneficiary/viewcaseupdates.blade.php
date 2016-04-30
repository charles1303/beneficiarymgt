@extends('layouts.app')

@section('title', 'View Beneficiary Case Updates')

@section('sidebar')
    @parent
@endsection

<link href="{!! asset('css/select2/select2.min.css') !!}" media="all" rel="stylesheet" type="text/css" />


<script type="text/javascript" src="{!! asset('js/jquery.js') !!}"></script>
<script type="text/javascript" src="{!! asset('js/select2/select2.min.js') !!}"></script>

<script type="text/javascript" src="{!! asset('js/beneficiarymgt/updatecase.js') !!}"></script>



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
                    @if (isset($caseUpdates['updates']) && (count($caseUpdates['updates']) > 0))
                        <h3 class="panel-title">Beneficiary Case Updates for Case File {{$caseUpdates['updates'][0]->beneficiaryCase->case_num}}</h3>
                    @else
                        <h3 class="panel-title">Beneficiary Has no Case Updates</h3>
                    @endif
                </div>
                <div class="panel-body">
                    <div class="col-xs-12">

                        <div id='beneficiary_case'>
                            <span id='ben_num' class='text-primary'><strong><em>Beneficiary Number : {{$caseUpdates['case']->beneficiary->beneficiary_num}}</em></strong></span><br/>
                            <span id='ben_fname' class='text-primary'><strong><em>Beneficiary First Name : {{$caseUpdates['case']->beneficiary->firstname}}</em></strong></span><br/>
                            <span id='ben_lname' class='text-primary'><strong><em>Beneficiary Last Name : {{$caseUpdates['case']->beneficiary->lastname}}</em></strong></span><br/>
                            <span id='case_file_no' class='text-primary'><strong><em>Beneficiary Case File No : {{$caseUpdates['case']->case_num}}</em></strong></span><br/>
                            <span id='case_type' class='text-primary'><strong><em>Case Type : {{$caseUpdates['case']->caseType->description}}</em></strong></span><br/>
                            <span id='case_req_amt' class='text-primary'><strong><em>Requested Amount : {{number_format($caseUpdates['case']->amount_requested,2)}}</em></strong></span><br/>
                            <span id='case_entry_date' class='text-primary'><strong><em>Case Entry Date : {{$caseUpdates['case']->entry_date}}</em></strong></span><br/>

                        </div>

                    </div>
                    @if (isset($caseUpdates['updates']) && (count($caseUpdates['updates']) > 0))

                        @foreach ($caseUpdates['updates'] as $update)
                            <div class="col-xs-12">
                                <div class="form-group">
                                    {!! Form::textarea('case_update',$update->comment ,
                                    array('required', 'readonly',
                                    'class'=>'form-control',
                                    'placeholder'=>'Case Update','rows'=>'5')) !!}

                                </div>
                            </div>
                            <div class="col-xs-12">
                                <span id='entry_date' class='text-primary'><strong><em>Entry Date: {{$update->entry_date }}</em></strong></span><br/>
                            </div>
                            <div class="col-xs-12">
                                <span id='entered_by' class='text-primary'><strong><em>Entered By: {{$update->updatedBy->name }}</em></strong></span><br/>
                            </div>
                        @endforeach
                        
                    @endif
                </div>
            </div>
        </div>
    </div>
@endsection