<nav class="navbar navbar-expand navbar-light navbar-bg">
				<a class="sidebar-toggle js-sidebar-toggle">
					<i class="hamburger align-self-center"></i>
				</a>

				<div class="navbar-collapse collapse">
					<ul class="navbar-nav navbar-align">
					
						
						<li class="nav-item dropdown">
							<a class="nav-icon dropdown-toggle d-inline-block d-sm-none" href="#" data-bs-toggle="dropdown">
								<i class="align-middle" data-feather="settings"></i>
							</a>

							<a class="nav-link dropdown-toggle d-none d-sm-inline-block" href="#" data-bs-toggle="dropdown">
								<img src="./img/logo.png" class="avatar img-fluid rounded me-1" alt="Charles Hall" /> <span class="text-dark" id="user-data"  id_user="<?php echo $_SESSION["id"] ?>"><?php echo $_SESSION["nombre"]. " ". $_SESSION["apellido"]?></span>
							</a>
							<div class="dropdown-menu dropdown-menu-end">
								<div class="profile dropdown-item">
									<div class="info" style="display:flex; flex-direction:column; justify-content:center; align-items:start;">
										<p><b><?php echo $_SESSION["user"]; ?></b></p>
										<small class="text-muted"><?php 
										if($_SESSION["rol"]==3){
											echo 'Estudiante';
										}else if($_SESSION["rol"]==1){
											echo 'Administrador';
										}else if($_SESSION["rol"]==2){
											echo 'Maestro';
										}; 
										?></small>
									</div>
									
								</div>
								<!-- <a class="dropdown-item" href="pages-profile.html"><i class="align-middle me-1" data-feather="user"></i> Perfil</a>
								<a class="dropdown-item" href="#"><i class="align-middle me-1" data-feather="pie-chart"></i> Analiticas</a>
								<div class="dropdown-divider"></div>
								<a class="dropdown-item" href="index.html"><i class="align-middle me-1" data-feather="settings"></i> Configuración</a>
								<a class="dropdown-item" href="#"><i class="align-middle me-1" data-feather="help-circle"></i> Centro de Ayuda</a>
								<div class="dropdown-divider"></div> -->
								<a class="dropdown-item" href="../servidor/database/cerrar-sesion.php">Cerrar Sesion</a>
							</div>
						</li>
					</ul>
				</div>
			</nav>