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
                                            <option value='{{$tender->id}}'>{{$tender->project_name}}</option>
                                            @endforeach
                                            </select>
                                        </div>

                                        
                                        <div class="form-group">
                                            <label>Payment Date</label>
                                            <input class="form-control" name="payment_date">
                                        
                                        </div>

                                        <div class="form-group">
                                            <label>Item</label>
                                            <select name="item_id" class="form-control">
                                           
                                        </select>
                                        </div>


                                        <div class="form-group">
                                            <label>Quantity</label>
                                            <input class="form-control" name="quantity">
                                        
                                        </div>

                                        <div class="form-group">
                                            <label>Price</label>
                                            <input class="form-control" name="price">
                                        
                                        </div>

                                        <div class="form-group">
                                            <label>Total</label>
                                            <input class="form-control" name="total">
                                        
                                        </div>
                                        
                                        <div class="form-group">
                                            <input type="submit" class="btn btn-block btn-primary">
                                        </div>  
                                     {!! Form::close() !!}
                                </div>
                            </div>
                            </div>

@endsection