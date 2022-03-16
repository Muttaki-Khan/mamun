@extends('admin.master')

@section('title')
	suppliers Manage
@endsection

@section('content-heading')
	All suppliers payment List
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
                                        <th>Payment Date</th>
                                        <th>Amount</th>
                                        
                                        <th>Action</th>
                                    </tr>
                                </thead>
                                <tbody>
                                	@foreach($suppliers as $supplier)
                                	<tr>
                                		<td>{{++$i}}</td>
                                		<td>{{$supplier->suppliers_id}}</td>
                                		<td>{{$supplier->payment_date}}</td>
                                		<td>{{$supplier->payment_amount}}</td>
                                		
                                		<td><a href="{{url('/suppliers/view/'.$supplier->id)}}" target="_blank"></a> |<a href="{{url('/suppliersPayment/edit/'.$supplier->id)}}" target="_blank">Edit</a> |<a href="{{url('/suppliersPayment/delete/'.$supplier->id)}}" onclick="return confirm('Do you want to delete?')">Delete</td>
                                		
                                	</tr>
                                	@endforeach
                                </tbody>
                            </table>
                        </div>
@endsection