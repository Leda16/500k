<?php

session_start();
include 'conn.php';

if (!isset($_SESSION['logintrue']) || $_SESSION['logintrue'] !== true) {
    header("Location: login.php");
    exit;
}

$sql = "SELECT p.id, p.nome, p.oferta, p.vendidos, c.nome AS categoria_nome, c.id AS categoria_id
        FROM BancoProdutos p
        LEFT JOIN BancoCategoria c ON p.categoria_id = c.id";
$stmt = $conn->prepare($sql);
$stmt->execute();
$produtos = $stmt->fetchAll(PDO::FETCH_ASSOC);

// Buscar todas as categorias para o dropdown
$sqlCategorias = "SELECT id, nome FROM BancoCategoria";
$stmtCategorias = $conn->prepare($sqlCategorias);
$stmtCategorias->execute();
$categorias = $stmtCategorias->fetchAll(PDO::FETCH_ASSOC);

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

    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
    <script src="back-scripts/promocao.js"></script>

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
                    <li>
						<a class="has-arrow ai-icon"  href="javascript:void(0);" aria-expanded="false">
							<i class="flaticon-layout"></i>
							<span class="nav-text">Gerenciamento</span>
						</a>
                        <ul aria-expanded="false">
							<li><a href="produtos-dash.php">Criar produtos</a></li>
							<li><a href="dash.php">Gerenciar Promoçoes</a></li>
							<li><a href="config.php">Gerenciar Status</a></li>

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

        <div class="container mt-3">
    <div class="input-group mb-3">
        <input type="text" id="searchTerm" class="form-control" placeholder="Busque aqui pelo nome do produto">
        <button class="btn btn-outline-secondary" type="button" id="searchBtn">Buscar</button>
    </div>
</div>

        <div class="container-fluid">
    <div class="row">
        <div class="col-12">
            <h2 class="mt-4">Lista de Produtos</h2>
            <div class="list-group">
                <?php foreach ($produtos as $produto): ?>
                    <div class="list-group-item list-group-item-action d-flex justify-content-between align-items-center">
                        <div class="ms-2 me-auto">
                            <div class="fw-bold"><?= htmlspecialchars($produto['nome']) ?></div>
                            Vendas: <?= $produto['vendidos'] > 0 ? "Foi vendido: " . $produto['vendidos'] . " item(s)" : "Sem vendas" ?>
                        </div>
                        <!-- Dropdown de Categorias -->
                        <select class="form-select categoria-dropdown" style="width: auto;" data-produto-id="<?= $produto['id'] ?>" name="categoria">
                            <?php foreach ($categorias as $categoria): ?>
                                <option value="<?= $categoria['id'] ?>" <?= $categoria['id'] == $produto['categoria_id'] ? 'selected' : '' ?>>
                                    <?= htmlspecialchars($categoria['nome']) ?>
                                </option>
                            <?php endforeach; ?>
                        </select>
                        <!-- Campo de Edição da Oferta -->
                        <select class="form-select oferta-dropdown" data-produto-id="<?= $produto['id'] ?>" name="oferta">
                            <option value="Sem Oferta" <?= $produto['oferta'] == 'Sem Oferta' ? 'selected' : '' ?>>Sem Oferta</option>
                            <option value="Promoção Relâmpago" <?= $produto['oferta'] == 'Promoção Relâmpago' ? 'selected' : '' ?>>Promoção Relâmpago</option>
                            <option value="50% OFF" <?= $produto['oferta'] == '50% OFF' ? 'selected' : '' ?>>50% OFF</option>
                        </select>                        <!-- Botão Deletar -->
                        <button class="btn btn-danger ms-3 delete-btn" data-produto-id="<?= $produto['id'] ?>">Deletar</button>
                    </div>
                <?php endforeach; ?>
            </div>
        </div>
    </div>
</div>









<!-- CODIGO PARA O MENU NESSE KARALHO NAO FODE
PQP E SO PRA EU VER
EU DEVO SER RETARDO NAO ESCREVO COISA NORMAL PARA ME INDENTIFICAR 
FIMMMMMMMMMMMMMMMMMMMMMMMMMMMMMM KLRLLLLLLLLLLLLLLLLLLLLLLLLLLLL-->
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
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>

	
</body>

</html>