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
					    </tr>
					  </thead>
					  <tbody>
					    <tr>
					      
					    </tr>
					  </tbody>
					</table>
				</div>
			</div>
		</section>
	</div>
</div>

@endsection

@section('additional')
<script type="text/javascript">
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