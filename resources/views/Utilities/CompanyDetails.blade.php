@extends('AdminLayout.admin')

@if(Session::get('type') != 0)
<script type="text/javascript">
    window.location = "{{ url('/PageNotFound') }}";
</script>
@endif

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

  p {
    font-size: 15px;
  }

  img {}
</style>

<section class="panel">
        <div class="col-md-12">
            <div class="profile-info col-lg-12">
                <section class="panel" style="height: 100%">
                    <div class="bio-graph-heading">
                    </div>
                    <div class="panel-body bio-graph-info">
                        <h1><strong>Company Logo</strong></h1>
                        <div class="row">
                            <div class="">
                              <div class="form-group" style="padding-left: 16px">
                                    <div class="fileupload fileupload-new" data-provides="fileupload"> 
                                      <div class="fileupload-new thumbnail" style="width: 370px; height: 170px;">
                                        <img src="/banner.jpg" alt="" style="height: 100%; width: 100%; max-height: 170px; max-width: 370px; float: middle;border:1px solid #000000; border-radius: 10px;"> 
                                      </div> 
                                      <div class="fileupload-preview fileupload-exists thumbnail" style="max-width: 370px; max-height: 170px; line-height: 20px;"></div> 
                                      <div>
                                        <span class="btn btn-white btn-file"> 
                                          <span class="fileupload-new"><i class="fa fa-paper-clip"></i> Select image</span>
                                          <span class="fileupload-exists"><i class="fa fa-undo"></i> Change</span>
                                          <input type="file" class="default" name="logo" required> 
                                        </span> 
                                        <a href="#" class="btn btn-danger fileupload-exists" data-dismiss="fileupload"><i class="fa fa-trash"></i> Remove</a> 
                                      </div> 
                                    </div>  
                             </div>
                            </div>
                          </div><br>
                          <div class="row" style="padding-left: 15px">
                            <h1><strong>Company Details</strong></h1><br>
                            <div  class="bio-row" style="padding-left: 15px">
                                <p><strong>Company Name: </strong>&nbsp;</p><input  name="companyname" type="text" id="companyname" placeholder="Globalhealth Diagnostics Center,Inc." class="form-control input-md" required>
                            </div>
                            <div  class="bio-row" style="padding-left: 15px">
                                <p><strong>Address: </strong>&nbsp; </p><input  name="address" type="text" id="address" placeholder="156 N. Domingo Street, San Juan City, Metro Manila" class="form-control input-md" required>
                            </div>
                            <div  class="bio-row" style="padding-left: 15px">
                                <p><strong>Contact Number:</strong>&nbsp; </p><input  name="contact" type="text" id="contact" placeholder="722-4544/436-2057" class="form-control input-md" required>
                            </div>
                            <div  class="bio-row" style="padding-left: 15px">
                                <p><strong>Email: </strong>&nbsp; </p><input  name="email" type="text" id="email" placeholder="globalhealth_sj@yahoo.com" class="form-control input-md" required>
                            </div>
                        </div><br>
                        <div>
                          <center><button type="submit" class="btn btn-xs btn-success" style="width: 100px">Save</button></center>
                        </div>
                    </div>
                </section>
            </div>   
          </div>       
</section>

@endsection