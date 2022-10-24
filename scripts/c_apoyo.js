var carritoMaterial=[];



function btn_guardar_datos_solic()
{   
    var idAsociacion = $("#idAsociacion_s").val();
    var hojaRuta = $("#hojaRuta").val();
    var remitente = $("#remitente").val();
    var  campeonato = $("#campeonato").val();
    var referencia = $("#referencia").val();
    
    

    var ob= {idAsociacion:Number(idAsociacion),hojaRuta:hojaRuta,remitente:remitente,campeonato:campeonato,referencia:referencia};
    console.log(ob);
    $.ajax({
                //el protocolo
                type: "POST",

                //a donde quiero mandar el objeto
                url: "http://localhost/didede/index.php/Solicitud/agregar_bd_solic",    

                data: ob,

                //que quieres mostrar como recargable al iniciar
                

                //al finalizar
                success: function(data)
                {
                    $("#panel_respuesta").html(data);
                    btn_listar_datos();

                    //setTimeout(function(){ location.reload(); }, 2000);


                }
            });
}

function btn_listar_datos()
{
    // va vacio porque no es un formulario de registro
    var ob= "";
    $.ajax({
                //el protocolo
                type: "POST",
                //a donde quiero mandar el objeto
                url: "http://localhost/didede/index.php/Solicitud/listar_datos",    
                data: ob,

                //que quieres mostrar como recargable al iniciar

                //al finalizar
                success: function(data)
                {
                    $("#panel_listado").html(data);
                }
            });
}




function btn_eliminar(idAsociacion){
    var idAsociacion = (idAsociacion);
    var obj= {idAsociacion};
    console.log(obj)
        $.ajax({
                    //el protocolo
                    type: "POST",
                    //a donde quiero mandar el objeto
                    url: "http://localhost/didede/index.php/Asociacion/traer_datos",    
                    data: obj,
    
                    //que quieres mostrar como recargable al iniciar
                    
    
                    //al finalizar
                    success: function(data)
                    {
                        console.log('success');
                        $("#panel_respuesta_eliminar").html(data);
                        // btn_listar_datos();
                        console.log('success');
                       
                    }
                });
}
function btnEliminar(){
    var idAsociacion = $('#idAsociacion_eli').val();;
    var obj= {idAsociacion};
    console.log(obj)
        $.ajax({
                    //el protocolo
                    type: "POST",
                    //a donde quiero mandar el objeto
                    url: "http://localhost/didede/index.php/Asociacion/eliminar",    
                    data: obj,
    
                    //que quieres mostrar como recargable al iniciar
                    beforeSend: function(objeto){
                        
                    },
    
                    //al finalizar
                    success: function(data)
                    {
                        console.log('success');
                        // $("#panel_respuesta_eliminar").html(data);
                        btn_listar_datos();
                        console.log('success');
                       
                    }
                });
}

function btn_guardar_edicion()
{

    var idAsociacion = $("#idAsociacion_edi").val();
    var nombre = $("#nombre_edi").val();
    var direccion = $("#direccion_edi").val();
    var  telefono = $("#telefono_edi").val();
    var correo = $("#correo_edi").val();
    var fechaPersJuridica  = $("#fechaPersJuridica_edi").val();
    var logo  = $("#logo_edi").val();
    

    var obj= {idAsociacion:idAsociacion,nombre:nombre,direccion:direccion,telefono:telefono,correo:correo,fechaPersJuridica:fechaPersJuridica,logo:logo};
    console.log(obj);    
    $.ajax({
                    //el protocolo
                    type: "POST",
                    //a donde quiero mandar el objeto
                    url: "http://localhost/didede/index.php/Asociacion/guardar_datos",    
                    data: obj,
                    
    
                    //que quieres mostrar como recargable al iniciar
                   
    
                    //al finalizar
                    success: function(data)
                    {
                        $("#panel_respuesta_edicion").html(data);
                        btn_listar_datos();
                       
                    }
                });
}


function btn_buscar()
{

    var palabra = $("#dato_buscado").val();
    console.log(palabra);
    var obj= {palabra:palabra};
        $.ajax({
                    //el protocolo
                    type: "POST",
                    //a donde quiero mandar el objeto
                    url: "http://localhost/didede/index.php/asociacion/buscar_en_bd",    
                    data: obj,
                    //que quieres mostrar como recargable al iniciar
                    beforeSend: function(objeto){
                        
                    },

    
                    //al finalizar
                    success: function(data)
                    {
                        $("#panel_registrar_s").html(data);
                       
                    }
                });
                console.log(obj);

}
function btn_buscar_s()
{

    var palabra = $(".mibuscador_s").val();
    var tabla_solic=document.getElementById("panel_mostrar_asoc")
    
        tabla_solic.style.display="block";
    
    
    var obj= {palabra:palabra};
        $.ajax({
                    //el protocolo
                    type: "POST",
                    //a donde quiero mandar el objeto
                    url: "http://localhost/didede/index.php/solicitud/buscar_en_bds",    
                    data: obj,
    
                    //que quieres mostrar como recargable al iniciar
                    beforeSend: function(objeto){
                        
                    },
    
                    //al finalizar
                    success: function(data)
                    {
                        $("#tablabusqueda").html(data);
                       
                    }
                });
}

function btn_seleccionar_solic(idSolicitud,hojaRuta,remitente,campeonato,referencia)
{
    var Hoja_de_ruta =document.querySelector(".mibuscador_s");
    Hoja_de_ruta.value=hojaRuta;
    console.log(hojaRuta);
    var remitente_a =document.getElementById("remitente");
    remitente_a.value=remitente;
    var campeonato_a =document.getElementById("referencia");
    campeonato_a.value=referencia;
    var solicita_a =document.getElementById("campeonato");
    solicita_a.value=campeonato;
    var idSolicitud_a =document.getElementById("idSolicitud");
    idSolicitud_a.value=idSolicitud;


    
    var tabla_solic=document.getElementById("tablabusqueda");
    tabla_solic.style.display="none";
    console.log(tabla_solic);
}
//añade material
function btn_addMaterialCarrito(){

    var idSolicitud_a =document.getElementById("idSolicitud").value;
    console.log(idSolicitud_a);
    var idStockMatDeportivo_a =document.getElementById("idStockMatDep").value;
    console.log(idStockMatDeportivo_a);
    var nombreMat =document.getElementById("dato_buscado_mat").value;
    console.log(nombreMat);

    var stockMat =document.getElementById("stockmat").value;
    console.log(stockMat);
    var catProg_a =document.getElementById("categoriaProgramatica").value;
    console.log(catProg_a);
    var partida_a =document.getElementById("partida").value;
    console.log(partida_a);

    var material_obj={idSolicitud_a,idStockMatDeportivo_a, nombreMat,stockMat, catProg_a,partida_a}
    carritoMaterial=[...carritoMaterial,material_obj];
    console.log(carritoMaterial);
    
    var Hoja_de_ruta =document.querySelector(".mibuscador_s");
    crearHtml();

     document.querySelector(".mibuscador_mat").value="";
   
}





function crearHtml(){
    var trasladarCarrito="";
    var num=1;
    var apoyo_a =document.querySelector("#lista-carrito tbody");
    carritoMaterial.forEach(
        material_obj=>{

       trasladarCarrito=document.createElement('tr')
       trasladarCarrito.innerHTML=`
       <tr>
       <th>${num}</th>
       <th>${material_obj.idSolicitud_a}</th>
       <th>${material_obj.idStockMatDeportivo_a}</th>
       <th>${material_obj.catProg_a}</th>
       <th>${material_obj.partida_a}</th>
       <th>${material_obj.nombreMat}</th>
       <th>${material_obj.stockMat}</th>


       
       </tr>
       <td>
       <a href="#" class="borrar-material btn btn-primary " data-id="" onclick="eliminarMaterial(event)">x</a>
        </td>
       `; 
    num++;

    })
    apoyo_a.appendChild(trasladarCarrito);

}
function eliminarMaterial(e) {
    e.preventDefault();

    var trasladarCarrito,
       idSolicitud;
    if(e.target.classList.contains('borrar-material') ) {
         e.target.parentElement.parentElement.remove();
         trasladarCarrito = e.target.parentElement.parentElement;
         idSolicitud = trasladarCarrito.querySelector('a').getAttribute('data-id');

    }
    eliminarCursoLocalStorage(cursoId);
}

//modal para registrar

function btn_registrar_solicitud()
{
    
    console.log('click');
    var ob= "";
        $.ajax({
                    //el protocolo
                    type: "POST",
                    //a donde quiero mandar el objeto
                    url: "http://localhost/didede/index.php/solicitud/subir_modal_solic",    
                    data: ob,
    
                    //que quieres mostrar como recargable al iniciar
    
                    //al finalizar
                    success: function(data)
                    {
                        
                        $("#panel_registrar_s").html(data);
                       
                    }
                });
}

// function btn_salir()
// {
//     conso{le.log("intentando salir desde medicamento");

//     var obj= "";
//         $.ajax({
//                     //el protocolo
//                     type: "POST",
//                     //a donde quiero mandar el objeto
//                     url: url_p+"Cmedicamento/cerrar_session",    
//                     data: obj,
    
//                     // que quieres mostrar como recargable al iniciar
//                     beforeSend: function(objeto){
                        
//                     },
    
//                     //al finalizar
//                     success: function(data)
//                     {
//                         // $("#panel_listado").html(data);
                       
//                     }
//                 });
// }

function btn_editar(idAsociacion){
    // console.log(id_medicamento);

    var ob= {idAsociacion:idAsociacion};
    console.log(ob);
        $.ajax({
                    //el protocolo
                    type: "POST",
                    //a donde quiero mandar el objeto
                    url: "http://localhost/didede/index.php/Asociacion/editar_datos",    
                    data: ob,
    
                    //que quieres mostrar como recargable al iniciar
                    
                    //al finalizar
                    success: function(data)
                    {
                        $("#panel_editar").html(data);
                       
                    }
                });
}

function btn_info(idAsociacion){
    // console.log(id_medicamento);

    var ob= {idAsociacion};
    console.log(ob);
        $.ajax({
                    //el protocolo
                    type: "POST",
                    //a donde quiero mandar el objeto
                    url: "http://localhost/didede/index.php/Asociacion/info_datos",    
                    data: ob,
    
                    //que quieres mostrar como recargable al iniciar
                    
                    //al finalizar
                    success: function(data)
                    {
                        $("#panel_info").html(data);
                       
                    }
                });
}

function btn_procesarEntrega(){

     var obj = {
          arreglo:JSON.stringify(carritoMaterial),
     };
     console.log(obj);
     $.ajax({
          type: "POST",
          url:'http://localhost/didede/index.php/Apoyo/insertarDatos',
          data:obj,
          success: function(data){
               // console.log(data);
               window.location.href=`http://localhost/didede/index.php/Apoyo/imprimir/${data}`;
          }
     })
}
function btn_vaciarCarrito() {
    // forma lenta
    // listaCursos.innerHTML = '';
    // forma rapida (recomendada)
    var vaciarcarrito =document.querySelector("#lista-carrito tbody");
    while(vaciarcarrito.firstChild) {
         vaciarcarrito.removeChild(vaciarcarrito.firstChild);
    }
    

    // Vaciar Local Storage
    vaciarLocalStorage();

    return false;
}

