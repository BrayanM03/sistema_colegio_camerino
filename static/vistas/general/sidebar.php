<?php

    if(empty($_SESSION["id"])){
        header("Location:login.php");
    }else{
        $rol =$_SESSION["rol"];
    }
    include "../servidor/database/conexion.php";

    function verificarPermiso($con, $rol, $url, $permiso) {
        // Conexión a la base de datos (ajusta con tus datos)
        
        $query = "SELECT count(*) FROM nivel_acceso_roles nar 
                  INNER JOIN roles r ON nar.id_rol = r.id 
                  INNER JOIN nivel_acceso na ON nar.id_nivel_acceso = na.id 
                  INNER JOIN permisos p ON nar.id_permiso = p.id 
                  WHERE nar.id_rol = ? AND na.nombre = ? AND p.permiso = ?";
        $stmt = $con->prepare($query);
        $stmt->execute([$rol, $url, $permiso]);http://localhost:8888/sistema_instituto/static/index.php
        $total= $stmt->fetchColumn();
        $stmt->closeCursor(); 
        return ($total > 0);
    }
    $rol = $_SESSION['rol'];

?>
<nav id="sidebar" class="sidebar js-sidebar">
    <div class="sidebar-content js-simplebar">
        <a class="sidebar-brand text-center" href="index.php" id="role" role="<?php echo $rol ?>">
            <img src="./img/logo_2.png" alt="" style="width:80px; border-radius:7px; margin-right:1rem;"><br>
            <span class="align-middle">Sistema</span>
        </a>

        <ul class="sidebar-nav">
            <?php if (verificarPermiso($con, $rol, 'index.php', 'ver')): ?>
                <li class="sidebar-item">
                    <a class="sidebar-link" href="index.php">
                        <i class="align-middle" data-feather="sliders"></i> <span class="align-middle">Panel</span>
                    </a>
                </li>
            <?php endif; ?>

            <?php if (verificarPermiso($con, $rol, 'asistencia.php', 'ver')): ?>
            <li class="sidebar-item accordion-button" aria-expanded="true">
                <a class="sidebar-link" href="asistencia.php">
                    <i class="align-middle" data-feather="clock"></i> <span class="align-middle">Asistencia</span>
                </a>
            </li>
            <?php endif; ?>
            <div class="accordion" id="accordionExample2">
                <div class="accordion-item">
               
                    <li class="sidebar-item accordion-button" data-bs-toggle="collapse" data-bs-target="#collapseHistory" aria-expanded="true" aria-controls="collapseHistory">
                        <a class="sidebar-link" href="#">
                            <i class="align-middle" data-feather="folder"></i> <span class="align-middle">Historial</span>
                        </a>
                    </li>
       
                    <div id="collapseHistory" class="accordion-collapse collapse" style="margin-left:13px;" aria-labelledby="headingHistory" data-bs-parent="#accordionExample2">
                        <div class="accordion-body">
                        <?php if (verificarPermiso($con, $rol, 'documentos-subidos.php', 'ver')): ?>
                            <li class="sidebar-item">
                                <a class="sidebar-link" href="documentos-subidos.php">
                                    <i class="align-middle" data-feather="book"></i> <span class="align-middle">Documentos subidos</span>
                                </a>
                            </li>
                            <?php endif; ?>
                        </div>
                    </div>

                </div>
            </div>

            <div class="accordion" id="accordionExample3">
                <div class="accordion-item">

                    <li class="sidebar-item accordion-button" data-bs-toggle="collapse" data-bs-target="#collapseCatalogos" aria-expanded="true" aria-controls="collapseCatalogos">
                        <a class="sidebar-link" href="#">
                            <i class="align-middle" data-feather="clipboard"></i> <span class="align-middle">Catalogos</span>
                        </a>
                    </li>

                    <div id="collapseCatalogos" class="accordion-collapse collapse" style="margin-left:13px;" aria-labelledby="headingCatalogo" data-bs-parent="#accordionExample3">
                        <div class="accordion-body">
                        <?php if (verificarPermiso($con, $rol, 'alumnos.php', 'ver')): ?>
                            <li class="sidebar-item">
                                <a class="sidebar-link" href="alumnos.php">
                                    <i class="align-middle" data-feather="users"></i> <span class="align-middle">Alumnos</span>
                                </a>
                            </li>
                            <?php endif; ?>
                            <?php if (verificarPermiso($con, $rol, 'profesores.php', 'ver')): ?>
                            <li class="sidebar-item">
                                <a class="sidebar-link" href="profesores.php">
                                    <i class="align-middle" data-feather="user"></i> <span class="align-middle">Profesores</span>
                                </a>
                            </li>
                            <?php endif; ?>
                            <?php if (verificarPermiso($con, $rol, 'materias.php', 'ver')): ?>
                            <li class="sidebar-item">
                                <a class="sidebar-link" href="materias.php">
                                    <i class="align-middle" data-feather="book"></i> <span class="align-middle">Materias</span>
                                </a>
                            </li>
                            <?php endif; ?>
                            <?php if (verificarPermiso($con, $rol, 'horarios.php', 'ver')): ?>
                            <li class="sidebar-item accordion-button" aria-expanded="true">
                                <a class="sidebar-link" href="horarios.php">
                                    <i class="align-middle" data-feather="clock"></i> <span class="align-middle">Horarios</span>
                                </a>
                            </li>
                            <?php endif; ?>
                        </div>
                    </div>

                </div>
            </div>

            <!-- <li class="sidebar-item">
                <a class="sidebar-link" href="pages-blank.html">
                    <i class="align-middle" data-feather="book"></i> <span class="align-middle">Blank</span>
                </a>
            </li> -->
           
        </ul>

        <div class="sidebar-cta">
            <div class="sidebar-cta-content">
                <strong class="d-inline-block mb-2">Sistema en proceso</strong>
                <div class="mb-3 text-sm">
                    Algunas funciones estan en proceso de desarollo.
                </div>
                <!-- <div class="d-grid">
                    <a href="upgrade-to-pro.html" class="btn btn-primary">Upgrade to Pro</a>
                </div> -->
            </div>
        </div>
    </div>
</nav>
<script>
    document.addEventListener("DOMContentLoaded", function () {
    // Obtener la ruta actual de la URL y el nombre del archivo
    const currentPath = window.location.pathname;
    const currentPage = currentPath.substring(currentPath.lastIndexOf('/') + 1); // Extraer solo el nombre del archivo

    // Seleccionar todos los enlaces en el sidebar
    const sidebarLinks = document.querySelectorAll(".sidebar-link");

    sidebarLinks.forEach(link => {
        // Obtener el nombre del archivo en href para cada enlace
        const linkPath = link.getAttribute("href");
        const linkPage = linkPath.substring(linkPath.lastIndexOf('/') + 1); // Extraer solo el nombre del archivo

        // Verificar si el archivo del enlace coincide con el archivo de la URL actual
        if (linkPage === currentPage) {
            // Agregar clase 'active' al elemento actual
            link.parentElement.classList.add("active");

            // Abrir el acordeón si es parte de uno
            const accordionBody = link.closest(".accordion-collapse");
            if (accordionBody) {
                accordionBody.classList.remove("collapse"); // Quitar "collapse" para abrir
                accordionBody.classList.add("show"); // Añadir "show" para mantener abierto
            }
        }
    });
});


</script>