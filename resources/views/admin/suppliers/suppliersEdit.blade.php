@extends('admin.master')

@section('title')
	supplier Edit
@endsection

@section('content-heading')
	Suppliers Order Edit

@endsection

@section('mainContent')
    <div class="panel-body">
                            <div class="row">
                                <div class="col-lg-6">
                                    
                                        {!! Form::open(['url'=>'/suppliers/edit','method'=>'post', 'enctype'=>'multipart/form-data' , 'name'=> 'projectEditForm' ])!!}
                                       

                                        <div class="form-group">
                                            <label>Suppliers Name</label>
                                            <select name="suppliers_id" class="form-control">
                                            @foreach($companysuppliers as $supply)    
                                            <option value='{{$supply->id}}'>{{$supply->suppliers_name}}</option>
                                            @endforeach
                                            </select>
                                        </div>

                                        <div class="form-group">
                                            <label>Item</label>
                                            <select name="item_id" class="form-control">
                                            @foreach($items as $item)    
                                            <option value='{{$item->id}}'>{{$item->item_name}}</option>
                                            @endforeach
                                            </select>
                                        </div>

                                        <div class="form-group">
                                            <label>Quantity</label>
                                            <input autocomplete="off" id="n1"  onfocus="calcular()"  type="text" value="{{$suppliers->quantity}}" class="form-control" name="quantity">
                                        
                                        </div>

                                        <div class="form-group">
                                            <label>Order Amount</label>
                                            <input autocomplete="off" id="n2"  onfocus="calcular()"  class="form-control" value="{{$suppliers->order_amount}}" name="order_amount">
                                        
                                        </div>

                                        <div class="form-group">
                                            <label>Total Amount</label>
                                            <input autocomplete="off" id="result"  onfocus="calcular()"  class="form-control" value="{{$suppliers->total_amount}}" name="total_amount">
                                        
                                        </div>

                                        <div class="form-group datepicker">
                                            <label>Order Date</label>
                                            <input autocomplete="off" type="text" value="{{$suppliers->order_date}}" class="form-control datepicker" id="datepicker" name="order_date">
                                        
                                        </div>

                                        
                                        <input type="hidden" name="id" value="{{$suppliers->id}}">
                                        <!-- <input type="hidden" name="suppliers_id" value="{{$suppliers->suppliers_id}}"> -->

                                        <div class="form-group">
                                            <input type="submit" class="btn btn-block btn-primary">
                                        </div>  
                                     {!! Form::close() !!}
                                </div>

                            </div>
                            </div>

@endsection