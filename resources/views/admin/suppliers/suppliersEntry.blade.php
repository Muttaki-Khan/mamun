@extends('admin.master')

@section('title')
	suppliers order Entry
@endsection

@section('content-heading')
Add Suppliers  Order
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

                                        <div class="form-group datepicker">
                                            <label>Order Date</label>
                                            <input autocomplete='off' type="text"  class="form-control datepicker" id="datepicker" name="order_date">
                                        
                                        </div>
            

                                        <div class="form-group">
                                            <label>Quantity</label>
                                            <input autocomplete="off" id="n1"  onfocus="calcular()"  class="form-control" name="quantity">
                                        
                                        </div>

                                        <div class="form-group">
                                            <label>Order Amount</label>
                                            <input autocomplete="off" id="n2"  onfocus="calcular()" class="form-control" name="order_amount">
                                        
                                        </div>

                                        <div class="form-group">
                                            <label>Total Amount</label>
                                            <input autocomplete="off" id="result" onfocus="calcular()" class="form-control" name="total_amount">
                                        
                                        </div>

                                                                                            
                                        
                                        <div class="form-group">
                                            <input type="submit" class="btn btn-block btn-primary">
                                        </div>  
                                     {!! Form::close() !!}
                                </div>
                            </div>
                            </div>

@endsection