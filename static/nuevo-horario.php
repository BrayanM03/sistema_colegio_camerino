
<?php
session_start();

if (empty($_SESSION["id"])) {
    if($_SESSION["rol"] !== "manager"){

        header("Location:not-found.php");
    }
}
include "../servidor/database/conexion.php";

?>
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

    <title>Nuevo horarios | IIBGV manager</title>

    <link href="css/app.css" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css2?family=Inter:wght@300;400;600&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/animate.css/4.1.1/animate.min.css" />
    <link rel="stylesheet" href="https://cdn.datatables.net/1.12.1/css/jquery.dataTables.min.css" />
    <link rel="stylesheet" href="https://cdn.datatables.net/responsive/2.3.0/css/responsive.dataTables.min.css" />
    <link href="./css/bootstrap-select.min.css" rel="stylesheet" />
    <style>
        .btn-light{
            --bs-blue: #3b7ddd;
    --bs-indigo: #0a0a0a;
    --bs-purple: #6f42c1;
    --bs-pink: #e83e8c;
    --bs-red: #dc3545;
    --bs-orange: #fd7e14;
    --bs-yellow: #fcb92c;
    --bs-green: #1cbb8c;
    --bs-teal: #20c997;
    --bs-cyan: #17a2b8;
    --bs-white: #fff;
    --bs-gray: #6c757d;
    --bs-gray-dark: #343a40;
    --bs-gray-100: #f8f9fa;
    --bs-gray-200: #e9ecef;
    --bs-gray-300: #dee2e6;
    --bs-gray-400: #ced4da;
    --bs-gray-500: #adb5bd;
    --bs-gray-600: #6c757d;
    --bs-gray-700: #495057;
    --bs-gray-800: #343a40;
    --bs-gray-900: #212529;
    --bs-primary: #3b7ddd;
    --bs-secondary: #6c757d;
    --bs-success: #1cbb8c;
    --bs-info: #17a2b8;
    --bs-warning: #fcb92c;
    --bs-danger: #dc3545;
    --bs-light: #f5f7fb;
    --bs-dark: #212529;
    --bs-primary-rgb: 59,125,221;
    --bs-secondary-rgb: 108,117,125;
    --bs-success-rgb: 28,187,140;
    --bs-info-rgb: 23,162,184;
    --bs-warning-rgb: 252,185,44;
    --bs-danger-rgb: 220,53,69;
    --bs-light-rgb: 245,247,251;
    --bs-dark-rgb: 33,37,41;
    --bs-white-rgb: 255,255,255;
    --bs-black-rgb: 0,0,0;
    --bs-body-color-rgb: 73,80,87;
    --bs-body-bg-rgb: 245,247,251;
    --bs-font-sans-serif: "Inter","Helvetica Neue",Arial,-apple-system,BlinkMacSystemFont,"Segoe UI",Roboto,"Noto Sans",sans-serif,"Apple Color Emoji","Segoe UI Emoji","Segoe UI Symbol","Noto Color Emoji";
    --bs-font-monospace: SFMono-Regular,Menlo,Monaco,Consolas,"Liberation Mono","Courier New",monospace;
    --bs-gradient: linear-gradient(180deg,hsla(0,0%,100%,0.15),hsla(0,0%,100%,0));
    --bs-body-font-family: var(--bs-font-sans-serif);
    --bs-body-font-size: 0.875rem;
    --bs-body-font-weight: 400;
    --bs-body-line-height: 1.5;
    --bs-body-color: #495057;
    --bs-body-bg: #f5f7fb;
    --animate-duration: 1s;
    --animate-delay: 1s;
    --animate-repeat: 1;
    --fa-style-family-brands: "Font Awesome 6 Brands";
    --fa-font-brands: normal 400 1em/1 "Font Awesome 6 Brands";
    --fa-font-regular: normal 400 1em/1 "Font Awesome 6 Free";
    --fa-style-family-classic: "Font Awesome 6 Free";
    --fa-font-solid: normal 900 1em/1 "Font Awesome 6 Free";
    -webkit-text-size-adjust: 100%;
    -webkit-tap-highlight-color: rgba(0,0,0,0);
    direction: ltr;
    --bs-gutter-x: 24px;
    --bs-gutter-y: 0;
    box-sizing: border-box;
    font-family: inherit;
    margin: 0;
    text-transform: none;
    word-wrap: normal;
    appearance: none;
    background-clip: padding-box;
    background-color: #fff;
    border: 1px solid #ced4da;
    border-radius: .2rem;
    color: #495057;
    display: block;
    font-size: .875rem;
    font-weight: 400;
    line-height: 1.5;
    padding: .3rem .85rem;
    transition: border-color .15s ease-in-out,box-shadow .15s ease-in-out;
 
        }
    </style>
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

            <main class="content">
                <div class="container-fluid p-0">

                    <div class="row mb-2 justify-content-center">
                        <div class="col-12 col-md-3">
                            <h1 class="h3 mb-3">Crear nuevo horario</h1>
                        </div>
                        <div class="col-12 col-md-3 text-end">
                           <a href="horarios.php"><div class="btn btn-success">Volver</div></a> 
                        </div>
                    </div>



                    <div class="row justify-content-center">
                        <div class="col-12 col-md-10">
                            <div class="card">
                                <div class="card-header">
                                    <h5 class="card-title mb-0">Selecciona las materias, los grupos y los horas para este horario</h5>
                                </div>
                                <div class="card-body">
                                    <div class="row">
                                        <div class="col-12 col-md-12">
                                            <label for="">Nombre del horario</label>
                                            <input type="text" class="form-control" id="nombre-horario" placeholder="Nombre horario">
                                        </table>
                                        </div>
                                    </div>
                                    <div class="row mt-3 mb-3">
                                            <div class="col-12 col-md-3">
                                                    <label for="">Profesores</label>
                                                    <select name="" id="profesor" class="form-control selectpicker">
                                                        <option value="">Seleccione un profesor</option>
                                                        <?php
                                                    $count = "SELECT COUNT(*) FROM vista_profesores WHERE estatus =1";
                                                    $stmt = $con->prepare($count);
                                                    $stmt->execute();
                                                    $total = $stmt->fetchColumn();
                                                    $stmt->closeCursor();
                                                    if ($total > 0) {
                                                        //Seteando disponibilidad en los terrenos
                                                        $set = "SELECT * FROM vista_profesores WHERE estatus =1";
                                                        $res = $con->prepare($set);
                                                        $res->execute();
                                                    
                                                        while ($row = $res->fetch()) {
                                                        ?><option value="<?=$row['id']?>"><?=$row['nombre'] . ' ' . $row['apellido']?></option><?php
                                                        }
                                                    }

                                                    ?>
                                                    </select>
                                            </div>
                                        <div class="col-12 col-md-3">
                                            <label for="">Materias</label>
                                            <select name="" id="materia" class="form-control selectpicker">
                                                <option value="">Seleccione una materia</option>
                                                <?php
                                            $count = "SELECT COUNT(*) FROM materias WHERE estatus =1";
                                            $stmt = $con->prepare($count);
                                            $stmt->execute();
                                            $total = $stmt->fetchColumn();
                                            $stmt->closeCursor();
                                            if ($total > 0) {
                                                //Seteando disponibilidad en los terrenos
                                                $set = "SELECT * FROM materias WHERE estatus =1";
                                                $res = $con->prepare($set);
                                                $res->execute();
                                            
                                                while ($row = $res->fetch()) {
                                                   ?><option value="<?=$row['id']?>"><?=$row['nombre']?></option><?php
                                                }
                                            }

                                            ?>
                                            </select>
                                        </div>
                                        <div class="col-12 col-md-2">
                                            <label for="">Dias</label>
                                            <select name="" id="dia" class="form-control selectpicker">
                                                <option value="">Seleccione un día</option>
                                                <option value="lunes">Lunes</option>
                                                <option value="martes">Martes</option>
                                                <option value="miercoles">Miercoles</option>
                                                <option value="jueves">Jueves</option>
                                                <option value="viernes">Viernes</option>
                                                <option value="sabado">Sabado</option>
                                                <option value="domingo">Domingo</option>
                                            </select>
                                        </div>
                                        <div class="col-12 col-md-2">
                                        <label for="appt-time">Hora: </label>
                                        <input id="hora" class="form-control" type="time" name="appt-time" value="13:30" />
                                        </div>
                                        <div class="col-12 col-md-2">
                                        <label for="appt-time">Grupo: </label>
                                        <select name="" class="form-control selectpicker" id="grupo">
                                            <option value="">Seleccione un grupo</option>
                                            <?php
                                            $count = "SELECT COUNT(*) FROM grupos WHERE estatus =1";
                                            $stmt = $con->prepare($count);
                                            $stmt->execute();
                                            $total = $stmt->fetchColumn();
                                            $stmt->closeCursor();
                                            if ($total > 0) {
                                                //Seteando disponibilidad en los terrenos
                                                $set = "SELECT * FROM grupos WHERE estatus =1";
                                                $res = $con->prepare($set);
                                                $res->execute();
                                            
                                                while ($row = $res->fetch()) {
                                                   ?><option value="<?=$row['id']?>"><?=$row['nombre']?></option><?php
                                                }
                                            }

                                            ?>
                                        </select>
                                        </div>
                                    </div>
                                    <div class="row justify-content-center">
                                        <div class="col-12 text-center col-md-4">
                                           <div class="btn btn-primary" onclick="agregarPrehorario()">Agregar</div>
                                        </div>
                                    </div>
                                    <div class="mt-3">
                                        <hr class="mt-3">
                                    </div>
                                    <div class="row mt-5">
                                        <div class="col-12">
                                            <table id="tabla-prehorario"></table>
                                        </div>
                                    </div>
                                    <div class="row mt-5 justify-content-center">
                                        <div class="col-4 text-center">
                                            <div class="btn btn-success" onclick="registrarHorario()">Registrar horario</div>
                                        </div>
                                    </div>
                            </div>
                        </div>
                    </div>

                </div>
            </main>

            <?php
        include "vistas/general/footer.php"
        ?>
        </div>
    </div>

    <script src="https://code.jquery.com/jquery-3.5.1.js"></script>
    <script src="js/app.js"></script>

    <!-- Librerias -->
    <script src="https://kit.fontawesome.com/5c955c6e98.js" crossorigin="anonymous"></script>
    <script src="//cdn.jsdelivr.net/npm/sweetalert2@11"></script>
    <script src="https://cdn.datatables.net/1.12.1/js/jquery.dataTables.min.js"></script>
    <script src="https://cdn.datatables.net/responsive/2.3.0/js/dataTables.responsive.min.js"></script>
    <script src="./js/bootstrap-select.min.js"></script>
    <script src="js/horarios/prehorario.js"></script>
  

</body>

</html>