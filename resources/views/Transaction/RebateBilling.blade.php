@extends('AdminLayout.admin')

@section ('breadrootName')
<i class="fa fa-handshake-o" aria-hidden="true"></i><span> Transaction</span>
@endsection

@section ('breadParentName')
<i class="fa fa-percent" aria-hidden="true"></i><span> Rebate</span>
@endsection
@section('breadactivePage','Rebate Billing')
@section('maintenanceactive')
<a href="">
@endsection

@section('transaction','active')
@section('rebatetrans','active')

@section('content')
<div class="row">
	<div class="col-lg-12">
		<section class="panel">
			<header class="panel-heading">
				Employee's Rebate Billing
			</header>
			<div class="panel-body">
				<div class="clearfix">
					<table class="table table-bordered table-hover dataTable" id="corpTbl">
						<thead>
							<th>Employee Name</th>
							<th>Total Rebates</th>
							<th>Action</th>
							<th>Status</th>
						</thead>
						<tbody>
						@foreach($emp_rebate as $empreb)
							<tr>
								<td>{{ $empreb->emp_fname }} {{ $empreb->emp_mname }} {{ $empreb->emp_lname }}</td>
								<td>
									@foreach($rebates as $rebate)
										@if($empreb->emp_id == $rebate->emp_id)
										<?php  $total += $rebate->percentage; ?>
										@endif
									@endforeach
									{{ $total }}
									<?php $total=0; ?>
								</td>
								<td>
									@foreach($rebates as $rebate)
										@if($empreb->emp_id == $rebate->emp_id)
										<?php  $total += $rebate->percentage; ?>
										@endif
									@endforeach
									@if($total > 0)
									<a class="btn btn-info btn-xs viewTrans" data-id="{{ $empreb->emp_id }}"><i class="fa fa-handshake-o" aria-hidden="true" ></i>&nbsp;View Transactions</a>
					      			<a class="btn btn-success btn-xs payEmpReb" data-id="{{ $empreb->emp_id }}" data-amount="{{ $total }}"><i class="fa fa-rub" aria-hidden="true" ></i>&nbsp; Pay</a>
									@else

									@endif
									<?php $total=0; ?>
								</td>
								<td></td>
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
         		<form class="form-horizontal" method="post" action="/saveEmpRebatePayment" id="paymentForm" enctype="multipart/form-data">
          			<div class="box-body">
            			<input type="hidden" name="corp_id" id="PAYemp_id" value="">
            			<input type="hidden" name="checkAmount" id="checkAmount" value="">
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
            						<img src="{{ asset('/Rebate_payments/default.jpg') }}" alt="" /> 
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

<form action="/Transaction/Rebate/ViewTransactions" method="GET" id="viewTrans">
	{{ csrf_field() }}
	<input type="hidden" name="emp_id" value="" id="emp_id">
</form>
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
$('.payEmpReb').click(function(){
	$('#PAYemp_id').val($(this).data('id'));
	$('#checkAmount').val($(this).data('amount'));
	$('#paymentModal').modal('show');
});
$('.viewTrans').click(function(){
	$('#emp_id').val($(this).data('id'));
	$('#viewTrans').submit();
});
</script>
@endsection

