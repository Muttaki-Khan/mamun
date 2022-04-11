@extends('admin.master')

@section('title')
	company suppliers Entry
@endsection

@section('content-heading')
	Add New companysuppliers
	<hr>
    <h4 style="color: green;">{{Session::get('message')}}</h4>

@endsection

@section('mainContent')
    <div class="panel-body">
                            <div class="row">
                                <div class="col-lg-6">
                                    
                                        {!! Form::open(['url'=>'/companysuppliers/entry','method'=>'post','enctype'=>'multipart/form-data'])!!}
                                        <div class="form-group">
                                            <label>Company suppliers Name</label>
                                            <input autocomplete='off' type="text" class="form-control" name="suppliers_name">
                                        
                                        </div>
                                       
                                        
                                        <div class="form-group">
                                            <input autocomplete='off' type="submit" class="btn btn-block btn-primary">
                                        </div>  
                                     {!! Form::close() !!}
                                </div>
                            </div>
                            </div>

@endsection