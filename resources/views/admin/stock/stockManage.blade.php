@extends('admin.master')

@section('title')
	stock Manage
@endsection

@section('content-heading')
	All Stock List
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
                                        <th>Item</th>
                                        <th>Quantity</th>
                                        
                                        <th>Action</th>
                                    </tr>
                                </thead>
                                <tbody>
                                	@foreach($stocks as $stock)
                                	<tr>
                                		<td>{{++$i}}</td>
                                		<td>{{$stock->item_id}}</td>
                                		<td>{{$stock->quantity}}</td>
                                		
                                		<td><a href="{{url('/stock/view/'.$stock->id)}}" target="_blank"></a> |<a href="{{url('/stock/edit/'.$stock->id)}}" target="_blank">Edit</a> |<a href="{{url('/stock/delete/'.$stock->id)}}" onclick="return confirm('Do you want to delete?')">Delete</td>
                                		
                                	</tr>
                                	@endforeach
                                </tbody>
                            </table>
                        </div>
@endsection