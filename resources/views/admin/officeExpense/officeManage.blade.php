@extends('admin.master')

@section('title')
	office Manage
@endsection

@section('content-heading')
	All office List
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
                                        <th>Expense Date</th>
                                        <th>Expense Reason</th>
                                        <th>Debit By</th>
                                        <th>Amount</th>

                                        
                                        <th>Action</th>
                                    </tr>
                                </thead>
                                <tbody>
                                	@foreach($offices as $office)
                                	<tr>
                                		<td>{{++$i}}</td>
                                		<td>{{$office->expense_date}}</td>
                                		<td>{{$office->expense_reason}}</td>
                                		<td>{{$office->debit_by}}</td>
                                        <td>{{$office->amount}}</td>

                                		
                                		<td><a href="{{url('/office/view/'.$office->id)}}" target="_blank"></a> |<a href="{{url('/officeExpense/edit/'.$office->id)}}" target="_blank">Edit</a> |<a href="{{url('/officeExpense/delete/'.$office->id)}}" onclick="return confirm('Do you want to delete?')">Delete</td>
                                		
                                	</tr>
                                	@endforeach
                                </tbody>
                            </table>
                        </div>
@endsection