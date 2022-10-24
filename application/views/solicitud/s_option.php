<?php

if ($opcion == "listar") { ?>
  <table class="table table-bordered" style="border-color:#061B3D !important">
            <thead class="text-white " style="border-bottom:none; background:#197E6A;">
                <tr>
                <th>#</th> 
                  <th>HOJA DE RUTA</th> 
                  <th>ASOCIACION DEPORTIVA</th>
                  <th>REFERENCIA</th>  
                  <th>CAMPEONATO</th>  
                  <th>ACEPTAR</th>  
                  <th>RECHAZAR</th>
                  
                </tr>
            </thead>
            <tbody>

                <?php
                $indice = 0;
                foreach ($solicitud->result() as $row) {
                    $idSolicitud = $row->idSolicitud;
                ?>
                    <tr>
                    <th scope="row"><?php $indice++;
                                        echo $indice;
                                        ?></th>
                    
                     </td>
                        <td><?php echo $row->hojaRuta;
                            ?> </td>
                        
                        <td><?php echo $row->nombre;
                            ?> </td>

                        <td><?php echo $row->remitente;
                            ?> </td>
                        
                        <td><?php echo $row->campeonato;
                            ?> </td>
                        

                            <td scope="col">


                            <button type="button" class="btn btn-outline-primary" data-toggle="modal" data-target="#myModal_info" onclick="btn_info('<?php echo $idSolicitud; ?>');">VER INFORMACION</button>

                            </td>
                        <td scope="col">


                            <button type="button" class="btn btn-outline-warning" data-toggle="modal" data-target="#myModal_editar" onclick="btn_editar('<?php echo $idSolicitud; ?>');">MODIFICAR</button>

                        </td>
                        <td scope="col">

                            <button type="button" class="btn btn-outline-danger" data-toggle="modal" data-target="#myModal_eliminar" onclick="btn_eliminar('<?php echo $idSolicitud; ?>');">ELIMINAR</button>

                            <!-- <button type="button" class="btn btn-outline-danger" onclick="btn_eliminar('<?php //echo $idConductor; 
                                                                                                                ?>');"> -->
                            <!-- </button> -->
                        </td>


                    </tr>

                <?php
                }

                ?>


            </tbody>
        </table>


  <?php }




if ($opcion == "editar_soli") {
  foreach ($solicitudes->result() as $row) {
  ?>

    <div class="container">


      <!-- <div class="col-md-4 col-xs-12"> -->
      <div class="row">
        <input type="hidden" class="form-control" id="idSolicitud_edi" aria-describedby="emailHelp" value="<?php echo $row->idSolicitud; ?>">
        <div class="col-12">
          <label for="exampleInputEmail1" class="form-label">ASOCIACION DEPORTIVA</label>
          <input type="text" class="form-control" required name="nombre" id="nombre_edi" aria-describedby="emailHelp" value="<?php echo $row->nombre;  ?>" readonly>
        </div>


        <div class="col-lg-6">
          <label for="exampleInputEmail1" class="form-label">HOJA DE RUTA</label>
          <input type="text" class="form-control" required name="direccion" id="direccion_edi" aria-describedby="emailHelp" value="<?php echo $row->hojaRuta; ?>">
        </div>
        <div class="col-6">
          <label for="exampleInputEmail1" class="form-label">REMITENTE</label>
          <input type="text" class="form-control" name="remitente" id="remitente_edi" aria-describedby="emailHelp" value="<?php echo $row->remitente; ?>">
        </div>
        <div class="col-lg-6">
          <label for="exampleInputEmail1" class="form-label">CAMPEONATO</label>
          <input type="text" class="form-control" required name="campeonato" id="campeonato_edi" aria-describedby="emailHelp" value="<?php echo $row->campeonato; ?>">
        </div>
        <div class="col-lg-6">
          <label for="exampleInputEmail1" class="form-label">SOLICITUD</label>
          <input type="text" class="form-control" required name="referencia" id="referencia_edi" aria-describedby="emailHelp" value="<?php echo $row->referencia; ?>">
        </div>
       

       
      </div>

      



    <?php
  }
}
if ($opcion == "buscador") {
    ?>


    <table class="table table-bordered">
      <thead style="background:#337ccb;" class="text-white">
        <tr>
          <th scope="col">#</th>
          <th scope="col">Medicamento</th>
          <th scope="col">Cantidad</th>
          <th scope="col">Precio</th>
          <th scope="col">Precio_2</th>
          <th scope="col">Precio_3</th>
          <th scope="col">Fecha_venc</th>
          <th scope="col">Tipo</th>
          <th scope="col">Ver</th>
          <?php if ($this->session->userdata['id_cargo_session']  == 1) { ?>
            <th scope="col">Modificar</th>
            <th scope="col">Eliminar</th>
          <?php } ?>

        </tr>
      </thead>
      <tbody>

        <?php
        $indice = 0;
        foreach ($medicamentos->result() as $row) {
          $id_medicamento = $row->id_medicamento;
        ?>
          <tr>
            <th scope="row"><?php $indice++;
                            echo $indice;
                            ?></th>
            <td><?php echo $row->medicamento;
                ?> </td>

            <td><?php echo $row->cantidad;
                ?></td>
            <td><?php echo $row->precio;
                ?></td>
            <td><?php echo $row->precio_2;
                ?></td>
            <td><?php echo $row->precio_3;
                ?></td>
            <td><?php echo $row->fecha_venc;
                ?></td>
            <td><?php echo $row->categoria;
                ?></td>
            <td scope="col">

              <button type="button" class="btn btn-outline-primary" data-bs-toggle="modal" data-bs-target="#myModal_detalle" onclick="btn_mostrar_detalle('<?php echo $id_medicamento; ?>');">
                Ver
              </button>
            </td>
            <?php if ($this->session->userdata['id_cargo_session']  == 1) { ?>

              <td scope="col">

                <button type="button" class="btn btn-outline-warning" data-bs-toggle="modal" data-bs-target="#myModal_editar" onclick="btn_editar('<?php echo $id_medicamento;
                                                                                                                                                    ?>');">
                  Editar
                </button>
              </td>
              <td scope="col">

                <button type="button" class="btn btn-outline-danger" onclick="btn_eliminar('<?php echo $id_medicamento;
                                                                                            ?>');">
                  Eliminar
                </button>
              </td>
            <?php } ?>


          </tr>

        <?php
        }

        ?>


      </tbody>
    </table>


    <!-- Paginacion  -->
    <nav aria-label="Page navigation example">
      <ul class="pagination">
        <li class="page-item"><a class="page-link" href="#">Previous</a></li>
        <?php
        for ($i = 1; $i <= $last_pag; $i++) {
        ?>
          <li class="page-item"><a class="page-link" href="<?php echo base_url();
                                                            ?>Cmedicamento/index/<?php echo $i
                                                                                  ?>"><?php echo $i
                                                                                      ?></a></li>
        <?php
        }
        ?>

        <li class="page-item"><a class="page-link" href="#">Next</a></li>
      </ul>
    </nav>
    <!-- End Paginacion  -->




    <?php
}

if ($opcion == "buscador_s") {
    ?>
 <table class="table table-bordered" style="border-color:#061B3D !important width: 50px;">
            <thead class="text-white " style="border-bottom:none; background:#197E6A;">

                <tr>
                <div class="col-lg-1">
                <th >#</th>
                </div>
                <div class="col-lg-1">
                <th width="8px">HR</th>
                </div>
                <div class="col-lg-1">
                <th>REFERENCIA</th>  
                
                </div>
                   
                  
                  
                </tr>
            </thead>
            <tbody>

                <?php
                $indice = 0;
                foreach ($solicitudhoja->result() as $row) {
                    $idSolicitud = $row->idSolicitud;
                ?>
                    <tr>
                    <th scope="row" width=10px><?php $indice++;
                                        echo $indice;
                                        ?></th>
                    
                     </td width=10px>
                        <td><?php echo $row->hojaRuta;
                            ?> </td>

                        <td><?php echo $row->referencia;
                            ?> </td>
                            
                        
                        
                        

                    
                    <td scope="col">
                            <button type="button" class="btn btn-outline-primary"  onclick="btn_seleccionar_solic('<?php echo $idSolicitud; ?>','<?php echo $row->hojaRuta; ?>','<?php echo $row->remitente; ?>','<?php echo $row->campeonato; ?>','<?php echo $row->referencia; ?>','<?php echo $row->idAsociacion; ?>');" >+</button>
                     </td>

                <?php
                }

                ?>
                <script src="<?php echo base_url(); ?>./scripts/c_apoyo.js"></script>
                

            </tbody>
        </table>  

  <?php
}
if ($opcion == "s_formulario") {
  ?>
    <input type="text" class="mibuscador_s form-control border border-dark " name="" id="dato_buscado" aria-describedby="emailHelp" onkeyup="btn_buscar_s();" style="width:60%;display:inline;margin-top:.1em; margin-bottom:15px;" value="">
    <input type="hidden" id="idAsociacion_s" >
    
    
   

    
      <!-- <div class="col-md-4 col-xs-12"> -->

      <div class="row">
        <div class="col-6">
          <label for="exampleInputEmail1" class="form-label">HOJA DE RUTA</label>
          <input type="text" class="form-control" required name="hojaRuta" id="hojaRuta" aria-describedby="emailHelp">
        </div>

        <div class="col-lg-6">
          <label for="exampleInputEmail1" class="form-label">REMITENTE</label>
          <input type="text" class="form-control" required name="remitente" id="remitente" aria-describedby="emailHelp">
        </div>
        <div class="col-6">
          <label for="exampleInputEmail1" class="form-label">CAMPEONATO</label>
          <input type="text" class="form-control" name="campeonato" id="campeonato" aria-describedby="emailHelp">
        </div>
        <div class="col-lg-6">
          <label for="exampleInputEmail1" class="form-label">REFERENCIA</label>
          <input type="email" class="form-control" required name="referencia" id="referencia" aria-describedby="emailHelp">
        </div>
        <br>
        <br>
        
        
        
        <script src="<?php echo base_url(); ?>./scripts/c_solicitud.js"></script>

      </div>
    </div>


    <!-- </div> -->

    <?php
  }
  if ($opcion == "detalle") {
    foreach ($medicament->result() as $row) {
    ?>

      <h2><?php echo $row->medicamento ?></h2>


      <table class="table table-bordered">
        <thead class="text-white bg-primary">
          <tr>
            <th scope="col">Concepto</th>
            <th scope="col">Datos</th>
          </tr>
        </thead>
        <tbody>
          <tr>
            <td scope="col">Cantidad</th>
            <td scope="col"><?php echo $row->cantidad; ?></th>
          </tr>
          <tr>
            <td scope="col">Precio</th>
            <td scope="col"><?php echo $row->precio; ?></th>
          </tr>
          <tr>
            <td scope="col">Precio_2</th>
            <td scope="col"><?php echo $row->precio_2; ?></th>
          </tr>
          <tr>
            <td scope="col">Precio_3</th>
            <td scope="col"><?php echo $row->precio_3; ?></th>
          </tr>
          <tr>
            <td scope="col">Fecha_venc</th>
            <td scope="col"><?php echo $row->fecha_venc; ?></th>
          </tr>
          <tr>
            <td scope="col">Categoria</th>
            <td scope="col"><?php echo $row->categoria; ?></th>
          </tr>
          <tr>
            <td scope="col">Descripcion</th>
            <td scope="col"><?php echo $row->descripcion; ?></th>
          </tr>
        </tbody>

      </table>




    <?php
    }
  }
  if ($opcion == "eliminar") {
    foreach ($asociacionesss->result() as $row) {

    ?>





      <div class="container">


        <!-- <div class="col-md-4 col-xs-12"> -->
        <div class="row">
          <input type="hidden" class="form-control" id="idAsociacion_eli" aria-describedby="emailHelp" value="<?php echo $row->idAsociacion ?>">

        </div>





    <?php
    }
  }
  ?>


  <?php

if($opcion=="info"){?>
      <table class="table table-bordered" style="border-color:#061B3D !important">
            <thead class="text-white " style="border-bottom:none; background:#061B3D;">
                <tr>
                
                  
                </tr>
            </thead>
            <tbody>

            <?php
                $indice = 1;
                foreach ($asociacionessinfo->result() as $row) {
                ?>

                  
                     
                    </th>  
                    <div>
                    <td scope="row" colspan="2" >
                      <?php
                      $logo=$row->logo;
                      if($logo==""){
                      ?>
                      <center>
                        <img src="<?php echo base_url();?>/uploads/user.jpeg" style="width:100%; heigth: 100%;">

                      </center>
                     <?php
                      }else
                     {
                     ?>
                     <center>
                       <img src="<?php echo base_url();?>/uploads/<?php echo $logo;?>" style="width:100%; heigth: 100%;">

                     </center>
                     <?php

                     }
                     ?>
                    </th>
                    </div>
                    
                            <tr></tr>
                            <th>NOMBRE:</th><br>
                            <td><?php echo $row->nombre; ?></td>
                            <tr></tr>
                            <th>DIRECCION:</th>
                            <td><?php echo $row->direccion; ?></td>
                            <tr></tr>
                            <th>TELEFONO:</th>
                            <td><?php echo $row->telefono; ?></td>
                            <tr></tr>
                            <th>CORREO:</th>
                            <td><?php echo $row->correo; ?></td>
                            <tr></tr>
                            <th>FECHA DE PERSONERIA JURIDICA:</th>
                            <td><?php echo $row->fechaPersJuridica; ?></td>
                            <tr>
                          
                            </td>
                            
                <?php
                  $indice++;
                }
                ?>
              

            </tbody>
        </table>
<?php
}


