<div class="page-content bg-light border-5">
    <div class="page-header bg-light">
        <div class="container-fluid" aling="center" style="background:#7BE0C3">
            <h3  class="text-center" >MATERIALES ENTREGADOS</h3>
        </div>
    </div>
    <section>
       
            <form action="" method="post" id="frmCompras" class="row border-5" autocomplete="off">
                    <div class=" col-lg-2 ">
                            <label for="buscar_solicitud">HOJA DE RUTA</label>
                            <input type="hidden" id="idSolicitud" name="idSolicitud">
                            <input type="text" class="mibuscador_s form-control border border-dark " name="" id="dato_buscado" aria-describedby="emailHelp" onkeyup="btn_buscar_s();" style="width:100%;display:inline;margin-top:.1em; margin-bottom:15px;" >
                        </div>
                        
                        <div class="col-lg-3">
                            <label for="ref">SOLICITADO POR</label>
                                <input id="remitente" class="form-control" type="text" name="remitente"  readonly>
                            <strong id="nombreP"></strong>
                        </div>
                        <div class="col-lg-2">
                            <label for="cantidad">SOLICITA</label>
                                <br>
                            <input id="referencia" class="form-control" type="text" name="referencia" readonly>
                        </div>
                        <div class="col-lg-5">
                            <label for="precio">PARA EL</label>
                                <input id="campeonato" class="form-control" type="text" name="campeonato" readonly>
                            <strong id="precioP"></strong>
                        </div>  
                        <button type="button" class="btn border border-dark" data-toggle="modal" data-target="#Mod_registrar_solic" onclick="btn_registrar_solicitud();">REGISTRAR</button>
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
                            <span class="text-danger d-none" id="error">No hay producto</span>     
                
                
                <div class="container-fluid" aling="center" style="background:#6920C3">
                    <h3  class="text-center" >ENTREGA DE MATERIAL</h3>
                </div>
                <div class="input-group col-lg-12" id="lista-cursos">
                    <div class=" col-lg-4">
                        <label for="buscar_solicitud">MATERIAL DEPORTIVO</label>
                        <br>
                        <input type="hidden" id="idStockMatDep" name="idStockMatDep">
                        <input type="text" class="mibuscador_mat form-control border border-dark " name="" id="dato_buscado_mat" aria-describedby="emailHelp" onkeyup="btn_buscar_mat();" style="width:100%;display:inline;margin-top:.1em; margin-bottom:15px;" >
                    </div>
                    <div class="col-lg-4">
                        <label for="campeonato">DETALLE DEL MATERIAL</label>
                        <input id="talla" class="tallas form-control" type="text" name="campeonato" readonly>
                        <strong id="nombreP"></strong>
                    </div>
                    <div class="col-lg-2">
                        <label for="cantidad">CANTIDAD A ENTREGAR</label>
                        <input id="stock" type="hidden">
                        <input id="stockmat" class="stockmats form-control" type="number" name="cantidad" onkeyup="IngresarCantidad(event);">
                    </div>
                    <div class="col-lg-3">
                        <label for="precio">CANTIDAD TOTAL DEL MATERIAL EN STOCK</label>
                        <input id="cantstock" class="cantstocks form-control" type="text" name="precio" readonly>
                        <br />
                        <strong id="precioP"></strong>
                    </div>
                    <div class="col-lg-3">
                        <label for="precio">CATEGORIA PROGRAMATICA</label>
                        <input id="categoriaProgramatica" class="categoriaProgramatica form-control" type="text" name="precio" readonly>
                        <br />
                        <strong id="precioP"></strong>
                    </div>
                    <div class="col-lg-3">
                        <label for="precio">PARTIDA PRESUPUESTARIA</label>
                        <input id="partida" class="partida form-control" type="text" name="precio" readonly>
                        <br />
                        <strong id="precioP"></strong>
                    </div>
                    <div>
                        <input type="button" value="+" class="agregar-carrito">
                    </div>

                    <div class="row">
                                <div class="col-lg-12" width="100"; height="100"; id="carito">
                                    <div class="table - responsive">
                                        <table class="table table-light mt-2" id="tablamaterial" >
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
                </div>
                <div class="row">
                    <div class="container-fluid" aling="center">
                    <button type="button" class="btn btn-outline-primary"   onclick="btn_addMaterialCarrito()">AÑADIR MATERIAL DEPORTIVO</button>

                    </div>
                </div>
                
            </form>
            <div class="row">
                    <div class="table-responsive" id="carrito">
                        <table class="table table-light mt-4" id="lista-carrito">
                            <thead class="thead-dark">
                                <tr>
                                    <th>Item</th>
                                    <th>Material Deportivo</th>
                                    <th>cantidad</th>
                                    <th>Cat. prog</th>
                                    <th>Total</th>
                                </tr>
                            </thead>
                            <tbody id="ListaEntrega">

                            </tbody>
                        </table>
                    </div>
            <div class="row col-lg-12">
                <div class="col-lg-6 mt-6">
                    <div class="form-group">
                        <strong class="text-primary">Datos de la Asociacion Deportiva</strong>
                        <input type="hidden" id="id_cliente" name="id_cliente">
                        <input type="text" id="ruc_cliente" onkeyup="BuscarCliente(event);" name="ruc_cliente" class="form-control" placeholder="Ruc/Dni del cliente">
                        <strong id="nom_cli" class="form-control border-0 text-success"></strong>
                        <strong id="dir_cli" class="form-control border-0 text-success"></strong>
                        <strong id="tel_cli" class="form-control border-0 text-success"></strong>
                    </div>
                </div>
                <div class="col-lg-6 mt-1">
                    <div class="form-group">
                        <strong class="text-primary">Total a Entregar</strong>
                        <input type="hidden" id="total" name="total" class="form-control  mb-2">
                        <strong id="tVenta" class="form-control border-0 text-success"></strong>
                        <button class="btn btn-danger" type="button" id="AnularCompra" onclick="btn_vaciarCarrito()"> <i class="fas fa-trash-alt"></i> Anular Entrega</button>
                        <button class="btn btn-success" type="button" id="procesarVenta" onclick="btn_procesarEntrega()"><i class="fas fa-money-check-alt"></i> Procesar Entrega</button>
                    </div>
                </div>
            </div>
    </section>
</div>

<script src="<?php echo base_url(); ?>scripts/c_stockMatDeportivo.js"></script>
<script src="<?php echo base_url(); ?>scripts/transaccionClon.js"></script>
<script src="<?php echo base_url(); ?>scripts/c_apoyo.js"></script>


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

