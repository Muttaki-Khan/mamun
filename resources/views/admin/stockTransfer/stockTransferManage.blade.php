@extends('admin.master')

@section('title')
	stockTransfer  Manage
@endsection

@section('content-heading')
	All stockTransfer  List
    <hr>
    <h3 style="color: green;">{{Session::get('message')}}</h3>

@endsection

@section('mainContent')
	

	
	<?php 
	$i=0;
	 ?>
	<div class="panel-body">
    {!! Form::open(['url'=>'/stockTransfer/manage','method'=>'post','enctype'=>'multipart/form-data'])!!}

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
                                        <th>Project</th>
                                        <th>Site Name</th>
                                        <th>Transfer Date</th>
                                        <th>Item</th>
                                        <th>Quantity</th>

                                        <th>Action</th>
                                    </tr>
                                </thead>
                                <tbody>
                                	@foreach($stockTransfer as $stock)
                                	<tr>
                                		<td>{{++$i}}</td>
                                        <td>{{$stock->project_name}}</td>
                                		<td>{{$stock->site_name}}</td>
                                		<td>{{$stock->transfer_date}}</td>
                                        <td>{{$stock->item_name}}</td>
                                		<td>{{$stock->quantity}}</td>

                                		
                                        <td><a href="{{url('/stockTransfer/view/'.$stock->id)}}" target="_blank"></a> <a href="{{url('/stockTransfer/edit/'.$stock->id)}}" class="btn btn-primary btn-lg active" role="button">Edit</a> <a href="{{url('/stockTransfer/delete/'.$stock->id)}}" class="btn btn-primary btn-lg active" role="button" onclick="return confirm('Do you want to delete?')">Delete</td>

                                	</tr>
                                	@endforeach
                                </tbody>
                            </table>
                            {{$stockTransfer->links()}}

                        </div>
@endsection