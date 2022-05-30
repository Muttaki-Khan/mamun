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

                                           <label>Name</label>
                                            <select name="employee_id" class="form-control">
                                            @foreach($employees as $name)   
                                            @if($name->id == $salary->employee_id)  
                                            <option value='{{$name->id}}'>{{$name->name}}</option>
                                            @endif
                                            <option value='{{$name->id}}'>{{$name->name}}</option>

                                            @endforeach
                                            </select>

                                        
                                        </div>
                                      
                                        <div class="form-group datepicker">
                                            <label>Payment Date</label>
                                            <input type="text"  class="form-control datepicker"  value="{{$salary->payment_date}}" id="datepicker" name="payment_date">
                                        
                                        </div>

                                        <div class="form-group">
                                        <div class="form-group">
                                            <label>Month</label>
                                            <select  name="month" class="form-control">
                                            <option>January</option>
                                            <option>February</option>
                                            <option>March</option>
                                            <option>April</option>
                                            <option>May</option>
                                            <option>June</option>
                                            <option>July</option>
                                            <option>August</option>
                                            <option>September</option>
                                            <option>October</option>
                                            <option>November</option>
                                            <option>December</option>

                                            </select>                                        
                                        </div>
                                        
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