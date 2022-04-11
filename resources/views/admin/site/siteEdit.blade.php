@extends('admin.master')

@section('title')
	site Edit
@endsection

@section('content-heading')
	site Edit

@endsection

@section('mainContent')
    <div class="panel-body">
                            <div class="row">
                                <div class="col-lg-6">
                                    
                                        {!! Form::open(['url'=>'/site/edit','method'=>'post', 'enctype'=>'multipart/form-data' , 'name'=> 'siteEditForm' ])!!}
                                       

                                        <div class="form-group">
                                            <label>Project</label>
                                           <input class="form-control"
                                             value="{{$site->tender_id}}"
                                           name="tender_id">
                                        
                                        </div>
                                      
                  
                                        <div class="form-group">
                                            <label>Site Name</label>
                                           <input type="text" class="form-control"
                                             value="{{$site->site_name}}"
                                           name="site_name">
                                        
                                        </div>

                                        
                                        <input type="hidden" name="site_id" value="{{$site->id}}">
                                        <div class="form-group">
                                            <input type="submit" class="btn btn-block btn-primary">
                                        </div>  
                                     {!! Form::close() !!}
                                </div>
                                <script type="text/javascript">
                                    	document.forms['siteEditForm'].elements['categoryId'].value='{{$site->categoryId}}'</script>
                            </div>
                            </div>

@endsection