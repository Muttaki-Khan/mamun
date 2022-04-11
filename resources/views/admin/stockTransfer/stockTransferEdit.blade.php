@extends('admin.master')

@section('title')
	stockTransfer Edit
@endsection

@section('content-heading')
	stockTransfer  Edit

@endsection

@section('mainContent')
    <div class="panel-body">
                            <div class="row">
                                <div class="col-lg-6">
                                    
                                        {!! Form::open(['url'=>'/stockTransfer/edit','method'=>'post', 'enctype'=>'multipart/form-data' , 'name'=> 'stockTransferEditForm' ])!!}
                                       
                                        <div class="form-group">
                                            <label>Site Name</label>
                                            <select name="site_id" class="form-control">
                                            @foreach($sites as $site)    
                                            <option value='{{$site->id}}'>{{$site->site_name}}</option>
                                            @endforeach
                                            </select>
                                        </div>

                                        
                                        <div class="form-group datepicker">
                                            <label>Transfer Date</label>
                                            <input type="text" value="{{$stockTransfer->transfer_date}}" class="form-control datepicker" id="datepicker" name="transfer_date">
                                        
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
                                            <input class="form-control" value="{{$stockTransfer->quantity}}" name="quantity">
                                        
                                        </div>
                                        
                                        <input type="hidden" name="stockTransfer_id" value="{{$stockTransfer->id}}">
                                        <div class="form-group">
                                            <input type="submit" class="btn btn-block btn-primary">
                                        </div>  
                                     {!! Form::close() !!}
                                </div>
                                <script type="text/javascript">
                                    	document.forms['stockTransferEditForm'].elements['categoryId'].value='{{$stockTransfer->categoryId}}'</script>
                            </div>
                            </div>

@endsection