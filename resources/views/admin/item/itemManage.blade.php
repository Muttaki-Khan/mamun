@extends('admin.master')

@section('title')
	Item Manage
@endsection

@section('content-heading')
	All Item List
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
                                        <th>Item Name</th>
                                       
                                        <th>Action</th>
                                    </tr>
                                </thead>
                                <tbody>
                                	@foreach($items as $item)
                                	<tr>
                                		<td>{{++$i}}</td>
                                		<td>{{$item->item_name}}</td>
                             
                                		<td><a href="{{url('/item/view/'.$item->id)}}" target="_blank"></a> |<a href="{{url('/item/edit/'.$item->id)}}" target="_blank">Edit</a> |<a href="{{url('/item/delete/'.$item->id)}}" onclick="return confirm('Do you want to delete?')">Delete</td>
                                		
                                	</tr>
                                	@endforeach
                                </tbody>
                            </table>
                        </div>
@endsection