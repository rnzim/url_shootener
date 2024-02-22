<?php
const url = 'url/?u=';
if(isset($_GET['u'])){
    require_once "redirect.php";
    $link = redirect($_GET['u']);
   
    foreach($link as $url){
         $id = $url[0];     
         $link = $url[1];  
         include_once "app/database/database.php";
         $db = new Database();
         $db->addView($id);  
         header("Location: $link");
         exit;
    }
   
  
}

?>
<!DOCTYPE html>
<html lang="pt-br">

<head>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

	<!-- Font -->
	<link href="https://fonts.googleapis.com/css?family=Open+Sans:400,600%7CUbuntu:300,400,500,700" rel="stylesheet"> 
	<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.0.0/dist/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
	<!-- CSS -->
	<link rel="stylesheet" href="css/bootstrap-reboot.min.css">
	<link rel="stylesheet" href="css/bootstrap-grid.min.css">
	<link rel="stylesheet" href="css/owl.carousel.min.css">
	<link rel="stylesheet" href="css/jquery.mCustomScrollbar.min.css">
	<link rel="stylesheet" href="css/nouislider.min.css">
	<link rel="stylesheet" href="css/ionicons.min.css">
	<link rel="stylesheet" href="css/plyr.css">
	<link rel="stylesheet" href="css/photoswipe.css">
	<link rel="stylesheet" href="css/default-skin.css">
	<link rel="stylesheet" href="css/main.css">

	<!-- Favicons -->
	<link rel="icon" type="image/png" href="icon/favicon-32x32.png" sizes="32x32">
	<link rel="apple-touch-icon" href="icon/favicon-32x32.png">
	<link rel="apple-touch-icon" sizes="72x72" href="icon/apple-touch-icon-72x72.png">
	<link rel="apple-touch-icon" sizes="114x114" href="icon/apple-touch-icon-114x114.png">
	<link rel="apple-touch-icon" sizes="144x144" href="icon/apple-touch-icon-144x144.png">

	<meta name="description" content="">
	<meta name="keywords" content="">
	<meta name="author" content="rnzim">
	<title>UrlShootener</title>

</head>
<body class="body">

	<div class="sign section--bg" data-bg="img/section/section.jpg">
		<div class="container">
			<div class="row">
				<div class="col-12">
					<div class="sign__content">
						<!-- authorization form -->
						<form action="createLink.php" class="sign__form" method="POST">
							<a href="" class="sign__logo">
								<?php 
								if(isset($_GET['status'])){
									if($_GET['status']=='success'){
										echo '<div class="alert alert-primary" role="alert">
										Url Encurtada Com Sucesso
									  </div>';
									}
									if($_GET['status']=='error'){
										echo '<div class="alert alert-danger" role="alert">
										Por Favor Preencha Os Campos Corretamente
									  </div>';
									}
								}
								?>
								<h1>rnzm.online</h1>
								<p>Encurtador De Links Rapido e Prático</p>
							</a>

							<div class="sign__group">
								<input type="text" class="sign__input" placeholder="Url" name="link">
							</div>

							<div class="sign__group">
								<input type="text" class="sign__input" placeholder="Nome (opcional)" name="nome">
							</div>

											<p>Seu link</p>
											<?php 
											if(isset($_GET['url'])){
												$clear = filter_var($_GET['url'],FILTER_SANITIZE_URL);
												echo "<p style='color:blue;'>".url.$clear."</p>";
											}

											?>
					
							
							<button class="sign__btn" type="submit">Encurtar</button>

						
						</form>
						<!-- end authorization form -->
					</div>
				</div>
			</div>
		</div>
	</div>

	<!-- JS -->
	<script src="js/jquery-3.3.1.min.js"></script>
	<script src="js/bootstrap.bundle.min.js"></script>
	<script src="js/owl.carousel.min.js"></script>
	<script src="js/jquery.mousewheel.min.js"></script>
	<script src="js/jquery.mCustomScrollbar.min.js"></script>
	<script src="js/wNumb.js"></script>
	<script src="js/nouislider.min.js"></script>
	<script src="js/plyr.min.js"></script>
	<script src="js/jquery.morelines.min.js"></script>
	<script src="js/photoswipe.min.js"></script>
	<script src="js/photoswipe-ui-default.min.js"></script>
	<script src="js/main.js"></script>
</body>

</html>