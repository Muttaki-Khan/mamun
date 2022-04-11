@extends('admin.master')

@section('title')
	suppliers due Manage
@endsection

@section('content-heading')
	All suppliers due List
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
                                        <th>Supplier Name</th>
                                        <th>Due Amount</th>
                                        
                                        <th>Action</th>
                                    </tr>
                                </thead>
                                <tbody>
                                	@foreach($suppliers as $supplier)
                                	<tr>
                                		<td>{{++$i}}</td>
                                		<td>{{$supplier->suppliers_name}}</td>
                                		<td>{{$supplier->due_amount}}</td>
                                		
                                		<td><a href="{{url('/suppliers/view/'.$supplier->id)}}" target="_blank"></a> <a href="{{url('/suppliersDue/edit/'.$supplier->id)}}" class="btn btn-primary btn-lg active" role="button">Edit</a> <a href="{{url('/suppliersDue/delete/'.$supplier->id)}}" class="btn btn-primary btn-lg active" role="button" onclick="return confirm('Do you want to delete?')">Delete</td>
                                		
                                	</tr>
                                	@endforeach
                                </tbody>
                            </table>
                            {{$suppliers->links()}}

                        </div>
@endsection