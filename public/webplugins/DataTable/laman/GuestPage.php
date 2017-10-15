<?php 
include 'dbcon.php';
  
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
              <a class="navbar-brand" href="guestpage.php">Auction<sup>3</sup></a>
            </div>
        
            <!-- Collect the nav links, forms, and other content for toggling -->
            <div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1">
              <ul class="nav navbar-nav">
                <li><a href="guestpage.php">Home</a></li>
                <li class="dropdown">
                      <a href="#" class="dropdown-toggle" data-toggle="dropdown">Product<b class="caret"></b></a>
                      <ul class="dropdown-menu">
                        <li><a href="index.php">Buy Product</a></li>
                      
                      <li><a href="index.php">Sell product</a></li>
                      
                      
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
             
              <ul class="nav navbar-nav navbar-right">
              <li><a class="btn btn-default btn-simple" href="registration.php" >Register</a></li>
                    <li><a class="btn btn-default btn-round" href="index.php">Sign in</a></li>
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

  $productsearch = "SELECT * FROM product_tbl p LEFT OUTER JOIN user_tbl u ON p.product_user_id=u.user_id LEFT OUTER JOIN producttype_tbl t ON t.producttype_id = p.product_type_id LEFT OUTER JOIN product_status s ON p.product_status = s.productstatus_id  WHERE p.product_status = 2";
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
        <form action="index.php" method="POST">
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
