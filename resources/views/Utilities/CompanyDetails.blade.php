@if(Session::get('type') != 0)
<script type="text/javascript">
    window.location = "{{ url('/PageNotFound') }}";
</script>
@endif
@extends('AdminLayout.admin')

@section ('breadrootName')
<i class="fa fa-wrench" aria-hidden="true"></i><span> Utilities</span>
@endsection
@section('breadParentName')
<i class="fa fa-address-card" aria-hidden="true"></i><span> Company Details</span>
@endsection
@section('maintenanceactive')
<a href="" class="">
@endsection
@section('companydetails','active')
@section('utilitiesactive','active')
@section('content')
@endsection