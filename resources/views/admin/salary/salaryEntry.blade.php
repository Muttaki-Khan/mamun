@extends('admin.master')

@section('title')
	salary Entry
@endsection

@section('content-heading')
	Add New Salary
	<hr>
    <h4 style="color: green;">{{Session::get('message')}}</h4>

@endsection

@section('mainContent')
    <div class="panel-body">
                            <div class="row">
                                <div class="col-lg-6">
                                    
                                        {!! Form::open(['url'=>'/salary/entry','method'=>'post','enctype'=>'multipart/form-data'])!!}
                                       
                                        <div class="form-group">
                                            <label>Name</label>
                                            <select name="employee_id" class="form-control">
                                            @foreach($employees as $name)    
                                            <option value='{{$name->id}}'>{{$name->name}}</option>
                                            @endforeach
                                            </select>
                                        </div>
                                        <div class="form-group datepicker">
                                            <label>Payment Date</label>
                                            <input type="text"  class="form-control datepicker" id="datepicker" name="payment_date">
                                        
                                        </div>

                                        <div class="form-group">
                                            <label>Month</label>
                                            <input type="text" class="form-control" name="month">
                                        
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