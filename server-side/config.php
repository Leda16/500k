<?php

session_start();
include 'conn.php';

if (!isset($_SESSION['logintrue']) || $_SESSION['logintrue'] !== true) {
    header("Location: login.php");
    exit;
}

$sql = "SELECT trava FROM usuarios LIMIT 1";
$stmt = $conn->prepare($sql);
$stmt->execute();
$resultado = $stmt->fetch(PDO::FETCH_ASSOC);

$statusTrava = $resultado ? $resultado['trava'] : ativada;

$sql = "SELECT formatoBackup FROM config LIMIT 1";
$stmt = $conn->prepare($sql);
$stmt->execute();
$resultado = $stmt->fetch(PDO::FETCH_ASSOC);

$statusBackup = $resultado ? $resultado['formatoBackup'] : JSON;

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



		<div class="content-body">
            <!-- row -->
			<div class="container-fluid">
				<div class="row">
					<div class="col-xl-12">

						<div class="filter cm-content-box box-primary" style="background-color:transparent;">

							<div class="col-xl-7">
								<div class="filter cm-content-box box-primary">
									<div class="content-title flex-wrap">
										<div class="cpa d-flex align-items-center flex-wrap">
											Configurações Tela
										
										</div>
									</div>
									<div class="cm-content-body form excerpt">
										<div class="card-body">
											<h6 class="mb-0 fs-18">Opções</h6>
											<div class="col-xl-12 nestable">
												<div class="dd" id="nestable">
													<ol class="dd-list ps-0" id="accordionExample-1">
														<li class="dd-item menu-ac-item" data-id="1" >
															<!-- <div class="dd-handle"></div> -->
															<div class="accordion" >
																<div class="accordion-item">
																	<div class="accordion-header" id="heading-1">
																		<div class="move-media dd-handle">
																			<i class="fas fa-arrows-alt"></i>
																		</div>
																	  <button class="accordion-button contact" type="button" data-bs-toggle="collapse" data-bs-target="#collapse-1" aria-expanded="true" aria-controls="collapse-1">
																		Alterar Trava <span class="badge badge-primary ms-2">Segurança</span>
																	  </button>
																	</div>
																	<div id="collapse-1" class="accordion-collapse collapse nestable" aria-labelledby="heading-1" data-bs-parent="#accordionExample-1">
																		

																	<div class="dropdown">
																		<button class="btn btn-primary dropdown-toggle" type="button" id="dropdownMenuButton" data-bs-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
																			Alterar Trava
																		</button>
																		<div class="dropdown-menu" aria-labelledby="dropdownMenuButton">
																			<a class="dropdown-item" href="#" onclick="alterarTrava('ativada')">Ativada</a>
																			<a class="dropdown-item" href="#" onclick="alterarTrava('desativada')">Desativada</a>
																		</div>
																		</div>

																		<p>Trava: <?php echo $statusTrava ?></p>

																		<script>function alterarTrava(estado) {
																			// Faz uma requisição para o script PHP
																			fetch('alterar_trava.php?estado=' + estado)
																			.then(response => response.json())
																			.then(data => {
																				alert(data.mensagem);
																			});
																		}</script>

																	</div>
																</div>
															</div>
														</li>
														<li class="dd-item menu-ac-item" data-id="2">
															<div class="accordion" >
																<div class="accordion-item">
																	<div class="accordion-header" id="heading-2">
																		<div class="move-media dd-handle">
																			<i class="fas fa-arrows-alt"></i>
																		</div>
																	  <button class="accordion-button contact" type="button" data-bs-toggle="collapse" data-bs-target="#collapse-2" aria-expanded="false" aria-controls="collapse-2">
																		Metodo salvar infos <span class="badge badge-primary ms-2">Extras</span>
																	  </button>
																	</div>
																	<div id="collapse-2" class="accordion-collapse collapse" aria-labelledby="heading-2" data-bs-parent="#accordionExample-1">
																		
																	<div class="dropdown">
																		<button class="btn btn-primary dropdown-toggle" type="button" id="dropdownMenuButton" data-bs-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
																			Alterar backup
																		</button>
																		<div class="dropdown-menu" aria-labelledby="dropdownMenuButton">
																			<a class="dropdown-item" href="#" onclick="alterarBackup('json')">JSON</a>
																			<a class="dropdown-item" href="#" onclick="alterarBackup('txt')">TXT</a>
																		</div>
																		</div>

																		<p>Formato backup: <?php echo $statusBackup ?></p>

																		<script>function alterarBackup(estado) {
																			fetch('alterar_backup.php?estado=' + estado)
																			.then(response => response.json())
																			.then(data => {
																				alert(data.mensagem);
																			});
																		}</script>

																	</div>

																	</div>
																</div>
															</div>
														</li>
														
													</ol>
												</div>
											</div>
										</div>		
									</div>
									<div class="filter cm-content-box box-primary style-1 mb-0 border-0">
										<div class="content-title">
											<div class="cpa">
												Resetar todos os dados
											</div>
											<form action="resetar_tabela.php" method="post">
												<button type="submit" class="btn btn-secondary my-2">Resetar</button>
											</form>
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
	<script src="vendor/owl-carousel/owl.carousel.js"></script>
	<script src="vendor/select2/js/select2.full.min.js"></script>	

	<script src="js/plugins-init/select2-init.js"></script>
	<script src="js/deznav-init.js"></script>
	<script src="js/custom.min.js"></script>
	<script src="js/demo.js"></script>
    <script src="js/styleSwitcher.js"></script>
	<script>
		jQuery('.SlideToolHeader').on('click', function () {
			var el = jQuery(this).hasClass('expand');
			if(el)
			{
				jQuery(this).removeClass('expand').addClass('collapse');
				jQuery(this).parents('.cm-content-box').find('.cm-content-body').slideUp(300);
			} 
			else 
			{
				jQuery(this).removeClass('collapse').addClass('expand');
				jQuery(this).parents('.cm-content-box').find('.cm-content-body').slideDown(300);
			}
		});
	</script>
	
</body>

</html>