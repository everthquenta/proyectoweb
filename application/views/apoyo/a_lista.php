<div class="page-content bg-light">
    <div class="page-header bg-light">
        <div class="container-fluid">
            <h2 class="h5 no-margin-bottom">ENTREGA DE MATERIAL</h2>
        </div>
    </div>
    <section>
        <div class="container-fluid">
            <form action="" method="post" id="frmCompras" class="row" autocomplete="off">
                <div class="col-lg-6">
                    <div class="form-group">
                        <label for="buscar_solicitud">HOJA DE RUTA</label>
                        <input type="hidden" id="idSolicitud" name="idSolicitud">
                        <input type="text" class="mibuscador_s form-control border border-dark " name="" id="dato_buscado" aria-describedby="emailHelp" onkeyup="btn_buscar_s();" style="width:60%;display:inline;margin-top:.1em; margin-bottom:15px;" >
                        <div class="row">
                                <div class="col-lg-12" width="100"; height="100";>
                                    <div class="table - responsive">
                                        <table class="table table-light mt-2" id="tablabusqueda">
                                            <thead class="thead-white">
                                                <tr>
                                                    <th></th>
                                                    <th></th>
                                                    <th></th>
                                                    <th></th>
                                                    <th></th>
                                                    <th></th>
                                                </tr>
                                            </thead>
                                            <tbody id="ListaCompras">

                                            </tbody>
                                        </table>
                                    </div>
                                </div>
                            </div>
                        
                        <span class="text-danger d-none" id="error">No hay producto</span>
                    </div>
                    <div class="col-lg-4">
                    <div class="form-group">
                        <label for="campeonato">Remitente</label>
                        <input id="campeonato" class="form-control" type="text" name="campeonato"  readonly>
                        <br />
                        <strong id="nombreP"></strong>
                    </div>
                </div>
                <div class="col-lg-2">
                    <div class="form-group">
                        <label for="cantidad">Cantidad</label>
                        <input id="stockD" type="hidden">
                        <input id="cantidad" class="form-control" type="text" name="cantidad" onkeyup="IngresarCantidad(event);">
                    </div>
                </div>
                <div class="col-lg-3">
                    <div class="form-group">
                        <label for="precio">Precio</label>
                        <input id="precio" class="form-control" type="hidden" name="precio">
                        <br />
                        <strong id="precioP"></strong>
                    </div>
                </div>
                </div>

                <div class="col-lg-6">
                    <div class="form-group">
                        <label for="buscar_solicitud">MATERIAL DEPORTIVO</label>
                        <input type="hidden" id="idSolicitud" name="idSolicitud">
                        <input type="text" class="mibuscador_s form-control border border-dark " name="" id="dato_buscado" aria-describedby="emailHelp" onkeyup="btn_buscar_s();" style="width:60%;display:inline;margin-top:.1em; margin-bottom:15px;" >
                        <div class="row">
                                <div class="col-lg-12" width="100"; height="100";>
                                    <div class="table - responsive">
                                        <table class="table table-light mt-2" id="tablabusqueda" >
                                            <thead class="thead-white">
                                                <tr>
                                                    <th></th>
                                                    <th></th>
                                                    <th></th>
                                                    <th></th>
                                                    <th></th>
                                                    <th></th>
                                                </tr>
                                            </thead>
                                            <tbody id="ListaCompras">

                                            </tbody>
                                        </table>
                                    </div>
                                </div>
                            </div>
                        
                        <span class="text-danger d-none" id="error">No hay producto</span>
                    </div>
                    <div class="col-lg-4">
                    <div class="form-group">
                        <label for="campeonato">Remitente</label>
                        <input id="campeonato" class="form-control" type="text" name="campeonato" value="hola" readonly>
                        <br />
                        <strong id="nombreP"></strong>
                    </div>
                </div>
                <div class="col-lg-2">
                    <div class="form-group">
                        <label for="cantidad">Cantidad</label>
                        <input id="stockD" type="hidden">
                        <input id="cantidad" class="form-control" type="text" name="cantidad" onkeyup="IngresarCantidad(event);">
                    </div>
                </div>
                <div class="col-lg-3">
                    <div class="form-group">
                        <label for="precio">Precio</label>
                        <input id="precio" class="form-control" type="hidden" name="precio">
                        <br />
                        <strong id="precioP"></strong>
                    </div>
                </div>
                </div>
               
            </form>
            <div class="row">
                <div class="col-lg-12">
                    <div class="table-responsive">
                        <table class="table table-light mt-4" id="tablaCompras">
                            <thead class="thead-dark">
                                <tr>
                                    <th>Id</th>
                                    <th>Producto</th>
                                    <th>Cantidad</th>
                                    <th>Precio</th>
                                    <th>Total</th>
                                    <th>Accion</th>
                                </tr>
                            </thead>
                            <tbody id="ListaCompras">

                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="col-lg-4 mt-1">
                    <div class="form-group">
                        <strong class="text-primary">Datos de la Asociacion Deportiva</strong>
                        <input type="hidden" id="id_cliente" name="id_cliente">
                        <input type="text" id="ruc_cliente" onkeyup="BuscarCliente(event);" name="ruc_cliente" class="form-control" placeholder="Ruc/Dni del cliente">
                        <strong id="nom_cli" class="form-control border-0 text-success"></strong>
                        <strong id="dir_cli" class="form-control border-0 text-success"></strong>
                        <strong id="tel_cli" class="form-control border-0 text-success"></strong>
                    </div>
                </div>
                <div class="col-lg-4 mt-1">
                    <div class="form-group">
                        <strong class="text-primary">Total a pagar</strong>
                        <input type="hidden" id="total" name="total" class="form-control  mb-2">
                        <strong id="tVenta" class="form-control border-0 text-success"></strong>
                        <button class="btn btn-danger" type="button" id="AnularCompra">Anular Venta</button>
                        <button class="btn btn-success" type="button" id="procesarVenta"><i class="fas fa-money-check-alt"></i> Procesar Venta</button>
                    </div>
                </div>
            </div>
        </div>
    </section>
</div>



<!-- Agregar medicamento -->

<!-- The Modal guardar -->
<!-- <div class="modal fade" id="myModal_registrars">
    <div class="modal-dialog">
        <div class="modal-content">

            <div class="modal-header" style="background-color: #084B8A; color:white">
                <h4 class="modal-title">Registrar Conductor</h4>
                <button type="button" class="btn-close" data-bs-dismiss="modal"></button>
            </div>
            
            <div class="modal-body">
                
                <div id="panel_registrar"></div>
                <div id="panel_respuesta_registrar"></div>
            </div>
            
            <div class="modal-footer">
                <button type="button" class="btn btn-info" data-bs-dismiss="modal" onclick="btn_guardar_datos();">Guardar</button>
                <button type="button" class="btn btn-danger" data-bs-dismiss="modal">Cerrar</button>
            </div>
            
        </div>
    </div>
    
</div> -->


<!-- The Modal -->
<!-- <div class="modal fade" id="myModal_editars">
    <div class="modal-dialog">
        <div class="modal-content">

            Modal Header
            <div class="modal-header" style="background-color: #084B8A; color:white">
                <h4 class="modal-title">Editar Conductor</h4>
                <button type="button" class="btn-close" data-bs-dismiss="modal"></button>
            </div>

            Modal body
            <div class="modal-body">

                <div id="panel_editar"></div>
                <div id="panel_respuesta_edicion"></div>
            </div>

            Modal footer
            <div class="modal-footer">
                <button type="button" class="btn btn-info" data-bs-dismiss="modal" onclick="btn_guardar_edicion()">Guardar</button>
                <button type="button" class="btn btn-danger" data-bs-dismiss="modal">Cerrar</button>
            </div>

        </div>
    </div>
</div> -->

<!-- Modal -->

<div class="modal fade" id="myModal_editar" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header " style=" background:#061B3D">
                <h5 class="modal-title text-white">MODIFICAR ASOCIACION DEPORTIVA</h4>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
            </div>
            <div class="modal-body">
                <div id="panel_editar"></div>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-dismiss="modal">Cancelar</button>
                <button type="button" class="btn btn-primary" onclick="btn_guardar_edicion()" data-dismiss="modal">Editar</button>
            </div>
        </div>
    </div>
</div>
<!-- Button trigger modal -->


<!-- Modal -->

<div class="modal fade" id="Mod_registrar_solic" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">

    <form>
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header " style=" background:#061B3D">
                    <h5 class="modal-title text-white">REGISTRAR SOLICITUD</h4>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                </div>
                <div class="modal-body">
                <div id="panel_registrar_s"></div>
                    <div style="overflow-y:scroll; heigth:100px; border-color:#061B3D important">
                    <div id="panel_mostrar_asoc" ></div>
                    </div>
                   
                    <div id="panel_respuesta_registrar"></div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Cancelar</button>
                    <button type="submit" class="btn btn-primary" id="guardar" onclick="btn_guardar_datos_solic();" data-dismiss="modal">Guardar</button>
                </div>
            </div>
        </div>
    </form>
</div>
<!-- Button trigger modal -->
<div class="modal fade" id="myModal_eliminar" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">


    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header " style=" background:#061B3D">
                <h5 class="modal-title text-white">Estas seguro de eliminar?</h4>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
            </div>
            <div class="modal-body">
                <div id="panel_editar"></div>
                <div id="panel_respuesta_eliminar"></div>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-dismiss="modal">Cancelar</button>
                <button type="button" id="eliminar" data-id="" onclick="btnEliminar()" class="btn btn-primary" data-dismiss="modal">Si</button>
            </div>
        </div>
    </div>

</div>

<div class="modal fade" id="myModal_info" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">


    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header " style=" background:#061B3D">
                <h5 class="modal-title text-white">INFORMACION DE LA ASOCIACION</h4>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
            </div>
            <div class="modal-body">
                <div id="panel_info"></div>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-dismiss="modal">Cancelar</button>
                
            </div>
        </div>
    </div>

</div>
<script src="<?php echo base_url(); ?>scripts/c_apoyo.js"></script>
