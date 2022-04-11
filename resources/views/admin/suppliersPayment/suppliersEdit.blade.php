@extends('admin.master')

@section('title')
	suppliers Edit
@endsection

@section('content-heading')
	suppliers Payment Edit

@endsection

@section('mainContent')
    <div class="panel-body">
                            <div class="row">
                                <div class="col-lg-6">
                                    
                                        {!! Form::open(['url'=>'/suppliersPayment/edit','method'=>'post', 'enctype'=>'multipart/form-data' , 'name'=> 'suppliersEditForm' ])!!}
                                       

                                        <div class="form-group">
                                            <label>suppliers</label>
                                            <select name="suppliers_id" class="form-control">
                                            @foreach($companysuppliers as $supplier)  
                                            <option value='{{$supplier->id}}'>{{$supplier->suppliers_name}}</option>
                                            @endforeach
                                            </select>
                                        </div>

                                        <div class="form-group datepicker">
                                            <label>Payment Date</label>
                                            <input autocomplete="off" type="text" value='{{$suppliers->payment_date}}' class="form-control datepicker" id="datepicker" name="payment_date">
                                        
                                        </div>

                                        <div class="form-group">
                                            <label>Payment Amount</label>
                                            <input autocomplete="off" class="form-control" value='{{$suppliers->payment_amount}}' name="payment_amount">
                                        
                                        </div>

                                        
                                        <input type="hidden" name="id" value="{{$suppliers->id}}">
                                        <input type="hidden" name="suppliers_id" value="{{$suppliers->suppliers_id}}">                                        <div class="form-group">
                                            <input type="submit" class="btn btn-block btn-primary">
                                        </div>  
                                     {!! Form::close() !!}
                                </div>
                                <script type="text/javascript">
                                    	document.forms['suppliersEditForm'].elements['categoryId'].value='{{$suppliers->categoryId}}'</script>
                            </div>
                            </div>

@endsection