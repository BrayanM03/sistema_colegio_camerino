$(document).ready(function () {
    reloadTable()
    
  });

  const Toast = Swal.mixin({
    toast: true,
    position: "top-end",
    showConfirmButton: false,
    timer: 3000,
    timerProgressBar: true,
    didOpen: (toast) => {
      toast.onmouseenter = Swal.stopTimer;
      toast.onmouseleave = Swal.resumeTimer;
    }
  });
  
  function convertirHora(hora24) {
    const [hora, minuto] = hora24.split(':');
    const horas = parseInt(hora, 10);
    const periodo = horas >= 12 ? 'pm' : 'am';
    const hora12 = horas % 12 || 12; // Convierte 0 y 12 a 12 en formato de 12 horas
    return `${hora12}:${minuto} ${periodo}`;
}

  function reloadTable(){
    const role = $('#role').attr("role");
      tabla = $('#tabla-prehorario').DataTable({
          processing: true,
          serverSide: true,
          destroy:true,
          ajax:{
              url: '../servidor/horarios/prehorario_server_processing.php',
              dataType: 'json'
          },
          responsive: true,
          order: [0, 'desc'],
          columns:  [
              { data:0, title:'#' },
              { data:9, title:'Profesor'},
              { data:8, title:'Materia' }, 
              { data:2, title:'Día' }, 
              { data:3, title:'Hora', render:(data) =>{
                return convertirHora(data);
              }}, 
              { data:7, title:'Grupo' }, 
              { data:null, title:'Opciones', render: function(row){
                if(role == 'sales' || role == 'inventory'){
                  return `
                  <div class='row'>
                      <div class='col-12 col-md-12'>
                          <a href="editar-usuario.php?id=${row[0]}"><div class="btn btn-primary">
                              <i class="fa-solid fa-pen-to-square"></i>
                          </div>
                          </a>
                      </div>
                  </div>
                  `
                }else{
                  return `
                  <div class='row'>
                      <div class='col-12 col-md-12'>
                     
                          <div class="btn btn-danger" onclick="eliminarPrehorario(${row[0]})"><i class="fa-solid fa-trash"></i></div>
                      </div>
                  </div>
                  `
                }
                  
              }}
          ],
          
              language: language_options,
      
  
          
          
      });
  }

  function agregarPrehorario(){
    let validacion = validarFormulario();
    if(!validacion['estatus']){
      Toast.fire({
        icon: "error",
        title: validacion['mensaje']
      });
    }else{

      let profesor = $("#profesor").val();
      let materia = $("#materia").val();
      let dia = $("#dia").val();
      let hora = $("#hora").val();
      let grupo = $("#grupo").val();

      $.ajax({
        type: "post",
        url: '../servidor/horarios/agregar-detalle-prehorario.php',
        data: {profesor, materia, dia, hora, grupo},
        dataType: "json",
        success: function (response) {
          if(response.estatus){
            tabla.ajax.reload(null, false);
            Toast.fire({
              icon: "success",
              title: response['mensaje']
            });
          }else{
            Toast.fire({
              icon: "error",
              title: response['mensaje']
            });
          }
          
        }
      });

      
    }
  }

  function validarFormulario(){
      let profesor = $("#profesor").val();
      let materia = $("#materia").val();
      let dia = $("#dia").val();
      let hora = $("#hora").val();
      let grupo = $("#grupo").val();
      if(profesor.trim()==''){
        arreglo_res = {'estatus': false, 'mensaje': 'Selecciona un profesor'}
      }

      else if(materia.trim()==''){
        arreglo_res = {'estatus': false, 'mensaje': 'Selecciona una materia'}
      }
      
      else if(dia.trim() ==''){
        arreglo_res = {'estatus': false, 'mensaje': 'Selecciona un día'}
      }

      else if(hora.trim()==''){
        arreglo_res = {'estatus': false, 'mensaje': 'Selecciona una hora'}
      }

      else if(grupo.trim()==''){
        arreglo_res = {'estatus': false, 'mensaje': 'Selecciona un grupo'}
      }else{
        arreglo_res = {'estatus': true, 'mensaje': 'Agregado correctamente'}
      }
   
      return arreglo_res
  }

  function eliminarPrehorario(id){
      $.ajax({
        type: "post",
        url: "../servidor/horarios/borrar-prehorario.php",
        data: {id},
        dataType: "json",
        success: function (response) {
          if(response.estatus){
            tabla.ajax.reload(null, false);
            Toast.fire({
              icon: "success",
              title: response['mensaje']
            });
          }else{
            Toast.fire({
              icon: "error",
              title: response['mensaje']
            });
          }
        }
      });
  }

  function registrarHorario(){
    let nombre_horario = $("#nombre-horario").val();
    if(nombre_horario.trim() ==''){
      Toast.fire({
        icon: "error",
        title: 'Escribe un nombre para el horario'
      });
      return false;
    }

    $.ajax({
      type: "post",
      url: "../servidor/horarios/registrar-horario.php",
      data: {nombre_horario},
      dataType: "json",
      success: function (response) {
        if(response.estatus){
          Swal.fire({
            icon: 'success',
            title: response.mensaje
          })
        }else{
          Swal.fire({
            icon: 'error',
            title: response.mensaje
          })
        }
      }
    });
  }
  
  
  let language_options = {
      "processing": "Procesando...",
      "lengthMenu": "Mostrar _MENU_ registros",
      "zeroRecords": "No se encontraron resultados",
      "emptyTable": "Ningún dato disponible en esta tabla",
      "infoEmpty": "Mostrando registros del 0 al 0 de un total de 0 registros",
      "infoFiltered": "(filtrado de un total de _MAX_ registros)",
      "search": "Buscar:",
      "infoThousands": ",",
      "loadingRecords": "Cargando...",
      "paginate": {
        "first": "Primero",
        "last": "Último",
        "next": "Siguiente",
        "previous": "Anterior"
      },
      "aria": {
        "sortAscending": ": Activar para ordenar la columna de manera ascendente",
        "sortDescending": ": Activar para ordenar la columna de manera descendente"
      },
      "buttons": {
        "copy": "Copiar",
        "colvis": "Visibilidad",
        "collection": "Colección",
        "colvisRestore": "Restaurar visibilidad",
        "copyKeys": "Presione ctrl o u2318 + C para copiar los datos de la tabla al portapapeles del sistema. <br /> <br /> Para cancelar, haga clic en este mensaje o presione escape.",
        "copySuccess": {
          "1": "Copiada 1 fila al portapapeles",
          "_": "Copiadas %ds fila al portapapeles"
        },
        "copyTitle": "Copiar al portapapeles",
        "csv": "CSV",
        "excel": "Excel",
        "pageLength": {
          "-1": "Mostrar todas las filas",
          "_": "Mostrar %d filas"
        },
        "pdf": "PDF",
        "print": "Imprimir",
        "renameState": "Cambiar nombre",
        "updateState": "Actualizar",
        "createState": "Crear Estado",
        "removeAllStates": "Remover Estados",
        "removeState": "Remover",
        "savedStates": "Estados Guardados",
        "stateRestore": "Estado %d"
      },
      "autoFill": {
        "cancel": "Cancelar",
        "fill": "Rellene todas las celdas con <i>%d</i>",
        "fillHorizontal": "Rellenar celdas horizontalmente",
        "fillVertical": "Rellenar celdas verticalmentemente"
      },
      "decimal": ",",
      "searchBuilder": {
        "add": "Añadir condición",
        "button": {
          "0": "Constructor de búsqueda",
          "_": "Constructor de búsqueda (%d)"
        },
        "clearAll": "Borrar todo",
        "condition": "Condición",
        "conditions": {
          "date": {
            "after": "Despues",
            "before": "Antes",
            "between": "Entre",
            "empty": "Vacío",
            "equals": "Igual a",
            "notBetween": "No entre",
            "notEmpty": "No Vacio",
            "not": "Diferente de"
          },
          "number": {
            "between": "Entre",
            "empty": "Vacio",
            "equals": "Igual a",
            "gt": "Mayor a",
            "gte": "Mayor o igual a",
            "lt": "Menor que",
            "lte": "Menor o igual que",
            "notBetween": "No entre",
            "notEmpty": "No vacío",
            "not": "Diferente de"
          },
          "string": {
            "contains": "Contiene",
            "empty": "Vacío",
            "endsWith": "Termina en",
            "equals": "Igual a",
            "notEmpty": "No Vacio",
            "startsWith": "Empieza con",
            "not": "Diferente de",
            "notContains": "No Contiene",
            "notStarts": "No empieza con",
            "notEnds": "No termina con"
          },
          "array": {
            "not": "Diferente de",
            "equals": "Igual",
            "empty": "Vacío",
            "contains": "Contiene",
            "notEmpty": "No Vacío",
            "without": "Sin"
          }
        },
        "data": "Data",
        "deleteTitle": "Eliminar regla de filtrado",
        "leftTitle": "Criterios anulados",
        "logicAnd": "Y",
        "logicOr": "O",
        "rightTitle": "Criterios de sangría",
        "title": {
          "0": "Constructor de búsqueda",
          "_": "Constructor de búsqueda (%d)"
        },
        "value": "Valor"
      },
      "searchPanes": {
        "clearMessage": "Borrar todo",
        "collapse": {
          "0": "Paneles de búsqueda",
          "_": "Paneles de búsqueda (%d)"
        },
        "count": "{total}",
        "countFiltered": "{shown} ({total})",
        "emptyPanes": "Sin paneles de búsqueda",
        "loadMessage": "Cargando paneles de búsqueda",
        "title": "Filtros Activos - %d",
        "showMessage": "Mostrar Todo",
        "collapseMessage": "Colapsar Todo"
      },
      "select": {
        "cells": {
          "1": "1 celda seleccionada",
          "_": "%d celdas seleccionadas"
        },
        "columns": {
          "1": "1 columna seleccionada",
          "_": "%d columnas seleccionadas"
        },
        "rows": {
          "1": "1 fila seleccionada",
          "_": "%d filas seleccionadas"
        }
      },
      "thousands": ".",
      "datetime": {
        "previous": "Anterior",
        "next": "Proximo",
        "hours": "Horas",
        "minutes": "Minutos",
        "seconds": "Segundos",
        "unknown": "-",
        "amPm": [
          "AM",
          "PM"
        ],
        "months": {
          "0": "Enero",
          "1": "Febrero",
          "2": "Marzo",
          "3": "Abril",
          "4": "Mayo",
          "5": "Junio",
          "6": "Julio",
          "7": "Agosto",
          "8": "Septiembre",
          "9": "Octubre",
          "10": "Noviembre",
          "11": "Diciembre"
        },
        "weekdays": [
          "Dom",
          "Lun",
          "Mar",
          "Mie",
          "Jue",
          "Vie",
          "Sab"
        ]
      },
      "editor": {
        "close": "Cerrar",
        "create": {
          "button": "Nuevo",
          "title": "Crear Nuevo Registro",
          "submit": "Crear"
        },
        "edit": {
          "button": "Editar",
          "title": "Editar Registro",
          "submit": "Actualizar"
        },
        "remove": {
          "button": "Eliminar",
          "title": "Eliminar Registro",
          "submit": "Eliminar",
          "confirm": {
            "1": "¿Está seguro que desea eliminar 1 fila?",
            "_": "¿Está seguro que desea eliminar %d filas?"
          }
        },
        "error": {
          "system": "Ha ocurrido un error en el sistema (<a target=\"\\\"rel=\"\\nofollow\"href=\"\\\">Más información&lt;\\/a&gt;).</a>"
        },
        "multi": {
          "title": "Múltiples Valores",
          "info": "Los elementos seleccionados contienen diferentes valores para este registro. Para editar y establecer todos los elementos de este registro con el mismo valor, hacer click o tap aquí, de lo contrario conservarán sus valores individuales.",
          "restore": "Deshacer Cambios",
          "noMulti": "Este registro puede ser editado individualmente, pero no como parte de un grupo."
        }
      },
      "info": "Mostrando _START_ a _END_ de _TOTAL_ registros",
      "stateRestore": {
        "creationModal": {
          "button": "Crear",
          "name": "Nombre:",
          "order": "Clasificación",
          "paging": "Paginación",
          "search": "Busqueda",
          "select": "Seleccionar",
          "columns": {
            "search": "Búsqueda de Columna",
            "visible": "Visibilidad de Columna"
          },
          "title": "Crear Nuevo Estado",
          "toggleLabel": "Incluir:"
        },
        "emptyError": "El nombre no puede estar vacio",
        "removeConfirm": "¿Seguro que quiere eliminar este %s?",
        "removeError": "Error al eliminar el registro",
        "removeJoiner": "y",
        "removeSubmit": "Eliminar",
        "renameButton": "Cambiar Nombre",
        "renameLabel": "Nuevo nombre para %s",
        "duplicateError": "Ya existe un Estado con este nombre.",
        "emptyStates": "No hay Estados guardados",
        "removeTitle": "Remover Estado",
        "renameTitle": "Cambiar Nombre Estado"
      }
    }