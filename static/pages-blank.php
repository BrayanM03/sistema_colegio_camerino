
<?php
session_start();

if (empty($_SESSION["id"])) {
    header("Location:login.php");
} ?>

<!DOCTYPE html>
<html lang="en">

<head>
	<meta charset="utf-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
	<meta name="description" content="Responsive Admin &amp; Dashboard Template based on Bootstrap 5">
	<meta name="author" content="AdminKit">
	<meta name="keywords" content="adminkit, bootstrap, bootstrap 5, admin, dashboard, template, responsive, css, sass, html, theme, front-end, ui kit, web">

	<link rel="preconnect" href="https://fonts.gstatic.com">
	<link rel="shortcut icon" href="img/icons/icon-48x48.png" />

	<link rel="canonical" href="https://demo-basic.adminkit.io/pages-blank.html" />

	<title>Inicio | AireEx manager</title>

	<link href="css/app.css" rel="stylesheet">
	<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/2.1.4/toastr.css" integrity="sha512-oe8OpYjBaDWPt2VmSFR+qYOdnTjeV9QPLJUeqZyprDEQvQLJ9C5PCFclxwNuvb/GQgQngdCXzKSFltuHD3eCxA==" crossorigin="anonymous" />
	<link href="https://fonts.googleapis.com/css2?family=Inter:wght@300;400;600&display=swap" rel="stylesheet">
	<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/animate.css/4.1.1/animate.min.css" />

</head>

<body>
	<div class="wrapper">

		<?php
		include "vistas/general/sidebar.php"
		?>
		<div class="main">
		<?php
		include "vistas/general/navbar.php"
		?>

			<main class="d-flex w-100">
		<div class="container d-flex flex-column">
			<div class="row vh-100">
				<div class="col-sm-10 col-md-8 col-lg-6 mx-auto d-table h-100">
					<div class="d-table-cell align-middle">

						<div class="text-center mt-4">
							<h1 class="h2">Nuevo registro de documentos</h1>
							<p class="lead">
								Desde este panel puedes crear un registro de documento, solo arrastra y suelta los documentos que subiras y colocale un nombre y descripción al registro.
							</p>
						</div>

						<div class="card">
							<div class="card-body">
								<div class="m-sm-4">
										<div class="mb-3">
											<label class="form-label">titulo</label>
											<input class="form-control form-control-lg animate__animated" type="text" id="titulo" name="name" placeholder="Ingresa tu nombre" />
										</div>
										<div class="mb-3">
											<label class="form-label">Descripción</label>
											<textarea class="form-control form-control-lg animate__animated" id="descripcion" placeholder="Ingresa una descripción"></textarea>
										</div>
										<div class="mb-3">
											<label class="form-label">Documentos:</label>
                                           
                                          <!--   <input type="file" name="file" /> -->
											
										</div>
										<!--<div class="mb-3">
											<label class="form-label">Contraseña</label>
											<input class="form-control form-control-lg animate__animated" type="password" id="pass" name="password" placeholder="Ingresa una contraseña" />
										</div> -->
                                    <form action="/file-upload" class="dropzone" id="my-awesome-dropzone">
                                         <div class="dz-message" data-dz-message><span>Suelta tus documentos aquí</span></div>
                                    </form>
                                    <div class="text-center mt-3">
									      	<a href="documentos-subidos.php" class="btn btn-lg btn-secondary">Volver</a>

											<a href="#" class="btn btn-lg btn-primary" onclick="actualizarUsuario()">Registrar</a>
											<!-- <button type="submit" class="btn btn-lg btn-primary">Sign up</button> -->
										</div>
								</div>
							</div>
						</div>

					</div>
				</div>
			</div>
		</div>
	</main>

			<footer class="footer">
				<div class="container-fluid">
					<div class="row text-muted">
						<div class="col-6 text-start">
							<p class="mb-0">
								<a class="text-muted" href="https://adminkit.io/" target="_blank"><strong>AdminKit</strong></a> &copy;
							</p>
						</div>
						<div class="col-6 text-end">
							<ul class="list-inline">
								<li class="list-inline-item">
									<a class="text-muted" href="https://adminkit.io/" target="_blank">Support</a>
								</li>
								<li class="list-inline-item">
									<a class="text-muted" href="https://adminkit.io/" target="_blank">Help Center</a>
								</li>
								<li class="list-inline-item">
									<a class="text-muted" href="https://adminkit.io/" target="_blank">Privacy</a>
								</li>
								<li class="list-inline-item">
									<a class="text-muted" href="https://adminkit.io/" target="_blank">Terms</a>
								</li>
							</ul>
						</div>
					</div>
				</div>
			</footer>
		</div>
	</div>

    <script src="https://code.jquery.com/jquery-3.5.1.js"></script>
	<script src="js/app.js"></script>

	<!-- Librerias -->
	<script src="//cdn.jsdelivr.net/npm/sweetalert2@11"></script>
	<script src="https://kit.fontawesome.com/31a28ea63e.js" crossorigin="anonymous"></script>
	<script src="https://cdn.datatables.net/1.12.1/js/jquery.dataTables.min.js"></script>
	<script src="https://cdn.datatables.net/1.12.1/css/jquery.dataTables.min.css"></script>
	<script src="//cdn.jsdelivr.net/npm/sweetalert2@11"></script>
	<script src="//cdn.jsdelivr.net/npm/sweetalert2@11"></script>
	<script src="//cdn.jsdelivr.net/npm/sweetalert2@11"></script>
	<script src="//cdn.jsdelivr.net/npm/sweetalert2@11"></script>
	<script src="js/usuarios/registrar.js"></script>

</body>

</html>