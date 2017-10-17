<!DOCTYPE html>
<html lang="en">

<head>

    <meta charset="utf-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1" />
    <title>GLOBALHEALTH | DIAGNOSTIC CENTER</title>
    <link rel="shortcut icon" href="/icon.ico">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    
    <link rel="stylesheet" href="bootstrapvalidator/dist/css/bootstrapValidator.css"/>
    <link rel="stylesheet" href="{{ asset('/webplugins/assets/css/bootstrap.min.css') }}">
    <link rel="stylesheet" href="{{ asset('/webplugins/assets/css/now-ui-kit.css') }}">
    <link rel="stylesheet" href="{{ asset('/webplugins/assets/css/demo.css') }}">
    <!-- <link rel="stylesheet" href="{{ asset('/webplugins/assets/css/site.min.css') }}">
    <link rel="stylesheet" href="{{ asset('/webplugins/assets/css/animate.css') }}"> -->
    <link href="https://fonts.googleapis.com/css?family=Montserrat:400,700,200" rel="stylesheet" />
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/font-awesome/latest/css/font-awesome.min.css" />
</head>


<style type="text/css">
    p {
    text-indent: 50px;
}
   html,
body {
    height: 100%;
}

.carousel,
.item,
.active {
    height: 100%;
}


.carousel-inner {
    height: 100%;
}


/* Background images are set within the HTML using inline CSS, not here */

.fill {
    width: 100%;
    height: 100%;
    background-position: center;
    -webkit-background-size: cover;
    -moz-background-size: cover;
    background-size: cover;
    -o-background-size: cover;
}
</style>

<style type="text/css">
    .main{background-image: url('/webplugins/assets/img/bg.jpg');};
</style>
<body class="index-page" style="background-image: url('/webplugins/assets/img/bg.jpg');">
    <!-- Navbar -->
    <nav class="navbar navbar-toggleable-md bg-info fixed-top navbar-transparent " color-on-scroll="500">
        <div class="container">
            <div class="navbar-translate">
                <button class="navbar-toggler navbar-toggler-right" type="button" data-toggle="collapse" data-target="#navigation" aria-controls="navigation-index" aria-expanded="false" aria-label="Toggle navigation">
                    <span class="navbar-toggler-bar bar1"></span>
                    <span class="navbar-toggler-bar bar2"></span>
                    <span class="navbar-toggler-bar bar3"></span>
                </button>
                <a class="navbar-brand" href="#home" rel="tooltip"><img src="/webplugins/assets/img/logo.png" style="width: 17%; height: 17%">
                    <strong>GLOBALHEALTH | DIAGNOSTIC CENTER</strong>
                </a>
            </div>
            <div class="collapse navbar-collapse justify-content-end" id="navigation" data-nav-image="/webplugins/assets/img/blurred-image-1.jpg">
            <div id="menu-center">
                <ul class="navbar-nav"> 
                    <li class="nav-item">
                        <a class="nav-link" href="#home">
                            <i class="now-ui-icons shopping_shop"></i>
                            Home
                        </a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="#MS" target="_blank">
                            <i class="now-ui-icons health_ambulance"></i>
                            Services
                        </a>
                    </li>
                     <li class="nav-item">
                        <a class="nav-link" href="#mission">
                            <i class="now-ui-icons travel_info"></i>
                            About us
                        </a>
                    </li>
                    <li class="nav-item">
                           <button class="btn btn-info" data-toggle="modal" data-target="#myModal">
                           <i class="now-ui-icons files_paper"></i>
                                Get Results
                            </button> 
                        </a>
                    </li>
                    
                </ul>
                </div>
            </div>
        </div>
    </nav>
    <!-- End Navbar -->
    <div class="wrapper">
    <section id="home">
        <div id="carousel" style="background-color: black;">
               <center>
                            <div id="carouselExampleControls" class="carousel slide">
                                <ol class="carousel-indicators">
                                    <li data-target="#carouselExampleIndicators" data-slide-to="0" class="active"></li>
                                    <li data-target="#carouselExampleIndicators" data-slide-to="1"></li>
                                    <li data-target="#carouselExampleIndicators" data-slide-to="2"></li>
                                </ol>
                                <div class="carousel-inner" role="listbox">
                                    <div class="carousel-item active">
                                        <img class="d-block" src="/webplugins/assets/img/c1.jpg" alt="First slide">
                                        <div class="carousel-caption d-none d-md-block">
                                            <!--<h5>Nature, United States</h5>-->
                                        </div>
                                    </div>
                                    <div class="carousel-item">
                                        <img class="d-block" src="/webplugins/assets/img/c2.jpg" alt="Second slide">
                                        <div class="carousel-caption d-none d-md-block">
                                           <!-- <h5>Somewhere Beyond, United States</h5>-->
                                        </div>
                                    </div>
                                    <div class="carousel-item">
                                        <img class="d-block" src="/webplugins/assets/img/c3.jpg" alt="Third slide">
                                        <div class="carousel-caption d-none d-md-block">
                                          <!--  <h5>Yellowstone National Park, United States</h5> -->
                                        </div>
                                    </div>
                                </div>
                                <a class="carousel-control-prev" href="#carouselExampleControls" role="button" data-slide="prev">
                                    <i class="now-ui-icons arrows-1_minimal-left"></i>
                                </a>
                                <a class="carousel-control-next" href="#carouselExampleControls" role="button" data-slide="next">
                                    <i class="now-ui-icons arrows-1_minimal-right"></i>
                                </a>
                            </div>
                </center>
            </div>
    </section>
        <!-- <div class="page-header">
            <div class="page-header-image"  style="background-image: url('./assets/img/home1.jpg');">
            </div>
            <div class="container">
                <div class="content-center brand">
                    <img class="n-logo" src="./assets/img/now-logo.png" alt="">
                    <h1 class="h1-seo">Now UI Kit.</h1>
                    <h3>A beautiful Bootstrap 4 UI kit. Yours free.</h3>
                </div>
                <h6 class="category category-absolute">Designed by
                    <a href="http://invisionapp.com/" target="_blank">
                        <img src="./assets/img/invision-white-slim.png" class="invision-logo" />
                    </a>. Coded by
                    <a href="https://www.creative-tim.com" target="_blank">
                        <img src="./assets/img/creative-tim-white-slim2.png" class="creative-tim-logo" />
                    </a>.</h6>
            </div>
        </div> -->
        <div class="main">
          <br>
            <h1 class="text-center">Medical Lab Technology and <br> Diagnostic Imaging at Its Best<br><small class="small">"Results that meet Global Standards"</small></h1><br><br><br>
        
            <center>
                    <div id="images">
                        <div class="row">
                            <div class="col-md-4">
                                <h3>Our Clients</h3>
                                <img src="/webplugins/assets/img/icon_clients.png" alt="Circle Image" class="img-thumbnail img-spin" style="background-color: #F1F0F0; width: 160px">
                         
                            </div>
                            <div class="col-md-4">
                                <h3>Medical Services</h3>
                                <img src="/webplugins/assets/img/icon_services.png" alt="Circle Image" class="img-thumbnail img-spin img-dog" style="background-color: #F1F0F0; width: 160px">
                               
                            </div>
                            <div class="col-md-4">
                                <h3>Contact Us</h3>
                                <img src="/webplugins/assets/img/icon_contact.png" alt="Circle Image" class="img-thumbnail img-spin" style="background-color: #F1F0F0; width: 160px">
                                
                            </div>
                        </div>
                    </div>
            </center>
            <div class="space"></div>
<h1 class="text-center" style="color: #3c8dbc; font-family: Verdana;" ><big><strong>Why Choose Us?</strong></big></h1>
    <div class="container tim-container">
        <div id="extras">
            <div class="space"></div>
            <div class="row">
                <div class="col-md-5 col-sm-offset-1">
                    <div class="text-center">
                        <img src="/webplugins/assets/img/1.jpg" style="height: 330px; width: 500px;border-radius: 5%;" alt="Rounded Image" class="img-thumbnail img-responsive img-dog">
                    </div>
                </div>
               <div class="col-md-7">
                                <h1 class="text-center">Clean and Sanitary Facility</h1>
                                <hr>
                                <p>
                                &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;We have a spacious and comfortable reception area where patients can have free access to computer corner and browse the net or play play games while waiting. 
                                </p>
                  </div>
            </div>
        </div>
    <!--     end extras -->    
    </div>

    <div class="container tim-container">
        <div id="extras">
            <div class="space"></div>
            <div class="row">
            <div class="col-md-7">
                                <h1 class="text-center">Strategic Location</h1>
                                <hr>
                                <p>
                                &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;Located along N. Domingo Street one of the main roads of San Juan City, easily accessible to both private and public utility vehicles. 
                                </p>
                  </div>
                <div class="col-md-5">
                    <div class="text-center">
                        <img src="/webplugins/assets/img/2.jpg" style="height: 330px; width: 500px;border-radius: 5%;" alt="Rounded Image" class="img-thumbnail img-responsive img-dog">
                    </div>
                </div>
                
            </div>
        </div>
    <!--     end extras -->    
    </div>

    <div class="container tim-container">
        <div id="extras">
            <div class="space"></div>
            <div class="row">
                <div class="col-md-5 col-sm-offset-1">
                    <div class="text-center">
                        <img src="/webplugins/assets/img/3.jpg" style="height: 330px; width: 500px;border-radius: 5%;" alt="Rounded Image" class="img-thumbnail img-responsive img-dog">
                    </div>
                </div>
                <div class="col-md-7">
                                <h1 class="text-center">Ten Years of Diagnostic Expertise</h1>
                                <hr>
                                <p>
                                &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;Manned by well trained medical and radiologic technologist supervised and headed by physicians expert in the field of Radiology and pathology. 
                                </p>
                  </div>
            </div>
        </div>
    <!--     end extras -->    
    </div>

    <div class="container tim-container">
        <div id="extras">
            <div class="space"></div>
            <div class="row">
            <div class="col-md-7">
                                <h1 class="text-center">Quality and Reliablity at a Reasonable Price</h1>
                                <hr>
                                <p>
                                &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;Equipped with technologically-updated and fully automated machines equal to that used by medical centers, and consistently ranked EXCELLENT in the annual DO EQAS for chemistry, hematology, serology, and drug testing. 
                                </p>
                  </div>
                <div class="col-md-5">
                    <div class="text-center">
                        <img src="/webplugins/assets/img/qual.jpg" style="height: 330px; width: 500px;border-radius: 5%;" alt="Rounded Image" class="img-thumbnail img-responsive img-dog">
                    </div>
                </div>
                
            </div>
        </div>
    <!--     end extras -->    
    </div>

    <div class="container tim-container">
        <div id="extras">
            <div class="space"></div>
            <div class="row">
                <div class="col-md-5 col-sm-offset-1">
                    <div class="text-center">
                        <img src="/webplugins/assets/img/cc.jpg" style="height: 330px; width: 500px;border-radius: 5%;" alt="Rounded Image" class="img-thumbnail img-responsive img-dog">
                    </div>
                </div>
                <div class="col-md-7">
                                <h1 class="text-center">Excellent Customer Service</h1>
                                <hr>
                                <p>
                                &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;Proficent and pro-patient personnel who will go out of their way to provide outstanding patient care. 
                                </p>
                  </div>
            </div>
        </div>
    <!--     end extras -->    
    </div>

    <div class="container tim-container">
        <div id="extras">
            <div class="space"></div>
            <div class="row">
            <div class="col-md-7">
                                <h1 class="text-center">Physician Owned and Managed</h1>
                                <hr>
                                <p>
                                &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;Run, managed and owned by a team of doctors all practicing in reputable hospitals in Metro Manila who share the same vision of making healthcare economically accessible to all without compromise in quality and reliability. 
                                </p>
                  </div>
                <div class="col-md-5">
                    <div class="text-center">
                        <img src="/webplugins/assets/img/po.png" style="height: 330px; width: 500px;border-radius: 5%;" alt="Rounded Image" class="img-thumbnail img-responsive img-dog">
                    </div>
                </div>
                
            </div>
        </div>
    <!--     end extras -->    
    </div>
<!-- end container -->
<section id="about">

<body class="">
    <!-- Navbar -->
    <div class="main1">
        <div class="wrapper">
            <div class="section" style="background-image: url('assets/img/bg.jpg'); background: fixed;">
                <div class="container">
                    <div class="row">
                        <div class="col-lg-3 col-md-6">
                            <nav class="fixed-section">
                                <ul>
                                    <li>
                                        <h2>Contents</h2>
                                    </li>
                                    <li>
                                        <h3>Services</h3>
                                    </li>
                                    <li>
                                        <a href="#MS">• Clinical Laboratory Test</a>
                                    </li>
                                    <li>
                                        <a href="#GU">• General Ultrasound (3D and 4d)</a>
                                    </li>
                                    <li>
                                        <a href="#xray">• X-ray Services</a>
                                    </li>
                                    <li>
                                        <a href="#DT">• Drug Testing</a>
                                    </li>
                                    <li>
                                        <a href="#inhouse">• In-House and On-Site Pre-Employment</a>
                                    </li>
                                    <li>
                                        <a href="#onsite">• On-Site Annual Medical Exam with Mobile Van</a>
                                    </li>
                                    <li>
                                        <a href="#homeserv">• Home Services</a>
                                    </li>
                                    <br>
                                    <li>
                                      <h3>About Us</h3>  
                                    </li>
                                    <li>
                                        <a href="#mission">• Mission</a>
                                    </li>
                                    <li>
                                        <a href="#vision">• Vision</a>
                                    </li>
                                    <li>
                                        <a href="#schedule">• Schedule & Location</a>
                                    </li>
                                    <li>
                                        <a href="#doctor">• Schedule of Doctors</a>
                                    </li>
                                    <li>
                                        <a href="#qc">• GH - Quezon City Schedule & Location</a>
                                    </li>
                                </ul>
                            </nav>
                        </div>
                        <div class="col-lg-8 col-md-12">
                            
                           <div id="MS"></div>
                           <br>
                            <div class="tim-row tim-row-first">
                                <h2 class="title">Clinical Laboratory Tests</h2>
                                <img src="/webplugins/assets/img/MS.jpg" alt="Raised Image" class="rounded img-raised" style="width: 450px; height: 350;">
                                <legend></legend><br>
                                <p>
                                    To give every Filipino the option to have access to ancillary health procedures at affordable prices with reliability that is at par with global standards.
                                </p>
                                <h4><strong>Medical Services:</strong></h4>
                                 <div class="container tim-container">
                                     <div id="sliders-navigation">
                                        <div class="row">
                                            <div class="col-md-6 ">

                                <div class="panel panel-default" >
                                <div class="panel-heading" role="tab" id="headingOne" style="color: #3c8dbc">
                                  <h4 class="panel-title">
                                    <button role="button" class="btn btn-info" data-toggle="collapse" data-parent="#accordion" href="#collapseOne" aria-expanded="true" aria-controls="collapseOne" style="font-family: 'Source Sans Pro'" data-placement="top" title="Click to minimize or expand.">
                                      HEMATOLOGY
                                    </button>
                                  </h4>
                                </div>
                                <div id="collapseOne" class="panel-collapse collapse in" role="tabpanel" aria-labelledby="headingOne">
                                  <div class="panel-body" style="font-family: 'Source Sans Pro'">
                                    ∙ CBC<br> 
                                    ∙ Platelet Count<br> 
                                    ∙ Peripheral Smear<br>    
                                    ∙ Reticulocyte Count<br>  
                                    ∙ ESR<br> 
                                    ∙ Prothrombin Time<br>    
                                    ∙ APTT<br>
                                    ∙ Blood Typing(ABO-Rh)<br>    
                                    ∙ Malarial Smear<br>  

                                  </div>
                                </div>
                              </div>
                              <div class="panel panel-default">
                                <div class="panel-heading" role="tab" id="headingTwo" style="color: #3c8dbc">
                                  <h4 class="panel-title">
                                    <button  class="btn btn-info" role="button" data-toggle="collapse" data-parent="#accordion" href="#collapseTwo" aria-expanded="false" aria-controls="collapseTwo" style="font-family: 'Source Sans Pro'" data-placement="top" title="Click to minimize or expand.">
                                      MICROBIOLOGY
                                    </button>
                                  </h4>
                                </div>
                                <div id="collapseTwo" class="panel-collapse collapse in" role="tabpanel" aria-labelledby="headingTwo">
                                  <div class="panel-body" style="font-family: 'Source Sans Pro'">
                                    ∙ KOH<br>
                                    ∙ Gram stain<br>
                                    ∙ AFB/DSSM (2 collections)<br>
                                    ∙ Culture and Sensitivuty<br>
                                    ∙ Blood & CSF C/S<br>

                                  </div>
                                </div>
                              </div>
                              <div class="panel panel-default">
                                <div class="panel-heading" role="tab" id="headingThree" style="color: #3c8dbc">
                                  <h4 class="panel-title">
                                    <button  class="btn btn-info" role="button" data-toggle="collapse" data-parent="#accordion" href="#collapseThree" aria-expanded="false" aria-controls="collapseThree" style="font-family: 'Source Sans Pro'" data-placement="top" title="Click to minimize or expand.">
                                      IMMUNOLOGY
                                    </button>
                                  </h4>
                                </div>
                                <div id="collapseThree" class="panel-collapse collapse in" role="tabpanel" aria-labelledby="headingThree">
                                  <div class="panel-body" style="font-family: 'Source Sans Pro'">
                                    <div class="col-md-6">
                                    <strong>Thyroid Function</strong><br>
                                    ∙ T3<br>
                                    ∙ T4<br>
                                    ∙ TSH<br>
                                    ∙ FT3<br>
                                    ∙ FT4<br>
                                    ∙ Thyroglobulin<br><br>

                                    <strong>Cardiac Biomarkers</strong>
                                    ∙ TROPONIN-I<br>
                                    ∙ TROPONIN-T(Quanti)<br>
                                    ∙ CPK Total<br>
                                    ∙ CPK-MB<br>
                                    ∙ CPK-MM<br><br>

                                    <strong>Tumor Markers</strong><br>
                                    ∙ AFP<br>
                                    ∙ CA 125<br>
                                    ∙ CA 15-3<br>
                                    ∙ CA 19-9<br>
                                    ∙ CA 72-4<br>
                                    ∙ CEA<br>
                                    ∙ PSA(total)<br><br>
                                    </div>
                                    <div class="col-md-6">
                                    <strong>Fertility/Hormones</strong><br>
                                    ∙ LH<br>
                                    ∙ FSG<br>
                                    ∙ Prolactin<br>
                                    ∙ Estradiol/Estrogen<br>
                                    ∙ Progesterone<br>
                                    ∙ Cortisol<br>
                                    ∙ Testosterone<br>
                                    ∙ Insulin<br>
                                    ∙ ACTH<br>
                                    ∙ Beta-HCG<br><br>
                                    
                                    <strong>Others:</strong><br>
                                    ∙ Vitamin B12<br>
                                    ∙ Vitamin D<br>
                                    ∙ LDH<br>
                                    ∙ Ferritin<br>
                                    ∙ Transferrin<br>
                                    ∙ Drug Testing<br>
                                    </div>
                                  </div>
                                </div>
                            </div>
                         </div>
                         <div class="col-md-6">     
                          <div class="panel panel-default">
                            <div class="panel-heading" role="tab" id="headingOne2" style="color: #3c8dbc">
                              <h4 class="panel-title">
                                <button role="button" class="btn btn-info" data-toggle="collapse" data-parent="#accordion" href="#collapseOne2" aria-expanded="true" aria-controls="collapseOne2" style="font-family: 'Source Sans Pro'" data-placement="top" title="Click to minimize or expand.">
                                  CLINICAL CHEMISTRY
                                </button>
                              </h4>
                            </div>
                            <div id="collapseOne2" class="panel-collapse collapse in" role="tabpanel" aria-labelledby="headingOne2">
                              <div class="panel-body" style="font-family: 'Source Sans Pro'">
                                <div class="col-md-6">
                                ∙ FBS/RBS/2HR PPBS<br>
                                ∙ OGCT 50grams<br>
                                ∙ OGCT 75grams<br>
                                ∙ OGCT 75grams (2hrs)<br>
                                ∙ OGCT 100grams (3hrs)<br>
                                ∙ HbA1c(EDTA)<br>
                                ∙ Creatinine<br>
                                ∙ BUN<br>
                                ∙ Uric Acid<br>
                                ∙ Cholesterol<br>
                                ∙ Triglyceride<br>
                                ∙ HDL<br>
                                ∙ Total Protein<br>
                                ∙ Albumin<br>
                                ∙ TPAG<br>
                               </div>
                               <div class="col-md-6">
                                ∙ Sodium<br>
                                ∙ Potassium<br>
                                ∙ Chloride<br>
                                ∙ Calcium<br>
                                ∙ Ionized Ca (unopened red top)<br>
                                ∙ Phosphorous<br>
                                ∙ Magnesium<br>
                                ∙ Total Bilirubin<br>
                                ∙ Bilirubin (with B1 and B2)<br>
                                ∙ SGPT(ALT)<br>
                                ∙ SGOT(AST)<br>
                                ∙ Alkaline Phosphatase(ALP)<br>
                                ∙ Alkaline Phosphatase(ACP)<br>
                                ∙ Amylase<br>
                                ∙ Lipase<br>
                                </div>
                              </div>
                            </div>
                          </div>
                          <div class="panel panel-default">
                            <div class="panel-heading" role="tab" id="headingTwo2" style="color: #3c8dbc">
                              <h4 class="panel-title">
                                <button  class="btn btn-info" role="button" data-toggle="collapse" data-parent="#accordion" href="#collapseTwo2" aria-expanded="false" aria-controls="collapseTwo2" style="font-family: 'Source Sans Pro'" data-placement="top" title="Click to minimize or expand.">
                                  SEROLOGY
                                </button>
                              </h4>
                            </div>
                            <div id="collapseTwo2" class="panel-collapse collapse in" role="tabpanel" aria-labelledby="headingTwo2">
                              <div class="panel-body" style="font-family: 'Source Sans Pro'">
                                <div class="col-md-6">
                                ∙ VDRL/RPR (Screening)<br>
                                ∙ VDRL/RPR(Titer)<br>
                                ∙ C3/C4 (each)<br>
                                ∙ RA/RF (screening)-(each)<br>
                                ∙ RA/RF (Titer)- (each)<br>
                                ∙ Typhidot<br>
                                ∙ TPHA (Quali)<br>
                                ∙ HIV 1&2<br>
                                ∙ Rubella Titer IgG<br>
                                ∙ Rubella Titer IgM<br>
                                </div>
                                <div class="col-md-6">
                                ∙ ANA Screening<br>
                                ∙ Dengue NS1<br>
                                ∙ Dengue Blot (IgG/IgM)<br>
                                ∙ Aso (Quali)<br>
                                ∙ ASO (Quanti)<br>
                                ∙ CRP Titer<br>
                                ∙ CMV IgG/IgM (each)<br>
                                ∙ HSV 1 & 2 IgG<br>
                                ∙ HSV 1 & 2 IgM<br>
                                </div>
                              </div>
                            </div>
                          </div>
                          <div class="panel panel-default">
                            <div class="panel-heading" role="tab" id="headingThree2" style="color: #3c8dbc">
                              <h4 class="panel-title">
                                <button  class="btn btn-info" role="button" data-toggle="collapse" data-parent="#accordion" href="#collapseThree2" aria-expanded="false" aria-controls="collapseThree2" style="font-family: 'Source Sans Pro'" data-placement="top" title="Click to minimize or expand.">
                                  HEPATITIS PROFILE
                                </button>
                              </h4>
                            </div>
                            <div id="collapseThree2" class="panel-collapse collapse in" role="tabpanel" aria-labelledby="headingThree2">
                              <div class="panel-body" style="font-family: 'Source Sans Pro'">
                              <div class="col-md-6">
                                <strong>Screening:</strong><br>
                                ∙ HBsAg<br>   
                                ∙ Anti-HBs<br>    
                                ∙ Anti-HAV igM<br><br>    
                                <strong>Quantitative/Titers:</strong><br>
                                1.  HBsAg<br>
                                2.  Anti-HB’s<br>
                                3.  HBeAg<br>
                                4.  Antu-Hbe<br>
                                5.  Anti-HBc IgG<br>
                                6.  Anti-HBs IgM<br>
                                7.  Anti-HAV igM<br>
                                8.  Anti-HAV IgG<br>
                                9.  Anti-HCV<br><br>
                                </div>
                                <div class="col-md-6">
                                <strong>Hepatitis B Profile (1-6)</strong><br>
                                <strong>Hepatitis A & B Profile (1-8)</strong><br> 
                                <strong>Hepatitis ABC Profile (1-9)</strong><br>
                                </div>

                              </div>
                            </div>
                          </div>
                        </div>
                            </div> 

                           <div id="GU"></div>
                           <br>
                            <div class="tim-row tim-row-first">
                                <h2 class="title">General Ultrasound (3D and 4D)</h2>
                                <img src="/webplugins/assets/img/GenUlt.jpg" alt="Raised Image" class="rounded img-raised" style="width: 450px; height: 350;">
                                <legend></legend><br>
                                <p>
                                    To give every Filipino the option to have access to ancillary health procedures at affordable prices with reliability that is at par with global standards.
                                </p>
                            </div>

                           <div id="xray"></div>
                           <br>
                            <div class="tim-row tim-row-first">
                                <h2 class="title">X-ray Services</h2>
                                <img src="/webplugins/assets/img/xray.jpg" alt="Raised Image" class="rounded img-raised" style="width: 450px; height: 350;">
                                <legend></legend><br>
                                <p>
                                    To give every Filipino the option to have access to ancillary health procedures at affordable prices with reliability that is at par with global standards.
                                </p>
                            </div>

                           <div id="DT"></div>
                           <br>
                            <div class="tim-row tim-row-first">
                                <h2 class="title">Drug Test</h2>
                                <img src="/webplugins/assets/img/DT.jpg" alt="Raised Image" class="rounded img-raised" style="width: 450px; height: 350;">
                                <legend></legend><br>
                                <p>
                                    To give every Filipino the option to have access to ancillary health procedures at affordable prices with reliability that is at par with global standards.
                                </p>
                            </div>

                           <div id="inhouse"></div>
                           <br>
                            <div class="tim-row tim-row-first">
                                <h2 class="title">In-House and On-Site Pre-Employment</h2>
                                <img src="/webplugins/assets/img/In-House and On.jpg" alt="Raised Image" class="rounded img-raised" style="width: 450px; height: 350;">
                                <legend></legend><br>
                                <p>
                                    To give every Filipino the option to have access to ancillary health procedures at affordable prices with reliability that is at par with global standards.
                                </p>
                            </div>

                           <div id="onsite"></div>
                           <br>
                            <div class="tim-row tim-row-first">
                                <h2 class="title">On-Site Annual Medical Exam with Mobile Van</h2>
                                <img src="/webplugins/assets/img/OnsiteME.jpg" alt="Raised Image" class="rounded img-raised" style="width: 450px; height: 350;">
                                <legend></legend><br>
                                <p>
                                    To give every Filipino the option to have access to ancillary health procedures at affordable prices with reliability that is at par with global standards.
                                </p>
                            </div>

                            <div id="homeserv"></div>
                           <br>
                            <div class="tim-row tim-row-first">
                                <h2 class="title">Home Service</h2>
                                <img src="/webplugins/assets/img/HS.jpg" alt="Raised Image" class="rounded img-raised" style="width: 450px; height: 350;">
                                <legend></legend><br>
                                <p>
                                    To give every Filipino the option to have access to ancillary health procedures at affordable prices with reliability that is at par with global standards.
                                </p>
                            </div>

                           <div id="mission"></div>
                           <br>
                            <div class="tim-row tim-row-first">
                                <h2 class="text-center title">Mission</h2>
                                <legend></legend>
                                <p>
                                    To give every Filipino the option to have access to ancillary health procedures at affordable prices with reliability that is at par with global standards.
                                </p>
                            </div>
                            
                           <div id="vision"></div>
                           <br>
                            <div class="tim-row" id="vision">
                                <h2 class="text-center title">Vision</h2>
                                <legend></legend>
                                <p>
                                    The company envisions expanding its reach to every health professional and his patient by putting up branches in other key global cities in the Metro. It is also our vision that in the coming years GLOBALHEALTH DIAGNOSTIC CENTER, INC. will continue to be known for its reliability and high quality testing and for providing every physician the option to work-up their patients economically while ensuring complete confidence in the validity of its laboratory imaging results.
                                </p>
                            </div>
                            
                            <div id="schedule"></div>
                            <br>
                            <div class="tim-container">
                                <!-- buttons row -->
                                <div class="tim-row" id="schedule">
                                    <h2 class="text-center title">Schedule & Location</h2>
                                    <legend></legend>
                                    <iframe src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d969.2700034798418!2d121.02508052146734!3d14.606524327162846!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x0%3A0xa2c641fd56c4c687!2sGlobalhealth+Diagnostic+Center+Inc.!5e1!3m2!1sen!2sph!4v1499284739874" width="710" height="350" frameborder="1" style="border:1" allowfullscreen></iframe></div>
                                    <br>
                                    <strong>Address:</strong> 156 N. Domingo Street,
                                        San Juan City, Metro Manila<br>
                                        <strong>Open:</strong> Monday to Saturday<br>
                                        <strong>Time:</strong> 7:30 am to 6:00 pm<br>
                                        <strong>Tel Nos:</strong> 722-4544/576-5357<br>
                                        <strong>E-mail:</strong> globalhealth_sj@yahoo.com
                                    
                                <div id="doctor"></div>
                                <br>   
                                <div class="tim-row" id="doctor">
                                    <h2 class="text-center title"> Schedule of Doctors for Room Clinic </h2>
                                    <legend></legend><br>
                                    
                                    <p>
                                        <h4>Dr. Dela Cruz<hr></h4>
                                        <strong>Specialization:</strong> IM/CARDIO<br>
                                        <strong>Schedule:</strong> Monday, 4:00 pm - 6:00 pm
                                        
                                        <h4>Dr. Collado<hr></h4>
                                        <strong>Specialization:</strong> IM/CARDIO<br>
                                        <strong>Schedule:</strong> Tuesday, 1:00 pm - 3:00 pm
                                        
                                        <h4>Dr. Talamayan<hr></h4>
                                        <strong>Specialization:</strong> IM/CARDIO<br>
                                        <strong>Schedule:</strong> Thursday, 4:00 pm - 6:00 pm
                                        
                                        <h4>Dr. Dionisio<hr></h4>
                                        <strong>Specialization:</strong> IM/CARDIO<br>
                                        <strong>Schedule:</strong> Friday, 10:00 am - 12:00 pm
                                        
                                        <h4>Dr. Florista<hr></h4>
                                        <strong>Specialization:</strong> Pulmo<br>
                                        <strong>Schedule:</strong> Wednesday, 11:00 am - 12:00 pm
                                       
                                        <h4>Dr. Calma<hr></h4>
                                        <strong>Specialization:</strong> General Surgeon<br>
                                        <strong>Schedule:</strong> Monday and Saturday, 10:00 am - 12:00 pm
                                        </div>

                                <div id="qc"></div>
                                <br>
                                <div class="tim-row">
                                    <h2 class="text-center title">GH - Quezon City Schedule & Location</h2>
                                    <legend></legend>
                                    <iframe src="https://www.google.com/maps/embed?pb=!1m17!1m11!1m3!1d1462.582676387449!2d121.0586975774077!3d14.63529546042551!2m2!1f0!2f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x3397b798d2c287c1%3A0xb48632c4373de566!2sGlobalhealth+Diagnostic+Center+Inc.!5e1!3m2!1sen!2sph!4v1484660468213" width="710" height="350" frameborder="0" style="border:0" allowfullscreen></iframe></div>
                                    <br>
                                    <strong>Address:</strong> Deofranz Plaza Bldng #2 Anonas Ext cor. V Luna Road, Quezon City, Metro Manila<br>
                                        <strong>Open:</strong> Monday to Saturday<br>
                                        <strong>Time:</strong> 8:00 am to 6:00 pm<br>
                                        <strong>Tel No:</strong> 436-2057<br>
                                        <strong>E-mail:</strong> globalhealth_anonas@<yahoo class="com"></yahoo>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>    <!-- Modal Core -->
            <div class="modal fade modal-mini modal-info" id="myModal" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
            <div class="modal-dialog">
                <div class="modal-content">
                    <div class="modal-header justify-content-center">
                    <button type="button" class="close" data-dismiss="modal" aria-hidden="true">
                            <i class="now-ui-icons ui-1_simple-remove"></i>
                        </button>
                        <div class="modal-profile">
                            <i class="now-ui-icons users_single-02"></i>
                        </div>
                    </div>
                    <form action="/proceedPatientResult" method="POST">
                    <div class="modal-body">
                        <div class="content">
                            <div class="input-group form-group-no-border">
                                        <span class="input-group-addon">
                                            <i class="now-ui-icons ui-1_lock-circle-open"></i>
                                        </span>
                                        <input type="text" placeholder="Enter Code" class="form-control" name="code">
                                    </div>
                                    <div class="input-group form-group-no-border">
                                        <span class="input-group-addon">
                                            <i class="now-ui-icons users_circle-08"></i>
                                        </span>
                                        <input type="password" class="form-control" placeholder="Enter Password" name="name">
                                    </div> 
                                    <span><small><a href="" data-toggle="modal" data-target="#changeModal">Change Password</a></small></span><br>
                                    <span><small>Note:&nbsp;<br>If first time, Last name should be all capital letters without spaces</small></span>
                                </div>
                    </div>
                    {{ csrf_field() }}
                    <div class="footer text-center">
                        <button type="submit" class="btn btn-success btn-round btn-lg">Go</button>
                    </div>
                    </form>
                </div>
            </div>
        </div>

        <div class="modal fade modal-mini modal-info" id="changeModal" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
            <div class="modal-dialog">
                <div class="modal-content">
                    <div class="modal-header justify-content-center">
                    <button type="button" class="close" data-dismiss="modal" aria-hidden="true">
                            <i class="now-ui-icons ui-1_simple-remove"></i>
                        </button>
                        <div class="modal-profile">
                            <i class="now-ui-icons users_single-02"></i>
                        </div>
                    </div>
                    <form action="/changePassPatient" method="POST">
                    {{ csrf_field() }}
                    <div class="modal-body">
                        <div class="content">
                                    <div class="input-group form-group-no-border">
                                        <span class="input-group-addon">
                                            <i class="now-ui-icons ui-1_lock-circle-open"></i>
                                        </span>
                                        <input type="text" placeholder="Enter Code" class="form-control" name="code">
                                    </div>
                                    <div class="input-group form-group-no-border">
                                        <span class="input-group-addon">
                                            <i class="now-ui-icons users_circle-08"></i>
                                        </span>
                                        <input type="password" class="form-control" placeholder="Enter Old Password" name="name">
                                    </div>
                                    <div class="input-group form-group-no-border">
                                        <span class="input-group-addon">
                                            <i class="now-ui-icons users_circle-08"></i>
                                        </span>
                                        <input type="password" placeholder="Enter New Password" class="form-control" name="newpass">
                                    </div>
                                    <div class="input-group form-group-no-border">
                                        <span class="input-group-addon">
                                            <i class="now-ui-icons users_circle-08"></i>
                                        </span>
                                        <input type="password" class="form-control" placeholder="Enter Re-Type New Password" name="confirmpass">
                                    </div>
                                </div>
                    </div>
                    <div class="footer text-center">
                        <button type="submit" class="btn btn-success btn-round btn-lg">Save</button>
                    </div>
                    </form>
                </div>
            </div>
        </div>

<script src="{{ asset('/webplugins/assets/js/core/jquery.3.2.1.min.js') }}"></script>
<script src="{{ asset('/webplugins/assets/js/core/tether.min.js') }}"></script>
<script src="{{ asset('/webplugins/assets/js/core/bootstrap.min.js') }}"></script>
<script src="{{ asset('/webplugins/assets/js/plugins/bootstrap-switch.js') }}"></script>
<script src="{{ asset('/webplugins/assets/js/plugins/nouislider.min.js') }}"></script>
<script src="{{ asset('/webplugins/assets/js/plugins/bootstrap-datepicker.js') }}"></script>
<script src="{{ asset('/webplugins/assets/js/scroll.js') }}"></script>
<script src="{{ asset('/webplugins/assets/js/site.min.js') }}"></script>
<script src="{{ asset('/webplugins/assets/js/now-ui-kit.js') }}"></script>

<script type="text/javascript">
    $(document).ready(function() {
        // the body of this function is in assets/js/now-ui-kit.js
        nowuiKit.initSliders();
    });

    function scrollToDownload() {

        if ($('.section-download').length != 0) {
            $("html, body").animate({
                scrollTop: $('.section-download').offset().top
            }, 1000);
        }
    }
</script>
<script type="text/javascript">
    $(document).ready(function(){
        alert()
    })
</script>
@if(Session::has('failupdate'))
<input type="" id="message" value="{{ Session::get('failupdate') }}">
<script type="text/javascript">
    $(document).ready(function()
    {
        alert($('#message').val());
    })
</script>
@endif
@if(Session::has('incorrect'))
<input type="" id="incorrect" value="{{ Session::get('incorrect') }}">
<script type="text/javascript">
    $(document).ready(function()
    {
        alert($('#incorrect').val());
    })
</script>
@endif
@if(Session::has('success'))
<input type="" id="success" value="{{ Session::get('success') }}">
<script type="text/javascript">
    $(document).ready(function()
    {
        alert($('#success').val());
    })
</script>
@endif

</html>
