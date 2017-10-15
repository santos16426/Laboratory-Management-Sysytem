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
</head>

<body>
 <div id="navbar-full">
    <div id="navbar">
    <!--    
        navbar-default can be changed with navbar-ct-blue navbar-ct-azzure navbar-ct-red navbar-ct-green navbar-ct-orange  
        -->
        <nav class="navbar navbar-fixed-top navbar-ct-green ">
          
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
                <li class="dropdown">
                <li><a href="guestpage.php">Home</a></li>
                      <a href="#" class="dropdown-toggle" data-toggle="dropdown">Product<b class="caret"></b></a>
                      <ul class="dropdown-menu">
                        <li><a href="guestpage.php">View Product</a></li>
                      <li><a href="index.php">Sell product</a></li>
                      
                      </ul>
                </li>
              </ul>
               <form class="navbar-form navbar-left navbar-search-form" role="search">                  
                 <div class="form-group">
                      <input type="text" value="" class="form-control" placeholder="Search..." style="color: white; background-color: transparent;">
                 </div> 
              </form>
              <ul class="nav navbar-nav navbar-right">
                    
                    
                    <li><a class="btn btn-default btn-round" href="index.php">Sign in</a></li>
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
        <div class="col-sm-12">
        <div class="space-100"></div>
        
        <?php
       
        if(isset($_GET['feedback']))
        {
         if($_GET['feedback']=='error')
        {
          ?>
          <div class="alert alert-danger" role="alert"> <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button>Failed to create your account, try again later</div>
          <?php
        }
        else if($_GET['feedback']=='success')
        {
          ?>
          <div class="alert alert-success" role="alert"> <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button>Successfully created your account</div>
          <?php
        }
        }
        else

        ?>

        
        <form action="save_user.php" method="POST" enctype="multipart/form-data">
          <div class="panel panel-info">
          <div class="panel-heading panel-success"><h3><center>Create an Account</center></h3></div>
            <div class="panel-body">
            <fieldset>
            <legend>Basic information</legend>
               <div class=""  id ="part1">
                  <div class="col-sm-12">
                
                    <div class="col-md-10">
                      <div class="col-md-5">
                        <div class="form-group form-animate-text">
                          <input type="text" class="form-text"  name="fname" required>
                          <span class="bar"></span>
                          <label>First Name<sup style="color: red">*</sup></label>
                        </div>
                      </div>
                      <div class="col-md-3"  >
                        <div class="form-group form-animate-text">
                          <input type="text" class="form-text"  name="mname">
                          <span class="bar"></span>
                          <label>Middle Name</label>
                        </div>
                      </div>
                      <div class="col-md-4">
                        <div class="form-group form-animate-text">
                          <input type="text" class="form-text"  name="lname" required>
                          <span class="bar"></span>
                          <label>Last Name<sup style="color: red">*</sup></label>
                        </div>
                      </div>  
                      <div class="col-md-6">
                        <div class="form-group form-animate-text">
                          <input type="date" class="form-text"   id="datePicker" name="bday" required>
                          <span class="bar"></span>
                          <label>Date of Birth<sup style="color: red">*</sup></label>
                        </div>
                      </div>
                      <div class="col-md-6">
                        <div class="form-group form-animate-text">
                          <input type="text" class="form-text" id="validate_firstname" name="contact_number" required>
                          <span class="bar"></span>
                          <label>Contact Number<sup style="color: red">*</sup></label>
                        </div>
                      </div>
                    </div>
                    <div class="col-md-2">
                      <div class="picture-container">
                        <div class="picture">
                            <img src="prod-img/default.png" class="picture-src" id="wizardPicturePreview" title="" >
                            <input type="file" id="wizard-picture" name="img" accept="image/gif, image/jpeg, image/png">
                        </div>
                        <h6>Upload your picture</h6>
                    </div>
                  </div>
                      <div class="col-md-5">
                        <label for='optionsRadios2'>Gender<sup style="color: red">*</sup></label>
                        <label class="col-sm-offset-1 form-group radio ct-green">
                        <input class="form-group" type="radio" name="gender" data-toggle="radio" value=1 checked>
                        Male
                        </label>
                        <label class="col-sm-offset-1 form-group radio ct-green">
                        <input class="form-group" type="radio" name="gender" data-toggle="radio"  value=2>
                        Female
                        </label>
                      </div>
                      <div class="col-md-5">
                        <div class="form-group form-animate-text">
                          <input type="text" class="form-text" id="address" name="address" required>
                          <span class="bar"></span>
                          <label>Address<sup style="color: red">*</sup></label>
                        </div>
                      </div>
                    
                  </div>
                </div>
                </fieldset>
                <div class="space-50"></div>
                <fieldset>
                <legend>Account Details</legend>
                 <div  id ="part2">
                <div class="col-sm-6 col-sm-offset-3">
                  <div class="form-group form-animate-text">
                    <input type="email" class="form-text"  name="email" required>
                    <span class="bar"></span>
                    <label >Email Address<sup style="color: red">*</sup></label>
                  </div>
                </div>
                <div class="col-sm-6 col-sm-offset-3">
                  <div class="form-group form-animate-text">
                    <input type="password" class="form-text"  name="password" required>
                    <span class="bar"></span>
                    <label>Password<sup style="color: red">*</sup></label>
                  </div>
                </div>
               <div class="col-sm-6 col-sm-offset-3">
                  <div class="form-group form-animate-text">
                    <input type="password" class="form-text"  name="confirmpassword" required>
                    <span class="bar"></span>
                    <label>Confirm Password<sup style="color: red">*</sup></label>
                  </div>
                </div>
              </div>
              </fieldset>
              <div class="space-50"></div>
              <fieldset>
              <legend>Features</legend>
              
               <div  id="part3" class="cardss">
                                   
                  
                  <div class="col-sm-10 col-sm-offset-1">
                      <div class="col-sm-6">
                          <div class="choice active" id="free1" data-toggle="wizard-radio" onclick="featuresChange(1)">
                              <input type="radio" name="jobb" value=1 id="free" >
                              <div class="icon">
                                  <i class="fa fa-lock"></i>
                              </div>
                              <h6>Free</h6>
                              <p>
                                <p>Grants limited access to some features of this <br>system.</p>
                              </p>
                          </div>
                      </div>
                    
                      <div class="col-sm-6">
                          <div class="choice" data-toggle="wizard-radio" id="premium1"  onclick="featuresChange(2)">
                              <input type="radio" name="jobb" value=2 id="premium" >
                              <div class="icon" >
                                  <i class="fa fa-unlock"></i>
                              </div>
                              <h6>Premium</h6>
                              <p>Grants full access to all features of this <br>system.</p>
                          </div>
                          
                      </div>
                  </div>
                  <div class="col-md-10 col-sm-offset-1" id="credit_cart" >
                    <div class="space-50"></div>
                    <div class="col-md-8 col-md-offset-2">
                  <div class="form-group form-animate-text">
                    <input type="text" class="form-text"  name="credit number" >
                    <span class="bar"></span>
                    <label>Credit Card Number<sup style="color: red">*</sup></label>
                  </div>
                </div>
                <div class="col-md-3 col-md-offset-2">
                  <div class="form-group form-animate-text">
                    <input type="number" class="form-text"  name="credit number" >
                    <span class="bar"></span>
                    <label>Security Code<sup style="color: red">*</sup></label>
                  </div>
                </div>
                <div class="col-md-4 col-md-offset-1">
                  <div class="form-group form-animate-text">
                    <input type="text" class="form-text"  name="credit number" >
                    <span class="bar"></span>
                    <label>Expiry<sup style="color: red">*</sup></label>
                  </div>
                </div>
                <div class="col-md-3 col-md-offset-2">
                  <div class="form-group">
                    <input type="checkbox" name="Terms and condition" > <a data-toggle="modal" href="#myModal">Accept terms and condition</a>
                    
                  </div>
                </div>
                <div cla
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
  

  <script type="text/javascript">
    $(document).ready(function(){
       $("#wizard-picture").change(function(){
        readURL(this);
    });
    });
  </script>
<script type="text/javascript">
  $('#credit_cart').hide();
  var free = document.getElementById('free');
  var premium = document.getElementById('premium');
  function featuresChange(val)
  {
  if(val==1)
  {
    $('#credit_cart').hide();
         document.getElementById('free1').className='choice active';
    document.getElementById('premium1').className="choice";
    premium.checked=false;
    free.checked=true;
        
  }
  else if(val==2)
  {
    $('#credit_cart').show();
     document.getElementById('premium1').className='choice active';
    document.getElementById('free1').className="choice";
    premium.checked=true;
    free.checked=false;
        
  }
  
  }
  

</script>

</body>


 
  

  
</html>