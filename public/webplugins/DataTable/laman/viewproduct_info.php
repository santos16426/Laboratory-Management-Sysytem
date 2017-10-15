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
    if($_POST['product_id']==null||$_POST['product_id']=='')
    {
      header('location:products.php');
    }
  $id = $_SESSION['id'];
  $type = $_SESSION['type'];
  $emp_details = "SELECT * FROM user_tbl WHERE user_id = $id";
  $result = $connect->query($emp_details);
  while ($emp_details = mysqli_fetch_array($result)) {
    $emp_name = $emp_details['user_fname'].' '.$emp_details['user_lname'];
    $type_id =$emp_details['user_feature_id'];
  }
  $product_id = $_POST['product_id'];
  $prod_details = "SELECT * FROM product_tbl p LEFT OUTER JOIN user_tbl u ON p.product_user_id=u.user_id LEFT OUTER JOIN producttype_tbl t ON t.producttype_id = p.product_type_id LEFT OUTER JOIN product_status s ON p.product_status = s.productstatus_id LEFT OUTER JOIN biddingtrans_tbl b ON b.product_id = p.product_id WHERE p.product_status = 2 AND p.product_id = $product_id";
  $prod_results = $connect->query($prod_details);

  while ($prod_details = mysqli_fetch_array($prod_results)) {
    $prodid = $prod_details['product_id'];
    $produserid = $prod_details['product_user_id'];
    $prodname = $prod_details['product_name'];
    $sellername = $prod_details['user_fname'].' '.$prod_details['user_lname'];
    $initprice = $prod_details['product_init_price'];
    $fixedprice = $prod_details['product_fixedprice'];
    $defaultduratation = $prod_details['producttype_default_duration'];
    $proddescription = $prod_details['product_description'];
    $img = $prod_details['product_img'];
    $highestbid = $prod_details['transact_price'];
  }
  $countbiddersstring = "SELECT * FROM biddingtrans_tbl b WHERE product_id = $product_id";
  $countbidderquery = $connect->query($countbiddersstring);
  $countbidder = mysqli_num_rows($countbidderquery);
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
              $checkvalidity = "SELECT * FROM product_tbl LEFT OUTER JOIN product_status on product_tbl.product_status = product_status.productstatus_id LEFT OUTER JOIN user_tbl on user_tbl.user_id = product_tbl.product_user_id LEFT OUTER JOIN producttype_tbl t ON t.producttype_id = product_tbl.product_type_id LEFT OUTER JOIN biddingtrans_tbl b ON b.product_id = product_tbl.product_id WHERE product_status.productstatus_id = 2";
              $queryvalidity = $connect->query($checkvalidity);
              $prod_details= array();
              while($checkvalidity=mysqli_fetch_array($queryvalidity)):{
                $prod_details[] = array(
                  'bid_id'  =>  $checkvalidity['bid_id'],
                  'id'  =>  $checkvalidity['product_id'],
                  'status'  =>  $checkvalidity['product_status'],
                  'time'  =>  $checkvalidity['product_init_time'],
                  'type'  =>  $checkvalidity['product_type_id'],
                  'duration'  =>  $checkvalidity['producttype_default_duration']
                  );
              }endwhile;
              foreach ($prod_details as $details) {
                $idd = $details['id'];
                $bid_id = $details['bid_id'];
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
                  if($bid_id==null||$bid_id == "")
                  {
                    $change_prod_stat = "UPDATE product_tbl SET product_status = 4 WHERE product_id = $idd";
                    $product_change_query = $connect->query($change_prod_stat);
                  }
                  else
                  {

                    $change_prod_stat = "UPDATE product_tbl SET product_status = 3 WHERE product_id = $idd";
                    $product_change_query = $connect->query($change_prod_stat);
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
<div class="col-md-12">
  <div class="col-md-12 thumbnail" >
      <div class="col-md-3"><img src="prod-img/<?php echo $img ?>" alt="" class="img-thumbnail" style="width: 100%;height: 100%"></div>
      <div class="col-md-4">
        
        
        
        <h4><small>Product Name:</small> <?php echo $prodname ?></h4>
        <form action="userprofile.php" method="POST"><h5><small>Seller Name:</small> <?php echo $sellername ?>&nbsp;<input type="text" name="id" class="hidden" value="<?php echo $produserid ?>"><button class="btn btn-xs btn-fill btn-info">Go to profile <i class="fa fa-info-circle"></i></button></h5></form>
        <h5><small>Number of Bidders:</small> <?php echo $countbidder ?> &nbsp;<button onclick="showHideBidList(document.getElementById('bidderList').className);" class="btn btn-warning btn-fill btn-xs " role="button">Show bidders <i class="fa fa-info-circle"></i></button></h5>
        <h5><small>Highest Bidding Price:</small>&nbsp;<?php if($highestbid == null || $highestbid == 0){echo 0;}else{echo $highestbid;} ?> &nbsp;<button onclick="showHideBidForm(document.getElementById('biddingform').className);" class="btn btn-success btn-fill btn-xs " role="button">Place your bid <i class="fa fa-hand-paper-o"></i></button></h5>
        <h5><small>Initial Price:</small> <?php echo $initprice ?></h5>
        <h5><small>Fixed Price:</small> <?php echo $fixedprice ?> <button onclick="showHideBuy(document.getElementById('buyProduct').className);" class="btn btn-danger btn-fill btn-xs" role="button">Buy using this price <i class="fa fa-money"></i></button></h5>
        <h5><small>Duration: </small> <?php echo $defaultduratation ?> day/s</h5>
        <h5><small>Description:</small> <?php echo $proddescription ?></h5>
        
        
        
       
      
      </div>


      <div class="col-md-5" >
        <div class="col-md-12 hidden" id="biddingform">
        <br><br>
        
          <div class="panel panel-success">
            <div class="panel-heading">
              <div class="text-center">Place your bid</div>
            </div>
            <div class="panel-body">
              <form class="form-horizontal" id="bidForm" name="bidForm" action="placeBid.php" method="POST">
               <input type="text" name="bidder_id" value="<?php echo $id ?>" class="hidden">
               <input type="text" name="seller_id" value="<?php echo $produserid ?>" class="hidden">
               <input type="text" name="product_id" value="<?php echo $product_id ?>" class="hidden">
               <label style="">Current Price: </label>
                 <big><big><b> <?php if($highestbid == null || $highestbid == 0){echo $initprice;}else{echo $highestbid;} ?></b></big></big>
                <br>
                <br>
                <div class="form-group form-animate-text col-md-12">
                  <input type="number" class="form-text" name="transact_price" required min="<?php if($highestbid == null || $highestbid == 0){echo $initprice+1;}else{echo $highestbid+1;} ?>" max="<?php echo $fixedprice-1 ?>">
                  <span class="bar"></span>
                  <label>Bid<sup style="color: red">*</sup></label>
                </div>
                <button type="submit" class="btn btn-wd btn-success btn-fill col-md-12">Place bid</button>
              </form>
            </div>
          </div>
        </div>
      </div>
       <div class="col-md-5" >
        <div class="col-md-12 hidden" id="buyProduct">
        <br><br>
        
          <div class="panel panel-danger">
            <div class="panel-heading">
              <div class="text-center">Buy Product</div>
            </div>
            <div class="panel-body">
               <form class="form-horizontal" id="bidForm" name="bidForm" action="directlyBuy.php" method="POST">
               <input type="text" name="bidder_id" value="<?php echo $id ?>" class="hidden">
               <input type="text" name="seller_id" value="<?php echo $produserid ?>" class="hidden">
               <input type="text" name="product_id" value="<?php echo $product_id ?>" class="hidden">
               <input type="text" name="price" value="<?php if($highestbid == null || $highestbid == 0){echo $initprice;}else{echo $highestbid;} ?>" class="hidden">
               <center><label style="">Current Price: </label>
                 <big><big><b> <?php if($highestbid == null || $highestbid == 0){echo $initprice;}else{echo $highestbid;} ?></b></big></big>
                <br>
                <br></center>
             
                <button type="submit" class="btn btn-wd btn-danger btn-fill col-md-12">Buy</button>
              </form>
            </div>
          </div>
        </div>
      </div>  
      <div class="col-md-5" >
        <div class="col-md-12 hidden" id="bidderList">
        <br><br>
        
          <div class="panel panel-warning">
            <div class="panel-heading">
              <div class="text-center">Bidders</div>
            </div>
            <div class="panel-body">
              <table class="table table-hover">
                <thead>
                  <tr>
                    <th>Name</th>
                    <th>Price</th>
                    <th>Date</th>
                  </tr>
                </thead>
                <tbody>

                <?php 
                
                $query = "SELECT *,CONCAT(user_fname,' ',user_lname) as name FROM biddingtrans_tbl b,user_tbl u,product_tbl p WHERE b.seller_id = p.product_user_id and u.user_id = b.bidder_id and b.product_id = p.product_id and b.product_id = $product_id ORDER BY transact_date Desc";
                $result = $connect->query($query);
                if(mysqli_num_rows($result)>0)
                {

                while($query = mysqli_fetch_array($result)):{
                  ?>
                  <tr>
                  <td><?php echo $query['name'] ?></td>
                  <td><?php echo $query['transact_price'] ?></td>
                  <td><?php echo $query['transact_date'] ?></td>
                  </tr>
                  <?php
                }endwhile;
                }
                else
                {
                  ?>
                  <tr>
                    <td colspan="3" class="text-center">
                      No bidding yet
                    </td>
                  </tr>
                  <?php
                }

                 ?>


                  
                    
                  
                </tbody>
              </table>
            </div>
          </div>
        </div>
      </div>
    </div>
</div>
    
  
<div class="input-group">
  <input type="text" class="form-control input-lg" placeholder="Search products..." style="border-radius: 23px;" id="searchbar">
  <span class="input-group-addon input-lg" style="border-radius: 23px; border-color: white;"><i class="fa fa-search" aria-hidden="true"></i></span>
</div>
  <br>
  <div class="col-md-12 row">
  <?php 

  $productsearch = "SELECT * FROM product_tbl p LEFT OUTER JOIN user_tbl u ON p.product_user_id=u.user_id LEFT OUTER JOIN producttype_tbl t ON t.producttype_id = p.product_type_id LEFT OUTER JOIN product_status s ON p.product_status = s.productstatus_id  WHERE p.product_status = 2 and p.product_user_id <> $id";
  $productquery = $connect->query($productsearch);
  while($productsearch = mysqli_fetch_array($productquery)):{


    $loopproductID = $productsearch['product_id'];

  $whileProducts = "SELECT * FROM product_tbl p LEFT OUTER JOIN user_tbl u ON p.product_user_id=u.user_id LEFT OUTER JOIN producttype_tbl t ON t.producttype_id = p.product_type_id LEFT OUTER JOIN product_status s ON p.product_status = s.productstatus_id LEFT OUTER JOIN biddingtrans_tbl b ON b.product_id = p.product_id WHERE p.product_status = 2 AND p.product_id = $loopproductID";
  $prod_results = $connect->query($whileProducts);

  while ($whileProducts = mysqli_fetch_array($prod_results)) :{
    $init = $whileProducts['product_init_price'];
    $highestbid = $whileProducts['transact_price'];
  }endwhile;
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
}endwhile;
  ?>
 
</div>
    <div class="space-200"></div>
    
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
    function showHideBuy(class3){
        var getclass3 =class3;
        if(getclass3=='col-md-12 hidden')
        {
          
          document.getElementById('buyProduct').className="col-md-12";
        }
        else
        {
          
         document.getElementById('buyProduct').className="col-md-12 hidden"; 
        }
      }
      function showHideBidForm(class1){
        var getclass =class1;
        if(getclass=='col-md-12 hidden')
        {
          document.getElementById('bidForm').transact_price.value="";
          document.getElementById('biddingform').className="col-md-12";
        }
        else
        {
          document.getElementById('bidForm').transact_price.value="";
         document.getElementById('biddingform').className="col-md-12 hidden"; 
        }
      }
      function showHideBidList(class2)
      {
        var getclass2 =class2;
        if(getclass2=='col-md-12 hidden')
        {
          document.getElementById('bidderList').className="col-md-12";
        }
        else
        {
          
         document.getElementById('bidderList').className="col-md-12 hidden"; 
        } 
      }
    </script>
<script type="text/javascript">
    $('.carousel').carousel({
      interval: 2000
    });
</script>
</body>


</html>
