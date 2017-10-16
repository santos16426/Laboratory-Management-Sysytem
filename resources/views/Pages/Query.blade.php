@extends('AdminLayout.admin')

@section ('breadrootName')
<i class="fa fa-dashboard" aria-hidden="true"></i><span> Home</span>
@endsection

@section ('breadParentName')
<i class="fa fa-terminal" aria-hidden="true"></i><span> Queries</span>
@endsection

@section('maintenanceactive')
<a href="" class="">
@endsection

@section('query','active')

@section('content')
<div class="row">
	<div class="col-lg-6">
		<section class="panel">
			<header class="panel-heading">
				Queries
				<span class="tools pull-right">
		          <a class="fa fa-chevron-down" href="javascript:;"></a>
		          
		      	</span>
			</header>
			<div class="panel-body">
				<div class="clearfix">
					<form class="form-horizontal">
						<div class="form-group">
							<div class="col-md-10 col-md-offset-1 input-group">
								<span class="input-group-addon">Select Query<sup>*</sup></span>
								<select class="form-control select2" id="search" >
									<option value="Patient">Patient</option>
									<option value="Employee">Employee</option>
									<option value="Corporate">Corporate Account</option>
									<option value="Service">Service</option>
									<option value="Package">Package</option>
								</select>
							</div>
						</div>

						<div class="form-group" id="patient">
							<div class="col-md-10 col-md-offset-1 input-group">
								<span class="input-group-addon">Select Query<sup>*</sup></span>
								<select class="form-control select2" multiple="">
									<option value="daily">Patient</option>
									<option value="weekly">Employee</option>
									<option value="monthly">Corporate Account</option>
									<option value="yearly">Service</option>
									<option value="yearly">Package</option>
								</select>
							</div>
						</div>
        			</form>
				</div>
			</div>
		</section>
	</div>
</div>
@endsection
@section('additional')
<script type="text/javascript">
	$('.select2').select2();
</script>
@endsection