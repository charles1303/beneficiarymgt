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
                    @if (isset($caseUpdates) && (count($caseUpdates['updates']) > 0))
                        <h3 class="panel-title">Beneficiary Case Updates for Case File {{$caseUpdates['updates'][0]->beneficiaryCase->case_num}}</h3>
                    @else
                        <h3 class="panel-title">Beneficiary Has no Case Updates</h3>
                    @endif
                </div>
                <div class="panel-body">
                    @if (isset($caseUpdates) && (count($caseUpdates['updates']) > 0))

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