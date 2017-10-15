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
      header('location:admin/adminpage.php');
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
<script type="text/javascript">
    $(document).ready(function()
    {
        $('#searchbar').on('input keyup paste',function(){
        if($(this).val()!="")
        {
          $('.products').hide();
          $('.products').each(function()
            {
              var searchValue = $('#searchbar').val();
              var searchFrom = $(this).attr('id');
              if(searchFrom.toUpperCase().indexOf(searchValue.toUpperCase())!= -1)
              {
                $(this).show();
              }
            });
        }
        else if($(this).val()=="")
        {
          $('.products').show();
        }
        else
        {
          $('.products').hide();

        }
      });

      $('#mysearchbar').on('input keyup paste',function(){
        if($(this).val()!="")
        {
          $('.myitem').hide();
          $('.myitem').each(function()
            {
              var searchValue = $('#mysearchbar').val();
              var searchFrom = $(this).attr('id');
              if(searchFrom.toUpperCase().indexOf(searchValue.toUpperCase())!= -1)
              {
                $(this).show();
              }
            });
        }
        else if($(this).val()=="")
        {
          $('.myitem').show();
        }
        else
        {
          $('.myitem').hide();
        }
      });

    });
</script>
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
        
    <nav class="navbar navbar-fixed-top navbar-transparent navbar-ct-green " role="navigation">
          
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
              $checkvalidity = "SELECT *,product_tbl.product_id as id FROM product_tbl LEFT OUTER JOIN product_status on product_tbl.product_status = product_status.productstatus_id LEFT OUTER JOIN user_tbl on user_tbl.user_id = product_tbl.product_user_id LEFT OUTER JOIN producttype_tbl t ON t.producttype_id = product_tbl.product_type_id LEFT OUTER JOIN biddingtrans_tbl b ON b.product_id = product_tbl.product_id WHERE product_status.productstatus_id = 2";
              $queryvalidity = $connect->query($checkvalidity);
              $prod_details= array();
              while($checkvalidity=mysqli_fetch_array($queryvalidity)){
                $prod_details[] = array(
                  'id'  =>  $checkvalidity['id'],
                  'status'  =>  $checkvalidity['product_status'],
                  'time'  =>  $checkvalidity['product_init_time'],
                  'type'  =>  $checkvalidity['product_type_id'],
                  'duration'  =>  $checkvalidity['producttype_default_duration'],
                  'bid_id'  => $checkvalidity['bid_id']
                  );
              }
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
                $bid_id = $details['bid_id'];
                $check_date =$year.'-'.$month.'-'.$validity.' '.$hours.':'.$minute.':'.$seconds;
                date_default_timezone_set('Singapore');
                $current_date =date('Y-m-d H:i:s');
                  if($check_date < $current_date)
                 {
                  if($bid_id==null||$bid_id == "")
                  {

                    echo "<script>alert('$idd')</script>";
                    $change_prod_stat = "UPDATE product_tbl SET product_status = 4 WHERE product_id = $idd";
                    $product_change_query = $connect->query($change_prod_stat);
                  }
                  else
                  {
                    $query = "SELECT *,CONCAT(user_fname,' ',user_lname) as name FROM biddingtrans_tbl b,user_tbl u,product_tbl p WHERE b.seller_id = p.product_user_id and u.user_id = b.bidder_id and b.product_id = p.product_id and b.product_id = $idd ORDER BY transact_date ASC";
                     $result = $connect->query($query);
                     if(mysqli_num_rows($result)>0)
                       {
                        echo '<script>alert("BID")</script>';
                        $change_prod_stat = "UPDATE product_tbl SET product_status = 3 WHERE product_id = $idd";
                        $product_change_query = $connect->query($change_prod_stat);
                        while($finalTransact = mysqli_fetch_array($result))
                        {
                          $finalSeller_id =   $finalTransact['seller_id'];
                          $finalBidder_id =   $finalTransact['bidder_id'];
                          $finalProd_id   =   $finalTransact['product_id'];
                          $finalBid_id    =   $finalTransact['bid_id'];
                          $finalPrice     =   $finalTransact['transact_price'];
                          $finalDate      =   $finalTransact['transact_date'];
                          
                        }
                        $finalTransStr = "INSERT INTO transactfinal_tbl(seller_id,bidder_id,product_id,bid_id,last_price,trans_date) VALUES($finalSeller_id,$finalBidder_id,$finalProd_id,$finalBid_id,$finalPrice,'$finalDate')";
                        $finalTransQry = $connect->query($finalTransStr);

                       }
                       else
                       {
                        echo '<script>alert("NO BID1")</script>';
                        $change_prod_stat = "UPDATE product_tbl SET product_status = 4 WHERE product_id = $idd";
                        $product_change_query = $connect->query($change_prod_stat);
                        }
                  }
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
     

           <div class='blurred-container'>

        <div class="motto">
        <div class="border no-right-border">1</div><div class="border no-right-border">2</div><div class="border">3</div>
            <div style="margin-left: -30px">Auction!</div>
            
            
            
        </div>
        <div class="img-src" style="background-image: url('assets/img/bg1.jpg')"></div>
        <div class='img-src blur' style="background-image: url('assets/img/cover_4_blur.jpg')"></div>
    </div>
    
    </div><!--  end navbar -->

</div> <!-- end menu-dropdown -->
<div class="main">
<br><br>
<div class="content" style="">
<div class="container">


  <div class="col-md-12 row">
  <div class="panel panel-success">
    <div class="panel-heading">
      <h4 class="text-center">Items for auction</h4>
    </div>
    <div class="panel-body">
    <div class="input-group">
  <input type="text" class="form-control input-lg" placeholder="Search products..." style="border-radius: 23px;" id="searchbar">
  <span class="input-group-addon input-lg" style="border-radius: 23px; border-color: white;"><i class="fa fa-search" aria-hidden="true"></i></span>
</div>
  <br>
     <div class="col-md-12 row">
  <?php 

  $productsearch = "SELECT * FROM product_tbl p LEFT OUTER JOIN user_tbl u ON p.product_user_id=u.user_id LEFT OUTER JOIN producttype_tbl t ON t.producttype_id = p.product_type_id LEFT OUTER JOIN product_status s ON p.product_status = s.productstatus_id  WHERE p.product_status = 2 and p.product_user_id <> $id";
  $productquery = $connect->query($productsearch);
  while($productsearch = mysqli_fetch_array($productquery)){


    $loopproductID = $productsearch['product_id'];

  $whileProducts = "SELECT * FROM product_tbl p LEFT OUTER JOIN user_tbl u ON p.product_user_id=u.user_id LEFT OUTER JOIN producttype_tbl t ON t.producttype_id = p.product_type_id LEFT OUTER JOIN product_status s ON p.product_status = s.productstatus_id LEFT OUTER JOIN biddingtrans_tbl b ON b.product_id = p.product_id WHERE p.product_status = 2 AND p.product_id = $loopproductID";
  $prod_results = $connect->query($whileProducts);

  while ($whileProducts = mysqli_fetch_array($prod_results)){
    $init = $whileProducts['product_init_price'];
    $highestbid = $whileProducts['transact_price'];
  }
  $loopbiddersstring = "SELECT * FROM biddingtrans_tbl b WHERE product_id = $loopproductID";
  $loopbidderquery = $connect->query($loopbiddersstring);
  $loopbidder = mysqli_num_rows($loopbidderquery);
  



  ?>
  <div class="col-sm-12 col-md-3 products" id="<?php echo $productsearch['product_name'] ?>"  >
    <div class="thumbnail" >
      <img src="prod-img/<?php echo $productsearch['product_img'] ?>" alt="" >
      <div class="caption">
        <center>
        
        <h5>Product Name: <?php echo $productsearch['product_name'] ?></h5>
        Seller: <?php echo $productsearch['user_fname'].' '.$productsearch['user_lname'] ?><br>
        Fixed Price: <?php echo $productsearch['product_fixedprice'] ?><br>
        Number of bids: <?php echo $loopbidder ?><br>
        Current Price: <?php if($highestbid == null || $highestbid == 0){echo $init;}else{echo $highestbid;} ?> pesos<br>
        Duration: <?php echo $productsearch['producttype_default_duration'] ?> day/s<br>
        <small>Description: <?php echo $productsearch['product_description'] ?> </small><br>
        
        </center>
        <form action="viewproduct_info.php" method="POST">
        <input type="text" name="product_id" value="<?php echo $productsearch['product_id'] ?>" class="hidden">
        <button type="submit" class="btn btn-success btn-fill btn-sm col-md-offset-2"  >Buy this Product <i class="fa fa-cart-plus"></i></button>
        </form>
      </div>
    </div>
  </div>  
  <?php
}
  ?>
 
</div>
    </div>
  </div>
 
</div>

    <div class="space-200"></div>
    <div class="col-md-12 row">
      <div class="panel panel-success">
        <div class="panel-heading">
          <h4 class="text-center">My products</h4>
        </div>
        <div class="panel-body">
        <div class="input-group">
  <input type="text" class="form-control input-lg" placeholder="Search products..." style="border-radius: 23px;" id="mysearchbar">
  <span class="input-group-addon input-lg" style="border-radius: 23px; border-color: white;"><i class="fa fa-search" aria-hidden="true"></i></span>
</div>
  <br>

          <?php 
  $productsearch = "SELECT * FROM product_tbl p LEFT OUTER JOIN user_tbl u ON p.product_user_id=u.user_id LEFT OUTER JOIN producttype_tbl t ON t.producttype_id = p.product_type_id LEFT OUTER JOIN product_status s ON p.product_status = s.productstatus_id WHERE p.product_user_id = $id";
  $productquery = $connect->query($productsearch);
  while($productsearch = mysqli_fetch_array($productquery)){
  ?>
  
  <div class="col-sm-12 col-md-3 myitem" id="<?php echo $productsearch['product_name'] ?>"  >
     
    <div class="thumbnail" >
      <img src="prod-img/<?php echo $productsearch['product_img'] ?>" alt="" >
      <div class="caption">
        <center>

        <h5>Product Name: <?php echo $productsearch['product_name'] ?></h5>
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
              <form action="reactivate_product.php" method="POST">
                <input type="text" name="product_id" value="<?php echo $productsearch['product_id'] ?>" class="hidden">
                <button type="submit" class="btn btn-success btn-fill btn-sm ">Ask For Reactivation<i class="fa fa-recycle"></i></button>
              </form>
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
        </center>
        
      </div>

    </div>
    
  </div>

  <?php
}
  ?>
 
        </div>
      </div>
    </div>
    
</div>


</div></div>

<!-- end main -->
  <script src="jquery/jquery-1.10.2.js" type="text/javascript"></script>
  <script src="assets/js/jquery-ui-1.10.4.custom.min.js" type="text/javascript"></script>

  <script src="bootstrap3/js/bootstrap.js" type="text/javascript"></script>
  <script src="assets/js/gsdk-checkbox.js"></script>
  <script src="assets/js/gsdk-radio.js"></script>
  <script src="assets/js/gsdk-bootstrapswitch.js"></script>
  <script src="assets/js/get-shit-done.js"></script>
    <script src="assets/js/custom.js"></script>
  
    <script src="assets/js/custom.js"></script>
<script type="text/javascript">
    $('.carousel').carousel({
      interval: 2000
    });
</script>
</body>


</html>
