@extends('admin.master')

@section('title')
	suppliers Entry
@endsection

@section('content-heading')
Add Suppliers 
	<hr>
    <h4 style="color: green;">{{Session::get('message')}}</h4>

@endsection

@section('mainContent')
    <div class="panel-body">
                            <div class="row">
                                <div class="col-lg-6">
                                    
                                        {!! Form::open(['url'=>'/suppliers/entry','method'=>'post','enctype'=>'multipart/form-data'])!!}
                                       
                                        
                                        <div class="form-group">
                                            <label>Suppliers Name</label>
                                            <input type="text" class="form-control" name="name">
                                        
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
                                            <input  class="form-control" name="quantity">
                                        
                                        </div>

                                        <div class="form-group">
                                            <label>Order Amount</label>
                                            <input class="form-control" name="order_amount">
                                        
                                        </div>

                                        <div class="form-group datepicker">
                                            <label>Order Date</label>
                                            <input type="text"  class="form-control datepicker" id="datepicker" name="order_date">
                                        
                                        </div>
                                        
                                        <div class="form-group">
                                            <input type="submit" class="btn btn-block btn-primary">
                                        </div>  
                                     {!! Form::close() !!}
                                </div>
                            </div>
                            </div>

@endsection