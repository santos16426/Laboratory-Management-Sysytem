
<!doctype html>
<html lang="en">
<head>
  <meta charset="utf-8" />
  <meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1" />
  <title>Results</title>
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
  <script src="http://ajax.googleapis.com/ajax/libs/jquery/1.7.1/jquery.min.js" type="text/javascript"></script>
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
                    
                      <li><a href="/Website/Home">Back to Website&nbsp;&nbsp;<i class="fa fa-sign-out" aria-hidden="true"></i></a></li>
                      
                      </ul>
            </div><!-- /.navbar-collapse -->
          </div><!-- /.container-fluid -->
        </nav>
    
    </div><!--  end navbar -->

</div> <!-- end menu-dropdown -->

<div class="main">
    <div class="col-sm-12"> <div class="container">
        <div class="row">
        
        <div class="space-100"></div>      
                                
                <div class="fresh-table toolbar-color-blue">
                    <div class="toolbar">
                        
                    </div>
                    <div class="jumbotron">
                    @foreach($patientinfo as $table)
                     <p class="text-center"><strong><small>&nbsp;Patient's Information</small></strong></p>
                      <div class="col-md-14 jumbotron">
                        <div class="col-md-6">
                          <p><small><small><strong>Name:</strong></small>&nbsp;{{ $table->patient_fname }}{{ $table->patient_mname }}{{ $table->patient_lname }}</small></p>
                          <p><small><small><strong>Age:</strong></small>&nbsp;{{ $table->age }}</small></p>
                          <p><small><small><strong>Gender:</strong></small>&nbsp;{{ $table->patient_gender }}</small></p>
                        </div>
                        <div class="col-md-6" style="padding-left: 200px">
                          <p><small><small><strong>Address:</strong></small>&nbsp;{{ $table->patient_address }}</small></p>
                          <p><small><small><strong>Civil Status:</strong></small>&nbsp;{{ $table->patient_civilstatus }}</small></p>
                        </div>
                        <br><br>
                      </div>
                      @endforeach
                    </div>

                    <table id="fresh-table" class="table">
                        <thead>
                          <th data-sortable="true">Transaction Date</th>
                          <th>Action</th>
                          
                            
                        </thead>
                        <tbody>
                        @foreach($transactions as $t)
                            <tr>
                              <td>{{ $t->trans_date }}</td>
                              <td><a class="btn btn-info btn-sm" href="/GetFiles?id={{ $t->trans_id }}"><i class="fa fa-files-o"></i>&nbsp; View Files</a></td>
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


  
<script src="{{ asset('/webplugins/DataTable/assets/js/bootstrap-tbl.js') }}"></script>
<script src="{{ asset('/webplugins/DataTable/assets/js/bootstrap-table.js') }}"></script>
<script src="{{ asset('/webplugins/DataTable/assets/js/jquery-1.11.2.min.js') }}"></script>
<script type="text/javascript">
        var $table = $('#fresh-table'),
            
            full_screen = false;
            
        $().ready(function(){
            $table.bootstrapTable({
                toolbar: ".toolbar",
    
                showRefresh: true,
                search: true,
                showToggle: true,
                showColumns:true,
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
            
            $alertBtn.click(function () {
                alert("You pressed on Alert");
            });
            
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