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
            <a class="btn btn-info" style="margin-left: -20%" href="#addModal" data-toggle="modal" ><i class="fa fa-plus-circle" aria-hidden="true"></i>&nbsp; New</a>
          </div>
      <table class="table table-bordered table-hover dataTable" id="result_tbl">
      <thead>
        <tr>
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
          <td>{{ $tbl->trans_date }}</td>
          <td>{{ $tbl->patient_lname }}</td>
          <td>{{ $tbl->patient_mname }}</td>
          <td>{{ $tbl->patient_fname }}</td>
          <td>
            <a class="btn btn-info btn-xs" href="{{ URL::to( '/results/' . $tbl->file)  }}" target="_blank"><i class="fa fa-download" aria-hidden="true"></i>&nbsp; Download</a>
            
            <a class="btn btn-danger btn-xs" href=""><i class="fa fa-trash" aria-hidden="true"></i>&nbsp; Delete</a>
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



<div class="modal fade" id = "addModal">
  <div class="modal-dialog" style="width: 30%">
    <div class="modal-content">
      <div class="modal-header btn-primary">
        <h4 class="modal-title"><i class="fa fa-plus" aria-hidden="true"></i> Add File Results</h4>
      </div>
      <form action="/uploadResultFile" enctype="multipart/form-data" method="POST">
      {{ csrf_field() }}
        <div class="modal-body">


        <div class="form-group">
            <div class="controls col-md-9">
                <div class="fileupload fileupload-new" data-provides="fileupload">
                  <span class="btn btn-white btn-file">
                  <span class="fileupload-new"><i class="fa fa-paper-clip"></i> Select file</span>
                  <span class="fileupload-exists"><i class="fa fa-undo"></i> Change</span>
                  <input type="file" class="default" />
                  </span>
                    <span class="fileupload-preview" style="margin-left:5px;"></span>
                    <a href="#" class="close fileupload-exists" data-dismiss="fileupload" style="float: none; margin-left:5px;"></a>
                </div>
            </div>
        </div>


        <!-- <input type="hidden" name="transaction_id" value="{{ $trans_id }}">
        <input type="hidden" name="result_id" value="{{ $result_id }}">
        <input type="file" name="file" id="file"> -->
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