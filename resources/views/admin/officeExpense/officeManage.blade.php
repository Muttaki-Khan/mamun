@extends('admin.master')

@section('title')
	office Manage
@endsection

@section('content-heading')
	All office Expense List
    <hr>
    <h3 style="color: green;">{{Session::get('message')}}</h3>

@endsection

@section('mainContent')
	

	
	<?php 
	$i=0;
	 ?>
	<div class="panel-body">
    {!! Form::open(['url'=>'/officeExpense/manage','method'=>'post','enctype'=>'multipart/form-data'])!!}

    <input autocomplete="off" name="from_date" type="text" class="datepicker" id="fromDate" placeholder="From date..."> </input>
    <input autocomplete="off" name="to_date" type="text" class="datepicker" id="toDate" placeholder="To date..."> </input>
    <button name="search" type="submit" id="search" value="search" style="margin-right: 320px;"> Search </button>

    <input type="text" id="myInput" onkeyup="myFunction()" 
    placeholder="Search for names.." title="Type in a name" style="">

    {!! Form::close() !!}
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
                                        <td>{{ \Carbon\Carbon::parse($office->expense_date)->format('d/m/Y')}}</td>
                                		<td>{{$office->expense_reason}}</td>
                                		<td>{{$office->debit_by}}</td>
                                        <td>{{$office->amount}}</td>

                                		
                                		<td><a href="{{url('/office/view/'.$office->id)}}" target="_blank"></a> <a href="{{url('/officeExpense/edit/'.$office->id)}}" class="btn btn-primary btn-lg active" role="button">Edit</a> <a href="{{url('/officeExpense/delete/'.$office->id)}}" class="btn btn-primary btn-lg active" role="button" onclick="return confirm('Do you want to delete?')">Delete</td>
                                		
                                	</tr>
                                	@endforeach
                                </tbody>
                            </table>
                            {{$offices->links()}}
                        </div>
@endsection