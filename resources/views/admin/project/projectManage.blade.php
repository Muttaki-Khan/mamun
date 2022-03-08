@extends('admin.master')

@section('title')
	project Manage
@endsection

@section('content-heading')
	All Project List
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
                                        <th>Project Name</th>
                                        <th>Tender ID</th>
                                        <th>Estimate Cost</th>
                                        
                                        <th>Action</th>
                                    </tr>
                                </thead>
                                <tbody>
                                	@foreach($projects as $project)
                                	<tr>
                                		<td>{{++$i}}</td>
                                		<td>{{$project->project_name}}</td>
                                		<td>{{$project->tender_id}}</td>
                                		<td>{{$project->estimate_cost}}</td>
                                		
                                		<td><a href="{{url('/project/view/'.$project->id)}}" target="_blank">View</a> |<a href="{{url('/project/edit/'.$project->id)}}" target="_blank">Edit</a> |<a href="{{url('/project/delete/'.$project->id)}}" onclick="return confirm('Do you want to delete?')">Delete</td>
                                		
                                	</tr>
                                	@endforeach
                                </tbody>
                            </table>
                        </div>
@endsection