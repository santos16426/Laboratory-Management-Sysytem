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

<style type="text/css">
  h2 {
    font-family: Verdana 
  }
</style>

<section class="panel">
<div class="bio-graph-heading">
    <center><strong><h2>Company Details</h2></strong></center>
</div><br><br>
<div class="panel-body bio-graph-info">
    <div class="row">
       <div class="col-md-12">
        <div class="col-md-6">
              <div class="form-group">
                    <div class="col-md-12">
                       <div class="input-group">
                        <div class="input-group-addon">
                         Company Name 
                       </div>
                      <input name="name" id="name" type="text" placeholder="Name" class="form-control input-md" required>
                   </div>
                </div>  
             </div><br><br>
         </div>
         <div class="col-md-6">
              <div class="form-group">
                    <div class="col-md-12">
                       <div class="input-group">
                        <div class="input-group-addon">
                        Tel No.
                       </div>
                      <input  name="dateofexam" id="dateofexam" placeholder="Date of Examination" class="form-control input-md" required>
                   </div>
                </div>  
             </div><br><br>
            </div> 
        </div> 

        <div class="col-md-12">
        <div class="col-md-6">
              <div class="form-group">
                    <div class="col-md-12">
                       <div class="input-group">
                        <div class="input-group-addon">
                         Residential Address 
                       </div>
                      <input name="name" id="name" type="text" placeholder="Name" class="form-control input-md" required>
                   </div>
                </div>  
             </div><br><br>
         </div>
         <div class="col-md-6">
              <div class="form-group">
                    <div class="col-md-12">
                       <div class="input-group">
                        <div class="input-group-addon">
                        Billing Address
                       </div>
                      <input  name="dateofexam" id="dateofexam" placeholder="Date of Examination" class="form-control input-md" required>
                   </div>
                </div>  
             </div><br><br>
            </div> 
        </div> 

        <div class="col-md-12">
        <div class="col-md-6">
              <div class="form-group">
                    <div class="col-md-12">
                       <div class="input-group">
                        <div class="input-group-addon">
                         Branch 
                       </div>
                      <input name="name" id="name" type="text" placeholder="Name" class="form-control input-md" required>
                   </div>
                </div>  
             </div><br><br>
         </div>
         <div class="col-md-6">
              <div class="form-group">
                    <div class="col-md-12">
                       <div class="input-group">
                        <div class="input-group-addon">
                        Email Address
                       </div>
                      <input  name="dateofexam" id="dateofexam" placeholder="Date of Examination" class="form-control input-md" required>
                   </div>
                </div>  
             </div><br><br>
            </div> 
        </div>  

        <div class="col-md-12">
              <div class="form-group">
                    <div class="col-md-12">
                      <label>Description</label>
                      <textarea  name="history" id="history" type="text" placeholder="" class="form-control input-md" required>
                      </textarea>
                </div>  
             </div><br><br><br>
        </div>  
        </div>
    </div>
</section>
@endsection