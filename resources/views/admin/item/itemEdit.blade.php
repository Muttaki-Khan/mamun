@extends('admin.master')

@section('title')
	Item Edit
@endsection

@section('content-heading')
	Item Edit

@endsection

@section('mainContent')
    <div class="panel-body">
                            <div class="row">
                                <div class="col-lg-6">
                                    
                                        {!! Form::open(['url'=>'/item/edit','method'=>'post', 'enctype'=>'multipart/form-data' , 'name'=> 'itemEditForm' ])!!}
                                        <div class="form-group">
                                            <label>Item Name</label>
                                            <input type="text" class="form-control"
                                             value="{{$item->item_name}}"  name="name">
                                        
                                        </div>
                                        
                                        <input type="hidden" name="item_id" value="{{$item->id}}">
                                        <div class="form-group">
                                            <input type="submit" class="btn btn-block btn-primary">
                                        </div>  
                                     {!! Form::close() !!}
                                </div>
                            </div>
                            </div>

@endsection