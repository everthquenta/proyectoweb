

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
                    console.log(data);
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
    var tabla_s=document.getElementById("panel_mostrar_asoc")
    tabla_s.style.display="block";
    console.log(palabra);
    var obj= {palabra:palabra};
        $.ajax({
                    //el protocolo
                    type: "POST",
                    //a donde quiero mandar el objeto
                    url: "http://localhost/didede/index.php/asociacion/buscar_en_bds",    
                    data: obj,
    
                    //que quieres mostrar como recargable al iniciar
                    beforeSend: function(objeto){
                        
                    },
    
                    //al finalizar
                    success: function(data)
                    {
                        $("#panel_mostrar_asoc").html(data);
                       
                    }
                });
}

function btn_seleccionar(idAsociacion_s,nombre_s)
{
   
    var idAsoc = document.getElementById("idAsociacion_s");
    var nombre_asoc =document.querySelector(".mibuscador_s");
    nombre_asoc.value=nombre_s;
   
    idAsoc.value=idAsociacion_s;
    var tabla_s=document.getElementById("panel_mostrar_asoc");
    tabla_s.style.display="none";
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
//     console.log("intentando salir desde medicamento");

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

function btn_editar_soli(idSolicitud){
    // console.log(id_medicamento);
    

    var ob= {idSolicitud:idSolicitud};
    console.log(ob);
        $.ajax({
                    //el protocolo
                    type: "POST",
                    //a donde quiero mandar el objeto
                    url: "http://localhost/didede/index.php/Solicitud/editar_datos_soli",    
                    data: ob,
    
                    //que quieres mostrar como recargable al iniciar
                    
                    //al finalizar
                    success: function(data)
                    {
                        $("#panel_editar_soli").html(data);
                       
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

