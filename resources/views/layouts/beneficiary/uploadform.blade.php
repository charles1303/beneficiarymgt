@extends('layouts.app')

@section('title', 'Upload File(s)')

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

                    @if (count($errors) > 0)
                        <ul>
                            @foreach ($errors->all() as $error)
                                <li>{{ $error }}</li>
                            @endforeach
                        </ul>
                    @endif

                <div class="panel-heading">
                    <h3 class="panel-title">Upload Beneficiary File(s)</h3>
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


                    <form action="/upload" method="post" enctype="multipart/form-data">
                        {{ csrf_field() }}

                    <input type="hidden" name="beneficiary_id" id="beneficiary_id">
                    <div id='case_details'>

                        <hr style="width: 100%; color: black; height: 1px; background-color:black;" />


                        <div class="col-xs-12">
                            <div class="form-group">
                                <input type="file" name="files[]" multiple class="form-control"/>
                            </div>
                        </div>

                        <div class="col-xs-12">
                            <div class="form-group">
                                <input type="submit" value="Upload" class="btn btn-info center-block" />

                            </div>
                        </div>
                    </div>

                    </form>
                </div>
            </div>
        </div>
    </div>
@endsection