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
        <h3 class="panel-title">Create Beneficiary Case <small></small></h3>
      </div>
      <div class="panel-body">
        


          <div class="form-group">
                {!! Form::label('Select a beneficiary:') !!}
                {{ Form::select('beneficiary', [], null, ['id' => 'beneficiary', 'class' => 'form-control']) }}

            
            </div>

                     
          
          
        {!! Form::close() !!}
      </div>
    </div>
  </div>
</div>
@endsection





