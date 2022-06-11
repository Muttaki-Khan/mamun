@extends('admin.master')

@section('title')
	suppliers Manage
@endsection

@section('content-heading')
	All suppliers Order List
    <hr>
    <h3 style="color: green;">{{Session::get('message')}}</h3>

@endsection

@section('mainContent')
	

	
	<?php 
	$i=0;
	 ?>
	<div class="panel-body">
    {!! Form::open(['url'=>'/suppliers/manage','method'=>'post','enctype'=>'multipart/form-data'])!!}

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
                                        <th>Suppliers Name</th>
                                        <th>Item</th>
                                        <th>Quantity</th>
                                        <th>Order Amount</th>
                                        <th>Total Amount</th>
                                        <th>Order Date</th>
                                        
                                        <th>Action</th>
                                    </tr>
                                </thead>
                                <tbody>
                                @foreach($suppliers as $supplier)
                                	<tr>
                                		<td>{{++$i}}</td>
                                		<td>{{$supplier->suppliers_name}}</td>
                                		<td>{{$supplier->item_name}}</td>
                                		<td>{{$supplier->quantity}}</td>
                                        <td>{{round($supplier->order_amount, 2)}}</td>
                                        <td>{{round($supplier->total_amount, 2)}}</td>
                                        <td>{{ \Carbon\Carbon::parse($supplier->order_date)->format('d/m/Y')}}</td>
                                		<td><a href="{{url('/suppliers/view/'.$supplier->id)}}" target="_blank"></a> <a href="{{url('/suppliers/edit/'.$supplier->id)}}" class="btn btn-primary btn-lg active" role="button">Edit</a> <a href="{{url('/suppliers/delete/'.$supplier->id)}}" class="" role="button" onclick="return confirm('Do you want to delete?')"></td>
                                	</tr>
                                	@endforeach
                                </tbody>
                            </table>
                            {{$suppliers->links()}}

                        </div>
@endsection