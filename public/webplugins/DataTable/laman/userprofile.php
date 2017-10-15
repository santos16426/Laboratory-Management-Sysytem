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

  $accountid = $_POST['id'];
  $emp_details = "SELECT * FROM user_tbl WHERE user_id = $accountid";
  $result = $connect->query($emp_details);
  while ($emp_details = mysqli_fetch_array($result)) {
    $emp_name = $emp_details['user_fname'].' '.$emp_details['user_lname'];
    $type_id =$emp_details['user_feature_id'];
    $userimg=$emp_details['user_img'];
    $contact = $emp_details['user_contact'];
    $userloc = $emp_details['user_address'];
    $useremail = $emp_details['user_email'];
    $userbday = $emp_details['user_bday'];
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

fieldset, label { margin: 0; padding: 0; }
body{ margin: 20px; }
h1 { font-size: 1.5em; margin: 10px; }

/****** Style Star Rating Widget *****/

.rating { 
  border: none;
  float: left;
}

.rating > input { display: none; } 
.rating > label:before { 
  margin: 5px;
  font-size: 1.25em;
  font-family: FontAwesome;
  display: inline-block;
  content: "\f005";
}

.rating > .half:before { 
  content: "\f089";
  position: absolute;
}

.rating > label { 
  color: #ddd; 
 float: right; 
}

/***** CSS Magic to Highlight Stars on Hover *****/

.rating > input:checked ~ label, /* show gold star when clicked */
.rating:not(:checked) > label:hover, /* hover current star */
.rating:not(:checked) > label:hover ~ label { color: #FFD700;  } /* hover previous stars in list */

.rating > input:checked + label:hover, /* hover current star when changing rating */
.rating > input:checked ~ label:hover,
.rating > label:hover ~ input:checked ~ label, /* lighten current selection */
.rating > input:checked ~ label:hover ~ label { color: #FFED85;  } 
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
                      <?php } ?>
                      
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
        <div class="col-md-3">

          <!-- Profile Image -->
          <div class="panel panel-success">
          <div class="panel-heading">
              <h3 class="panel-title text-center">Profile</h3>
            </div>
            <div class="panel-body">
              <img class="col-md-12 img-rounded" src="user-img/<?php echo $userimg ?>" alt="User profile picture">
              <h3 class="text-center"><?php echo $emp_name ?></h3>
              <h5 class="text-muted text-center">Buyer/Seller</h5>
             <ul class="list-group list-group-unbordered">
                <li class="list-group-item">
                <?php 
                $countproductsearch = "SELECT * FROM product_tbl p LEFT OUTER JOIN user_tbl u ON p.product_user_id=u.user_id LEFT OUTER JOIN producttype_tbl t ON t.producttype_id = p.product_type_id LEFT OUTER JOIN product_status s ON p.product_status = s.productstatus_id WHERE p.product_user_id = $accountid";
                 $countproductquery = $connect->query($countproductsearch);
                 $countproductquery = mysqli_num_rows($countproductquery);


                 $soldcountproductsearch = "SELECT * FROM product_tbl p LEFT OUTER JOIN user_tbl u ON p.product_user_id=u.user_id LEFT OUTER JOIN producttype_tbl t ON t.producttype_id = p.product_type_id LEFT OUTER JOIN product_status s ON p.product_status = s.productstatus_id WHERE p.product_user_id = $accountid and p.product_status = 3";
                 $soldcountproductquery = $connect->query($soldcountproductsearch);
                 $soldcountproductquery = mysqli_num_rows($soldcountproductquery);
                 ?>
                  <b>Products Sold</b> <a class="pull-right"><?php echo $soldcountproductquery ?></a>
                </li>
                <li class="list-group-item">
                  <b>Products Posted</b> <a class="pull-right"><?php echo $countproductquery ?></a>
                </li>
              </ul>
              &nbsp;RATING:
              <div class="col-md-offset-2"><fieldset class="rating">
    <input type="radio" id="star5" name="rating" value="5" /><label class = "full" for="star5" title="Awesome - 5 stars"></label>
    <input type="radio" id="star4half" name="rating" value="4 and a half" checked=""/><label class="half" for="star4half" title="Pretty good - 4.5 stars"></label>
    <input type="radio" id="star4" name="rating" value="4" checked=""/><label class = "full" for="star4" title="Pretty good - 4 stars"></label>
    <input type="radio" id="star3half" name="rating" value="3 and a half" /><label class="half" for="star3half" title="Meh - 3.5 stars"></label>
    <input type="radio" id="star3" name="rating" value="3" /><label class = "full" for="star3" title="Meh - 3 stars"></label>
    <input type="radio" id="star2half" name="rating" value="2 and a half"  /><label class="half" for="star2half" title="Kinda bad - 2.5 stars"></label>
    <input type="radio" id="star2" name="rating" value="2"  /><label class = "full" for="star2" title="Kinda bad - 2 stars"></label>
    <input type="radio" id="star1half" name="rating" value="1 and a half"  /><label class="half" for="star1half" title="Meh - 1.5 stars"></label>
    <input type="radio" id="star1" name="rating" value="1"  /><label class = "full" for="star1" title="Sucks big time - 1 star"></label>
    <input type="radio" id="starhalf" name="rating" value="half" /><label class="half" for="starhalf" title="Sucks big time - 0.5 stars"></label>
</fieldset></div>
            </div>
          </div>

          <!-- About Me Box -->
          <div class="panel panel-success">
            <div class="panel-heading">
              <h3 class="panel-title text-center">About Me</h3>
            </div>
            <!-- /.box-header -->
            <div class="panel-body">
              <strong><i class="fa fa-phone margin-r-5"></i> Contact Number</strong>
              <p class="text-muted">
                <?php echo $contact ?>
              </p>
              <hr>

              <strong><i class="fa fa-map-marker margin-r-5"></i> Address</strong>

              <p class="text-muted"><?php echo $userloc ?></p>

              <hr>

              <strong><i class="margin-r-5">@</i> Email Address</strong>

              <p class="text-muted"><?php echo $useremail ?></p>
              <hr>

              <strong><i class="fa fa-birthday-cake"></i> Birthday</strong>

              <p class="text-muted"><?php echo $userbday ?></p>
            </div>
            <!-- /.box-body -->
          </div>
          <!-- /.box -->
        </div>
        <!-- /.col -->
        <div class="col-md-9">
          <div class="panel panel-success">
          <div class="panel-heading">
            <div class="panel-title text-center"><h3 >Activity</h3></div>
          </div>
          <div class="panel-body">
            <?php 
  $productsearch = "SELECT *,p.product_description as descript FROM product_tbl p LEFT OUTER JOIN user_tbl u ON p.product_user_id=u.user_id LEFT OUTER JOIN producttype_tbl t ON t.producttype_id = p.product_type_id LEFT OUTER JOIN product_status s ON p.product_status = s.productstatus_id WHERE p.product_user_id = $accountid";
  $productquery = $connect->query($productsearch);
  while($productsearch = mysqli_fetch_array($productquery)){
  ?>
  
  <div class="col-sm-12 myitem" id="<?php echo $productsearch['product_name'] ?>"  >
  <hr>
     <div class="col-md-4 thumbnail">
    
      <img src="prod-img/<?php echo $productsearch['product_img'] ?>" alt="" >
    </div>
      <div class="col-md-8">
      
        

        <h5>Product Name: <big><?php echo $productsearch['product_name'] ?></big></h5>
        <p>Description:  <big><?php echo $productsearch['descript'] ?></big></p>
        <p>Fixed Price:  <big><?php echo $productsearch['product_fixedprice'] ?></big></p>
        <p>Status: 
        <?php 
        $pid = $productsearch['product_id'];
          $checkSoldStr = "SELECT * FROM transactfinal_tbl WHERE product_id = $pid";
          $checkSoldQry = $connect->query($checkSoldStr);
          $checkSold = mysqli_num_rows($checkSoldQry);
          if($checkSold==1)
          {
            echo 'Sold';
            
          }
          else
          {
            $checkAvail = $productsearch['product_status'];
            if($checkAvail == 2)
            {
              echo 'Available';
            }
            else if($checkAvail == 4)
            {
              echo 'Expired';
              ?>
              
              <?php
            }
            else if($checkAvail == 5)
            {
              echo 'Rejected';
            }
            else
            {
              echo 'Not yet activated';
            }
          }
         ?>
        </p>
      
       
</div>
    
    
  </div>

  <?php
}
  ?>
  </div>
          </div>
          </div>
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
  

  <script type="text/javascript">
    $(document).ready(function(){
       $("#wizard-picture").change(function(){
        readURL(this);
    });
    });
  </script>
<script type="text/javascript">
  
  var free = document.getElementById('free');
  var premium = document.getElementById('premium');
  function featuresChange(val)
  {
  if(val==1)
  {
         document.getElementById('free1').className='choice active';
    document.getElementById('premium1').className="choice";
    premium.checked=false;
    free.checked=true;
        
  }
  else if(val==2)
  {
    
     document.getElementById('premium1').className='choice active';
    document.getElementById('free1').className="choice";
    premium.checked=true;
    free.checked=false;
        
  }
  
  }
  

</script>

</body>


 
  

  
</html>