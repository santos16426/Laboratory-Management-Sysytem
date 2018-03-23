

<!doctype html>
<html lang="en">

<head>
  <meta charset="utf-8" />
  <meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1" />
  <title>Services</title>
  
  <link rel="stylesheet" href="{{ asset('/webplugins/assets/css/now-ui-kit.css') }}">
  <link rel="stylesheet" href="{{ asset('/webplugins/DataTable/assets/css/bootstrap-tbl.css') }}">
  <link rel="stylesheet" href="{{ asset('/webplugins/DataTable/assets/css/demo.css') }}">
  <link rel="stylesheet" href="{{ asset('/webplugins/DataTable/assets/css/bootstrap.min.css') }}">
  <link rel="stylesheet" href="{{ asset('/webplugins/DataTable/assets/css/fresh-bootstrap-table.css') }}">
  <link rel="stylesheet" href="{{ asset('/webplugins/DataTable/assets/css/gsdk.css') }}">
  <link rel="stylesheet" href="{{ asset('/webplugins/DataTable/assets/css/gsdk-base.css') }}">
  <link rel="stylesheet" href="{{ asset('/webplugins/DataTable/assets/style.css') }}">
  <link rel="stylesheet" href="{{ asset('/webplugins/DataTable/assets/background.css') }}">
  <link href="http://maxcdn.bootstrapcdn.com/font-awesome/4.2.0/css/font-awesome.min.css" rel="stylesheet">
  <link href='http://fonts.googleapis.com/css?family=Roboto:400,700,300' rel='stylesheet' type='text/css'>
</head>
<body>
  <div id="navbar-full">
    <div id="navbar">
       <nav class="navbar navbar-fixed-top navbar-ct-blue ">
          <div class="container">
            <div class="navbar-header">
              <button type="button" class="navbar-toggle" data-toggle="collapse" data-target="#bs-example-navbar-collapse-1">
                <span class="sr-only">Toggle navigation</span>
                <span class="icon-bar"></span>
                <span class="icon-bar"></span>
                <span class="icon-bar"></span>
              </button>
              <a class="navbar-brand" href="#" rel="tooltip">
                    <strong><small>E-DIAGNOSTIC CENTER</small></strong>
                </a>
            </div>
        
            <!-- Collect the nav links, forms, and other content for toggling -->
            <div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1">
                <ul class="nav navbar-nav navbar-right">
                  @if(Session::get('login') == true)
                      <li><a href="/doctors">Doctor &nbsp;<i class="fa fa-users" aria-hidden="true"></i></a></li>
                      <li><a href="/service">Service &nbsp;<i class="fa fa-dropbox" aria-hidden="true"></i></a></li>
                    @endif
                      <li><a href="/Website/Home">Back to Website&nbsp;&nbsp;<i class="fa fa-sign-out" aria-hidden="true"></i></a></li>
                      
                      </ul>
            </div><!-- /.navbar-collapse -->
          </div><!-- /.container-fluid -->
        </nav>
    
    </div><!--  end navbar -->

</div> <!-- end menu-dropdown -->
<div class="modal fade" id = "updateModal">
  <div class="modal-dialog">
    <div class="modal-content">
      
      <form method="post" action="/upservform" id="upservform">
      {{ csrf_field() }}
        <div class="modal-body">
          <h4>Edit Service</h4>
           <input type="hidden" name="serv_id" id="serv_id">
            <div class="form-group">
                  <div class="col-md-10 col-md-offset-1">
                     <div class="input-group">
                      <div class="input-group-addon">
                       Service Name <sup style="color:red">*</sup>
                     </div>
                    <input  name="serv_name" id="serv_name" type="text"  class="form-control input-md" required>
                 </div>
              </div>  
           </div>  

         


       </div>  
        <div class="modal-footer" >
          <button type="button" class="btn btn-sm pull-left btn-fill" data-dismiss="modal" style="margin-top: .3in">Close</button>
          <button  class="btn btn-sm btn-warning btn-fill"  button="submit" style="margin-top: .3in"><i class="fa fa-wrench" aria-hidden="true"></i>&nbsp;Update</button>
        </div>
      </form>
    
    </div>
  </div>
</div>

<div class="modal fade" id = "delModal">
  <div class="modal-dialog">
    <div class="modal-content">
      
      <form method="post" action="/delservform" id="delservform">
      {{ csrf_field() }}
        <div class="modal-body">
          <h4>Delete Service</h4>
           <input type="hidden" name="delserv_id" id="delserv_id">
           Are you sure you want to delete this record?
       </div>  
        <div class="modal-footer" >
           <button type="button" class="btn btn-sm pull-left btn-fill" data-dismiss="modal" style="margin-top: .3in">Close</button>
          <button  class="btn btn-sm btn-danger btn-fill"  button="submit" style="margin-top: .3in"><i class="fa fa-trash" aria-hidden="true"></i>&nbsp;Delete</button>
        </div>
      </form>
    
    </div>
  </div>
</div>

<div class="modal fade" id = "restoreModal">
  <div class="modal-dialog">
    <div class="modal-content">
      
      <form method="post" action="/resdelform" id="resdelform">
      {{ csrf_field() }}
        <div class="modal-body">
          <h4>Restore Service</h4>
           <input type="hidden" name="redserv_id" id="redserv_id">
           Are you sure you want to restore this record?
       </div>  
        <div class="modal-footer" >
           <button type="button" class="btn btn-sm pull-left btn-fill" data-dismiss="modal" style="margin-top: .3in">Close</button>
          <button  class="btn btn-sm btn-success btn-fill"  button="submit" style="margin-top: .3in"><i class="fa fa-recycle" aria-hidden="true"></i>&nbsp;Restore</button>
        </div>
      </form>
    
    </div>
  </div>
</div>


<div class="modal fade" id = "newModal">
  <div class="modal-dialog">
    <div class="modal-content">
      
      <form method="post" action="/mewservform" id="mewservform">
      {{ csrf_field() }}
        <div class="modal-body">
          <h4>New Service</h4>
            <div class="form-group">
                  <div class="col-md-10 col-md-offset-1">
                     <div class="input-group">
                      <div class="input-group-addon">
                       Service Name <sup style="color:red">*</sup>
                     </div>
                    <input  name="newserv_name" id="newserv_name" type="text"  class="form-control input-md" required>
                 </div>
              </div>  
           </div>  

         

       </div>  
        <div class="modal-footer" >
          <button type="button" class="btn btn-sm pull-left btn-fill" data-dismiss="modal" style="margin-top: .3in">Close</button>
          <button  class="btn btn-sm btn-warning btn-fill"  button="submit" style="margin-top: .3in"><i class="fa fa-floppy-o" aria-hidden="true"></i>&nbsp;Save</button>
        </div>
      </form>
    
    </div>
  </div>
</div>

<div class="main">
    <div class="col-sm-12"> <div class="container">
        <div class="row">
        
        <div class="space-100"></div>      
                                
                <div class="fresh-table toolbar-color-blue">
                    <div class="toolbar">
                        <a class="updatebrn btn btn-success btn-sm" style="color: white"  href="#newModal" data-toggle="modal">New Record</a>
                    </div>
                   
                    <table id="fresh-table" class="table">
                        <thead>
                          <th data-sortable="true">Service Name</th>
                          <th>Status</th>
                          <th>Action</th>
                        </thead>
                        <tbody>
                        @foreach($table as $t)
                        <tr>
                        <td>{{ $t->service_name }}</td>
                        <td>
                          @if($t->status == 1)
                          Active
                          @else
                          Inactive
                          @endif
                        </td>
                        <td>
                          <a class="updatebrn btn btn-warning btn-sm btn-fill" onclick="hello({{$t->service_id}})" data-id="{{$t->service_id}}" href="#updateModal" data-toggle="modal">Update</a>
                          @if($t->status == 1)
                          <a class="updatebrn btn btn-danger btn-sm btn-fill" onclick="del({{$t->service_id}})" data-id="{{$t->service_id}}" href="#delModal" data-toggle="modal">Delete</a>
                          @else
                          <a class="updatebrn btn btn-success btn-sm btn-fill" onclick="rest({{$t->service_id}})" data-id="{{$t->service_id}}" href="#restoreModal" data-toggle="modal">Restore</a>
                          @endif
                        </td>
                        </tr>
                        @endforeach
                        </tbody>
                    </table>
                   
                </div>
        </div>
      </div>
    </div> 
  </div>
</body>

<script src="{{ asset('/webplugins/assets/js/core/jquery.3.2.1.min.js') }}"></script>
<script src="{{ asset('/webplugins/assets/js/core/tether.min.js') }}"></script>
<script src="{{ asset('/webplugins/assets/js/core/bootstrap.min.js') }}"></script>
<script src="{{ asset('/webplugins/assets/js/plugins/bootstrap-switch.js') }}"></script>
<script src="{{ asset('/webplugins/assets/js/plugins/nouislider.min.js') }}"></script>
<script src="{{ asset('/webplugins/assets/js/plugins/bootstrap-datepicker.js') }}"></script>
<script src="{{ asset('/webplugins/assets/js/scroll.js') }}"></script>
<script src="{{ asset('/webplugins/assets/js/site.min.js') }}"></script>
<script src="{{ asset('/webplugins/assets/js/now-ui-kit.js') }}"></script>
<script src="{{ asset('/webplugins/datepicker/js/bootstrap-datepicker.js') }}"></script>
  
<script src="{{ asset('/webplugins/assets/js/site.min.js') }}"></script>
<script src="{{ asset('/webplugins/DataTable/assets/js/bootstrap-tbl.js') }}"></script>

<script src="{{ asset('/webplugins/DataTable/assets/js/bootstrap-table.js') }}"></script>
<script type="text/javascript">
  function del(id){
    $('#delserv_id').val(id);
  }
   function rest(id){
    $('#redserv_id').val(id);
  }
  function hello(id){
    $.ajax
    ({
      url: '/getService',
      type: 'get',
      data:  { id:id},
      dataType : 'json', 

      success:function(response){
        response.forEach(function(data){
        $('#serv_id').val(id);
        $('#serv_name').val(data.service_name);
        })
      },
      error:function(){

      }
    });
  }
</script>
<script type="text/javascript">

        var $table = $('#fresh-table'),
            
            full_screen = false;
            
        $().ready(function(){
            $table.bootstrapTable({
                toolbar: ".toolbar",
    
                showRefresh: true,
                search: true,
                showToggle: true,
                pagination: true,
                striped: true,
                pageSize: 5,
                pageList: [5,10,25,50,100],
                
                formatShowingRows: function(pageFrom, pageTo, totalRows){
                    //do nothing here, we don't want to show the text "showing x of y from..." 
                },
                formatRecordsPerPage: function(pageNumber){
                    return pageNumber + " rows visible";
                },
                icons: {
                    refresh: 'fa fa-refresh',
                    toggle: 'fa fa-th-list',
                    columns: 'fa fa-columns',
                    detailOpen: 'fa fa-plus-circle',
                    detailClose: 'fa fa-minus-circle'
                }
            });
            
                        
            
            $(window).resize(function () {
                $table.bootstrapTable('resetView');
            });
    
            
            window.operateEvents = {
                'click .like': function (e, value, row, index) {
                    alert('You click like icon, row: ' + JSON.stringify(row));
                    console.log(value, row, index);
                },
                'click .edit': function (e, value, row, index) {
                    alert('You click edit icon, row: ' + JSON.stringify(row));
                    console.log(value, row, index);    
                },
                'click .remove': function (e, value, row, index) {
                    $table.bootstrapTable('remove', {
                        field: 'id',
                        values: [row.id]
                    });
            
                }
            };
            
         
            
        });
            
    
        function operateFormatter(value, row, index) {
            return [
                '<a rel="tooltip" title="Like" class="table-action like" href="javascript:void(0)" title="Like">',
                    '<i class="fa fa-heart"></i>',
                '</a>',
                '<a rel="tooltip" title="Edit" class="table-action edit" href="javascript:void(0)" title="Edit">',
                    '<i class="fa fa-edit"></i>',
                '</a>',
                '<a rel="tooltip" title="Remove" class="table-action remove" href="javascript:void(0)" title="Remove">',
                    '<i class="fa fa-remove"></i>',
                '</a>'
            ].join('');
        }
    
            
    </script>



</html>
  