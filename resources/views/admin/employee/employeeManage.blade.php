@extends('admin.master')

@section('title')
	employee Manage
@endsection

@section('content-heading')
	All Employee List
    <hr>
    <h3 style="color: green;">{{Session::get('message')}}</h3>

@endsection

@section('mainContent')
	

	
	<?php 
	$i=0;
	 ?>
	<div class="panel-body">
    {!! Form::open(['url'=>'/employee/manage','method'=>'post','enctype'=>'multipart/form-data'])!!}

    <input type="text" id="myInput" onkeyup="myFunction()" 
    placeholder="Search for names.." title="Type in a name" style="">

    {!! Form::close() !!}
                            <table width="100%" class="table table-striped table-bordered table-hover" id="dataTables-example">
                                <thead>
                                    <tr>
                                        <th>SI.</th>
                                        <th>Employee Name</th>
                                        <th>Joining Date</th>
                                        <th>Designation</th>
                                        <th>Salary</th>

                                        
                                        <th>Action</th>
                                    </tr>
                                </thead>
                                <tbody>
                                	@foreach($employee as $employee)
                                	<tr>
                                		<td>{{++$i}}</td>
                                		<td>{{$employee->name}}</td>
                                		<td>{{$employee->joining_date}}</td>
                                		<td>{{$employee->designation}}</td>
                                        <td>{{round($employee->salary, 2)}}</td>

                                		
                                		<td><a href="{{url('/employee/view/'.$employee->id)}}" target="_blank"></a> <a href="{{url('/employee/edit/'.$employee->id)}}" class="btn btn-primary btn-lg active" role="button">Edit</a> <a href="{{url('/employee/delete/'.$employee->id)}}" class="btn btn-primary btn-lg active" role="button" onclick="return confirm('Do you want to delete?')">Delete</td>
                                		
                                	</tr>
                                	@endforeach
                                </tbody>
                            </table>
                        </div>
@endsection