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
                                        <td>{{$employee->salary}}</td>

                                		
                                		<td><a href="{{url('/employee/view/'.$employee->id)}}" target="_blank"></a> |<a href="{{url('/employee/edit/'.$employee->id)}}" target="_blank">Edit</a> |<a href="{{url('/employee/delete/'.$employee->id)}}" onclick="return confirm('Do you want to delete?')">Delete</td>
                                		
                                	</tr>
                                	@endforeach
                                </tbody>
                            </table>
                        </div>
@endsection