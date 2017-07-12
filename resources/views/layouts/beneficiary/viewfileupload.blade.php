@extends('layouts.app')

@section('title', 'Upload File(s)')

@section('sidebar')
    @parent
@endsection

<link href="{!! asset('css/select2/select2.min.css') !!}" media="all" rel="stylesheet" type="text/css" />


<script type="text/javascript" src="{!! asset('js/jquery.js') !!}"></script>
<script type="text/javascript" src="{!! asset('js/select2/select2.min.js') !!}"></script>

<script type="text/javascript" src="{!! asset('js/beneficiarymgt/beneficiaryfiles.js') !!}"></script>



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
                    <h3 class="panel-title">View Beneficiary File(s)</h3>
                </div>
                <div class="panel-body">
                    <div class="form-group">
                        {!! Form::label('Select a beneficiary:') !!}
                        {{ Form::select('beneficiary', [], null, ['id' => 'beneficiary', 'class' => 'form-control']) }}
                    </div>

                    @if (isset($beneficiary))
                    <div class="col-xs-12">

                        <div><span id='ben_id'></span><br/></div>
                        <div id='beneficiary'>
                            <span id='ben_num' class='text-primary'><strong><em>Beneficiary Number : <?php echo $beneficiary->beneficiary_num ?></em></strong></span><br/>
                            <span id='ben_fname' class='text-primary'><strong><em>Beneficiary First Name : <?php echo $beneficiary->firstname ?></em></strong></span><br/>
                            <span id='ben_lname' class='text-primary'><strong><em>Beneficiary Last Name : <?php echo $beneficiary->lastname ?></em></strong></span><br/>
                        </div>
                    </div>
                    @endif


                    {!! Form::open(array('route' => 'viewfileupload','id' => 'benfiles')) !!}

                    <input type="hidden" name="beneficiary_id" id="beneficiary_id">

                    {!! Form::close() !!}


                    <!-- Current Tasks -->
                    @if (isset($files))
                    @if (count($files) > 0)
                        <div class="panel panel-default">
                            <div class="panel-heading">
                                Uploaded File(s)
                            </div>

                            <div class="panel-body">
                                <table class="table table-striped task-table">
                                    <thead>

                                    <th>View</th>
                                    </thead>
                                    <tbody>
                                    @foreach ($files as $file)
                                        <tr>

                                            <td>
                                                <a href="{{url('uploads/' . $file->filename)}}">View</a>

                                            </td>
                                        </tr>
                                    @endforeach
                                    </tbody>
                                </table>
                            </div>
                        </div>
                    @else No Files uploaded for selected beneficiary.
                    @endif
                        @endif

                </div>
            </div>
        </div>
    </div>
@endsection