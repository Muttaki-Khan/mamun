@extends('admin.master')

@section('title')
	supplier Edit
@endsection

@section('content-heading')
	Suppliers Edit

@endsection

@section('mainContent')
    <div class="panel-body">
                            <div class="row">
                                <div class="col-lg-6">
                                    
                                        {!! Form::open(['url'=>'/suppliers/edit','method'=>'post', 'enctype'=>'multipart/form-data' , 'name'=> 'projectEditForm' ])!!}
                                       

                                        <div class="form-group">
                                            <label>Suppliers Name</label>
                                            <input type="text" value="{{$suppliers->name}}" class="form-control" name="name">
                                        
                                        </div>

                                        <div class="form-group">
                                            <label>Item</label>
                                            <select name="item_id" class="form-control">
                                            @foreach($items as $item)    
                                            <option value='{{$item->id}}'>{{$item->name}}</option>
                                            @endforeach
                                            </select>
                                        </div>

                                        <div class="form-group">
                                            <label>Quantity</label>
                                            <input type="text" value="{{$suppliers->quantity}}" class="form-control" name="quantity">
                                        
                                        </div>

                                        <div class="form-group">
                                            <label>Order Amount</label>
                                            <input class="form-control" value="{{$suppliers->order_amount}}" name="order_amount">
                                        
                                        </div>

                                        <div class="form-group datepicker">
                                            <label>Order Date</label>
                                            <input type="text" value="{{$suppliers->order_date}}" class="form-control datepicker" id="datepicker" name="order_date">
                                        
                                        </div>

                                        
                                        <input type="hidden" name="suppliers_id" value="{{$suppliers->id}}">
                                        <div class="form-group">
                                            <input type="submit" class="btn btn-block btn-primary">
                                        </div>  
                                     {!! Form::close() !!}
                                </div>

                            </div>
                            </div>

@endsection