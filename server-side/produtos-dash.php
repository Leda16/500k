<?php

session_start();
include 'conn.php';

if (!isset($_SESSION['logintrue']) || $_SESSION['logintrue'] !== true) {
    header("Location: login.php");
    exit;
}

if ($_SERVER["REQUEST_METHOD"] == "POST") {

    if ($_POST['formType'] == 'addProduct') {
        $nome = $_POST['nome'] ?? '';
        $descricao = $_POST['descricao'] ?? '';
        $preco = $_POST['preco'] ?? '';
        $categoria_id = $_POST['categoria_id'] ?? '';
        $imagem_url = $_POST['imagem_url'] ?? '';
        $imagem_url_hover = $_POST['imagem_url_hover'] ?? '';
        $oferta = $_POST['oferta'] ?? '';

        $sql = "INSERT INTO bancoprodutos (nome, descricao, preco, categoria_id, imagem_url, imagem_url_hover, oferta) VALUES (?, ?, ?, ?, ?, ?, ?)";

        try {
            $stmt = $conn->prepare($sql);
            $stmt->execute([$nome, $descricao, $preco, $categoria_id, $imagem_url, $imagem_url_hover, $oferta]);
            
            echo "Produto registrado com sucesso!";
        } catch (PDOException $e) {
            echo "Erro ao registrar o produto: " . $e->getMessage();
        }
    }
    elseif ($_POST['formType'] == 'addCategory') {
        $nomeCategoria = $_POST['nomeCategoria'] ?? '';
        $imagemCategoria = $_POST['imagemCategoria'] ?? ''; 
    
        if (!empty($nomeCategoria) && !empty($imagemCategoria)) { 
            $sql = "INSERT INTO BancoCategoria (nome, imagem_url) VALUES (?, ?)";
            
            try {
                $stmt = $conn->prepare($sql);
                $stmt->execute([$nomeCategoria, $imagemCategoria]);
                
                echo "Categoria adicionada com sucesso!";
            } catch (PDOException $e) {
                echo "Erro ao adicionar categoria: " . $e->getMessage();
            }
        } else {
            echo "O nome da categoria e o link da imagem não podem estar vazios.";
        }
    }
}

if ($_SERVER["REQUEST_METHOD"] == "POST") {

}

$optionsHtml = '';

try {
    $sql = "SELECT id, nome FROM BancoCategoria ORDER BY nome ASC";
    $stmt = $conn->prepare($sql);
    $stmt->execute();

    while ($categoria = $stmt->fetch(PDO::FETCH_ASSOC)) {
        $optionsHtml .= '<option value="' . $categoria['id'] . '">' . htmlspecialchars($categoria['nome']) . '</option>';
    }
} catch (PDOException $e) {
    echo "Erro ao buscar categorias: " . $e->getMessage();
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
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>

    <script src="back-scripts/produtosDash.js"></script>


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
            <div class="container-fluid">

                <!-- row -->
                <div class="row">
                    <div class="col-xl-12 col-xxl-12">
                        <div class="card">
                            <div class="card-header">
                                <h4 class="card-title">Form step</h4>
                            </div>
                            <div class="card-body">
							<form id="productForm" action="produtos-dash.php" method="POST">
                            <input type="hidden" name="formType" value="addProduct">

    <div id="smartwizard" style="border: #eee0;">
        <!-- Navegação -->
        <ul class="nav">
            <li class="nav-item">
                <a class="nav-link" href="#step-1">
                    <strong>Passo 1</strong> <br>Imagens
                </a>
            </li>
            <li class="nav-item">
                <a class="nav-link" href="#step-2">
                    <strong>Passo 2</strong> <br>Detalhes
                </a>
            </li>
            <li class="nav-item">
                <a class="nav-link" href="#step-3">
                    <strong>Passo 3</strong> <br>Confirmação
                </a>
            </li>
        </ul>

        <!-- Conteúdo -->
        <div class="tab-content">
            <!-- Passo 1: Imagens -->
            <div id="step-1" class="tab-pane" role="tabpanel">
                <input type="text" name="imagem_url" class="form-control mb-3" placeholder="URL da Imagem Principal">
                <input type="text" name="imagem_url_hover" class="form-control mb-3" placeholder="URL da Imagem ao Passar o Mouse">
            </div>

            <!-- Passo 2: Detalhes -->
            <div id="step-2" class="tab-pane" role="tabpanel">
                <input type="text" name="nome" class="form-control mb-3" placeholder="Nome do Produto">
                <textarea name="descricao" class="form-control mb-3" placeholder="Descrição do Produto"></textarea>
                <input type="text" name="preco" class="form-control mb-3" placeholder="Preço">



                <div class="mb-3">
                    <label for="categoria" class="form-label">Categoria</label>
                    <select name="categoria_id" id="categoria" class="form-control">
                        <?php echo $optionsHtml; ?>
                    </select>
                </div>
                
                <!-- Dropdown de Ofertas -->
                <div class="mb-3">
                    <label for="oferta" class="form-label">Oferta</label>
                    <select class="form-select" name="oferta" id="oferta">
                        <option value="relampago">Relâmpago</option>
                        <option value="50off">50% OFF</option>
                        <option value="semOferta">Sem Oferta</option>
                    </select>
                </div>
            </div>

            <!-- Passo 3: Confirmação -->
            <div id="step-3" class="tab-pane" role="tabpanel">
                <p>Verifica antes de enviar Fioty.</p>
                <button type="submit" class="btn btn-primary">Enviar</button>
            </div>
        </div>
    </div>
</form>


                            </div>
                            
                        </div>

                    </div>
                    
                </div>
                
            </div>
            <div class="container-fluid">
<div class="row">
    <div class="col-xl-12 col-xxl-12">
        <div class="card mt-5">
            <div class="card-header">
                <h4 class="card-title">Adicionar Nova Categoria</h4>
            </div>
            <div class="card-body">
                <form action="produtos-dash.php" method="POST">
                <input type="hidden" name="formType" value="addCategory">

                    <div class="mb-3">
                        <label for="nomeCategoria" class="form-label">Nome da Categoria</label>
                        <input type="text" class="form-control" id="nomeCategoria" name="nomeCategoria" placeholder="Digite o nome da categoria" required>
                    </div>
                    <!-- Novo campo para inserir o link da imagem -->
                    <div class="mb-3">
                        <label for="imagemCategoria" class="form-label">Link da Imagem da Categoria</label>
                        <input type="url" class="form-control" id="imagemCategoria" name="imagemCategoria" placeholder="Insira o link da imagem" required>
                    </div>
                    <button type="submit" class="btn btn-primary">Adicionar Categoria</button>
                </form>
            </div>
        </div>
    </div>
</div>

    <div class="row">
        <div class="col-xl-12 col-xxl-12">
            <div class="card mt-5">
                <div class="card-header">
                    <h4 class="card-title">Deletar Categoria Existente</h4>
                </div>
                <div class="card-body">
                    <form id="deleteCategoryForm" action="back-scripts/deletarCategoria.php" method="POST">
                        <div class="mb-3">
                            <label for="categoriaParaDeletar" class="form-label">Selecione a Categoria</label>
                            <select class="form-select" id="categoriaParaDeletar" name="categoriaId">
                            <?php echo $optionsHtml; ?>
                            </select>
                        </div>
                        <button type="button" id="deleteCategoryBtn" class="btn btn-danger">Deletar Categoria</button>
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