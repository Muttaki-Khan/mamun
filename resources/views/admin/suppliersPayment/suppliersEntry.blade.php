@extends('admin.master')

@section('title')
	payment supplier Entry
@endsection

@section('content-heading')
	Add New Suppliers Payment
	<hr>
    <h4 style="color: green;">{{Session::get('message')}}</h4>

@endsection

@section('mainContent')
    <div class="panel-body">
                            <div class="row">
                                <div class="col-lg-6">
                                    
                                        {!! Form::open(['url'=>'/suppliersPayment/entry','method'=>'post','enctype'=>'multipart/form-data'])!!}
                                       
                                        <div class="form-group">
                                            <label>suppliers</label>
                                            <select name="suppliers_id" class="form-control">
                                            @foreach($suppliers as $supplier)    
                                            <option value='{{$supplier->id}}'>{{$supplier->name}}</option>
                                            @endforeach
                                            </select>
                                        </div>
                                        <div class="form-group datepicker">
                                            <label>Payment Date</label>
                                            <input type="text"  class="form-control datepicker" id="datepicker" name="payment_date">
                                        
                                        </div>

                                        <div class="form-group">
                                            <label>Payment Amount</label>
                                            <input class="form-control" name="payment_amount">
                                        
                                        </div>
                                        
                                        <div class="form-group">
                                            <input type="submit" class="btn btn-block btn-primary">
                                        </div>  
                                     {!! Form::close() !!}
                                </div>
                            </div>
                            </div>

@endsection