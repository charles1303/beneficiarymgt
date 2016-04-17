@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row">
        <div class="col-md-10 col-md-offset-1">
            <div class="panel panel-default">
                <div class="panel-heading">Dashboard</div>

                <div class="panel-body">
                    You are logged in!
                </div>
            </div>
        </div>
    </div>
</div>

<div class="row">
  <div class="col-xs-12 col-sm-8 col-md-4 col-sm-offset-2 col-md-offset-4">
    <div class="panel panel-default">
        
                <div class='col-md-12'>

                    <div class="clearfix">My Pending Cases</div>
                    <br />
                    <table id="myPendingCases" cellspacing="0" width="100%" class="table table-responsive table-bordered table-striped table-small-font table-hover nowrap">
                        <thead>
                            <th>S/N</th>
                            <th nowrap>Beneficiary Number</th>
                            <th nowrap>Beneficiary Name</th>
                            <th nowrap>Case No</th>
                            <th nowrap>Case Type</th>
                            <th nowrap>Duration</th>
                            
                        </thead>
                        <tbody>
                            <tr>
                                <td>1</td>
                                <td>BEN001</td>
                                <td>Chuka Oyewole</td>
                                <td>BC001</td>
                                <td>Empowerment</td>
                                <td>15 days</td>
                                
                            </tr>
                            <tr>
                                <td>2</td>
                                <td>BEN002</td>
                                <td>Adeola Ahmed</td>
                                <td>BC002</td>
                                <td>Accomodation</td>
                                <td>17 days</td>
                                
                            </tr>
                            <tr>
                                <td>3</td>
                                <td>BEN003</td>
                                <td>Osagie Bassey</td>
                                <td>BC003</td>
                                <td>Tution Fees</td>
                                <td>19 days</td>
                                
                            </tr>
                        </tbody>
                    </table>

                </div>
            </div>
        </div>
    </div>

@endsection


