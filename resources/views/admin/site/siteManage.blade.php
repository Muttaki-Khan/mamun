@extends('admin.master')

@section('title')
	site Manage
@endsection

@section('content-heading')
	All site List
    <hr>
    <h3 style="color: green;">{{Session::get('message')}}</h3>

@endsection

@section('mainContent')
	

	
	<?php 
	$i=0;
	 ?>
	<div class="panel-body">
    {!! Form::open(['url'=>'/site/manage','method'=>'post','enctype'=>'multipart/form-data'])!!}


    <input type="text" id="myInput" onkeyup="myFunction()" 
    placeholder="Search for names.." title="Type in a name" style="">
    {!! Form::close() !!}
                            <table width="100%" class="table table-striped table-bordered table-hover" id="dataTables-example">
                                <thead>
                                    <tr>
                                        <th>SI.</th>
                                        <th>Project</th>
                                        <th>Site Name</th>
                                        
                                        
                                        <th>Action</th>
                                    </tr>
                                </thead>
                                <tbody>
                                	@foreach($sites as $site)
                                	<tr>
                                		<td>{{++$i}}</td>
                                		<td>{{$site->project_name}}</td>
                                		<td>{{$site->site_name}}</td>
                                	

                                		
                                		<td><a href="{{url('/site/view/'.$site->id)}}" target="_blank"></a> <a href="{{url('/site/edit/'.$site->id)}}" class="btn btn-primary btn-lg active" role="button">Edit</a> <a href="{{url('/site/delete/'.$site->id)}}" class="" role="button" onclick="return confirm('Do you want to delete?')"></td>
                                		
                                	</tr>
                                	@endforeach
                                </tbody>
                            </table>
                            {{$sites->links()}}
                        </div>
@endsection