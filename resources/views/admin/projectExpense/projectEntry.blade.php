@extends('admin.master')

@section('title')
	project Entry
@endsection

@section('content-heading')
	Add New Project Expenses
	<hr>
    <h4 style="color: green;">{{Session::get('message')}}</h4>

@endsection

@section('mainContent')
    <div class="panel-body">
                            <div class="row">
                                <div class="col-lg-6">
                                    
                                        {!! Form::open(['url'=>'/projectExpense/entry','method'=>'post','enctype'=>'multipart/form-data'])!!}
                                       
                                       
                                        <div class="form-group">
                                            <label>Project</label>
                                            <select name="tender_id" class="form-control">
                                            @foreach($tenders as $tender)    
                                            <option value='{{$tender->tender_id}}'>{{$tender->project_name}}</option>
                                            @endforeach
                                            </select>
                                        </div>

                                        
                                        <div class="form-group datepicker">
                                            <label>Payment Date</label>
                                            <input type="text" autocomplete='off' class="form-control datepicker" id="datepicker" name="payment_date">
                                        
                                        </div>

                                        <div class="form-group">
                                            <label>Item</label>
                                            <select name="item_id" class="form-control">
                                            @foreach($items as $item)    
                                            <option value='{{$item->id}}'>{{$item->item_name}}</option>
                                            @endforeach
                                            </select>
                                           
                                        </select>
                                        </div>


                                        <div class="form-group">
                                            <label>Quantity</label>
                                            <input autocomplete='off' class="form-control" name="quantity">
                                        
                                        </div>

                                        <div class="form-group">
                                            <label>Price</label>
                                            <input autocomplete='off' class="form-control" name="price">
                                        
                                        </div>

                                        <div class="form-group">
                                            <label>Total</label>
                                            <input autocomplete='off' class="form-control" name="total">
                                        
                                        </div>
                                        
                                        <div class="form-group">
                                            <input type="submit" class="btn btn-block btn-primary">
                                        </div>  
                                     {!! Form::close() !!}
                                </div>
                            </div>
                            </div>

@endsection


