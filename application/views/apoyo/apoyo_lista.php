<div class="content-header">
    <div class="container-fluid">
        <div class="row mb-2">

            <div class="col-sm-6">

                <h4 class="m-0">Entrega de Material Deportivo</h4>

            </div><!--/.col-->
            <div class="col-sm-6">
                <ol class="breadcrumb float-sm-rigth">
                    <li class="breadcrumb-item"><a href="index.php">Inicio</a></li>
                    <li class="breadcrumb-item active">Entrega de Material</li>

                </ol>

            </div><!--/.col-->


        </div><!--/.row-->

    </div><!--/.container fluid-->

</div><!--/.header-->

<!--/.Main content-->
<div class="content">

    <div class="container-fluid">
        
        <div class="row mb-3">

            <div class="col-md-9">

            <div class="row">
                
                <div class="col-md-12 mb-3">
                
                    <div class="form-group mb-2">

                        <label class="col-form-label" for="iptCodigoEntrega">
                            <i class="fas fa-barcode fs-6"></i>
                            <span class="small">Deportistas</span>
                         </label>
                        <input type="text"
                                class="form-control form-control-sm"
                                id="iptCodigoEntrega"
                                placeholder="Ingrese el CI. o Nombre del deportista">
                    </div>

                </div>
                <!--/.ETIQUETA QUE MUESTRA EL TOTAL DEL MATERIAL ENTREGADO-->
                <div class="col-md-6 mb-3">

                    <h4>TOTAL MATERIAL ENTREGADO FISICO: S./ <span id="totalEntrega">0.00</span></h4>
                    <h4>TOTAL MATERIAL ENTREGADO MONETARIO: S./ <span id="totalEntregaMoney">0.00</span></h4>
                    
                </div>
                <!--/.BOTONES PARA VACIAR EL LISTADO Y COMPLETAR LA VENTA-->
                <div class="col-md-6 text-right">

                    <button class="btn btn-primary" id="btnIniciarEntrega">
                        <i class="fas fa-shopping-cart"></i> REALIZAR ENTREGA
                    </button>
                    <button class="btn btn-danger" id="btnVaciarListado">
                        <i class="fas fa-trash-alt"></i> VACIAR LISTADO
                    </button>
                </div>
                <!--/.LISTADO QUE CONTIENEN A LOS DEPORTISTAS QUE SE VAN AGREGANDO A LA ENTREGA-->
                <div class="col-md-12">
                    <table id="lstMaterialesEntrega" class="display nowrap table-striped w-100 shadow">
                        <thead class="bg-info text-left fs-6">
                            <tr>
                                <th>NOMBRE</th>
                                <th>APELLIDO</th>
                                <th>APELLIDO MATERNO</th>
                                <th>CEDULA DE IDENTIDAD</th>
                                <th>FICHA MEDICA</th>
                                <th>TALLA</th>
                                <th>CANTIDAD</th>

                            </tr>
                        </thead>

                        <tbody class="small text-left fs-6">

                        </tbody>

                    </table>
                </div>
                <!--/.col-->
                
            </div>  
                

            </div>
                 <!--/.COMPROBANTES-->
            <div class="col-md-3">

                <div class="card shadow">
                    <h5 class="card-header py-1 bg-primary text-white text-center">
                        Total Material Entregado:S./ <span id="totalEntregaRegistrar">0.00</span>
                    </h5>

                    <div class="card-body p-2">
                        <div class="form-group mb-2">

                            <label class="col-form-label" for="selCategoriaReg">
                                <i class="fas fa-file-alt fs-6"></i>
                                <span class="small">DOCUMENTO</span><span class="text-danger">*</span>
                            </label>

                            <select class="form-select form-select-sm" aria-label=".form-selec-sm example"
                                    id="selDocumentoEntrega">
                                    <option value="0">SELECCIONE DOCUMENTO</option>
                                    <option value="1" selected="true">BOLETA</option>
                                    <option value="2">ACTA DE ENTREGA</option>
                                    <option value="3">LISTA DE ENTREGA</option>                                
                            </select>

                            <span id="validate_categoria" class="text-danger small fst-italic" style="display:none">
                                DEBE SELECCIONAR UN DOCUMENTO
                            </span>
                        </div>

                        <div  class="form-group mb-2">

                            <label class="col-form-label" for="selCategoriaReg">
                                <i class="fas fa-money-bill-alt fs-6"></i>
                                <span class="small">TIPO DE COMPROBANTE</span><span class="text-danger">*</span>
                            </label>

                             <select class="form-select form-select-sm" aria-label=".form-selec-sm example"
                                    id="selTipoEntrega">
                                    <option value="0">SELECCIONE TIPO ENTREGA</option>
                                    <option value="1" selected="true">INMEDIATA</option>
                                    <option value="2">EVENTO</option>
                                    <option value="3">SALA DE PRENSA</option>                                
                            </select>

                            <span id="validate_categoria" class="text-danger small fst-italic" style="display:none">
                                DEBE SELECCIONAR TIPO DE ENTREGA
                            </span>
                        </div>

                        <!--SERIE Y NUMERO DE ENTREGA-->
                        <div class="form-group">
                            <div class="row">
                                <div class="col-md-4">
                                    <label for="iptNroSerie">Serie</label>
                                    <input type="text" min="0" name="iptEfectivo" id="iptNroSerie"
                                            class="form-control form-control-sm" placeholder="nro Serie" disabled>
                                </div>

                                <div class="col-md-8">
                                    <label for="iptNroEntrega">Nro de Entrega</label>

                                    <input type="text" min="0" name="iptEfectivo" id="iptNroEntreta"
                                            class="form-control form-control-sm" placeholder="Nro Entrega" disabled>
                                </div>
                            </div>
                        </div>

                        <!--input de efectivo entregado-->

                        <div class="form-group">
                            <label for="iptEfectivoRecibido">Efectivo recibido</label>
                            <input type="number" min="0" name="iptEfectivo" id="iptEfectivoRecibido"
                                    class="form-control form-control-sm" placeholder="Cantidad de Solicitud Recibida">
                        </div>
                        <!--input de efectivo entregado--> 
                        <div class="form-check">
                            <input class="form-check-input" type="checkbox" value="" id="chkEfectivoExacto">
                            <label class="form-check-label" for="chkEfectivoExacto">
                                EFECTIVO EXACTO
                            </label>
                        </div>

                        <!--total monto entregado y vuelto--> 
                        <div class="row mt-2">
                            <div class="col-12">
                                <h6 class="text-start fw-bold">Monto Efectivo: S./ <span
                                id="EfectivoEntregado">0.00</span></h6>
                            </div>

                            <div class="col-12">
                                <h6 class="text-start text-danger fw-bold">vuelto:S./ <span id="Vuelto">0.00</span></h6>
                            </div>

                        </div>

                        <!--total monto entregado y vuelto-->
                        <div class="row">

                            <div class="col-md-7">
                                <span>SUBTOTAL</span>
                            </div>
                            <div class="col-md-5 text-right">
                                S./ <span class="" id="boleta_subtotal">0.00</span>
                            </div>

                            <div class="col-md-7 ">
                                <span>IGV 18%</span>
                            </div>
                            <div class="col-md-5 text-right">
                                S./ <span class="" id="boleta_igv ">0.00</span>
                            </div>
                            
                            <div class="col-md-7">
                                <span>TOTAL</span>
                            </div>
                            <div class="col-md-5 text-right">
                                S./ <span class="" id="boleta_total">0.00</span>
                            </div>
                        </div>

                    </div><!--card Body-->

                </div><!--card -->

            </div>

        </div>

    </div>

</div>

<script>
    var table;
    var items=[];//SE USA PARA EL INPUT DE AUTOCOMPLETE
    $(document).ready(function(){
        /*INICIALIZAR LA ENTRETA DE MATERIAL*/
        table=$('#lstMaterialesEntrega').DataTable({
            columDefs:[{
                targets: 0,
                visible:false},
            {
                targets: 3,
                visible:false
            },
            {
                targets: 2,
                visible:false
            },
            {
                targets: 6,
                visible:false
            },
            {
                targets: 0,
                visible:false
            }
            ],
            "order":[
                [0,'desc']
            ],
            "lenguage":{
                "url": "//cdn.datatables.net/plug-ins/1.10.20/i18n/Spanish.json"
            }
        });

</script>