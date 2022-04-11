@extends('admin.master')

@section('title')
	site Entry
@endsection

@section('content-heading')
	Add New site
	<hr>
    <h4 style="color: green;">{{Session::get('message')}}</h4>

@endsection

@section('mainContent')
    <div class="panel-body">
                            <div class="row">
                                <div class="col-lg-6">
                                    
                                        {!! Form::open(['url'=>'/site/entry','method'=>'post','enctype'=>'multipart/form-data'])!!}
                                       
                                        <div class="form-group">
                                            <label>Project Name</label>
                                            <select name="tender_id" class="form-control">
                                            @foreach($projects as $name)    
                                            <option value='{{$name->tender_id}}'>{{$name->project_name}}</option>
                                            @endforeach
                                            </select>
                                        </div>
                                       

                                        <div class="form-group">
                                            <label>Site Name</label>
                                            <input type="text" class="form-control" name="site_name">
                                        
                                        </div>

                                       
                                        
                                        <div class="form-group">
                                            <input type="submit" class="btn btn-block btn-primary">
                                        </div>  
                                     {!! Form::close() !!}
                                </div>
                            </div>
                            </div>

@endsection