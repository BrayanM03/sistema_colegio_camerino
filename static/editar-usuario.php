<!DOCTYPE html>
<html lang="en">
<?php
session_start();

if (empty($_SESSION["id"] || $_SESSION['rol'] !== 'manager')) {
    header("Location:login.php");
} ?>
<head>
	<meta charset="utf-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
	<meta name="description" content="Responsive Admin &amp; Dashboard Template based on Bootstrap 5">
	<meta name="author" content="AdminKit">
	<meta name="keywords" content="adminkit, bootstrap, bootstrap 5, admin, dashboard, template, responsive, css, sass, html, theme, front-end, ui kit, web">

	<link rel="preconnect" href="https://fonts.gstatic.com">
	<link rel="shortcut icon" href="img/icons/icon-48x48.png" />

	<link rel="canonical" href="https://demo-basic.adminkit.io/pages-sign-up.html" />

	<title>Editar-usuario | ERP manager</title>

	<link href="css/app.css" rel="stylesheet">
	<link href="https://fonts.googleapis.com/css2?family=Inter:wght@300;400;600&display=swap" rel="stylesheet">
	<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/animate.css/4.1.1/animate.min.css" />
	<style>
		#btn-user, #btn-password{
		  width: 97px;
		  height: 32.59px;
		  display: flex;
		  justify-content: center;

		}
		.preloader {
  width: 16px;
  height: 16px;
  border: 2.5px solid #eee;
  border-top: 2.5px solid tomato;
  border-radius: 50%;
  animation-name: girar;
  animation-duration: 2s;
  animation-iteration-count: infinite;
}
@keyframes girar {
  from {
    transform: rotate(0deg);
  }
  to {
    transform: rotate(360deg);
  }
}
	</style>
</head>

<body>
	<main class="d-flex w-100">
		<div class="container d-flex flex-column">
			<div class="row vh-100">
				<div class="col-sm-10 col-md-8 col-lg-6 mx-auto d-table h-100">
					<div class="d-table-cell align-middle">

						<div class="text-center mt-4">
							<h1 class="h2">Actualizar usuario</h1>
							<p class="lead">
								Establece los datos a actualizar del usuario, si quiere actualizar sus credenciales click en "credenciales".
							</p>
						</div>

						<div class="card">
							<div class="card-body">
								<div class="m-sm-4">
									<form>
										<div class="mb-3">
											<label class="form-label">Nombre</label>
											<input class="form-control form-control-lg animate__animated" type="text" id="nombre" name="name" placeholder="Ingresa tu nombre" />
										</div>
										<div class="mb-3">
											<label class="form-label">Apellido</label>
											<input class="form-control form-control-lg animate__animated" type="text" id="apellido" name="company" placeholder="Ingresa tu apellido" />
										</div>
										<div class="mb-3 d-none">
											<label class="form-label">Usuario</label>
											<input class="form-control form-control-lg animate__animated" type="text" id="usuario" name="user" placeholder="Ingresa un usuario" />
										</div>
										<!--<div class="mb-3">
											<label class="form-label">Contraseña</label>
											<input class="form-control form-control-lg animate__animated" type="password" id="pass" name="password" placeholder="Ingresa una contraseña" />
										</div> -->
										<div class="mb-3">
											<label class="form-label">Sucursal</label>
											<select name="" class="form-control animate__animated"id="sucursal" onchange="setProyectos(this.value)">
												<option value="1">Oficina CB</option>
												<option value="2">Oficina ALCE</option>
											</select>
										</div>

										<div class="mb-3">
											<label class="form-label">Proyecto</label>
											<select name="" class="form-control animate__animated"id="proyecto">
											</select>
										</div>

										<div class="mb-3">
											<label class="form-label">Rol</label>
											<select name="" class="form-control animate__animated"id="rol">
												<option value="manager">Administrador</option>
												<option value="sales">Ventas</option>
												<option value="storage">Inventario</option>
												<option value="visitor">Visitante</option>
											</select>
										</div>

										<div class="text-center mt-3">
									      	<a href="usuarios.php" class="btn btn-lg btn-secondary">Volver</a>
									      	<a class="btn  mr-2 ml-2 btn-lg btn-warning" onclick="mostrarCredenciales(<?php echo $_GET['id']; ?>)">Credenciales</a>

											<a href="#" class="btn btn-lg btn-primary" onclick="actualizarUsuario(<?php echo $_GET['id']; ?>)">Actualizar</a>
											<!-- <button type="submit" class="btn btn-lg btn-primary">Sign up</button> -->
										</div>
									</form>
								</div>
							</div>
						</div>

					</div>
				</div>
			</div>
		</div>
	</main>

	<script src="https://code.jquery.com/jquery-3.5.1.js"></script>

	<script src="js/app.js"></script>
	<script src="//cdn.jsdelivr.net/npm/sweetalert2@11"></script>
	<script src="js/usuarios/editar-usuario.js"></script>
	<script src="js/usuarios/credenciales.js"></script>

</body>

</html>