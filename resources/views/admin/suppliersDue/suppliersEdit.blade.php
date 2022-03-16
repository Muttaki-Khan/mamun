@extends('admin.master')

@section('title')
	supplier Edit
@endsection

@section('content-heading')
	supplier Due Edit

@endsection

@section('mainContent')
    <div class="panel-body">
                            <div class="row">
                                <div class="col-lg-6">
                                    
                                        {!! Form::open(['url'=>'/suppliersDue/edit','method'=>'post', 'enctype'=>'multipart/form-data' , 'name'=> 'supplierEditForm' ])!!}
                                       

                                        <div class="form-group">
                                            <label>suppliers</label>
                                            <select name="suppliers_id" class="form-control">
                                            @foreach($suppliersId as $supplier)    
                                            <option value='{{$supplier->id}}'>{{$supplier->name}}</option>
                                            @endforeach
                                            </select>
                                        </div>
                                        


                                        <div class="form-group">
                                            <label>Due Amount</label>
                                            <input class="form-control" value='{{$suppliers->due_amount}}' name="due_amount">
                                        
                                        </div>

                                        
                                        <input type="hidden" name="supplier_id" value="{{$supplier->id}}">
                                        <div class="form-group">
                                            <input type="submit" class="btn btn-block btn-primary">
                                        </div>  
                                     {!! Form::close() !!}
                                </div>
                                <script type="text/javascript">
                                    	document.forms['supplierEditForm'].elements['categoryId'].value='{{$supplier->categoryId}}'</script>
                            </div>
                            </div>

@endsection