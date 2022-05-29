@extends('admin.master')

@section('title')
	project Edit
@endsection

@section('content-heading')
	Project Expense Edit

@endsection

@section('mainContent')
    <div class="panel-body">
                            <div class="row">
                                <div class="col-lg-6">
                                    
                                        {!! Form::open(['url'=>'/projectExpense/edit','method'=>'post', 'enctype'=>'multipart/form-data' , 'name'=> 'projectEditForm' ])!!}
                                        <div class="form-group">
                                            <label>Project</label>
                                            <select name="tender_id" class="form-control">
                                            @foreach($tenders as $tender)    
                                            <option value='{{$tender->id}}'>{{$tender->project_name}}</option>
                                            @endforeach
                                            </select>
                                        </div>

                                        
                                        <div class="form-group datepicker">
                                            <label>Payment Date</label>
                                            <input type="text" value="{{$project->payment_date}}" class="form-control datepicker" id="datepicker" name="payment_date">
                                        
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
                                            <input class="form-control" id="n1"  onfocus="calcular()" value="{{$project->quantity}}" name="quantity">
                                        
                                        </div>

                                        <div class="form-group">
                                            <label>Price</label>
                                            <input class="form-control" id="n2"  onfocus="calcular()" value="{{$project->price}}" name="price">
                                        
                                        </div>

                                        <div class="form-group">
                                            <label>Total</label>
                                              <input class="form-control" id="result"  onfocus="calcular()" value="{{$project->total}}" name="total">
                                        
                                        </div>

                                        
                                        <input type="hidden" name="project_id" value="{{$project->id}}">
                                        <div class="form-group">
                                            <input type="submit" class="btn btn-block btn-primary">
                                        </div>  
                                     {!! Form::close() !!}
                                </div>
                                <script type="text/javascript">
                                    	document.forms['projectEditForm'].elements['categoryId'].value='{{$project->categoryId}}'</script>
                            </div>
                            </div>

@endsection