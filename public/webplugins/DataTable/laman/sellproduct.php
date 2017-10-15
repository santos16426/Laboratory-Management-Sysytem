<?php 
session_start();
include 'dbcon.php';
  if($_SESSION['id']==null || $_SESSION['id']=="")
  {
    header('location:index.php');
  }
  else
  {
    if($_SESSION['id']==1)
    {
      header('location:adminpage.php');
    }
    $id = $_SESSION['id'];
    $type = $_SESSION['type'];
  $emp_details = "SELECT * FROM user_tbl WHERE user_id = $id";
  $result = $connect->query($emp_details);
  while ($emp_details = mysqli_fetch_array($result)) {
    $emp_name = $emp_details['user_fname'].' '.$emp_details['user_lname'];
    $type_id =$emp_details['user_feature_id'];
  }
  }
?>
<!doctype html>
<html lang="en">
<head>
  <meta charset="utf-8" />
  
  
  <meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1" />
  <title>Dashboard</title>

    

<link href='css/bootstrap.css' rel='stylesheet' />
<link href='css/rotating-card.css' rel='stylesheet' />
<link href="bootstrap3/css/bootstrap.css" rel="stylesheet" />
<link href="bootstrap3/css/font-awesome.css" rel="stylesheet" />

<link href="assets/css/gsdk.css" rel="stylesheet" />   
<link href="assets/css/demo.css" rel="stylesheet" /> 
<link rel="stylesheet" type="text/css" href="style.css">
<link href="assets/css/bootstrap.min.css" rel="stylesheet" />
<link rel="stylesheet" type="text/css" href="background.css">
<link href="assets/css/gsdk-base.css" rel="stylesheet" />
<!--     Font Awesome     -->
<link href="http://netdna.bootstrapcdn.com/font-awesome/4.0.3/css/font-awesome.css" rel="stylesheet">
<link href='http://fonts.googleapis.com/css?family=Grand+Hotel' rel='stylesheet' type='text/css'>
<link href="http://netdna.bootstrapcdn.com/font-awesome/4.4.0/css/font-awesome.css" rel="stylesheet">
<script src="http://ajax.googleapis.com/ajax/libs/jquery/1.7.1/jquery.min.js" type="text/javascript"></script>
<style type="text/css">
  .picture-container{
    position: relative;
    cursor: pointer;
    text-align: center;
}
.picture{
    width: 106px;
    height: 106px;
    background-color: #999999;
    border: 4px solid #CCCCCC;
    color: #FFFFFF;
    border-radius: 50%;
    margin: 5px auto;
    overflow: hidden;
    transition: all 0.2s;
    -webkit-transition: all 0.2s;
}
.picture:hover{
    border-color: #2ca8ff;
}

.picture:hover{
    border-color: #ff9500;
}

.picture input[type="file"] {
    cursor: pointer;
    display: block;
    height: 100%;
    left: 0;
    opacity: 0 !important;
    position: absolute;
    top: 0;
    width: 100%;
}

.picture-src{
    width: 100%;
</style>
<style type="text/css">
  .badge
  {
    background-color: red
  }
</style>
</head>

<body>
<div id="navbar-full">
    <div id="navbar">

    <nav class="navbar navbar-fixed-top  navbar-ct-green " >
          
          <div class="container">
            <!-- Brand and toggle get grouped for better mobile display -->
            <div class="navbar-header">
              <button type="button" class="navbar-toggle" data-toggle="collapse" data-target="#bs-example-navbar-collapse-1">
                <span class="sr-only">Toggle navigation</span>
                <span class="icon-bar"></span>
                <span class="icon-bar"></span>
                <span class="icon-bar"></span>
              </button>
              <a class="navbar-brand" href="products.php">Auction<sup>3</sup></a>
            </div>
        
            <!-- Collect the nav links, forms, and other content for toggling -->
            <div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1">
              <ul class="nav navbar-nav">
                <li><a href="products.php">Home</a></li>
                <li class="dropdown">
                      <a href="#" class="dropdown-toggle" data-toggle="dropdown">Product<b class="caret"></b></a>
                      <ul class="dropdown-menu">
                        <li><a href="products.php">Buy Product</a></li>
                         <?php if($type!=1){ ?>
                      <li><a href="sellproduct.php">Sell product</a></li>
                      <?php }
                      else{
                        ?>
                        <li><a href="upgradeacc.php">Sell Product?<small style="color: blue"><i> Upgrade to premium</i></small></a></li>
                        <?php
                        } ?>
                      </ul>
                </li>
                
                <li>
                    <a href="javascript:void(0);" data-toggle="search" class="hidden-xs"><i class="fa fa-search"></i></a>
                </li>
              </ul>
               <form class="navbar-form navbar-left navbar-search-form" role="search">                  
                 <div class="form-group">
                      <input type="text" value="" class="form-control" placeholder="Search..." style="color: white; background-color: transparent;">
                 </div> 
              </form>
              <?php 
              $checkvalidity = "SELECT * FROM product_tbl LEFT OUTER JOIN product_status on product_tbl.product_status = product_status.productstatus_id LEFT OUTER JOIN user_tbl on user_tbl.user_id = product_tbl.product_user_id LEFT OUTER JOIN producttype_tbl t ON t.producttype_id = product_tbl.product_type_id WHERE product_status.productstatus_id = 2";
              $queryvalidity = $connect->query($checkvalidity);
              $prod_details= array();
              while($checkvalidity=mysqli_fetch_array($queryvalidity)):{
                $prod_details[] = array(
                  'id'  =>  $checkvalidity['product_id'],
                  'status'  =>  $checkvalidity['product_status'],
                  'time'  =>  $checkvalidity['product_init_time'],
                  'type'  =>  $checkvalidity['product_type_id'],
                  'duration'  =>  $checkvalidity['producttype_default_duration']
                  );
              }endwhile;
              foreach ($prod_details as $details) {
                $idd = $details['id'];
                $duration = $details['duration'];
                $date = $details['time'];
                $day = $details['time'][8].$details['time'][9];
                $year = $details['time'][0].$details['time'][1].$details['time'][2].$details['time'][3];
                $month = $details['time'][5].$details['time'][6];
                $hours = $details['time'][11].$details['time'][12];
                $minute = $details['time'][14].$details['time'][15];
                $seconds = $details['time'][17].$details['time'][18];
                $validity = $day + $duration;
                $check_date =$year.'-'.$month.'-'.$validity.' '.$hours.':'.$minute.':'.$seconds;
                date_default_timezone_set('Singapore');
                $current_date =date('Y-m-d H:i:s');
                 if($check_date < $current_date)
                 {
                  $change_prod_stat = "UPDATE product_tbl SET product_status = 4 WHERE product_id = $idd";
                  $product_change_query = $connect->query($change_prod_stat);
                 }


              }

              $notapprovesstring = "SELECT * FROM product_tbl LEFT OUTER JOIN product_status on product_tbl.product_status = product_status.productstatus_id LEFT OUTER JOIN user_tbl on user_tbl.user_id = product_tbl.product_user_id WHERE product_status.productstatus_id = 1 and user_tbl.user_id = $id";
              $notapprovequery =$connect->query($notapprovesstring);
              $notapprovecount = mysqli_num_rows($notapprovequery);
               
              $approvesstring = "SELECT * FROM product_tbl LEFT OUTER JOIN product_status on product_tbl.product_status = product_status.productstatus_id LEFT OUTER JOIN user_tbl on user_tbl.user_id = product_tbl.product_user_id WHERE product_status.productstatus_id = 2  and user_tbl.user_id = $id";
              $approvequery =$connect->query($approvesstring);
              $approvecount = mysqli_num_rows($approvequery);

              $soldstring = "SELECT * FROM product_tbl LEFT OUTER JOIN product_status on product_tbl.product_status = product_status.productstatus_id LEFT OUTER JOIN user_tbl on user_tbl.user_id = product_tbl.product_user_id WHERE product_status.productstatus_id = 3  and user_tbl.user_id = $id";
              $soldquery =$connect->query($soldstring);
              $soldcount = mysqli_num_rows($soldquery);

              $expiredstring = "SELECT * FROM product_tbl LEFT OUTER JOIN product_status on product_tbl.product_status = product_status.productstatus_id LEFT OUTER JOIN user_tbl on user_tbl.user_id = product_tbl.product_user_id WHERE product_status.productstatus_id = 4 and user_tbl.user_id = $id ";
              $expiredquery =$connect->query($expiredstring);
              $expiredcount = mysqli_num_rows($expiredquery);
               ?>
              <ul class="nav navbar-nav navbar-right">
                    <li class="dropdown active">
                      <a href="#" class="dropdown-toggle" data-toggle="dropdown"><?php echo $emp_name ?><b class="caret"></b></a>
                       <ul class="dropdown-menu">
                        <li><a href="myprofile.php?id=<?php echo $id ?>">My account</a></li>
                        <li role="presentation" class="divider"></li>
                        <?php if($type!=1){ ?>
                        <li><a>My Products</a></li>
                        <li><a>&nbsp;<span class="badge"><?php echo $notapprovecount ?></span>&nbsp;Not Approved</a></li>
                        <li><a>&nbsp;<span class="badge"><?php echo $approvecount ?></span>&nbsp;Approved</a></li>
                        <li><a>&nbsp;<span class="badge"><?php echo $soldcount ?></span>&nbsp;Sold</a></li>
                        <li><a>&nbsp;<span class="badge"><?php echo $expiredcount ?></span>&nbsp;Expired</a></li>
                        <li role="presentation" class="divider"></li>
                        <?php }
                        else{
                          ?>

                        <li><a href="upgradeacc.php">Upgrade to premium</a></li>
                        <li role="presentation" class="divider"></li>
                        <?php } ?>
                        <li><a>&nbsp;<span class="badge">0</span>&nbsp;My biddings</a></li>
                        <li role="presentation" class="divider"></li>
                      <li><a href="index.php">Log out</a></li>
                      
                      </ul>
                </li>
               </ul>
            </div><!-- /.navbar-collapse -->
          </div><!-- /.container-fluid -->
        </nav>
    
    </div><!--  end navbar -->

</div> <!-- end menu-dropdown -->


<div class="main">
     <div class="container">
        <div class="row">
        <div class="col-sm-12">
        <div class="space-100"></div>
        
        <?php
       
        if(isset($_GET['feedback']))
        {
         if($_GET['feedback']=='error')
        {
          ?>
          <div class="alert alert-danger" role="alert"> <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button>Failed to register your product, try again later</div>
          <?php
        }
        else if($_GET['feedback']=='success')
        {
          ?>
          <div class="alert alert-success" role="alert"> <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button>Successfully submitted your product, Please wait for your product to be activated</div>
          <?php
        }
        }
        else

        ?>

        
        <form action="save_product.php" method="POST" enctype="multipart/form-data">
          <div class="panel panel-info">
          <div class="panel-heading panel-success"><h3><center>Sell your Product</center></h3></div>
            <div class="panel-body">
            <fieldset>
            <legend>Product information</legend>
               <div class=""  id ="part1">
                  <div class="col-sm-7 col-md-offset-1">
                    <div class="form-group">
                            
                            <div class="col-md-12 input-group">
                                <span class="input-group-addon"><i class="fa fa-user-md" aria-hidden="true"></i></span>
                                <select class="form-control select2" name="product_type" id="product_type" style="width: 100%;">  
                                <option disabled="" selected="" required>-Product Type-</option> 
                                <?php
                                    $query="SELECT * FROM producttype_tbl WHERE status = 1";
                                    $result = $connect->query($query);
                                    if ($result->num_rows > 0) 
                                    while($query = mysqli_fetch_array( $result )) :

                                    ?>
                                    <option value = '<?php echo $query['producttype_id']; ?>'>
                                     <?php echo $query['producttype_name'] ?>
                                       
                                     </option>
                                  <?php 
                                  $ctr +=1;
                                  endwhile;?>
                                </select>
                            </div>
                            </div>
                    <div class="col-md-12">
                      <div class="col-md-12">
                        <div class="form-group form-animate-text">
                          <input type="text" class="form-text"  name="product_name" required>
                          <span class="bar"></span>
                          <label>Product Name<sup style="color: red">*</sup></label>
                        </div>
                      </div>
                  </div>
                  <div class="col-md-12">
                      <div class="col-md-12">
                        <div class="form-group form-animate-text">
                          <textarea type="text" class="form-text"  name="product_description"></textarea>
                          <span class="bar"></span>
                          <label>Product Description<sup style="color: red">*</sup></label>
                        </div>
                      </div>
                  </div>
                   
                </div>
                <div class="col-md-4">
                <div class="space-50"></div>
                     <div class="picture-container">
                        <div class="picture">
                            <img src="prod-img/default.png" class="picture-src" id="wizardPicturePreview" title="" >
                            <input type="file" id="wizard-picture" name="img">
                        </div>
                        <h6>Upload the product picture</h6>
                    </div>
                </div>
                <div class="col-md-7 col-md-offset-1">
                  <div class="col-md-6">
                      <div class="col-md-12">
                        <div class="form-group form-animate-text">
                          <input type="number" class="form-text"  name="product_init_price" required>
                          <span class="bar"></span>
                          <label>Initial Price<sup style="color: red">*</sup></label>
                        </div>
                      </div>
                  </div>
                   <div class="col-md-6">
                      <div class="col-md-12">
                        <div class="form-group form-animate-text">
                          <input type="number" class="form-text"  name="product_fixed_price" required>
                          <span class="bar"></span>
                          <label>Final Fixed Price<sup style="color: red">*</sup></label>
                        </div>
                      </div>
                  </div>
                </div>
                </fieldset>
               
            </div>      
            <div class="panel-footer">
              <button type="submit" class="btn btn-success col-md-offset-11 btn-fill">Submit</button>
            </div>      
            
          </div></form>
     
      
        </div>
        </div><!-- end row -->
    </div> 

</div>
<!-- end main -->

</body>


  
  <script src="assets/js/bootstrap.min.js"></script>
  <script src="bootstrap3/js/bootstrap.js" type="text/javascript"></script>
  <script src="assets/js/gsdk-checkbox.js"></script>
  <script src="assets/js/gsdk-radio.js"></script>
  <script src="assets/js/gsdk-bootstrapswitch.js"></script>
  <script src="assets/js/get-shit-done.js"></script>
    <script src="assets/js/custom.js"></script>
<script src="scripts.js"></script>  
    <script src="assets/js/custom.js"></script>
      
<script src="assets/js/jquery-ui-1.10.4.custom.min.js" type="text/javascript"></script> 
<script src="assets/js/jquery.bootstrap.wizard.js" type="text/javascript"></script>
  <script src="assets/js/wizard.js"></script>

<script type="text/javascript">
         
    $('.btn-tooltip').tooltip();
    $('.label-tooltip').tooltip();
    $('.pick-class-label').click(function(){
        var new_class = $(this).attr('new-class');  
        var old_class = $('#display-buttons').attr('data-class');
        var display_div = $('#display-buttons');
        if(display_div.length) {
        var display_buttons = display_div.find('.btn');
        display_buttons.removeClass(old_class);
        display_buttons.addClass(new_class);
        display_div.attr('data-class', new_class);
        }
    });
    $( "#slider-range" ).slider({
    range: true,
    min: 0,
    max: 500,
    values: [ 75, 300 ],
  });
  $( "#slider-default" ).slider({
      value: 70,
      orientation: "horizontal",
      range: "min",
      animate: true
  });
  $('.carousel').carousel({
      interval: 4000
    });
      
    
</script>
<script type="text/javascript">
    $(document).ready(function(){
       $("#wizard-picture").change(function(){
        readURL(this);
    });
    });
  </script>


<script type="text/javascript">
    $().ready(function(){
        $('[rel="tooltip"]').tooltip();

    });

    function rotateCard(btn){
        var $card = $(btn).closest('.card-container');
        console.log($card);
        if($card.hasClass('hover')){
            $card.removeClass('hover');
        } else {
            $card.addClass('hover');
        }
    }
</script>

<script>
  (function(i,s,o,g,r,a,m){i['GoogleAnalyticsObject']=r;i[r]=i[r]||function(){
  (i[r].q=i[r].q||[]).push(arguments)},i[r].l=1*new Date();a=s.createElement(o),
  m=s.getElementsByTagName(o)[0];a.async=1;a.src=g;m.parentNode.insertBefore(a,m)
  })(window,document,'script','//www.google-analytics.com/analytics.js','ga');

  ga('create', 'UA-46172202-4', 'auto');
  ga('send', 'pageview');

</script>

</html>