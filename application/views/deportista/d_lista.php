<div class="col py-3">
    <div class="" style="width:100% ;">
        <p>System / Deportistas</p>

    </div>
    <input type="text" class="form-control border border-dark " name="" id="dato_buscado" aria-describedby="emailHelp" onkeyup="btn_buscar();" style="width:60%;display:inline;margin-top:.1em; margin-bottom:15px;">
    <button type="button" class="btn border border-primary " data-toggle="modal" > Buscar</button>
    <button type="button" class="btn border border-dark" data-toggle="modal" data-target="#myModal_registrar_deportista" onclick="btn_registrar_deportista();">Registrar</button>
    <!-- <button type="button" class="btn btn-primary " onclick="btn_listar_datos();"> Listar</button> -->

    <!-- <button type="button" class="btn border border-dark" data-bs-toggle="modal" data-target="#myModal_registrars" onclick="btn_modal_para_ingresar()" style="display:inline;">Agregar</button> -->


    <!-- Tabla de ASOCIACIONES -->
    <!-- Start panael listado -->
    <div id="panel_listado">
        <table class="table table-bordered" style="border-color:#061B3D !important" id="listasociaciones">
            <thead class="text-white " style="border-bottom:none; background:#197E6A;">
                <tr>
                <th>#</th> 
                  <th>PERFIL</th>
                  <th>NOMBRE</th> 
                  <th>ASOCIACION DEPORTIVA</th>
                  <th>INFORMACION</th>  
                  <?php if($this->session->userdata('tipo')=='admin'){?>
                  <th>EDITAR</th>  
                  <th>ELIMINAR</th>

                  <?php }?>
                  
                </tr>
            </thead>
            <tbody>

                <?php
                $indice = 0;
                foreach ($deportista->result() as $row) {
                    $idDeportista = $row->idDeportista;
                ?>
                <tr>
                    <th scope="row"><?php $indice++;
                                        echo $indice;
                    ?></th>
                    <td>
                        <?php 
                        $perfil=$row->perfil;
                        if($perfil=="")
                        {
                            //mostrar una imagen por defecto
                        ?>
                        <img src="<?php echo base_url(); ?>/uploads/deportistas/perfil.jpg" width="50" alt="">
                        <?php
                        }else
                        {
                        ?>
                        <img src="<?php echo base_url(); ?>uploads/deportistas/<?php echo $perfil;?>" width="55" alt="">
                        <?php
                        }
                        ?> 
                    </td>
                    
                     </td>
                        <td><?php echo $row->nombre;
                         ?> </td>
                         <td><?php echo $row->primerApellido;
                         ?> </td>
                        <td><?php echo $row->segundoApellido;
                         ?> </td>
                        <td scope="col">


                            <button type="button" class="btn btn-outline-primary" data-toggle="modal" data-target="#myModal_info" onclick="btn_info('<?php echo $idDeportista; ?>');">VER INFORMACION</button>

                            </td>
                        <td scope="col">

                        <?php if($this->session->userdata('tipo')=='admin'){?>
                            <button type="button" class="btn btn-outline-warning" data-toggle="modal" data-target="#myModal_editar_deportista" onclick="btn_editar_deportista('<?php echo $idDeportista; ?>');">MODIFICAR</button>

                        </td>
                        <td scope="col">

                            <button type="button" class="btn btn-outline-danger" data-toggle="modal" data-target="#myModal_eliminar" onclick="btn_eliminar('<?php echo $idDeportista; ?>');">ELIMINAR</button>

                            <!-- <button type="button" class="btn btn-outline-danger" onclick="btn_eliminar('<?php //echo $idConductor; 
                                                                                                                ?>');"> -->
                            <!-- </button> -->
                        </td>
                        <?php }?>


                    </tr>

                <?php
                }

                ?>


            </tbody>
            <link rel="stylessheet" href="styles.css">
        </table>
        <!-- <div id="pagination"><? // $this->pagination->create_links(); 
                                    ?></div> -->
        <!-- Paginacion  -->

    </div>

    <!-- End panel listado -->
</div>
</div>
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

<div class="modal fade" id="myModal_editar_deportista" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header " style=" background:#061B3D">
                <h5 class="modal-title text-white">MODIFICAR DATOS DE DEPORTISTA</h4>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
            </div>
            <div class="modal-body">
                <div id="panel_editar"></div>
                <div id="panel_respuesta_ediDeportista"></div>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-dismiss="modal">Cancelar</button>
                <button type="button" class="btn btn-primary" onclick="btn_guardar_edicion_deportista()" data-dismiss="modal">Editar</button>
            </div>
        </div>
    </div>
</div>
<!-- Button trigger modal -->


<!-- Modal -->

<div class="modal fade" id="myModal_registrar_deportista" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">

    <form>
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header " style=" background:#061B3D">
                    <h5 class="modal-title text-white">Registrar DEPORTISTA</h4>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                </div>
                <div class="modal-body">
                    <div id="panel_registrar_d"></div>
                    <div id="panel_respuesta_registrar"></div>
                    <div class="col-lg-12" id="panel_mostrar_asoc"></div>

                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Cancelar</button>
                    <button type="submit" class="btn btn-primary" id="guardar" onclick="btn_guardar_datos_deportista();" data-dismiss="modal">Guardar</button>
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
<script src="<?php echo base_url(); ?>scripts/c_deportista.js"></script>


