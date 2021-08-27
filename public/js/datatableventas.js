//tabla para mosatar productos en crear VENTAS
$('.tablaProductosVentas').DataTable( {
    "ajax": "/ventas/lista",
    //para optimizar la web
    "deferRender": true,
    "retrieve": true,
    "processing": true,

    //idioma
    "language": {
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
            "copyKeys": "Presione ctrl o u2318 + C para copiar los datos de la tabla al portapapeles del sistema. <br \/> <br \/> Para cancelar, haga clic en este mensaje o presione escape.",
            "copySuccess": {
                "1": "Copiada 1 fila al portapapeles",
                "_": "Copiadas %d fila al portapapeles"
            },
            "copyTitle": "Copiar al portapapeles",
            "csv": "CSV",
            "excel": "Excel",
            "pageLength": {
                "-1": "Mostrar todas las filas",
                "_": "Mostrar %d filas"
            },
            "pdf": "PDF",
            "print": "Imprimir"
        },
        "autoFill": {
            "cancel": "Cancelar",
            "fill": "Rellene todas las celdas con <i>%d<\/i>",
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
                    "not": "Diferente de"
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
            "title": "Filtros Activos - %d"
        },
        "select": {
            "cells": {
                "1": "1 celda seleccionada",
                "_": "$d celdas seleccionadas"
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
                "10": "Noviembre",
                "11": "Diciembre",
                "2": "Marzo",
                "3": "Abril",
                "4": "Mayo",
                "5": "Junio",
                "6": "Julio",
                "7": "Agosto",
                "8": "Septiembre",
                "9": "Octubre"
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
                    "_": "¿Está seguro que desea eliminar %d filas?",
                    "1": "¿Está seguro que desea eliminar 1 fila?"
                }
            },
            "error": {
                "system": "Ha ocurrido un error en el sistema (<a target=\"\\\" rel=\"\\ nofollow\" href=\"\\\">Más información&lt;\\\/a&gt;).<\/a>"
            },
            "multi": {
                "title": "Múltiples Valores",
                "info": "Los elementos seleccionados contienen diferentes valores para este registro. Para editar y establecer todos los elementos de este registro con el mismo valor, hacer click o tap aquí, de lo contrario conservarán sus valores individuales.",
                "restore": "Deshacer Cambios",
                "noMulti": "Este registro puede ser editado individualmente, pero no como parte de un grupo."
            }
        },
        "info": "Mostrando _START_ a _END_ de _TOTAL_ registros"
    } 
} );




//agregar productos desde la tabla
$(".tablaProductosVentas tbody").on("click", "button.agreagarProducto", function(e) {
    var productoId = $(this).attr("productoId");

    // console.log(productoId);
    $(this).removeClass("btn-primary agreagarProducto");
    $(this).addClass("btn-default");

    // var datos = new FormData();
    // datos.append("productoId", productoId);

    $.ajax({
        method: "GET",
        url: "/ventas/buscar",
        dataType: "json",
        success: function(res){
            var buscar = res[productoId - 1];
            var description = buscar["description"]
            var stock = buscar["stock"]
            var precio = buscar["price_sale"];

                /*=============================================
                EVITAR AGREGAR PRODUTO CUANDO EL STOCK ESTÁ EN CERO
                =============================================*/

            if(stock == 0){
                Swal.fire({
                        icon: 'error',
                        title: 'No hay stock disponible',
                        confirmButtonText: "¡Cerrar!"
                    })
                // $("button[productoId='"+productoId+"']").addClass("btn-primary agreagarProducto");
                $("button.recuperarBoton[productoId='"+productoId+"']").addClass('btn-primary agreagarProducto');
                return;
            }

            $(".nuevoProductoventa").append(
                '<div class="row">'+
                '<!-- DESCRIPCION DEL PRODUCTOS -->'+
                '<div class="col-6" style="padding-right:0px">'+
                    '<div class="input-group">'+
                        '<div class="input-group-prepend">'+
                            '<spam class="input-group-text"><button type="button" class="btn btn-danger btn-xs eliminarListaProducto" productiId="'+productoId+'"><i class="fas fa-times"></i></button></spam>'+
                        '</div>'+
                        '<input type="text" class="form-control" name="ventas[description]" placeholder="Descripción del producto" value="'+description+'" readonly required>'+
                    '</div>'+
                '</div>'+
                '<!-- CANTIDAD DE PRODUCTO -->'+
                '<div class="col-2 " style="padding-right:0px">'+
                    '<div class="input-group">'+
                        '<input type="number" class="form-control cantidadVentaProducto" min="1" value="1" max="'+stock+'" required>'+
                    '</div>'+
                '</div>'+
                '<!-- PRECIO DEL PRODUCTO -->'+
                '<div class="col-4 precioVentaProducto">'+
                    '<div class="input-group">'+
                        '<div class="input-group-prepend">'+
                            '<spam class="input-group-text"><i class="fas fa-dollar-sign"></i></spam>'+
                        '</div>'+
                        '<input type="text" class="form-control ModprecioVentaProducto" name="ventas[precio]" value="'+precio+'" precioReal="'+precio+'"  min="1" readonly required>'+
                    '</div>'+
                '</div>'+
                '</div>'
            )

            // console.log(description);
            // console.log(precio);
            // console.log(stock);
            SumarTotalPrecios();

            //cambiar formato a los precios imput
            $(".ModprecioVentaProducto").number( true, 2 );
            $(".totalVentasProducto").number( true, 2 );
        }
    })
})

//cuando navege en la tabla de consulta se almacena en local storage
$(".tablaProductosVentas").on("draw.dt", function(){
    if(localStorage.getItem("eliminarListaProducto") !=  null){
        var listaIdProducto = JSON.parse(localStorage.getItem("eliminarListaProducto"));

        for(var i = 0; i < listaIdProducto.length; i++){
            // console.log("hola")
            // $("button.recuperarBoton").attr("productoId", productoId[i]).removeClass("btn-default");
            // $("button.recuperarBoton").attr("productoId", productoId[i]).addClass("btn-primary agreagarProducto");
            $("button.recuperarBoton[productoId='"+listaIdProducto[i]["productoId"]+"']").removeClass('btn-default');
			$("button.recuperarBoton[productoId='"+listaIdProducto[i]["productoId"]+"']").addClass('btn-primary agreagarProducto');
        }
    }
})

var ideliminarListaProducto = [];
localStorage.removeItem("eliminarListaProducto");

//eliminar los productos de la lista de ventas
$(".formularioVenta").on("click", "button.eliminarListaProducto", function(e) {
    $(this).parent().parent().parent().parent().parent().remove();

    var productoId = $(this).attr("productiId");

    //ALMACENAR EL ID DEL PRODUCTO QUITADO EN LOCAL_STORAGE
    if(localStorage.getItem("eliminarListaProducto") ==  null){
        ideliminarListaProducto = [];

    }else{
        ideliminarListaProducto.concat(localStorage.getItem("eliminarListaProducto")) 
    }
    ideliminarListaProducto.push({"productoId": productoId})

    localStorage.setItem("eliminarListaProducto", JSON.stringify(ideliminarListaProducto))

    // console.log(productoId);

    // $("button.recuperarBoton").attr("productoId", productoId).removeClass("btn-default");
    // $("button.recuperarBoton").attr("productoId", productoId).addClass("btn-primary agreagarProducto");

    $("button.recuperarBoton[productoId='"+productoId+"']").removeClass('btn-default');
	$("button.recuperarBoton[productoId='"+productoId+"']").addClass('btn-primary agreagarProducto');

    if($(".nuevoProductoventa").children().length == 0){
        $(".totalVentasProducto").val(0);
        $(".totalVentasProducto").attr("totalVenta",0);
        $(".precioSinImpuesto").val(0);
    }else{
        SumarTotalPrecios();
    }
})

//MODIFICAR E PRECIO EN FUNCION A LA CANTIDAD
$(".formularioVenta").on("change", "input.cantidadVentaProducto", function(e) {
    var precioReal = $(this).parent().parent().parent().children(".precioVentaProducto").children().children(".ModprecioVentaProducto").attr("precioReal");
    var precio = $(this).parent().parent().parent().children(".precioVentaProducto").children().children(".ModprecioVentaProducto");

    var precioFinal = $(this).val() * precioReal;
    precio.val(precioFinal);

    if(Number($(this).val()) > Number($(this).attr("max"))){
        $(this).val(1)
        precio.val(precioReal);
        SumarTotalPrecios();
        Swal.fire({
            icon: 'error',
            title: 'La cantidad supera el Stock disponible',
            text: '¡solo hay '+$(this).attr("max")+' unidades',
            confirmButtonText: "¡Cerrar!"
        })
    }
    SumarTotalPrecios();
})

//sumar todos los los precios

function SumarTotalPrecios(){
    var precioItem = $(".ModprecioVentaProducto");
    var arraySumaPrecios = [];

    for (var i = 0; i < precioItem.length; i++){
        arraySumaPrecios.push(Number($(precioItem[i]).val()));
    }

    function sumarArray(total, numero){
        return total + numero;
    }
    var sumaTotalPrecio = arraySumaPrecios.reduce(sumarArray);

    $(".totalVentasProducto").val(sumaTotalPrecio);
    $(".totalVentasProducto").attr("totalVenta",sumaTotalPrecio);
    $(".precioSinImpuesto").val(sumaTotalPrecio);
    


    // console.log(sumaTotalPrecio);
}

//AGREGAR IMPUESTO
$(".formularioVenta").on("change", "input.impuestoTotalVentas", function(e) {
    var porcentaje = $(this).val();

    var preciobase = $(".totalVentasProducto").attr("totalVenta");

    var cantImpuesto = (Number(preciobase)*Number(porcentaje)/100);
    var precioFinalImpuesto = Number(cantImpuesto) + Number(preciobase);

    $(".totalVentasProducto").val(precioFinalImpuesto);
    $(".soloImpuesto").val(cantImpuesto);
    $(".precioSinImpuesto").val(preciobase);

})

