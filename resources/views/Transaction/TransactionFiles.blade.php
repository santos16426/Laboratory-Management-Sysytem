@extends('AdminLayout.admin')

@if((Session::get('arcresult')!= 1))
<script type="text/javascript">
    window.location = "{{ url('/PageNotFound') }}";
</script>
@endif

@section ('breadrootName')
<i class="fa fa-handshake-o" aria-hidden="true"></i><span> Transaction</span>
@endsection

@section ('breadParentName')
<i class="fa fa-clipboard" aria-hidden="true"></i><span> Results</span>
@endsection
@section('breadactivePage')
<i class="fa fa-archive" aria-hidden="true"></i><span> Archive of Results</span>
@endsection
@section('maintenanceactive')
<a href="">
@endsection

@section('transaction','active')
@section('transresultactive','active')
@section('archiveactive','active')

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
          <th>Status</th>
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
            @if($tbl->status == 1)
            <a class="btn btn-info btn-xs" href="{{ URL::to( '/PatientResults/' . $tbl->file)  }}" target="_blank"><i class="fa fa-print" aria-hidden="true"></i>&nbsp; Re-print</a>
            <a class="btn btn-warning btn-xs edit" data-id="{{ $tbl->trans_id }}" data-type="{{ $tbl->result_type }}" data-result="{{ $tbl->result_id }}" data-file_id = "{{ $tbl->file_id }}"><i class="fa fa-edit" aria-hidden="true"></i>&nbsp; 
            Update File</a>
            @else
            <a class="btn btn-info btn-xs" href="{{ URL::to( '/PatientResults/' . $tbl->file)  }}" target="_blank"><i class="fa fa-print" aria-hidden="true"></i>&nbsp; Print</a>
            @endif
          </td>
          <td>
            @if($tbl->status == 1)
            <span class="badge bg-success">Available on site</span>
            @else
            <span class="badge bg-important">Deleted</span>
            @endif

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

<div class="modal fade" id = "Update">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header btn-warning">
        
        <h4 class="modal-title"><i class="fa fa-exclamation-triangle" aria-hidden="true"></i> Update File</h4>
      </div>
      <form method="post" action="/update_resultfile" id="upform"  enctype="multipart/form-data">
      {{ csrf_field()  }}
        <div class="modal-body">
          <h4></h4>
          <input type="hidden" name="trans_id" id="trans_id" value="">
          <input type="hidden" name="result_type" id="type" value="">
          <input type="hidden" name="result_id" id="result_id" value="">
          <input type="hidden" name="file_id" id="file_id" value="">
          Are you sure you want to update this file?
          <br>
          Previous File will be removed to website and will be replaced by the updated file.
          <center>
            <div class="form-group">
            <div class="controls col-md-12">
                <div class="fileupload fileupload-new" data-provides="fileupload">
                  <span class="btn btn-white btn-file">
                  <span class="fileupload-new col-md-"><i class="fa fa-paper-clip"></i> Select file</span>
                  <span class="fileupload-exists"><i class="fa fa-undo"></i> Change</span>
                  <input type="file" name="file" id="file" required="">
                  </span>
                    <span class="fileupload-preview" style="margin-left:5px;"></span>
                    <a href="#" class="close fileupload-exists" data-dismiss="fileupload" style="float: none; margin-left:5px;"></a>
                </div>
            </div>
          </div>
          <br>
          </center>
        </div>
        <div class="modal-footer">
          <button type="button" class="btn pull-left" data-dismiss="modal">Close</button>
          <button  class="btn btn-warning"><i class="fa fa-edit" aria-hidden="true"></i>&nbsp;Update</button>
        </div>
      </form>
    </div>  
  </div>
</div>



@endsection
@section('additional')

<script>
  $('.select2').select2();
  $('.edit').click(function(){
    $('#trans_id').val($(this).data('id'));
    $('#type').val($(this).data('type'));
    $('#result_id').val($(this).data('result'));
    $('#file_id').val($(this).data('file_id'));
    $('#Update').modal('show');
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
    
   
  });
</script>

@endsection