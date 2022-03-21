@extends('admin.master')

@section('title')
	salary Manage
@endsection

@section('content-heading')
	All Salary List
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
                                        <th>Name</th>
                                        <th>Payment Date</th>
                                        <th>month</th>
                                        <th>Amount</th>
                                        
                                        <th>Action</th>
                                    </tr>
                                </thead>
                                <tbody>
                                	@foreach($salarys as $salary)
                                	<tr>
                                		<td>{{++$i}}</td>
                                		<td>{{$salary->name}}</td>
                                		<td>{{$salary->payment_date}}</td>
                                		<td>{{$salary->month}}</td>
                                        <td>{{$salary->amount}}</td>

                                		
                                		<td><a href="{{url('/salary/view/'.$salary->id)}}" target="_blank"></a> <a href="{{url('/salary/edit/'.$salary->id)}}" class="btn btn-primary btn-lg active" role="button">Edit</a> <a href="{{url('/salary/delete/'.$salary->id)}}" class="btn btn-primary btn-lg active" role="button" onclick="return confirm('Do you want to delete?')">Delete</td>
                                		
                                	</tr>
                                	@endforeach
                                </tbody>
                            </table>
                        </div>
@endsection