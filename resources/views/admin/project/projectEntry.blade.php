@extends('admin.master')

@section('title')
	project Entry
@endsection

@section('content-heading')
	Add New Project
	<hr>
    <h4 style="color: green;">{{Session::get('message')}}</h4>

@endsection

@section('mainContent')
    <div class="panel-body">
                            <div class="row">
                                <div class="col-lg-6">
                                    
                                        {!! Form::open(['url'=>'/project/entry','method'=>'post','enctype'=>'multipart/form-data'])!!}
                                        <div class="form-group">
                                            <label>Project Name</label>
                                            <input autocomplete='off' type="text" class="form-control" name="project_name">
                                        
                                        </div>
                                        
                                       <div class="form-group">
                                            <label>Tender ID</label>
                                            <input class="form-control" name="tender_id">
                                        
                                        </div>

                                        <div class="form-group">
                                            <label>Estimated Cost</label>
                                            <input autocomplete='off' class="form-control" name="estimate_cost">
                                        
                                        </div>
                                        
                                        <div class="form-group">
                                            <input type="submit" class="btn btn-block btn-primary">
                                        </div>  
                                     {!! Form::close() !!}
                                </div>
                            </div>
                            </div>

@endsection