@extends('layouts.app')

@section('title', 'New Beneficiary')

@section('sidebar')
    @parent

            <!--p>This is appended to the master sidebar.</p-->
@endsection

@section('content')
<div class="row">
  <div class="col-xs-12 col-sm-8 col-md-4 col-sm-offset-2 col-md-offset-4">
    <div class="panel panel-default">
        
                <div class='col-md-12'>

                    <div class="clearfix"></div>
                    <br />
                    <table id="myPendingCases" cellspacing="0" width="100%" class="table table-responsive table-bordered table-striped table-small-font table-hover nowrap">
                        <thead>
                            <th>S/N</th>
                            <th nowrap>Beneficiary Number</th>
                            <th nowrap>Beneficiary Name</th>
                            <th nowrap>Case No</th>
                            <th nowrap>Case Type</th>
                            <th nowrap>Duration</th>
                            <th nowrap>Status</th>
                        </thead>
                        <tbody>
                            <td>S/N</td>
                            <td>Beneficiary Number</td>
                            <td>Beneficiary Name</td>
                            <td>Case No</td>
                            <td>Case Type</td>
                            <td>Duration</td>
                            <td>Status</td>
                        </tbody>
                    </table>

                </div>
            </div>
        </div>
    </div>

@endsection