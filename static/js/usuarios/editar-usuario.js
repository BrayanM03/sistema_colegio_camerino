reloadInformacionUsuario()
function reloadInformacionUsuario(){

    let id_usuario = obtenerParametroGet('id')
    fetch('../servidor/database/traer-un-solo-dato.php', {
        method: 'POST',
        headers: {
            'Content-Type': 'application/json'
        },
        body: JSON.stringify({"tabla": "usuarios", "id": id_usuario, "relacion": false, "tablas_relacionadas":false})
        })
        .then(response => response.json())
        .then((data) =>{
            document.getElementById('nombre').value = data.data.nombre
            document.getElementById('apellido').value = data.data.apellido
            document.getElementById('sucursal').value = data.data.sucursal_id
            document.getElementById('rol').value = data.data.rol
            document.getElementById('usuario').value = data.data.usuario
    
            $("#sucursal").val(data.data.sucursal_id)
            let id_sucursal = $("#sucursal").val()
            setProyectos(id_sucursal, data.data.proyecto_id)
    
        });
}



  



function actualizarUsuario(id_usuario) {

    id_usuario = parseInt(id_usuario);
    let nombre = document.getElementById("nombre").value;
    let apellido = document.getElementById("apellido").value;
    let proyecto = document.getElementById("proyecto").value;
    let sucursal = document.getElementById("sucursal").value;
    let rol = document.getElementById("rol").value;

    $.ajax({
        type: "POST",
        url: "../servidor/usuarios/actualizar-usuario.php",
        data: {"id": id_usuario, "nombre": nombre, "apellido": apellido, "proyecto_id": proyecto,
               "sucursal_id": sucursal, "rol": rol},
        dataType: "JSON",
        success: function (response) {
            if(response.estatus == true){
                Toast.fire({
                    icon: 'success',
                    title: 'Datos actualizados'
                  })
            }else{
                Toast.fire({
                    icon: 'error',
                    title: response.mensaje
                  })
            }
        }
    });

}




function obtenerParametroGet(name) {
    name = name.replace(/[\[]/, "\\[").replace(/[\]]/, "\\]");
    var regex = new RegExp("[\\?&]" + name + "=([^&#]*)"),
      results = regex.exec(location.search);
    return results === null
      ? ""
      : decodeURIComponent(results[1].replace(/\+/g, " "));
  }


function setProyectos(id_sucursal, id_proyecto){
    $.ajax({
        type: "POST",
        url: "../servidor/usuarios/traer-proyectos.php",
        data: {"id_sucursal": id_sucursal},
        dataType: "JSON",
        success: function (response) {
            if(response.estatus == true){
                $("#proyecto").empty();
                response.datos.forEach(element => {
                    $("#proyecto").append(`
                        <option value="${element.id}">${element.nombre}</option
                    `)
                });

                $("#proyecto").val(id_proyecto)
            }else{
                $("#proyecto").empty();
                $("#proyecto").append(`
                        <option value="null">No se encontro información</option
                    `)

            }


        }
    });
}  


const Toast = Swal.mixin({
    toast: true,
    position: 'bottom-end',
    showConfirmButton: false,
    timer: 3000,
    timerProgressBar: true,
    didOpen: (toast) => {
      toast.addEventListener('mouseenter', Swal.stopTimer)
      toast.addEventListener('mouseleave', Swal.resumeTimer)
    }
  })