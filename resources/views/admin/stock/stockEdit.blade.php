@extends('admin.master')

@section('title')
	project Edit
@endsection

@section('content-heading')
	Project Deposit Edit

@endsection

@section('mainContent')
    <div class="panel-body">
                            <div class="row">
                                <div class="col-lg-6">
                                    
                                        {!! Form::open(['url'=>'/stock/edit','method'=>'post', 'enctype'=>'multipart/form-data' , 'name'=> 'projectEditForm' ])!!}
                                       

                                        <div class="form-group">
                                            <label>Item Name</label>
                                           <input class="form-control"
                                             value="{{$stock->item_id}}"
                                           name="item_id">
                                        
                                        </div>
                                      
                                       <div class="form-group">
                                            <label>Quantity</label>
                                           <input class="form-control"
                                             value="{{$stock->quantity}}"
                                           name="quantity">
                                        
                                        </div>
                                        
                                        <input type="hidden" name="stock_id" value="{{$stock->id}}">
                                        <div class="form-group">
                                            <input type="submit" class="btn btn-block btn-primary">
                                        </div>  
                                     {!! Form::close() !!}
                                </div>

                            </div>
                            </div>

@endsection