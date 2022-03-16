@extends('admin.master')

@section('title')
	office Edit
@endsection

@section('content-heading')
	office Expense Edit

@endsection

@section('mainContent')
    <div class="panel-body">
                            <div class="row">
                                <div class="col-lg-6">
                                    
                                        {!! Form::open(['url'=>'/officeExpense/edit','method'=>'post', 'enctype'=>'multipart/form-data' , 'name'=> 'officeEditForm' ])!!}
                                       

                                        <div class="form-group datepicker">
                                            <label>Expense Date</label>
                                            <input type="text" value="{{$office->expense_date}}" class="form-control datepicker" id="datepicker" name="expense_date">
                                        
                                        </div>

                                        <div class="form-group">
                                            <label>Expense Reason</label>
                                           <input type="text" class="form-control"
                                             value="{{$office->expense_reason}}"
                                           name="expense_reason">
                                        
                                        </div>
                                      
                                       <div class="form-group">
                                            <label>Debit By</label>
                                           <input type="text" class="form-control"
                                             value="{{$office->debit_by}}"
                                           name="debit_by">
                                        
                                        </div>

                                        <div class="form-group">
                                            <label>Amount</label>
                                           <input class="form-control"
                                             value="{{$office->amount}}"
                                           name="amount">
                                        
                                        </div>

                                        
                                        <input type="hidden" name="office_id" value="{{$office->id}}">
                                        <div class="form-group">
                                            <input type="submit" class="btn btn-block btn-primary">
                                        </div>  
                                     {!! Form::close() !!}
                                </div>
                                <script type="text/javascript">
                                    	document.forms['officeEditForm'].elements['categoryId'].value='{{$office->categoryId}}'</script>
                            </div>
                            </div>

@endsection