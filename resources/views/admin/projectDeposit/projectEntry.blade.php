@extends('admin.master')

@section('title')
	project Entry
@endsection

@section('content-heading')
	Add New Deposit
	<hr>
    <h4 style="color: green;">{{Session::get('message')}}</h4>

@endsection

@section('mainContent')
    <div class="panel-body">
                            <div class="row">
                                <div class="col-lg-6">
                                    
                                        {!! Form::open(['url'=>'/projectDeposit/entry','method'=>'post','enctype'=>'multipart/form-data'])!!}
                                       
                                        <div class="form-group">
                                            <label>Project</label>
                                            <select name="tender_id" class="form-control">
                                            @foreach($tenders as $tender)    
                                            <option value='{{$tender->tender_id}}'>{{$tender->project_name}}</option>
                                            @endforeach
                                            </select>
                                        </div>
                                        <div class="form-group datepicker">
                                            <label>Deposit Date</label>
                                            <input autocomplete='off' type="text"  class="form-control datepicker" id="datepicker" name="deposite_date">
                                        
                                        </div>

                                        <div class="form-group">
                                            <label>Deposit By</label>
                                            <input autocomplete='off' type="text" class="form-control" name="deposite_by">
                                        
                                        </div>

                                        <div class="form-group">
                                            <label>Amount</label>
                                            <input autocomplete='off' class="form-control" name="amount">
                                        
                                        </div>
                                        
                                        <div class="form-group">
                                            <input type="submit" class="btn btn-block btn-primary">
                                        </div>  
                                     {!! Form::close() !!}
                                </div>
                            </div>
                            </div>

@endsection