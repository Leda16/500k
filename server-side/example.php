<?php

session_start();
include 'conn.php';

if (!isset($_SESSION['logintrue']) || $_SESSION['logintrue'] !== true) {
    header("Location: login.php");
    exit;
}

?>

<!DOCTYPE html>
<html lang="en">

<head>
	<meta charset="utf-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
    <title>Tela Fake | By Leda</title>
	<link rel="stylesheet" href="vendor/select2/css/select2.min.css">
	<link href="vendor/owl-carousel/owl.carousel.css" rel="stylesheet">
    <link href="vendor/bootstrap-select/dist/css/bootstrap-select.min.css" rel="stylesheet">
    <link href="css/style.css" rel="stylesheet">
	<link href="../../cdn.lineicons.com/2.0/LineIcons.css" rel="stylesheet">

    <link href="vendor/jquery-steps/css/jquery.steps.css" rel="stylesheet">
	<link href="vendor/jquery-smartwizard/dist/css/smart_wizard.min.css" rel="stylesheet">

	<link href="vendor/jquery-steps/css/jquery.steps.css" rel="stylesheet">
	<link href="vendor/jquery-smartwizard/dist/css/smart_wizard.min.css" rel="stylesheet">
    <!-- Custom Stylesheet -->
    	<link href="vendor/bootstrap-select/dist/css/bootstrap-select.min.css" rel="stylesheet">
    <link href="css/style.css" rel="stylesheet">


</head>
<body>

    <!--*******************
        Preloader start
    ********************-->
    <div id="preloader">
        <div class="sk-three-bounce">
            <div class="sk-child sk-bounce1"></div>
            <div class="sk-child sk-bounce2"></div>
            <div class="sk-child sk-bounce3"></div>
        </div>
    </div>
    <!--*******************
        Preloader end
    ********************-->

    <!--**********************************
        Main wrapper start
    ***********************************-->
    <div id="main-wrapper">

        <!--**********************************
            Nav header start
        ***********************************-->
        <div class="nav-header">


            <div class="nav-control">
                <div class="hamburger">
                    <span class="line"></span><span class="line"></span><span class="line"></span>
                </div>
            </div>
        </div>
        <!--**********************************
            Nav header end
        ***********************************-->
	
		<!--**********************************
            Header start
        ***********************************-->
        <div class="header">
            <div class="header-content">
                <nav class="navbar navbar-expand">
                    <div class="collapse navbar-collapse justify-content-between">
                        <div class="header-left">
                            <div class="dashboard_bar">
                                Configurações da Tela
                            </div>
                        </div>
                        <ul class="navbar-nav header-right">
							<li class="nav-item">
								<div class="input-group search-area ms-auto d-inline-flex">
									<div class="input-group-append">
									</div>
								</div>
							</li>
							<li class="nav-item dropdown notification_dropdown">
                                <a class="nav-link bell dz-theme-mode active" href="javascript:void(0);">
									<i id="icon-light" class="far fa-sun"></i>
                                    <i id="icon-dark" class="far fa-moon"></i>
                                </a>
							</li>
                                
                            <li class="nav-item dropdown header-profile">
                                <a class="nav-link"  href="javascript:void(0);" role="button" data-bs-toggle="dropdown">
                                    <img src="images/profile/ue.jpg" width="20" alt="">
									<div class="header-info">
										<span>Admin<i class="fa fa-caret-down ms-3" aria-hidden="true"></i></span>
									</div>
                                </a>
                                <div class="dropdown-menu dropdown-menu-end">
                                    <a href="dash.php" class="dropdown-item ai-icon">
                                        <svg id="icon-user1" xmlns="http://www.w3.org/2000/svg" class="text-primary" width="18" height="18" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"><path d="M20 21v-2a4 4 0 0 0-4-4H8a4 4 0 0 0-4 4v2"></path><circle cx="12" cy="7" r="4"></circle></svg>
                                        <span class="ms-2">Infos</span>
                                    </a>
                                    <a href="config.php" class="dropdown-item ai-icon">
                                        <svg id="icon-inbox" xmlns="http://www.w3.org/2000/svg" class="text-success" width="18" height="18" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"><path d="M4 4h16c1.1 0 2 .9 2 2v12c0 1.1-.9 2-2 2H4c-1.1 0-2-.9-2-2V6c0-1.1.9-2 2-2z"></path><polyline points="22,6 12,13 2,6"></polyline></svg>
                                        <span class="ms-2">Configs </span>
                                    </a>
                                    <a href="logout.php" class="dropdown-item ai-icon">
                                        <svg id="icon-logout" xmlns="http://www.w3.org/2000/svg" class="text-danger" width="18" height="18" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"><path d="M9 21H5a2 2 0 0 1-2-2V5a2 2 0 0 1 2-2h4"></path><polyline points="16 17 21 12 16 7"></polyline><line x1="21" y1="12" x2="9" y2="12"></line></svg>
                                        <span class="ms-2">Logout </span>
                                    </a>
                                </div>
                            </li>
                        </ul>
                    </div>
                </nav>
            </div>
        </div>
        <div class="deznav">
            <div class="deznav-scroll">
				<ul class="metismenu" id="menu">
                    <li>
						<a class="has-arrow ai-icon"  href="javascript:void(0);" aria-expanded="false">
							<i class="flaticon-layout"></i>
							<span class="nav-text">Funções</span>
						</a>
                        <ul aria-expanded="false">
							<li><a href="burp.php">Inicio</a></li>
							<li><a href="dash.php">Infos</a></li>
							<li><a href="config.php">Sistema</a></li>

						</ul>
                    </li>
<br>
<br>
<br>
				<div class="copyright">
					<p class="fs-13 font-w200"><strong class="font-w400">Leda TelasFake</strong> © 2024 Direitos ST Alta Cupula</p>
					<p>Made with <i class="fa fa-heart text-danger"></i> by Leda</p>
				</div>
			</div>
        </div>


<!-- CODIGO PARA O MENU NESSE KARALHO NAO FODE
PQP E SO PRA EU VER
EU DEVO SER RETARDO NAO ESCREVO COISA NORMAL PARA ME INDENTIFICAR -->


        <div class="content-body">
            <div class="container-fluid">
                <div class="row page-titles">
					<ol class="breadcrumb">
						<li class="breadcrumb-item"><a href="javascript:void(0)">Home</a></li>
						<li class="breadcrumb-item active"><a href="javascript:void(0)">Components</a></li>
					</ol>
                </div>
                <!-- row -->
                <div class="row">
                    <div class="col-xl-12 col-xxl-12">
                        <div class="card">
                            <div class="card-header">
                                <h4 class="card-title">Form step</h4>
                            </div>
                            <div class="card-body">
								<div id="smartwizard" class="form-wizard order-create">
									<ul class="nav nav-wizard">
										<li><a class="nav-link" href="#wizard_Service"> 
											<span>1</span> 
										</a></li>
										<li><a class="nav-link" href="#wizard_Time">
											<span>2</span>
										</a></li>
										<li><a class="nav-link" href="#wizard_Details">
											<span>3</span>
										</a></li>
										<li><a class="nav-link" href="#wizard_Payment">
											<span>4</span>
										</a></li>
									</ul>
									<div class="tab-content">
										<div id="wizard_Service" class="tab-pane" role="tabpanel">
											<div class="row">
												<div class="col-lg-6 mb-2">
													<div class="form-group">
														<label class="text-label">First Name*</label>
														<input type="text" name="firstName" class="form-control" placeholder="Parsley" required>
													</div>
												</div>
												<div class="col-lg-6 mb-2">
													<div class="form-group">
														<label class="text-label">Last Name*</label>
														<input type="text" name="lastName" class="form-control" placeholder="Montana" required>
													</div>
												</div>
												<div class="col-lg-6 mb-2">
													<div class="form-group">
														<label class="text-label">Email Address*</label>
														<input type="email" class="form-control" id="inputGroupPrepend2" aria-describedby="inputGroupPrepend2" placeholder="example@example.com.com" required>
													</div>
												</div>
												<div class="col-lg-6 mb-2">
													<div class="form-group">
														<label class="text-label">Phone Number*</label>
														<input type="text" name="phoneNumber" class="form-control" placeholder="(+1)408-657-9007" required>
													</div>
												</div>
												<div class="col-lg-12 mb-3">
													<div class="form-group">
														<label class="text-label">Where are you from*</label>
														<input type="text" name="place" class="form-control" required>
													</div>
												</div>
											</div>
										</div>
										<div id="wizard_Time" class="tab-pane" role="tabpanel">
											<div class="row">
												<div class="col-lg-6 mb-2">
													<div class="form-group">
														<label class="text-label">Company Name*</label>
														<input type="text" name="firstName" class="form-control" placeholder="Cellophane Square" required>
													</div>
												</div>
												<div class="col-lg-6 mb-2">
													<div class="form-group">
														<label class="text-label">Company Email Address*</label>
														<input type="email" class="form-control" id="emial1" placeholder="example@example.com.com" required>
													</div>
												</div>
												<div class="col-lg-6 mb-2">
													<div class="form-group">
														<label class="text-label">Company Phone Number*</label>
														<input type="text" name="phoneNumber" class="form-control" placeholder="(+1)408-657-9007" required>
													</div>
												</div>
												<div class="col-lg-6 mb-2">
													<div class="form-group">
														<label class="text-label">Your position in Company*</label>
														<input type="text" name="place" class="form-control" required>
													</div>
												</div>
											</div>
										</div>
										<div id="wizard_Details" class="tab-pane" role="tabpanel">
											<div class="row">
												<div class="col-sm-4 mb-2">
													<h4>Monday *</h4>
												</div>
												<div class="col-6 col-sm-4 mb-2">
													<div class="form-group">
														<input class="form-control" value="9.00" type="number" name="input1" id="input1">
													</div>
												</div>
												<div class="col-6 col-sm-4 mb-2">
													<div class="form-group">
														<input class="form-control" value="6.00" type="number" name="input2" id="input2">
													</div>
												</div>
											</div>
											<div class="row">
												<div class="col-sm-4 mb-2">
													<h4>Tuesday *</h4>
												</div>
												<div class="col-6 col-sm-4 mb-2">
													<div class="form-group">
														<input class="form-control" value="9.00" type="number" name="input3" id="input3">
													</div>
												</div>
												<div class="col-6 col-sm-4 mb-2">
													<div class="form-group">
														<input class="form-control" value="6.00" type="number" name="input4" id="input4">
													</div>
												</div>
											</div>
											<div class="row">
												<div class="col-sm-4 mb-2">
													<h4>Wednesday *</h4>
												</div>
												<div class="col-6 col-sm-4 mb-2">
													<div class="form-group">
														<input class="form-control" value="9.00" type="number" name="input5" id="input5">
													</div>
												</div>
												<div class="col-6 col-sm-4 mb-2">
													<div class="form-group">
														<input class="form-control" value="6.00" type="number" name="input6" id="input6">
													</div>
												</div>
											</div>
											<div class="row">
												<div class="col-sm-4 mb-2">
													<h4>Thrusday *</h4>
												</div>
												<div class="col-6 col-sm-4 mb-2">
													<div class="form-group">
														<input class="form-control" value="9.00" type="number" name="input7" id="input7">
													</div>
												</div>
												<div class="col-6 col-sm-4 mb-2">
													<div class="form-group">
														<input class="form-control" value="6.00" type="number" name="input8" id="input8">
													</div>
												</div>
											</div>
											<div class="row">
												<div class="col-sm-4 mb-2">
													<h4>Friday *</h4>
												</div>
												<div class="col-6 col-sm-4 mb-2">
													<div class="form-group">
														<input class="form-control" value="9.00" type="number" name="input9" id="input9">
													</div>
												</div>
												<div class="col-6 col-sm-4 mb-2">
													<div class="form-group">
														<input class="form-control" value="6.00" type="number" name="input10" id="input10">
													</div>
												</div>
											</div>
										</div>
										<div id="wizard_Payment" class="tab-pane" role="tabpanel">
											<div class="row emial-setup">
												<div class="col-lg-3 col-sm-6 col-6">
													<div class="form-group">
														<label for="mailclient11" class="mailclinet mailclinet-gmail">
															<input type="radio" name="emailclient" id="mailclient11">
															<span class="mail-icon">
																<i class="mdi mdi-google-plus" aria-hidden="true"></i>
															</span>
															<span class="mail-text">I'm using Gmail</span>
														</label>
													</div>
												</div>
												<div class="col-lg-3 col-sm-6 col-6">
													<div class="form-group">
														<label for="mailclient12" class="mailclinet mailclinet-office">
															<input type="radio" name="emailclient" id="mailclient12">
															<span class="mail-icon">
																<i class="mdi mdi-office" aria-hidden="true"></i>
															</span>
															<span class="mail-text">I'm using Office</span>
														</label>
													</div>
												</div>
												<div class="col-lg-3 col-sm-6 col-6">
													<div class="form-group">
														<label for="mailclient13" class="mailclinet mailclinet-drive">
															<input type="radio" name="emailclient" id="mailclient13">
															<span class="mail-icon">
																<i class="mdi mdi-google-drive" aria-hidden="true"></i>
															</span>
															<span class="mail-text">I'm using Drive</span>
														</label>
													</div>
												</div>
												<div class="col-lg-3 col-sm-6 col-6">
													<div class="form-group">
														<label for="mailclient14" class="mailclinet mailclinet-another">
															<input type="radio" name="emailclient" id="mailclient14">
															<span class="mail-icon">
																<i class="fas fa-question-circle"
																	aria-hidden="true"></i>
															</span>
															<span class="mail-text">Another Service</span>
														</label>
													</div>
												</div>
											</div>

											<div class="row">
												<div class="col-12">
													<div class="skip-email text-center">
														<p>Or if want skip this step entirely and setup it later</p>
														<a href="javascript:void(0)">Skip step</a>
													</div>
												</div>
											</div>
										</div>
									</div>
								</div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>




									</div>
								</div>
							</div>
						</div>
					</div>
				</div>
            </div>
        </div>

        <div class="footer">
		<div class="copyright">
                <p>Copyright © Designed &amp; Developed by Leda 2024</p>
            </div>
        </div>



    </div>

    <script src="vendor/global/global.min.js"></script>
	<script src="vendor/bootstrap-select/dist/js/bootstrap-select.min.js"></script>
	<script src="vendor/jquery-smartwizard/dist/js/jquery.smartWizard.js"></script>
    <script src="vendor/jquery-validation/jquery.validate.min.js"></script>
    <!-- Form validate init -->
    <script src="js/plugins-init/jquery.validate-init.js"></script>
    <!-- Form step init -->
    <script src="js/plugins-init/jquery-steps-init.js"></script>
	<script src="js/custom.min.js"></script>
	<script src="js/deznav-init.js"></script>
	<script src="js/demo.js"></script>
    <script src="js/styleSwitcher.js"></script>
	
</body>

</html>