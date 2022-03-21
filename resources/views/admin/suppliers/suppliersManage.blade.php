@extends('admin.master')

@section('title')
	suppliers Manage
@endsection

@section('content-heading')
	All suppliers List
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
                                        <th>Suppliers Name</th>
                                        <th>Item</th>
                                        <th>Quantity</th>
                                        <th>Order Amount</th>
                                        <th>Order Date</th>
                                        
                                        <th>Action</th>
                                    </tr>
                                </thead>
                                <tbody>
                                @foreach($suppliers as $supplier)
                                	<tr>
                                		<td>{{++$i}}</td>
                                		<td>{{$supplier->name}}</td>
                                		<td>{{$supplier->item_name}}</td>
                                		<td>{{$supplier->quantity}}</td>
                                        <td>{{$supplier->order_amount}}</td>
                                		<td>{{$supplier->order_date}}</td>
                                		<td><a href="{{url('/suppliers/view/'.$supplier->id)}}" target="_blank"></a> <a href="{{url('/suppliers/edit/'.$supplier->id)}}" class="btn btn-primary btn-lg active" role="button">Edit</a> <a href="{{url('/suppliers/delete/'.$supplier->id)}}" class="btn btn-primary btn-lg active" role="button" onclick="return confirm('Do you want to delete?')">Delete</td>
                                	</tr>
                                	@endforeach
                                </tbody>
                            </table>
                        </div>
@endsection