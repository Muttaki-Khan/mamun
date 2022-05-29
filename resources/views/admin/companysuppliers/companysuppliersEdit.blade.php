@extends('admin.master')

@section('title')
	companysuppliers Edit
@endsection

@section('content-heading')
	companysuppliers Edit

@endsection

@section('mainContent')
    <div class="panel-body">
                            <div class="row">
                                <div class="col-lg-6">
                                    
                                        {!! Form::open(['url'=>'/companysuppliers/edit','method'=>'post', 'enctype'=>'multipart/form-data' , 'name'=> 'companysuppliersEditForm' ])!!}
                                        <div class="form-group">
                                            <label>companysuppliers Name</label>
                                            <input type="text" class="form-control"
                                             value="{{$companysuppliers->suppliers_name}}"  name="name">
                                        
                                        </div>
                                        
                                        <input type="hidden" name="companysuppliers_id" value="{{$companysuppliers->id}}">
                                        <div class="form-group">
                                            <input type="submit" class="btn btn-block btn-primary">
                                        </div>  
                                     {!! Form::close() !!}
                                </div>
                            </div>
                            </div>

@endsection