

function btn_guardar_datos_mat()
{
    var tipomat = $("#tipomat").val();
    var talla = $("#talla").val();
    var  stock = $("#stock").val();
    var imgmat  = $("#imgmat").val();
    

    var ob= {tipomat:tipomat,talla:talla,stock:stock,imgmat:imgmat};
    $.ajax({
                //el protocolo
                type: "POST",

                //a donde quiero mandar el objeto
                url: "http://localhost/didede/index.php/StockMatDeportivo/agregar_bd_mat",    

                data: ob,

                //que quieres mostrar como recargable al iniciar
                

                //al finalizar
                success: function(data)
                {
                    $("#panel_respuesta").html("");
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
                url: "http://localhost/didede/index.php/StockMatDeportivo/listar_datos_mat",    
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
function btn_seleccionar_mat(idStockMatDeportivo,tipomat,talla,stock, categoriaProgramatica,partida)
{
   
    var materialdeportivo =document.querySelector(".mibuscador_mat");
    materialdeportivo.value=tipomat;
    console.log(materialdeportivo);
    var talla_a =document.getElementById("talla");
    talla_a.value=talla;
    var stock_a =document.getElementById("stockmat");
    stock_a.value=stock;
    var idStockMatDeportivo_a =document.getElementById("idStockMatDep");
    idStockMatDeportivo_a.value=idStockMatDeportivo;

    var catProg_a =document.getElementById("categoriaProgramatica");
    catProg_a.value=categoriaProgramatica;

    var partida_a =document.getElementById("partida");
    partida_a.value=partida;

    var stock_disponible =document.getElementById("cantstock");
    stock_disponible.value=stock;
    tablamaterial.style.display="none";
    console.log(tablamaterial)
    
}


function btn_buscar_mat()
{
    var tablamaterial=document.querySelector("#tablamaterial");
    tablamaterial.style.display="block";
    
    var palabra = $(".mibuscador_mat").val();
    console.log(palabra);
    
    var obj= {palabra:palabra};
        $.ajax({
                    //el protocolo
                    type: "POST",
                    //a donde quiero mandar el objeto
                    url: "http://localhost/didede/index.php/StockMatDeportivo/buscar_en_bd_mat",    
                    data: obj,
    
                    //que quieres mostrar como recargable al iniciar
                    beforeSend: function(objeto){
                        
                    },
    
                    //al finalizar
                    success: function(data)
                    {
                        $("#tablamaterial").html(data);
                       
                    }
                });
}



//modal para registrar

function btn_mod_ingresar_mat(){
    
    console.log('click');
    var ob= "";
        $.ajax({
                    //el protocolo
                    type: "POST",
                    //a donde quiero mandar el objeto
                    url: "http://localhost/didede/index.php/StockMatDeportivo/subir_mod_mat",    
                    data: ob,
    
                    //que quieres mostrar como recargable al iniciar
    
                    //al finalizar
                    success: function(data)
                    {
                        
                        $("#panel_registrar").html(data);
                                                    
                            
                            
                            
                        
                       
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

