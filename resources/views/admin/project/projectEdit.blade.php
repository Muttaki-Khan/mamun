@extends('admin.master')

@section('title')
	project Edit
@endsection

@section('content-heading')
	Project Edit

@endsection

@section('mainContent')
    <div class="panel-body">
                            <div class="row">
                                <div class="col-lg-6">
                                    
                                        {!! Form::open(['url'=>'/project/edit','method'=>'post', 'enctype'=>'multipart/form-data' , 'name'=> 'projectEditForm' ])!!}
                                        <div class="form-group">
                                            <label>Project Name</label>
                                            <input type="text" class="form-control"
                                             value="{{$project->project_name}}"  name="project_name">
                                        
                                        </div>

                                        <div class="form-group">
                                            <label>Tender ID</label>
                                           <input class="form-control"
                                             value="{{$project->tender_id}}"
                                           name="tender_id">
                                        
                                        </div>
                                      
                                       <div class="form-group">
                                            <label>Estimate Cost</label>
                                           <input class="form-control"
                                             value="{{$project->estimate_cost}}"
                                           name="estimate_cost">
                                        
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