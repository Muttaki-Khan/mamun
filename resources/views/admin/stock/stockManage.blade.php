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
    {!! Form::open(['url'=>'/stock/manage','method'=>'post','enctype'=>'multipart/form-data'])!!}

<input type="text" id="myInput" onkeyup="myFunction()" 
placeholder="Search for names.." title="Type in a name" style="">

{!! Form::close() !!}
                            <table width="100%" class="table table-striped table-bordered table-hover" id="dataTables-example">
                                <thead>
                                    <tr>
                                        <th>SI.</th>
                                        <th>Item</th>
                                        <th>Quantity</th>
                                        
                                        <!-- <th>Action</th> -->
                                    </tr>
                                </thead>
                                <tbody>
                                	@foreach($stocks as $stock)
                                	<tr>
                                		<td>{{++$i}}</td>
                                		<td>{{$stock->item_name}}</td>
                                		<td>{{$stock->quantity}}</td>
                                		
                                		<!-- <td><a href="{{url('/stock/view/'.$stock->id)}}" target="_blank"></a> <a href="{{url('/stock/edit/'.$stock->id)}}" class="btn btn-primary btn-lg active" role="button">Edit</a> <a href="{{url('/stock/delete/'.$stock->id)}}" class="btn btn-primary btn-lg active" role="button" onclick="return confirm('Do you want to delete?')">Delete</td> -->
                                		
                                	</tr>
                                	@endforeach
                                </tbody>
                            </table>
                            {{$stocks->links()}}
                        </div>
@endsection