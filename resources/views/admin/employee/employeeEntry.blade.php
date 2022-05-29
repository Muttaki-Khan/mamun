@extends('admin.master')

@section('title')
	employee Entry
@endsection

@section('content-heading')
	Add New Employee
	<hr>
    <h4 style="color: green;">{{Session::get('message')}}</h4>

@endsection

@section('mainContent')
    <div class="panel-body">
                            <div class="row">
                                <div class="col-lg-6">
                                    
                                        {!! Form::open(['url'=>'/employee/entry','method'=>'post','enctype'=>'multipart/form-data'])!!}
                                       
                                        
                                        <div class="form-group datepicker">
                                            <label>Joining Date</label>
                                            <input autocomplete='off' type="text"  class="form-control datepicker" id="datepicker" name="joining_date">
                                        
                                        </div>

                                        <div class="form-group">
                                            <label>Name</label>
                                            <input autocomplete='off' type="text" class="form-control" name="name">
                                        
                                        </div>

                                        <div class="form-group">
                                            <label>Designation</label>
                                            <input autocomplete='off' type="text" class="form-control" name="designation">
                                        
                                        </div>

                                        <div class="form-group">
                                            <label>Salary</label>
                                            <input autocomplete='off' class="form-control" name="salary">
                                        
                                        </div>
                                        
                                        <div class="form-group">
                                            <input type="submit" class="btn btn-block btn-primary">
                                        </div>  
                                     {!! Form::close() !!}
                                </div>
                            </div>
                            </div>

@endsection