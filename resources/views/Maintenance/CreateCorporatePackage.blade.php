@extends('AdminLayout.admin')

@section ('breadrootName')
<i class="fa fa-cogs" aria-hidden="true"></i><span> Maintenance</span>
@endsection

@section ('breadParentName')
<i class="fa fa-users" aria-hidden="true"></i><span> Corporate Account</span>
@endsection
@section('breadactivePage','Corporate Packages')
@section('maintenanceactive')
<a href="" class="active">
@endsection
@section('corpactive','active')
@section('content')
<div class="modal fade" id = "updateModal">
  <div class="modal-dialog modal-lg">
    <div class="modal-content">
      <div class="modal-header btn-warning">
        <h4 class="modal-title"><i class="fa fa-exclamation-triangle" aria-hidden="true"></i> Update</h4>
      </div>
      <form action="/" method="POST" class="form-horizontal" id="corppackedit">
      
	    	<div class="modal-body">
	    	{{ csrf_field() }}
	    	<input type="hidden" name="corp_id" value="{{ $corp_id }}">
					<div class="form-group">
						<div class="col-md-10 col-md-offset-1">
							<div class="input-group">
								<div class="input-group-addon">
									Package Name <sup>*</sup>
								</div>
								<input  name="uppackname"  id="uppackname" type="text" placeholder="Package Name" class="form-control input-md" required>
							</div>
						</div>  
					</div>
					<div class="form-group">
						<div class="col-md-10 col-md-offset-1">
							<div class="input-group">
								<div class="input-group-addon">
									Package Price <sup>*</sup>
								</div>
								<input  name="uppackprice" id="uppackprice"  type="text" placeholder="Package Price" class="form-control input-md" required>
							</div>
						</div>  
					</div>
					<div class="form-group">
	          <div class="col-md-10 col-md-offset-1">
	          	<div class="input-group">
	          		<div class="input-group-addon">
	          			Services <sup>*</sup>
	          		</div>
	          		<select class="form-control select2 uppackservice" name="upservices[]" values="" style="width: 100%" multiple="multiple" required>
			            @php $serviceoffer2 = $serviceoffer @endphp
			              @foreach($servicegroup as $s)
			              <optgroup label="{{ $s->servgroup_name }}">
			                  @foreach($serviceoffer as $serviceoffer2)
			                    @if($s->servgroup_id == $serviceoffer2->service_group_id)
			                    <option value="{{ $serviceoffer2->service_id }}">{{ $serviceoffer2->service_name }}</option>
			                    @endif
			                  @endforeach              
			                </optgroup>
			              @endforeach
			              <optgroup label="Others">
			              @foreach($serviceoffer as $nogrp)
			                @if($nogrp->servgroup_id == null)
			                  <option value="{{ $nogrp->service_id }}">{{ $nogrp->service_name }}</option>
			                  @endif
			              @endforeach
			              </optgroup>
			            </select> 
		          	</div>	            
		          </div>
		        </div>
		        <div class="col-md-6 col-md-offset-1">
		        		<div class="col-md-3"><h4>Physical Examination</h4></div>
        				<div class="col-md-3">
        					<div class="form-group">
              				<div class="radio">
              					<label class="" for="yes">
              						<input type="radio" id="yes" name="exam" value="1"> Yes
              					</label>
            				</div>
        					</div>
            		</div>
            		<div class="col-md-3">
        					<div class="form-group">
              				<div class="radio">
              					<label class="" for="no">
              						<input type="radio" id="no" name="exam" value="2"> No
              					</label>
            				</div>
        					</div>
            		</div>
            		
        			</div>
		        <fieldset>
		        	<legend>Conditions</legend>
		        	
		        	<div class="col-md-6 col-md-offset-1">
		        		<div class="col-md-3"><h4>Age:</h4></div>
        				<div class="col-md-3">
        					<div class="form-group">
              				<div class="radio">
              					<label class="" for="Male">
              						<input type="radio" id="upMale" name="gender" value="1"> Male
              					</label>
            				</div>
        					</div>
            		</div>
            		<div class="col-md-3">
        					<div class="form-group">
              				<div class="radio">
              					<label class="" for="Female">
              						<input type="radio" id="upFemale" name="gender" value="2"> Female
              					</label>
            				</div>
        					</div>
            		</div>
            		<div class="col-md-3">
        					<div class="form-group">
              				<div class="radio">
              					<label class="" for="Both">
              						<input type="radio" id="upBoth" name="gender" value="3"> Both
              					</label>
            				</div>
        					</div>
            		</div>
        			</div>
        			<div class="col-md-12"></div>
        			
        			<div class="col-md-12">
		        		<div class="col-md-2 col-md-offset-1"><h4>Gender:</h4></div>	
        				<div class="col-md-1">
        					<div class="form-group">
              				<div class="radio">
              					<label class="" for="Teen">
              						<input type="radio" id="upTeen" name="age" value="Teen"> Teen
              					</label>
            				</div>
        					</div>
            		</div>
            		<div class="col-md-1">
        					<div class="form-group">
              				<div class="radio">
              					<label class="" for="Adult">
              						<input type="radio" id="upAdult" name="age" value="Adult"> Adult
              					</label>
            				</div>
        					</div>
            		</div>
            		<div class="col-md-1">
        					<div class="form-group">
              				<div class="radio">
              					<label class="" for="Senior">
              						<input type="radio" id="upSenior" name="age" value="Senior"> Senior
              					</label>
            				</div>
        					</div>
            		</div>
            			<div class="col-md-1">
        					<div class="form-group">
              				<div class="radio">
              					<label class="" for="All Ages">
              						<input type="radio" id="upAllAges" name="age" value="All"> All Ages
              					</label>
            				</div>
        					</div>
            		</div>
        			</div>
		        </fieldset>
		    		<div class="modal-footer">
	    			<button type="button" class="btn btn-xs pull-left" data-dismiss="modal">Close</button>
	          <button  class="btn btn-xs btn-success" type="submit" ><i class="fa fa-floppy-o" aria-hidden="true"></i>&nbsp;Save</button>
	    		</div>
	    	</div>
    	</form>
    </div>  
  </div>
</div>


<div class="modal fade" id = "addModal">
  <div class="modal-dialog modal-lg" >
    <div class="modal-content">
	    <div class="modal-header btn-primary">
	        <h4 class="modal-title"><i class="fa fa-user-plus" aria-hidden="true"></i> Add Package</h4>
	    </div>
	    <form action="/save_corpPackage" method="POST" class="form-horizontal" id="corppackadd">
	    	<div class="modal-body">
	    	{{ csrf_field() }}
	    	<input type="hidden" name="corp_id" value="{{ $corp_id }}">
					<div class="form-group">
						<div class="col-md-10 col-md-offset-1">
							<div class="input-group">
								<div class="input-group-addon">
									Package Name <sup>*</sup>
								</div>
								<input  name="packname"  type="text" placeholder="Package Name" class="form-control input-md" required>
							</div>
						</div>  
					</div>
					<div class="form-group">
						<div class="col-md-10 col-md-offset-1">
							<div class="input-group">
								<div class="input-group-addon">
									Package Price <sup>*</sup>
								</div>
								<input  name="packprice"  type="text" placeholder="Package Price" class="form-control input-md" required>
							</div>
						</div>  
					</div>
					<div class="form-group">
	          <div class="col-md-10 col-md-offset-1">
	          	<div class="input-group">
	          		<div class="input-group-addon">
	          			Services <sup>*</sup>
	          		</div>
	          		<select class="form-control select2 packservice" name="services[]" values="" style="width: 100%" multiple="multiple" required>
			            @php $serviceoffer2 = $serviceoffer @endphp
			              @foreach($servicegroup as $s)
			              <optgroup label="{{ $s->servgroup_name }}">
			                  @foreach($serviceoffer as $serviceoffer2)
			                    @if($s->servgroup_id == $serviceoffer2->service_group_id)
			                    <option value="{{ $serviceoffer2->service_id }}">{{ $serviceoffer2->service_name }}</option>
			                    @endif
			                  @endforeach              
			                </optgroup>
			              @endforeach
			              <optgroup label="Others">
			              @foreach($serviceoffer as $nogrp)
			                @if($nogrp->servgroup_id == null)
			                  <option value="{{ $nogrp->service_id }}">{{ $nogrp->service_name }}</option>
			                  @endif
			              @endforeach
			              </optgroup>
			            </select> 
		          	</div>	            
		          </div>
		        </div>
		        <div class="form-group">
		         <div class="col-md-8 col-md-offset-1">
		        		<div class="col-md-5"><strong><h5>Physical Examination:</h5></strong></div>
        				<div class="col-md-3">
        					<div class="form-group">
              				<div class="radio">
              					<label class="" for="yes">
              						<input type="radio" id="yes" name="exam" value="1"> Yes
              					</label>
            				</div>
        					</div>
            		</div>
            		<div class="col-md-3">
        					<div class="form-group">
              				<div class="radio">
              					<label class="" for="no">
              						<input type="radio" id="no" name="exam" value="2"> No
              					</label>
            				</div>
        					</div>
            		</div>
        			</div>
        		</div>
		        <fieldset>
		        	<legend>Conditions</legend>
		        	
		        	<div class="col-md-6 col-md-offset-1">
		        		<div class="col-md-3"><strong><h5>Age:</h5></strong></div>
        				<div class="col-md-3">
        					<div class="form-group">
              				<div class="radio">
              					<label class="" for="Male">
              						<input type="radio" id="Male" name="gender" value="1"> Male
              					</label>
            				</div>
        					</div>
            		</div>
            		<div class="col-md-3">
        					<div class="form-group">
              				<div class="radio">
              					<label class="" for="Female">
              						<input type="radio" id="Female" name="gender" value="2"> Female
              					</label>
            				</div>
        					</div>
            		</div>
            		<div class="col-md-3">
        					<div class="form-group">
              				<div class="radio">
              					<label class="" for="Both">
              						<input type="radio" id="Both" name="gender" value="3"> Both
              					</label>
            				</div>
        					</div>
            		</div>
        			</div>
        			<div class="col-md-12"></div>
        			
        			<div class="col-md-12">
		        		<div class="col-md-2 col-md-offset-1"><strong><h5>Gender:</h5></strong></div>	
        				<div class="col-md-1">
        					<div class="form-group">
              				<div class="radio">
              					<label class="" for="Teen">
              						<input type="radio" id="Teen" name="age" value="Teen"> Teen
              					</label>
            				</div>
        					</div>
            		</div>
            		<div class="col-md-1">
        					<div class="form-group">
              				<div class="radio">
              					<label class="" for="Adult">
              						<input type="radio" id="Adult" name="age" value="Adult"> Adult
              					</label>
            				</div>
        					</div>
            		</div>
            		<div class="col-md-1">
        					<div class="form-group">
              				<div class="radio">
              					<label class="" for="Senior">
              						<input type="radio" id="Senior" name="age" value="Senior"> Senior
              					</label>
            				</div>
        					</div>
            		</div>
            			<div class="col-md-1">
        					<div class="form-group">
              				<div class="radio">
              					<label class="" for="All Ages">
              						<input type="radio" id="All Ages" name="age" value="All"> All Ages
              					</label>
            				</div>
        					</div>
            		</div>
        			</div>
		        </fieldset>
		    		<div class="modal-footer">
	    			<button type="button" class="btn btn-xs pull-left" data-dismiss="modal">Close</button>
	          <button  class="btn btn-xs btn-success" type="submit" ><i class="fa fa-floppy-o" aria-hidden="true"></i>&nbsp;Save</button>
	    		</div>
	    	</div>
	    </form>
    </div>  
  </div>
</div>

<div class="modal fade" id = "deleteModal">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header btn-danger">
        
        <h4 class="modal-title"><i class="fa fa-exclamation-triangle" aria-hidden="true"></i> Delete Record</h4>
      </div>
      <form method="post" action="/deleteCorporatePackage" id="delform">
      {{ csrf_field() }}
        <div class="modal-body">
          <h4></h4>
          <input type="text" class="hidden" name="id" id="cid" value="">
          Are you sure you want to delete this record?
        </div>
        <div class="modal-footer">
          <button type="button" class="btn btn-xs pull-left" data-dismiss="modal">Close</button>
          <button  class="btn btn-xs btn-danger"><i class="fa fa-trash" aria-hidden="true"></i>&nbsp;Delete</button>
        </div>
      </form>
    </div>  
  </div>
</div>
<div class="row">
	<div class="col-lg-12">
		<section class="panel">
			<header class="panel-heading">
				{{ $corp_name }} Packages
			</header>
			<div class="panel-body">
				<div class="clearfix">
				<div class="btn-group pull-right">
					
					<a class="btn btn-info" style="margin-left: -20%" href="#addModal" data-toggle="modal" id="addEmpBtn" ><i class="fa fa-plus-circle" aria-hidden="true"></i>&nbsp; New </a>
					</div>
					<table class="table table-bordered table-hover dataTable" id="corpTbl">
					  <thead>
					    <tr>
					      <th>Package Name</th>
					      <th>Package Price</th>
					      <th>Action</th>
					      <th>Status</th>
					    </tr>
					  </thead>
					  <tbody>
						  @foreach($table as $packages)
						  <tr>
						  	<td>{{ $packages->corpPack_name }}</td>
						  	<td>{{ $packages->price }}</td>
						  	<td>
						  		@if($packages->CorpPackStatus == 1)
					        <a class="btn btn-warning btn-xs updateModal" data-id="{{$packages->corpPack_id}}" href="#updateModal" data-toggle="modal"><i class="fa fa-wrench" aria-hidden="true"></i>&nbsp; Update</a>
					        <a class="btn btn-danger btn-xs delbtn" data-id="{{$packages->corpPack_id}}"><i class="fa fa-trash" aria-hidden="true"></i>&nbsp; Delete</a>
					        
					       @else
					       <a class="btn btn-warning btn-xs"  disabled><i class="fa fa-wrench" aria-hidden="true"></i>&nbsp; Update</a>
					        <a class="btn btn-danger btn-xs" disabled><i class="fa fa-trash" aria-hidden="true"></i>&nbsp; Delete</a>
					       @endif
						  	</td>
						  	<td>
						  		@if($packages->CorpPackStatus == 1)
					      	<span class="badge bg-success">Available</span>
					      	@else
					      	<span class="badge bg-important">Unavailable</span>
					      	@endif
						  	</td>
						  </tr>
						  @endforeach
					  </tbody>
				</div>
			</div>
		</section>
	</div>
</div>

@endsection
@section('additional')
<script type="text/javascript">
$('#corpTbl').dataTable({
  'paging'      : true,
  'lengthChange': true,
  'searching'   : true,
  'ordering'    : true,
  'info'        : true,
  'autoWidth'   : true

});
$('.delbtn').click(function(){
$('#cid').val($(this).data('id'));
$('#deleteModal').modal('show');
});
$('.packservice').select2();
$('.uppackservice').select2();
$('.updateModal').click(function(){
	$.ajax
    ({
      url: '/updateCorporatePackage',
      type: 'get',
      data:  { id:$(this).data('id')},
      dataType : 'json', 

      success:function(response){
        response.forEach(function(data){
				$('#uppackname').val(data.corpPack_name);
				$('#uppackprice').val(data.price);
				var selectedValues = new Array();
				var i = 0;
				response.forEach(function(data){
				selectedValues[i] = data.service_id;
				i++;
				})
				$('.uppackservice').val(selectedValues).trigger('change');
				if(data.gender == 3)
				{
					$('#upBoth').prop('checked',true);
				}
				else if(data.gender == 2)
				{
					$('#upFemale').prop('checked',true);
				}
				else if(data.gender == 1)
				{
					$('#upMale').prop('checked',true);
				}
				if(data.age == 'Teen')
				{
					$('#upTeen').prop('checked',true);
				}
				else if(data.age == 'Adult')
				{
					$('#upAdult').prop('checked',true);
				}
				else if(data.age == 'Senior')
				{
					$('#upSenior').prop('checked',true);
				}
				else if(data.age == 'All')
				{
					$('#upAllAges').prop('checked',true);
				}
		     })
				
		    },
      error:function(){
      }
    });
});

</script>
@endsection