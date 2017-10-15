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
  $emp_details1 = "SELECT * FROM user_tbl WHERE user_id = $id";
  $result1 = $connect->query($emp_details1);
  while ($emp_details1 = mysqli_fetch_array($result1)) {
    $acc_name = $emp_details1['user_fname'].' '.$emp_details1['user_lname'];
    $acctype_id =$emp_details1['user_feature_id'];
   
  }
  }
?>
<!doctype html>
<html lang="en">
<head>
  <meta charset="utf-8" />
  
  
  <meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1" />
  <title>Dashboard</title>

  
  <link rel="icon" href="lolo/yj.png" type="image/png">
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
     .choice{
    text-align: center;
    cursor: pointer;
    margin-top: 20px;
}
 .choice .icon{
   text-align: center;
   vertical-align: middle;
   height: 116px;
   width: 116px;
   border-radius: 50%;
   background-color: #999999;
   color: #FFFFFF;
   margin: 0 auto 20px;
   border: 4px solid #CCCCCC;
   transition: all 0.2s;
   -webkit-transition: all 0.2s;
}
 .choice i{
    font-size: 30px;
    line-height: 111px;
}


.choice:hover .icon, .choice.active .icon{
    border-color: #ff9500;
}

 .choice input[type="radio"],
 .choice input[type="checkbox"]{
    position: absolute;
    left: -10000px;
    z-index: -1;
}
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
    
}
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
    <!--    
        navbar-default can be changed with navbar-ct-blue navbar-ct-azzure navbar-ct-red navbar-ct-green navbar-ct-orange  
        -->
    
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
                      <a href="#" class="dropdown-toggle" data-toggle="dropdown"><?php echo $acc_name ?><b class="caret"></b></a>
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
    </div>
    </div><!--  end navbar -->

</div> <!-- end menu-dropdown -->

   
<div class="main">

  <div class="container">
        <div class="row">
        <div class="space-100"></div>
        <div class="col-md-10 col-md-offset-1">
          <div class="panel panel-info">
            <div class="panel-heading">
              <center><h3>UPGRADE TO PREMIUM</h3></center>
            </div>
            <h3>
              <center>Want to sell your items? Go upgrade to premium right NOW!</center>
            </h3>
            <form class="form-horizontal" action="setPrem.php" method="POST">

              <div class="panel-body">
                 <div class="col-md-8 col-md-offset-2">
                  <div class="form-group form-animate-text">
                    <input type="text" class="form-text"  name="credit number" required>
                    <span class="bar"></span>
                    <label>Credit Card Number<sup style="color: red">*</sup></label>
                  </div>
                </div>
                <div class="col-md-3 col-md-offset-2">
                  <div class="form-group form-animate-text">
                    <input type="number" class="form-text"  name="credit number" required>
                    <span class="bar"></span>
                    <label>Security Code<sup style="color: red">*</sup></label>
                  </div>
                </div>
                <div class="col-md-4 col-md-offset-1">
                  <div class="form-group form-animate-text">
                    <input type="text" class="form-text"  name="credit number" required>
                    <span class="bar"></span>
                    <label>Expiry<sup style="color: red">*</sup></label>
                  </div>
                </div>
                <div class="col-md-3 col-md-offset-2">
                  <div class="form-group">
                    <input type="checkbox" name="Terms and condition" required> <a data-toggle="modal" href="#myModal">Accept terms and condition</a>
                    
                  </div>
                </div>
                <div class="col-md-12 col-md-offset-9">
                  <button class="btn btn-success btn-sm btn-fill">Submit</button>
                </div>
              </div>
            </form>
          </div>
        </div>
      </div>
    </div> 

</div>
  
  <div id="myModal" class="modal fade" role="dialog">
  <div class="modal-dialog">

    <!-- Modal content-->
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal">&times;</button>
        <h4 class="modal-title">Terms and condition</h4>
      </div>
      <div class="modal-body">
        <pre>
        Last updated: March 24, 2017

Please read these Terms and Conditions ("Terms", "Terms and Conditions") carefully before using the 123auction.000webhostapp.com website (the "Service") operated by 123! Auction ("us", "we", or "our").

Your access to and use of the Service is conditioned on your acceptance of and compliance with these Terms. These Terms apply to all visitors, users and others who access or use the Service.

By accessing or using the Service you agree to be bound by these Terms. If you disagree with any part of the terms then you may not access the Service. This Terms and Conditions agreement is licensed by TermsFeed to 123! Auction.

Accounts

When you create an account with us, you must provide us information that is accurate, complete, and current at all times. Failure to do so constitutes a breach of the Terms, which may result in immediate termination of your account on our Service.

You are responsible for safeguarding the password that you use to access the Service and for any activities or actions under your password, whether your password is with our Service or a third-party service.

You agree not to disclose your password to any third party. You must notify us immediately upon becoming aware of any breach of security or unauthorized use of your account.

Links To Other Web Sites

Our Service may contain links to third-party web sites or services that are not owned or controlled by 123! Auction.

123! Auction has no control over, and assumes no responsibility for, the content, privacy policies, or practices of any third party web sites or services. You further acknowledge and agree that 123! Auction shall not be responsible or liable, directly or indirectly, for any damage or loss caused or alleged to be caused by or in connection with use of or reliance on any such content, goods or services available on or through any such web sites or services.

We strongly advise you to read the terms and conditions and privacy policies of any third-party web sites or services that you visit.

Termination

We may terminate or suspend access to our Service immediately, without prior notice or liability, for any reason whatsoever, including without limitation if you breach the Terms.

All provisions of the Terms which by their nature should survive termination shall survive termination, including, without limitation, ownership provisions, warranty disclaimers, indemnity and limitations of liability.

We may terminate or suspend your account immediately, without prior notice or liability, for any reason whatsoever, including without limitation if you breach the Terms.

Upon termination, your right to use the Service will immediately cease. If you wish to terminate your account, you may simply discontinue using the Service.

All provisions of the Terms which by their nature should survive termination shall survive termination, including, without limitation, ownership provisions, warranty disclaimers, indemnity and limitations of liability.

Governing Law

These Terms shall be governed and construed in accordance with the laws of Philippines, without regard to its conflict of law provisions.

Our failure to enforce any right or provision of these Terms will not be considered a waiver of those rights. If any provision of these Terms is held to be invalid or unenforceable by a court, the remaining provisions of these Terms will remain in effect. These Terms constitute the entire agreement between us regarding our Service, and supersede and replace any prior agreements we might have between us regarding the Service.

Changes

We reserve the right, at our sole discretion, to modify or replace these Terms at any time. If a revision is material we will try to provide at least 30 days notice prior to any new terms taking effect. What constitutes a material change will be determined at our sole discretion.

By continuing to access or use our Service after those revisions become effective, you agree to be bound by the revised terms. If you do not agree to the new terms, please stop using the Service.

Contact Us

If you have any questions about these Terms, please contact us.</pre>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-default btn-fill btn-sm" data-dismiss="modal">Close</button>
      </div>
    </div>

  </div>
</div>
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
  

</body>


 
  

  
</html>