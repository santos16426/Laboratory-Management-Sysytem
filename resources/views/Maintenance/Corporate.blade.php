@extends('AdminLayout.admin')

@section ('breadrootName')
<i class="fa fa-cogs" aria-hidden="true"></i><span> Maintenance</span>
@endsection

@section ('breadParentName')
<i class="fa fa-users" aria-hidden="true"></i><span> Corporate Account</span>
@endsection

@section('maintenanceactive')
<a href="" class="active">
@endsection
@section('corpactive','active')
@section('content')
<div class="row">
	<div class="col-lg-12">
		<section class="panel">
			<header class="panel-heading">
				Corporate Accounts
			</header>
			<div class="panel-body">
				<div class="clearfix">
					<div class="btn-group pull-right">
					
					<a class="btn btn-info" style="margin-left: -20%" href="#addModal" data-toggle="modal" id="addEmpBtn" ><i class="fa fa-plus-circle" aria-hidden="true"></i>&nbsp; New </a>
					</div>
					<table class="table table-bordered table-hover dataTable" id="corpTbl">
					  <thead>
					    <tr>
					      <th>Company Name</th>
					      <th>Contact Person</th>
					      <th>Email</th>
					      <th>Contact Number</th>
					      <th>Action</th>
					      <th>Status</th>
					    </tr>
					  </thead>
					  <tbody>
					    @foreach($corporates as $corporates)
					    <tr>
					      <td>{{ $corporates->corp_name }}</td>
					      <td>{{ $corporates->corp_contactperson }}</td>
					      <td>{{ $corporates->corp_email }}</td>
					      <td>{{ $corporates->corp_contact }}</td>

					      
					      <td>
					      @if($corporates->CorpStatus == 1)
					        <a class="btn btn-warning btn-xs updateModal" data-id="{{$corporates->corp_id}}" href="#updateModal" data-toggle="modal"><i class="fa fa-wrench" aria-hidden="true"></i>&nbsp; Update</a>
					        <a class="btn btn-danger btn-xs delbtn" data-id="{{$corporates->corp_id}}"><i class="fa fa-trash" aria-hidden="true"></i>&nbsp; Delete</a>
					       @else
					       <a class="btn btn-warning btn-xs"  disabled><i class="fa fa-wrench" aria-hidden="true"></i>&nbsp; Update</a>
					        <a class="btn btn-danger btn-xs" disabled><i class="fa fa-trash" aria-hidden="true"></i>&nbsp; Delete</a>
					       @endif
					      </td>
					      <td>
					      	@if($corporates->CorpStatus == 1)
					      	<span class="badge bg-success">Available</span>
					      	@else
					      	<span class="badge bg-important">Unavailable</span>
					      	@endif
					      </td>
					    </tr>

					    
					    @endforeach
					  </tbody>
					</table>
				</div>
			</div>
		</section>
	</div>
</div>
<div class="modal fade" id = "updateModal">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header btn-warning">
        
        <h4 class="modal-title"><i class="fa fa-exclamation-triangle" aria-hidden="true"></i> Update</h4>
      </div>
 		
 		<div class="modal-body">
          <form action="/update_Corporate" method="POST" class="form-horizontal" id="corpedit">
          <input type="hidden" name="upcorpid" id="upcorpid">
	        <div class="form-group">
	              <div class="col-md-10 col-md-offset-1">
	                 <div class="input-group">
	                  <div class="input-group-addon">
	                   Company Name <sup>*</sup>
	                 </div>
	                <input  name="upcompname" id="upcompanyname" type="text" placeholder="Company Name" class="form-control input-md" required>
	             </div>
	          </div>  
	       </div>  

	        <div class="form-group">
	              <div class="col-md-10 col-md-offset-1">
	                 <div class="input-group">
	                  <div class="input-group-addon">
	                   Contact Person <sup>*</sup>
	                 </div>
	                <input  name="upcontactperson" id="upcontactperson" type="text" placeholder="Contact Person" class="form-control input-md" required>
	             </div>
	          </div>  
	       </div>  
	          
	        <div class="form-group">
          	<div class="col-md-10 col-md-offset-1">
              <div class="input-group">
                <div class="input-group-addon">
                	Contact Number <sup>*</sup>
	              </div>
	               <input  name="upcontactnumber" id="upcontactnumber" type="text" placeholder="Telephone Number" class="form-control input-md" required>
	             </div>
	          </div>  
	       </div> 

	        <div class="form-group">
	              <div class="col-md-10 col-md-offset-1">
	                 <div class="input-group">
	                  <div class="input-group-addon">
	                   Email Address <sup>*</sup>
	                 </div>
	                <input  name="upemail" id="upemail" type="email" placeholder="Email Address" class="form-control input-md" required>
	             </div>
	          </div>  
	       </div>

	       
        <div class="modal-footer">
          <button type="button" class="btn btn-xs pull-left" data-dismiss="modal">Close</button>
          <button  class="btn btn-xs btn-warning" type="submit"><i class="fa fa-floppy-o" aria-hidden="true"></i>&nbsp;Update</button>
        </div>
      {{ csrf_field() }}
      </form>
      </div>
    </div>  
  </div>
</div>


<div class="modal fade" id = "addModal">
  <div class="modal-dialog modal-lg" >
    <div class="modal-content">
	    <div class="modal-header btn-primary">
	        <h4 class="modal-title"><i class="fa fa-user-plus" aria-hidden="true"></i> Add Corporate Account</h4>
	    </div>
    	<form action="/save_corp" method="POST" class="form-horizontal" id="corpadd">
	      	<div class="modal-body">
		        <div class="form-group">
		              <div class="col-md-10 col-md-offset-1">
		                 <div class="input-group">
		                  <div class="input-group-addon">
		                   Company Name <sup>*</sup>
		                 </div>
		                <input  name="companyname" id="companyname" type="text" placeholder="Company Name" class="form-control input-md" required>
		             </div>
		          </div>  
		       </div>  

		        <div class="form-group">
		           
		              <div class="col-md-10 col-md-offset-1">
		                 <div class="input-group">
		                  <div class="input-group-addon">
		                   Contact Person <sup>*</sup>
		                 </div>
		                <input  name="contactperson" id type="text" placeholder="Contact Person" class="form-control input-md" required>
		             </div>
		          </div>  
		       </div>  
		          
		        <div class="form-group">
		           
		              <div class="col-md-10 col-md-offset-1">
		                 <div class="input-group">
		                  <div class="input-group-addon">
		                   Contact Number <sup>*</sup>
		                 </div>
		                <input  name="contactnumber" id="contactnumber" type="text" placeholder="Telephone Number" class="form-control input-md" required>
		             </div>
		          </div>  
		       </div> 

		        <div class="form-group">
		           
		              <div class="col-md-10 col-md-offset-1">
		                 <div class="input-group">
		                  <div class="input-group-addon">
		                   Email Address <sup>*</sup>
		                 </div>
		                <input  name="email" id="email" type="email" placeholder="Email Address" class="form-control input-md" required>
		             </div>
		          </div>  
		       </div>

	       <div class="modal-footer">
	          <button type="button" class="btn btn-xs pull-left" data-dismiss="modal">Close</button>
	          <button  class="btn btn-xs btn-success" type="submit" ><i class="fa fa-floppy-o" aria-hidden="true"></i>&nbsp;Save</button>
	        </div>
	        {{ csrf_field() }}
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
      <form method="post" action="/deleteCorporate" id="delform">
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
@endsection
@section('additional')
<script type="text/javascript">
	$('#corpTbl').DataTable({
  'paging'      : true,
  'lengthChange': true,
  'searching'   : true,
  'ordering'    : true,
  'info'        : true,
  'autoWidth'   : true

});
$('.select2').select2();	
$('.packservice').select2({
  placeholder: 'Services offered'
});

$('.delbtn').click(function(){
    $('#cid').val($(this).data('id'));
    $('#deleteModal').modal('show');
    });
    $('.updatepackservice').change(function(){
	var idstr = $('.updatepackservice').val();
	
	$.ajax
	({
		url: '/getTotalPrice',
		type: 'get',
		data:{id:idstr},
		dataType: 'json',
		success:function(response)
		{
			response.forEach(function(data){
				$('#packprice').attr('placeholder','Suggested Price: 0');
				$('#packprice').attr('placeholder','Suggested Price: '+data.total);
				
				
			})
		}
	});
});
    $('.updateModal').click(function(){
    $.ajax
    ({
      url: '/updateCorporate',
      type: 'get',
      data:  { id:$(this).data('id')},
      dataType : 'json', 

      success:function(response){
        response.forEach(function(data){

			$('#upcorpid').val(data.corp_id);
			$('#upcompanyname').val(data.corp_name);
			$('#upcontactperson').val(data.corp_contactperson);
			$('#upcontactnumber').val(data.corp_contact);
			$('#upemail').val(data.corp_email);
			$('#uppackprice').val(data.price)
			var selectedValues = new Array();
			var i = 0;
			response.forEach(function(data){
			selectedValues[i] = data.service_id;
			i++;
			})
			$('.uppackservice').val(selectedValues).trigger('change');
        })
      },
      error:function(){
      }
    });
  });
</script>
@endsection