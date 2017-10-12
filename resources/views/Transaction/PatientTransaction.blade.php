@if((Session::get('upresult')!= 1))
<script type="text/javascript">
    window.location = "{{ url('/PageNotFound') }}";
</script>
@endif
@extends('AdminLayout.admin')

@section ('breadrootName')
<i class="fa fa-handshake-o" aria-hidden="true"></i><span> Transaction</span>
@endsection

@section ('breadParentName')
<i class="fa fa-clipboard" aria-hidden="true"></i><span> Results</span>
@endsection
@section('breadactivePage','Uploading of Results')
@section('maintenanceactive')
<a href="">
@endsection

@section('transaction','active')
@section('transresultactive','active')
@section('uploadactive','active')
@section('content')

<div class="row">
  <div class="col-lg-12">
    <section class="panel">
      <header class="panel-heading">
        <strong>Add File</strong>
      </header>
      <div class="panel-body">
        <div class="clearfix">
          <div class="btn-group pull-right">
            <a class="btn btn-info" style="margin-left: -40%" href="#addModal" data-toggle="modal" ><i class="fa fa-plus-circle" aria-hidden="true"></i>&nbsp; New</a>
          </div>
      <table class="table table-bordered table-hover dataTable" id="result_tbl">
      <thead>
        <tr>
          <th>Result Type</th>
          <th>Transaction Date</th>
          <th>Patient Last Name</th>
          <th>Patient Middle Name</th>
          <th>Patient First Name</th>
          <th>Action</th>
        </tr>
      </thead>
      <tbody>
      @foreach($table as $tbl)
        <tr>
          <td>{{ $tbl->result_type }}</td>
          <td>{{ $tbl->trans_date }}</td>
          <td>{{ $tbl->patient_lname }}</td>
          <td>{{ $tbl->patient_mname }}</td>
          <td>{{ $tbl->patient_fname }}</td>
          <td>
            <a class="btn btn-info btn-xs" href="{{ URL::to( '/results/' . $tbl->file)  }}" target="_blank"><i class="fa fa-download" aria-hidden="true"></i>&nbsp; Download</a>
            
            <a class="btn btn-danger btn-xs delbtn" data-id="{{ $tbl->file_id }}"><i class="fa fa-trash" aria-hidden="true"></i>&nbsp; Delete</a>
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

<div class="modal fade" id = "deleteModal">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header btn-danger">
        
        <h4 class="modal-title"><i class="fa fa-exclamation-triangle" aria-hidden="true"></i> Delete Record</h4>
      </div>
      <form method="post" action="/delete_resultfile" id="delform">
      {{ csrf_field()  }}
        <div class="modal-body">
          <h4></h4>
          <input type="hidden" name="file_id" id="file_id" value="">
          Are you sure you want to remove this from the result files?
        </div>
        <div class="modal-footer">
          <button type="button" class="btn pull-left" data-dismiss="modal">Close</button>
          <button  class="btn btn-danger"><i class="fa fa-trash" aria-hidden="true"></i>&nbsp;Delete</button>
        </div>
      </form>
    </div>  
  </div>
</div>


<div class="modal fade" id = "addModal">
  <div class="modal-dialog" style="width:30%;">
    <div class="modal-content">
      <div class="modal-header btn-primary">
        <h4 class="modal-title"><i class="fa fa-plus" aria-hidden="true"></i> Add File Results</h4>
      </div>
      <form action="/uploadResultFile" enctype="multipart/form-data" method="POST">

        {{ csrf_field() }}
        <div class="modal-body">
          @if(count($services)>0)
           @foreach($services as $ser)
           <input type="hidden" name="service_id[]" value="{{ $ser->service_id }}">
           @endforeach
          @endif
          @if(count($corppack_id)>0)
            @foreach($corppack_id as $corp)
            <input type="hidden" name="corppack_id" value="{{ $corp->corppack_id }}">
            @endforeach
          @endif
        <div class="form-group">
          <div class="col-md-10 col-md-offset-1">
            <div class="input-group">
              <div class="input-group-addon">
                Result Layout <sup>*</sup>
              </div>
              <select class="form-control select2" name="result_layout" style="width: 100%">
                  @if($physicalexam == 1)
                    <option value="medreq">Medical Request</option>
                  @endif
                  @if($result_medserv1 == 1)
                    <option value="medserv1">Medical Service 1</option>
                  @endif
                  @if($result_medserv2 == 1)
                    <option value="medserv2">Medical Service 2</option>
                  @endif
                  @if($result_ecg == 1)
                    <option value="ecg">ECG</option>                    
                  @endif
                  @if($result_xray == 1)
                    <option value="xray">Xray</option>
                  @endif
                  @if($result_ultra == 1)
                    <option value="ultra">Ultrasound</option>
                  @endif
                  @if($result_drug == 1)
                    <option value="drug">Drug Test</option>
                  @endif

              </select>
            </div>
          </div>  
        </div> 
        <div class="form-group">
            <label for="file" class="control-label">File</label>
            <div class="controls col-md-12">
                <div class="fileupload fileupload-new" data-provides="fileupload">
                  <span class="btn btn-white btn-file">
                  <span class="fileupload-new col-md-"><i class="fa fa-paper-clip"></i> Select file</span>
                  <span class="fileupload-exists"><i class="fa fa-undo"></i> Change</span>
                  <input type="file" name="file" id="file">
                  </span>
                    <span class="fileupload-preview" style="margin-left:5px;"></span>
                    <a href="#" class="close fileupload-exists" data-dismiss="fileupload" style="float: none; margin-left:5px;"></a>
                </div>
            </div>
        </div>

        <input type="hidden" name="transaction_id" value="{{ $trans_id }}">
        <input type="hidden" name="result_id" value="{{ $result_id }}">
        
        </div>
        <div class="modal-footer">
          <button type="button" class="btn btn-xs pull-left" data-dismiss="modal">Close</button>
          <button  class="btn btn-xs btn-success"><i class="fa fa-floppy-o" aria-hidden="true"></i>&nbsp;Save</button>
        </div>
     </form>
    </div>  
  </div>
</div>
@endsection
@section('additional')

<script>
  $('.select2').select2();
  $('.delbtn').click(function(){
    $('#file_id').val($(this).data('id'));
    $('#deleteModal').modal('show');
  })
  $(function(){
    $('#result_tbl').DataTable({
      'paging'      : true,
      'lengthChange': true,
      'searching'   : true,
      'ordering'    : true,
      'info'        : true,
      'autoWidth'   : true

    });
    
    $('#submit').click(function(){
      alert($('#filename').val());
    });
  });
</script>

@endsection