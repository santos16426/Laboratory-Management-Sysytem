@extends('AdminLayout.admin')

@section ('breadrootName')
<i class="fa fa-handshake-o" aria-hidden="true"></i><span> Transaction</span>
@endsection

@section ('breadParentName')
<i class="fa fa-heartbeat" aria-hidden="true"></i><span> Corporate Account Billing</span>
@endsection

@section('maintenanceactive')
<a href="">
@endsection

@section('transaction','active')
@section('corporatetrans','active')

@section('content')

<div class="row">
	<div class="col-lg-12">
		<section class="panel">
			<header class="panel-heading">
				Corporate Account Billing
			</header>
			<div class="panel-body">
				<div class="clearfix">
					<table class="table table-bordered table-hover dataTable" id="corpTbl">
					  <thead>
					    <tr>
					      <th>Company Name</th>
					      <th>Contact Person</th>
					      <th>Email</th>
					      <th>Contact Number</th>
					      <th>Balance</th>
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
					      	@foreach($packprice as $getBill)
					      		@if($getBill->corp_id == $corporates->corp_id)
					      		<?php $balance += $getBill->charge ?>
					      		@endif
					      	@endforeach	
					      	@foreach($payments as $getPayments)
					      		@if($getPayments->corp_id == $corporates->corp_id)
					      		<?php $corppay += $getPayments->corpPayment_bill ?>
					      		@endif
					      	@endforeach
					      	<?php echo $balance = $balance - $corppay; $balance=0;?>
					      </td>
					      <td>
				      		@foreach($packprice as $getBill)
					      		@if($getBill->corp_id == $corporates->corp_id)
					      		<?php $balance += $getBill->charge ?>
					      		@endif
					      	@endforeach
					      	@foreach($payments as $getPayments)
					      		@if($getPayments->corp_id == $corporates->corp_id)
					      		<?php $corppay += $getPayments->corpPayment_bill ?>
					      		@endif
					      	@endforeach
					      	<?php $balance = $balance - $corppay; ?>
					      	@if($balance > 0)
					      	<a class="btn btn-info btn-xs viewTrans" data-id="{{ $corporates->corp_id }}"><i class="fa fa-handshake-o" aria-hidden="true" ></i>&nbsp;View Transactions</a>
					      	<a class="btn btn-success btn-xs payCorp" data-id="{{ $corporates->corp_id }}"><i class="fa fa-rub" aria-hidden="true" ></i>&nbsp; Pay</a>
					      	<a class="btn btn-primary btn-xs sendEmail" data-id="{{ $corporates->corp_id }}"><i class="fa fa-envelope" aria-hidden="true" ></i>&nbsp; Email</a>
					      	@else
					      	<a class="btn btn-info btn-xs viewTrans" data-id="{{ $corporates->corp_id }}"><i class="fa fa-handshake-o" aria-hidden="true" ></i>&nbsp;View Transactions</a>
					      	@endif
					      	
					      	<?php $balance=0; $corppay=0; ?>
					      </td>
					      <td>
					      	@foreach($packprice as $getBill)
					      		@if($getBill->corp_id == $corporates->corp_id)
					      		<?php $balance += $getBill->charge ?>
					      		@endif
					      	@endforeach
					      	@foreach($payments as $getPayments)
					      		@if($getPayments->corp_id == $corporates->corp_id)
					      		<?php $corppay += $getPayments->corpPayment_bill ?>
					      		@endif
					      	@endforeach
					      	<?php $balance = $balance - $corppay; ?>
					      	@if($balance > 0)
					      	<span class="badge bg-warning">Not yet Paid</span>
					      	@else
					      	<span class="badge bg-success">Cleared</span>
					      	@endif
					      	<?php $balance=0; $corppay=0; ?>
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
<div class="modal fade" id = "paymentModal">
	<div class="modal-dialog">
    	<div class="modal-content">
      		<div class="modal-header">
        		<h4 class="modal-title">Corporate Payment</h4>
      		</div>
      		<div class="modal-body">
         		<form class="form-horizontal" method="post" action="/saveCorporatePayment" id="paymentForm">
          			<div class="box-body">
            			<input type="hidden" name="corp_id" id="PAYcorp_id" value="">
            			<div class="form-group" style="margin-right:3% ">
							<div class="col-md-10 col-md-offset-1">
								<div class="input-group">
								<div class="input-group-addon">
									Amount <sup>*</sup>
								</div>
								<input  name="amount" id="amount" type="text" class="form-control input-md" required>
								</div>
							</div>  
						</div> 
            			<label class="control-label col-md-3 col-md-offset-1">Image Upload</label> 
            			<div class="col-md-8"> 
            				<div class="fileupload fileupload-new" data-provides="fileupload"> 
            					<div class="fileupload-new thumbnail" style="width: 200px; height: 150px;">
            						<img src="{{ asset('/CorporatePayments/default.jpg') }}" alt="" /> 
            					</div> 
            					<div class="fileupload-preview fileupload-exists thumbnail" style="max-width: 200px; max-height: 150px; line-height: 20px;"></div> 
            					<div>
            						<span class="btn btn-white btn-file"> 
	            						<span class="fileupload-new"><i class="fa fa-paper-clip"></i> Select image</span>
	            						<span class="fileupload-exists"><i class="fa fa-undo"></i> Change</span>
	            						<input type="file" class="default" name="payment_img"> 
            						</span> 
            						<a href="#" class="btn btn-danger fileupload-exists" data-dismiss="fileupload"><i class="fa fa-trash"></i> Remove</a> 
            					</div> 
            				</div> 
            			</div>
          			</div>
					<div class="box-footer">
						<button  data-dismiss="modal" class="btn btn-default">Cancel</button>
						<button  class="btn btn-success pull-right" type="submit"><i class="fa fa-rub" aria-hidden="true"></i>&nbsp;Pay</button>
					</div>
					{{ csrf_field() }}
        		</form>
      		</div>
    	</div>
  	</div>
</div>

<form action="/Transaction/CorporateBilling/ViewTransactions" method="GET" id="viewTrans">
	{{ csrf_field() }}
	<input type="hidden" name="corp_id" value="" id="corp_id">
</form>
@endsection
@section('additional')
@if (Session::has('paid'))
<script type="text/javascript">
  $( document ).ready(function() 
  {
    toastr.options = {
      "closeButton": true,
      "debug": false,
      "positionClass": "toast-top-right",
      "onclick": null,
      "showDuration": "3000",
      "hideDuration": "100",
      "timeOut": "3000",
      "extendedTimeOut": "0",
      "showEasing": "swing",
      "hideEasing": "swing",
      "showMethod": "show",
      "hideMethod": "hide"
    }
    toastr.success("Successfully Updated!");
  }); 
</script>
@endif
<script type="text/javascript">
$('.sendEmail').click(function(){
	 toastr.options = {
      "closeButton": true,
      "debug": false,
      "positionClass": "toast-top-right",
      "onclick": null,
      "showDuration": "3000",
      "hideDuration": "100",
      "timeOut": "3000",
      "extendedTimeOut": "0",
      "showEasing": "swing",
      "hideEasing": "swing",
      "showMethod": "show",
      "hideMethod": "hide"
    }
    toastr.success("Email Sent");
});
$('.payCorp').click(function(){
	$('#PAYcorp_id').val($(this).data('id'));
	$('#paymentModal').modal('show');
});
$('.viewTrans').click(function(){
	$('#corp_id').val($(this).data('id'));
	$('#viewTrans').submit();
});
$('.select2').select2();
$('#corpTbl').DataTable({
  'paging'      : true,
  'lengthChange': true,
  'searching'   : true,
  'ordering'    : true,
  'info'        : true,
  'autoWidth'   : true
});

</script>
@endsection