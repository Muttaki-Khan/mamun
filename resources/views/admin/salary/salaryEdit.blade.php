@extends('admin.master')

@section('title')
	Salary Edit
@endsection

@section('content-heading')
	Salary Edit

@endsection

@section('mainContent')
    <div class="panel-body">
                            <div class="row">
                                <div class="col-lg-6">
                                    
                                        {!! Form::open(['url'=>'/salary/edit','method'=>'post', 'enctype'=>'multipart/form-data' , 'name'=> 'salaryEditForm' ])!!}
                                       

                                        <div class="form-group">
                                            <label>Employee</label>
                                           <input class="form-control"
                                             value="{{$salary->employee_id}}"
                                           name="employee_id">
                                        
                                        </div>
                                      
                                        <div class="form-group datepicker">
                                            <label>Payment Date</label>
                                            <input type="text"  class="form-control datepicker"  value="{{$salary->payment_date}}" id="datepicker" name="payment_date">
                                        
                                        </div>

                                        <div class="form-group">
                                            <label>Amount</label>
                                           <input type="text" class="form-control"
                                             value="{{$salary->month}}"
                                           name="month">
                                        
                                        </div>

                                        <div class="form-group">
                                            <label>Amount</label>
                                           <input class="form-control"
                                             value="{{$salary->amount}}"
                                           name="amount">
                                        
                                        </div>

                                        
                                        <input type="hidden" name="salary_id" value="{{$salary->id}}">
                                        <div class="form-group">
                                            <input type="submit" class="btn btn-block btn-primary">
                                        </div>  
                                     {!! Form::close() !!}
                                </div>
                                <script type="text/javascript">
                                    	document.forms['salaryEditForm'].elements['categoryId'].value='{{$salary->categoryId}}'</script>
                            </div>
                            </div>

@endsection