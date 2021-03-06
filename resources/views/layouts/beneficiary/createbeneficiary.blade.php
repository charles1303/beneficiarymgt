@extends('layouts.app')

@section('title', 'New Beneficiary')

@section('sidebar')
    @parent
@endsection

<link href="{!! asset('css/bootstrap-datetimepicker.min.css') !!}" media="all" rel="stylesheet" type="text/css" />

<script type="text/javascript" src="{!! asset('js/jquery.js') !!}"></script>
<script type="text/javascript" src="{!! asset('js/moment.js') !!}"></script>
<script type="text/javascript" src="{!! asset('js/bootstrap-datetimepicker.min.js') !!}"></script>
<script type="text/javascript" src="{!! asset('js/beneficiarymgt/createbeneficiary.js') !!}"></script>

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
        <h3 class="panel-title">Register Beneficiary <small></small></h3>
      </div>
      <div class="panel-body">
        {!! Form::open(array('route' => 'createbeneficiary')) !!}
        
           <div class="row">
            <div class="col-xs-6 col-sm-6 col-md-6">
              <div class="form-group">
                {!! Form::label('First Name:') !!}
                {!! Form::text('first_name', null, 
                    array('required', 
                          'class'=>'form-control input-sm', 
                          'placeholder'=>'First Name')) !!}
            </div>

              
            </div>
            <div class="col-xs-6 col-sm-6 col-md-6">
              <div class="form-group">
                {!! Form::label('Last Name:') !!}
                {!! Form::text('last_name', null, 
                    array('required', 
                          'class'=>'form-control input-sm', 
                          'placeholder'=>'Last Name')) !!}
            
            </div>
          </div>
          </div>

          <div class="form-group">
            <div class='input-group date' id='datetimepicker1'>
                {!! Form::label('Date of Birth:') !!}
                {!! Form::text('date_of_birth', null, 
                    array('required', 
                          'class'=>'form-control', 
                          'placeholder'=>'Date of Birth')) !!}
                <span class="input-group-addon">
                    <span class="glyphicon glyphicon-calendar"></span>
                </span>
            </div>
            
          </div>


          

            <div class="form-group">
                <label for="sex">Sex:</label>

                <div class="form-group">
                {!! Form::label('Male') !!}
                {!! Form::radio('sex', 'M',['required']) !!}
                {!! Form::label('Female') !!}
                {!! Form::radio('sex', 'F',['required']) !!}
            
            </div>
            
                
          </div>


          <div class="form-group">
                {!! Form::label('Marital Status:') !!}
                {!! Form::select('marital_status', array('S'=>'Single','M'=>'Married'), 
                    array('required', 
                          'class'=>'form-control')) !!}
            
            </div>

                     
          <div class="form-group">
                {!! Form::label('Phone Number:') !!}
                {!! Form::text('phone_no', null, 
                    array('required', 
                          'class'=>'form-control input-sm', 
                          'placeholder'=>'Phone Number')) !!}
            
            </div> 


            <div class="form-group">
                {!! Form::label('Address:') !!}
                {!! Form::textarea('address', null, 
                    array('required', 
                          'class'=>'form-control', 
                          'placeholder'=>'Address','rows'=>'5')) !!}
            
            </div> 

          
            <div class="form-group">
                {!! Form::label('State of Origin:') !!}
                {!! Form::text('state_of_origin', null, 
                    array('required', 
                          'class'=>'form-control input-sm', 
                          'placeholder'=>'State of Origin')) !!}
            
            </div> 

            <div class="form-group">
                {!! Form::label('Employment Status:') !!}
                {!! Form::select('employment_status', array('U'=>'Unemployed','E'=>'Employed','SE'=>'Self Employed'), 
                    array('required', 
                          'class'=>'form-control')) !!}
            
            </div>

            <div class="form-group">
                {!! Form::label('Occupation:') !!}
                {!! Form::text('occupation', null, 
                    array('required', 
                          'class'=>'form-control input-sm', 
                          'placeholder'=>'Occupation')) !!}
            
            </div> 

            
            <div class="form-group">
                {!! Form::submit('Register', 
                  array('class'=>'btn btn-info center-block')) !!}
            </div>
            
          
        {!! Form::close() !!}
      </div>
    </div>
  </div>
</div>
@endsection



