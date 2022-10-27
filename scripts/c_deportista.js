

function btn_guardar_datos_deportista()
{   
    var idAsociacion = $("#idAsociacion_s").val();
    var nombre = $("#nombre").val();
    var primerApellido = $("#primerApellido").val();
    var  segundoApellido = $("#segundoApellido").val();
    var fechaNacimiento = $("#fechaNacimiento").val();
    var cedula = $("#cedula").val();
    var fichaMedica = $("#fichaMedica").val();
    var perfil = $("#perfil").val();

    var ob= {idAsociacion:Number(idAsociacion),nombre:nombre,primerApellido:primerApellido,segundoApellido:segundoApellido,fechaNacimiento:fechaNacimiento,cedula:cedula,fichaMedica:fichaMedica,perfil:perfil};
    console.log(ob);
    $.ajax({
                //el protocolo
                type: "POST",

                //a donde quiero mandar el objeto
                url: "http://localhost/didede/index.php/Deportista/agregar_bd_deportista",    

                data: ob,

                //que quieres mostrar como recargable al iniciar
                

                //al finalizar
                success: function(data)
                {
                    $("#panel_respuesta").html(data);
                    btn_listar_datos_deportista();

                    //setTimeout(function(){ location.reload(); }, 2000);


                }
            });
}

function btn_listar_datos_deportista()
{
    // va vacio porque no es un formulario de registro
    var ob= "";
    $.ajax({
                //el protocolo
                type: "POST",
                //a donde quiero mandar el objeto
                url: "http://localhost/didede/index.php/Deportista/listar_datos_deportista",    
                data: ob,

                //que quieres mostrar como recargable al iniciar

                //al finalizar
                success: function(data)
                {
                    $("#panel_listado").html(data);
                }
            });
}




function btn_eliminar_deportista(idDeportista){
    var idDeportista = (idDeportista);
    var obj= {idDeportista};
    console.log(obj)
        $.ajax({
                    //el protocolo
                    type: "POST",
                    //a donde quiero mandar el objeto
                    url: "http://localhost/didede/index.php/Deportista/traer_datos",    
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
function btnEliminar_deportista(){
    var idDeportista = $('#idDeportista_eli').val();;
    var obj= {idDeportista};
    console.log(obj)
        $.ajax({
                    //el protocolo
                    type: "POST",
                    //a donde quiero mandar el objeto
                    url: "http://localhost/didede/index.php/Deportista/eliminar_deportista",    
                    data: obj,
    
                    //que quieres mostrar como recargable al iniciar
                    beforeSend: function(objeto){
                        
                    },
    
                    //al finalizar
                    success: function(data)
                    {
                        console.log('success');
                        // $("#panel_respuesta_eliminar").html(data);
                        btn_listar_datos_deportista();
                        console.log('success');
                       
                    }
                });
}

function btn_guardar_edicion_deportista()
{

    var idAsociacion = $("#idAsociacion_edi").val();
    var idDeportista = $("#idDeportista_edi").val();
    var nombre = $("#nombre_edi").val();
    var primerApellido = $("#primerApellido_edi").val();
    var  segundoApellido = $("#segundoApellido_edi").val();
    var fechaNacimiento = $("#fechaNacimiento_edi").val();
    var cedula = $("#cedula_edi").val();
    var fichaMedica = $("#fichaMedica_edi").val();
    var perfil = $("#perfil").val();

    var ob= {idAsociacion:Number(idAsociacion),idDeportista:Number(idDeportista),nombre:nombre,primerApellido:primerApellido,segundoApellido:segundoApellido,fechaNacimiento:fechaNacimiento,cedula:cedula,fichaMedica:fichaMedica,perfil:perfil};
    console.log(ob);    
    $.ajax({
                    //el protocolo
                    type: "POST",
                    //a donde quiero mandar el objeto
                    url: "http://localhost/didede/index.php/Deportista/guardar_datos_deportista",    
                    data: ob,
                    
    
                    //que quieres mostrar como recargable al iniciar
                   
    
                    //al finalizar
                    success: function(data)
                    {
                        $("#panel_respuesta_ediDeportista").html(data);
                        btn_listar_datos_deportista();
                       
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


    
    var tabla_solic=document.getElementById("tablabusqueda");
    tabla_solic.style.display="none";
    console.log(tabla_solic);
}
//modal para registrar

function btn_registrar_deportista()
{
    
    console.log('click');
    var ob= "";
        $.ajax({
                    //el protocolo
                    type: "POST",
                    //a donde quiero mandar el objeto
                    url: "http://localhost/didede/index.php/Deportista/subir_modal_deportista",    
                    data: ob,
    
                    //que quieres mostrar como recargable al iniciar
    
                    //al finalizar
                    success: function(data)
                    {
                        
                        $("#panel_registrar_d").html(data);
                       
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

function btn_editar_deportista(idDeportista){
    // console.log(id_medicamento);

    var ob= {idDeportista:idDeportista};
    console.log(ob);
        $.ajax({
                    //el protocolo
                    type: "POST",
                    //a donde quiero mandar el objeto
                    url: "http://localhost/didede/index.php/Deportista/editar_datos_deportista",    
                    data: ob,
    
                    //que quieres mostrar como recargable al iniciar
                    
                    //al finalizar
                    success: function(data)
                    {
                        $("#panel_editar").html(data);
                       
                    }
                });
}

function btn_infoDeportista(idDeportista){
    // console.log(id_medicamento);

    var ob= {idDeportista};
    console.log(ob);
        $.ajax({
                    //el protocolo
                    type: "POST",
                    //a donde quiero mandar el objeto
                    url: "http://localhost/didede/index.php/Deportista/info_datos_deportista",    
                    data: ob,
    
                    //que quieres mostrar como recargable al iniciar
                    
                    //al finalizar
                    success: function(data)
                    {
                        $("#panel_info").html(data);
                       
                    }
                });
}

