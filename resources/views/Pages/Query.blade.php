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
				Corporate Accounts Report Generate
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
								<select class="form-control select2" id="selectrange">
									<option value="daily">Patient</option>
									<option value="weekly">Employee</option>
									<option value="monthly">Corporate Account</option>
									<option value="yearly">Service</option>
									<option value="yearly">Package</option>
									
								</select>
							</div>
						</div>
						

			          	<div class="col-md-12">
			          		<div class="col-md-12">
			          			<button type="button" class="btn btn-success btn-block" id="generatebtn">Generate</button>
			          		</div>
			          	</div>
        			</form>
				</div>
			</div>
		</section>
	</div>
</div>
@endsection