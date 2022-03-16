@extends('admin.master')

@section('title')
	employee Edit
@endsection

@section('content-heading')
	employee Deposit Edit

@endsection

@section('mainContent')
    <div class="panel-body">
                            <div class="row">
                                <div class="col-lg-6">
                                    
                                        {!! Form::open(['url'=>'/employee/edit','method'=>'post', 'enctype'=>'multipart/form-data' , 'name'=> 'employeeEditForm' ])!!}
                                       

                                        <div class="form-group">
                                            <label>Name</label>
                                           <input class="form-control"
                                             value="{{$employee->name}}"
                                           name="name">
                                        
                                        </div>
                                      
                                       <div class="form-group">
                                            <label>Joining Date</label>
                                           <input type="text"  class="form-control datepicker" id="datepicker" 
                                             value="{{$employee->joining_date}}"
                                           name="joining_date">
                                        
                                        </div>

                                       

                                        <div class="form-group">
                                            <label>Salary</label>
                                           <input class="form-control"
                                             value="{{$employee->salary}}"
                                           name="salary">
                                        
                                        </div>


                                        <div class="form-group">
                                            <label>Designation</label>
                                           <input class="form-control"
                                             value="{{$employee->designation}}"
                                           name="designation">
                                        
                                        </div>
                                        
                                        <input type="hidden" name="employee_id" value="{{$employee->id}}">
                                        <div class="form-group">
                                            <input type="submit" class="btn btn-block btn-primary">
                                        </div>  
                                     {!! Form::close() !!}
                                </div>
                                <script type="text/javascript">
                                    	document.forms['employeeEditForm'].elements['categoryId'].value='{{$employee->categoryId}}'</script>
                            </div>
                            </div>

@endsection