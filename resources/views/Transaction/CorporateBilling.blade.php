@extends('AdminLayout.admin')

@section ('breadrootName')
<i class="fa fa-handshake-o" aria-hidden="true"></i><span> Transaction</span>
@endsection

@section ('breadParentName')
<i class="fa fa-heartbeat" aria-hidden="true"></i><span> Medical Services</span>
@endsection

@section('maintenanceactive')
<a href="">
@endsection

@section('transaction','active')
@section('corporatetrans','active')
@section ('breadactivePage','Patient List')

@section('content')
<div class="row">
	<div class="col-lg-12">
		<section class="panel">
			<header class="panel-heading">
				Corporate Account Billing
			</header>
			<div class="panel-body">
				
			</div>
			</div>
		</section>
	</div>
</div>	

@endsection

@section('additional')
<script type="text/javascript">
$('.select2').select2();
$('#patientTbl').DataTable({
  'paging'      : true,
  'lengthChange': true,
  'searching'   : true,
  'ordering'    : true,
  'info'        : true,
  'autoWidth'   : true

});

</script>


@endsection