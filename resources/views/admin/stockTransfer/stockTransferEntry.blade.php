@extends('admin.master')

@section('title')
	stockTransfer Entry
@endsection

@section('content-heading')
	Add New Transfer
	<hr>
    <h4 style="color: green;">{{Session::get('message')}}</h4>

@endsection

@section('mainContent')
    <div class="panel-body">
                            <div class="row">
                                <div class="col-lg-6">
                                    
                                        {!! Form::open(['url'=>'/stockTransfer/entry','method'=>'post','enctype'=>'multipart/form-data'])!!}
                                       
                                        <div class="form-group">
                                            <label>Project Name</label>
                                            <select name="tender_id" id="tender" class="form-control" required>
                                            <option value='-1'> Select Project </option>
                                            @foreach($tenders as $project)    
                                            <option value='{{$project->tender_id}}'>{{$project->project_name}}</option>
                                            @endforeach
                                            </select>
                                        </div>

                                        <div class="form-group">
                                            <label>Site Name</label>
                                            <select name="site_id" id="site" class="form-control" required>
                                            @foreach($sites as $site)    
                                            <option value='{{$site->id}}'>{{$site->site_name}}</option>
                                            @endforeach
                                            </select>
                                        </div>
                                        
                                        <div class="form-group datepicker">
                                            <label>Transfer Date</label>
                                            <input type="text" autocomplete='off' class="form-control datepicker" id="datepicker" name="transfer_date" required>
                                        
                                        </div>

                                        <div class="form-group">
                                            <label>Item</label>
                                            <select name="item_id" class="form-control" required>
                                            @foreach($items as $item)    
                                            <option value='{{$item->id}}'>{{$item->item_name}}</option>
                                            @endforeach
                                            </select>
                                           
                                        </select>
                                        </div>


                                        <div class="form-group">
                                            <label>Quantity</label>
                                            <input autocomplete='off' class="form-control" name="quantity" required>
                                        
                                        </div>

                                        
                                        <div class="form-group">
                                            <input type="submit" class="btn btn-block btn-primary">
                                        </div>  
                                     {!! Form::close() !!}
                                </div>
                            </div>
                            </div>

@endsection
<script src="https://code.jquery.com/jquery-3.5.1.min.js"></script>
<script>
     var sites = {!! json_encode($sites->toArray()) !!};
     var tenders = {!! json_encode($tenders->toArray()) !!};
    // console.log(tenders);
    // console.log(tenders[0].project_name);
    $(document).ready(function() {
        $("#tender").change(function() {
            var val = $(this).val();
            var options = "";
            for (i = 0; i < tenders.length; i++) {
                //console.log(val+" "+tenders[i].tender_id);
                if(val==tenders[i].tender_id) {
                    //<option value='{{$site->id}}'>{{$site->site_name}}</option>
                    console.log(val+" "+tenders[i].tender_id);
                    for(j=0;j<sites.length;j++) {
                        if(tenders[i].tender_id==sites[j].tender_id) {
                            options = options+"<option value='"+sites[j].id+"'>"+sites[j].site_name+"</option>";
                        }
                    }
                    
                }
            }
            //console.log(options);
            $("#site").html(options);
        });
    });
</script>