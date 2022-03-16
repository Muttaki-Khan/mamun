@extends('admin.master')

@section('title')
	office Entry
@endsection

@section('content-heading')
	Add New Office Expense
	<hr>
    <h4 style="color: green;">{{Session::get('message')}}</h4>

@endsection

@section('mainContent')
    <div class="panel-body">
                            <div class="row">
                                <div class="col-lg-6">
                                    
                                        {!! Form::open(['url'=>'/officeExpense/entry','method'=>'post','enctype'=>'multipart/form-data'])!!}
                                       
                                        
                                        <div class="form-group datepicker">
                                            <label>Expense Date</label>
                                            <input type="text"  class="form-control datepicker" id="datepicker" name="expense_date">
                                        
                                        </div>

                                        <div class="form-group">
                                            <label>Expense Reason</label>
                                            <input type="text" class="form-control" name="expense_reason">
                                        
                                        </div>

                                        <div class="form-group">
                                            <label>Debit By</label>
                                            <input type="text" class="form-control" name="debit_by">
                                        
                                        </div>

                                        <div class="form-group">
                                            <label>Amount</label>
                                            <input class="form-control" name="amount">
                            
                                        </div>
                                        
                                        <div class="form-group">
                                            <input type="submit" class="btn btn-block btn-primary">
                                        </div>  
                                     {!! Form::close() !!}
                                </div>
                            </div>
                            </div>

@endsection