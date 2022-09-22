<?php

if ($opcion == "listar") { ?>
 <table class="table table-bordered" style="border-color:#061B3D !important">
            <thead class="text-white " style="border-bottom:none; background:#197E6A;">
                <tr>
                <th>#</th> 
                  <th>LOGO</th> 
                  <th>ASOCIACION DEPORTIVA</th>
                  <th>INFORMACION</th>  
                  <th>EDITAR</th>  
                  <th>ELIMINAR</th>
                  
                </tr>
            </thead>
            <tbody>

                <?php
                $indice = 0;
                foreach ($asociaciones->result() as $row) {
                    $idAsociacion = $row->idAsociacion;
                ?>
                    <tr>
                    <th scope="row"><?php $indice++;
                                        echo $indice;
                                        ?></th>
                    <th scope="row">
                         <?php
                      $logo=$row->logo;
                      if($logo==""){
                      ?>
                     <img src="<?php echo base_url();?>/uploads/user.jpeg" style="width:80px; heigth: 80px;">
                     <?php
                      }else
                     {
                     ?>
                     <img src="<?php echo base_url();?>./uploads/<?php echo $logo;?>" style="width:80px; heigth: 80px;">
                     <?php

                     }
                     ?>
                     </th>
                     </td>
                        <td><?php echo $row->nombre;
                            ?> </td>

                            <td scope="col">


                            <button type="button" class="btn btn-outline-primary" data-toggle="modal" data-target="#myModal_info" onclick="btn_info('<?php echo $idAsociacion; ?>');">VER INFORMACION</button>

                            </td>
                        <td scope="col">


                            <button type="button" class="btn btn-outline-warning" data-toggle="modal" data-target="#myModal_editar" onclick="btn_editar('<?php echo $idAsociacion; ?>');">MODIFICAR</button>

                        </td>
                        <td scope="col">

                            <button type="button" class="btn btn-outline-danger" data-toggle="modal" data-target="#myModal_eliminar" onclick="btn_eliminar('<?php echo $idAsociacion; ?>');">ELIMINAR</button>

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




if ($opcion == "editar") {
  foreach ($asociacioness->result() as $row) {
  ?>

    <div class="container">


      <!-- <div class="col-md-4 col-xs-12"> -->
      <div class="row">
        <input type="hidden" class="form-control" id="idAsociacion_edi" aria-describedby="emailHelp" value="<?php echo $row->idAsociacion ?>">
        <div class="col-12">
          <label for="exampleInputEmail1" class="form-label">ASOCIACION DEPORTIVA</label>
          <input type="text" class="form-control" required name="nombre" id="nombre_edi" aria-describedby="emailHelp" value="<?php echo $row->nombre; ?>">
        </div>

        <div class="col-lg-6">
          <label for="exampleInputEmail1" class="form-label">DIRECCION</label>
          <input type="text" class="form-control" required name="direccion" id="direccion_edi" aria-describedby="emailHelp" value="<?php echo $row->direccion; ?>">
        </div>
        <div class="col-6">
          <label for="exampleInputEmail1" class="form-label">TELEFONO</label>
          <input type="text" class="form-control" name="telefono" id="telefono_edi" aria-describedby="emailHelp" value="<?php echo $row->telefono; ?>">
        </div>
        <div class="col-lg-6">
          <label for="exampleInputEmail1" class="form-label">CORREO</label>
          <input type="text" class="form-control" required name="correo" id="correo_edi" aria-describedby="emailHelp" value="<?php echo $row->correo; ?>">
        </div>
        <div class="col-lg-6">
          <label for="exampleInputEmail1" class="form-label">FECHA DE PERSONARIA FURIDICA</label>
          <input type="date" class="form-control" required name="fechaPersJuridica" id="fechaPersJuridica_edi" aria-describedby="emailHelp" value="<?php echo $row->fechaPersJuridica; ?>">
        </div>
        <div class="col-lg-6">
          <label for="exampleInputEmail1" class="form-label">LOGO</label>
          <input type="file" class="form-control" required name="logo" id="logo_edi" aria-describedby="emailHelp" >
        </div>

       
      </div>

      



    <?php
  }
}
if ($opcion == "buscador") {
    ?>


<table class="table table-bordered" style="border-color:#061B3D !important">
            <thead class="text-white " style="border-bottom:none; background:#197E6A;">
                <tr>
                <th>#</th> 
                  <th>LOGO</th> 
                  <th>ASOCIACION DEPORTIVA</th>
                  <th>INFORMACION</th>  
                  <th>EDITAR</th>  
                  <th>ELIMINAR</th>
                  
                </tr>
            </thead>
            <tbody>

                <?php
                $indice = 0;
                foreach ($asociaciondep->result() as $row) {
                    $idAsociacion = $row->idAsociacion;
                ?>
                    <tr>
                    <th scope="row"><?php $indice++;
                                        echo $indice;
                                        ?></th>
                    <th scope="row">
                         <?php
                      $logo=$row->logo;
                      if($logo==""){
                      ?>
                     <img src="<?php echo base_url();?>/uploads/user.jpeg" style="width:80px; heigth: 80px;">
                     <?php
                      }else
                     {
                     ?>
                     <img src="<?php echo base_url();?>./uploads/<?php echo $logo;?>" style="width:80px; heigth: 80px;">
                     <?php

                     }
                     ?>
                     </th>
                     </td>
                        <td><?php echo $row->nombre;
                            ?> </td>

                            <td scope="col">


                            <button type="button" class="btn btn-outline-primary" data-toggle="modal" data-target="#myModal_info" onclick="btn_info('<?php echo $idAsociacion; ?>');">VER INFORMACION</button>

                            </td>
                        <td scope="col">


                            <button type="button" class="btn btn-outline-warning" data-toggle="modal" data-target="#myModal_editar" onclick="btn_editar('<?php echo $idAsociacion; ?>');">MODIFICAR</button>

                        </td>
                        <td scope="col">

                            <button type="button" class="btn btn-outline-danger" data-toggle="modal" data-target="#myModal_eliminar" onclick="btn_eliminar('<?php echo $idAsociacion; ?>');">ELIMINAR</button>

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

    <!-- Paginacion  -->
  
    <!-- End Paginacion  -->


  <?php
}
if ($opcion == "formulario") {
  ?>
    <div class="container">


      <!-- <div class="col-md-4 col-xs-12"> -->
      <div class="row">
        <div class="col-12">
          <label for="exampleInputEmail1" class="form-label">ASOCIACION DEPORTIVA</label>
          <input type="text" class="form-control" required name="nombre" id="nombre" aria-describedby="emailHelp">
        </div>

        <div class="col-lg-12">
          <label for="exampleInputEmail1" class="form-label">DIRECCION DE LA ASOCIACION</label>
          <input type="text" class="form-control" required name="direccion" id="direccion" aria-describedby="emailHelp">
        </div>
        <div class="col-6">
          <label for="exampleInputEmail1" class="form-label">TELEFONO</label>
          <input type="text" class="form-control" name="telefono" id="telefono" aria-describedby="emailHelp">
        </div>
        <div class="col-lg-6">
          <label for="exampleInputEmail1" class="form-label">CORREO</label>
          <input type="email" class="form-control" required name="correo" id="correo" aria-describedby="emailHelp">
        </div>
        <div class="col-lg-12">
          <label for="exampleInputEmail1" class="form-label">FECHA DE PERSONERIA JURIDICA</label>
          <input type="date" class="form-control" required name="fechaPersJuridica" id="fechaPersJuridica" aria-describedby="emailHelp">
        </div>
        <div class="col-lg-6">
          <label for="exampleInputEmail1" class="form-label">LOGO</label>
          <input type="file"    name="userfile"  >
        </div>
        
        


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

