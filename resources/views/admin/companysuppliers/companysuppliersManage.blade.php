@extends('admin.master')

@section('title')
	company suppliers Manage
@endsection

@section('content-heading')
	All company suppliers List
    <hr>
    <h3 style="color: green;">{{Session::get('message')}}</h3>

@endsection

@section('mainContent')
	

	
	<?php 
	$i=0;
	 ?>
	<div class="panel-body">
        {!! Form::open(['url'=>'/companysuppliers/manage','method'=>'post','enctype'=>'multipart/form-data'])!!}

                <input type="text" id="myInput" onkeyup="myFunction()" 
                placeholder="Search for names.." title="Type in a name" style="">
        {!! Form::close() !!}
		
                            <table width="100%" class="table table-striped table-bordered table-hover" id="dataTables-example">
                                <thead>
                                    <tr>
                                        <th>SI.</th>
                                        <th>company suppliers Name</th>
                                       
                                        <th>Action</th>
                                    </tr>
                                </thead>
                                <tbody>
                                	@foreach($companysuppliers as $companysuppliers)
                                	<tr>
                                		<td>{{++$i}}</td>
                                		<td>{{$companysuppliers->suppliers_name}}</td>
                             
                                		<td><a href="{{url('/companysuppliers/view/'.$companysuppliers->id)}}" target="_blank"></a> <a href="{{url('/companysuppliers/edit/'.$companysuppliers->id)}}" class="btn btn-primary btn-lg active" role="button">Edit</a> 
                                        <a href="{{url('/companysuppliers/delete/'.$companysuppliers->id)}}" class="" role="button" onclick="return confirm('Do you want to delete?')"></td>
                                		
                                	</tr>
                                	@endforeach
                                </tbody>
                            </table>
                        </div>
@endsection

