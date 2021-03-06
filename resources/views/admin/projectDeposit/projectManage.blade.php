@extends('admin.master')

@section('title')
	project Manage
@endsection

@section('content-heading')
	All Project Deposit List
    <hr>
    <h3 style="color: green;">{{Session::get('message')}}</h3>

@endsection

@section('mainContent')
	

	
	<?php 
	$i=0;
	 ?>
	<div class="panel-body">
    {!! Form::open(['url'=>'/projectDeposit/manage','method'=>'post','enctype'=>'multipart/form-data'])!!}

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
                                        <th>Project Name</th>
                                        <th>Deposit Date</th>
                                        <th>Deposit By</th>
                                        <th>Amount</th>
                                        
                                        <th>Action</th>
                                    </tr>
                                </thead>
                                <tbody>
                                	@foreach($projects as $project)
                                	<tr>
                                		<td>{{++$i}}</td>
                                		<td>{{$project->project_name}}</td>
                                        <td>{{ \Carbon\Carbon::parse($project->deposite_date)->format('d/m/Y')}}</td>
                                		<td>{{$project->deposite_by}}</td>
                                        <td>{{round($project->amount, 2)}}</td>

                                		
                                		<td><a href="{{url('/project/view/'.$project->id)}}" target="_blank"></a> <a href="{{url('/projectDeposit/edit/'.$project->id)}}" class="btn btn-primary btn-lg active" role="button">Edit</a> <a href="{{url('/projectDeposit/delete/'.$project->id)}}" class="btn btn-primary btn-lg active" role="button" onclick="return confirm('Do you want to delete?')">Delete</td>
                                		
                                	</tr>
                                	@endforeach
                                </tbody>
                            </table>
                            {{$projects->links()}}
                        </div>
@endsection