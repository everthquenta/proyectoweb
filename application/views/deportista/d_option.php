<?php

if ($opcion == "listar") { ?>
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
                foreach ($deportistas->result() as $row) {
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
                        <img src="<?php echo base_url(); ?>uploads/deportistas/<?php echo $perfil;?>" width="100" alt="">
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

  <?php }




if ($opcion == "editar_deportista") {
  foreach ($deportistaedi->result() as $row) {
  ?>

    <div class="container">


      <!-- <div class="col-md-4 col-xs-12"> -->
      <div class="row">
      <input type="hidden" class="form-control" id="idDeportista_edi" aria-describedby="emailHelp" value="<?php echo $row->idDeportista ?>">
        <input type="hidden" class="form-control" id="idAsociacion_edi" aria-describedby="emailHelp" value="<?php echo $row->idAsociacion ?>">
        <div class="col-12">
          <label for="exampleInputEmail1" class="form-label">DEPORTISTA</label>
          <input type="text" class="form-control" required name="nombre" id="nombre_edi" aria-describedby="emailHelp" value="<?php echo $row->nombre; ?>">
        </div>

        <div class="col-lg-6">
          <label for="exampleInputEmail1" class="form-label">APELLIDO PATERNO</label>
          <input type="text" class="form-control" required name="primerApellido" id="primerApellido_edi" aria-describedby="emailHelp" value="<?php echo $row->primerApellido; ?>">
        </div>
        <div class="col-6">
          <label for="exampleInputEmail1" class="form-label">APELLIDO MATERNO</label>
          <input type="text" class="form-control" name="segundoApellido" id="segundoApellido_edi" aria-describedby="emailHelp" value="<?php echo $row->segundoApellido; ?>">
        </div>
        <div class="col-lg-6">
          <label for="exampleInputEmail1" class="form-label">FECHA DE NACIMIENTO</label>
          <input type="date" class="form-control" required name="fechaNacimiento" id="fechaNacimiento_edi" aria-describedby="emailHelp" value="<?php echo $row->fechaNacimiento; ?>">
        </div>
        <div class="col-lg-6">
          <label for="exampleInputEmail1" class="form-label">NUMERO DE CEDULA DE IDENTIDAD</label>
          <input type="text" class="form-control" required name="cedula" id="cedula_edi" aria-describedby="emailHelp" value="<?php echo $row->cedula; ?>">
        </div>
        <div class="col-lg-6">
          <label for="exampleInputEmail1" class="form-label">FICHA MEDICA</label>
          <input type="text" class="form-control" required name="fichaMedica" id="fichaMedica_edi" aria-describedby="emailHelp" value="<?php echo $row->fichaMedica; ?>">
        </div>

        <div class="col-lg-6">
          <div class="form-group">
            <label  class="form-label">FOTO</label>
            <div class="card border-primary">
                <div class="card-body">
                  <label for="perfil" id="icon-imagen" class="btn btn-primary"><i class="fas fa-image"></i></label>
                  <span id="icon-cerrar"></span>
                 <input type="file" class="d-none" required name="userfile" id="perfil" aria-describedby="emailHelp" onchange="preview(event)">
                 <img class="img-thumbnail" id="img-preview">
                </div>
            </div>
          </div>
        
        </div>
      </div>
      

      <script src="<?php echo base_url(); ?>./scripts/funciones.js"></script>
    

    <?php
    
  }
}
if ($opcion == "buscador")
{
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
       
        
   <?php
}

if ($opcion == "buscador_s") {
    ?>
 <table class="table table-bordered" style="overflow-y:scroll; heigth:60px; border-color:#061B3D !important">
            <thead class="text-white " style="border-bottom:none; background:#197E6A;">
                <tr>
                <th>#</th> 
                  <th>LOGO</th> 
                  <th>ASOCIACION DEPORTIVA</th>
                
                  
                </tr>
            </thead>
            <tbody>

                <?php
                $indice = 0;
                foreach ($asociaciondeportiva->result() as $row) {
                    $idAsociacion = $row->idAsociacion;
                ?>
                    <tr>
                    <th scope="row"><?php $indice++;
                                        echo $indice;
                                        ?></th>
                    
                     </td>
                     
                     </td>
                        <td><?php echo $row->nombre;
                            ?> </td>

                            <td scope="col">
                            <button type="button" class="btn btn-outline-primary"  onclick="btn_seleccionar('<?php echo $idAsociacion; ?>','<?php echo $row->nombre; ?>');">+</button>
                            </td>
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
if ($opcion == "formulario_d") {
  ?>
  <div class="col-12" aling="center">
    <label  type="text-center" for="buscador de asociacion" >SELECCIONE LA ASOCIACION DEL DEPORTISTA</label>
    <input type="text-center" class="mibuscador_s form-control border border-dark" name="" id="dato_buscado" aria-describedby="emailHelp" onkeyup="btn_buscar_s();" style="width:95%;display:inline;margin-top:.1em; margin-bottom:15px;" value="">
    <input type="hidden" id="idAsociacion_s" >
  </div>

      <!-- <div class="col-md-4 col-xs-12"> -->

      <div class="row">
        <div class="col-6">
          <label for="exampleInputEmail1" class="form-label">NOMBRE DEL DEPORTISTA</label>
          <input type="text-center" class="form-control" required name="nombre" id="nombre" aria-describedby="emailHelp">
        </div>

        <div class="col-lg-6">
          <label for="exampleInputEmail1" class="form-label">APELLIDO PATERNO</label>
          <input type="text" class="form-control" required name="primerApellido" id="primerApellido" aria-describedby="emailHelp">
        </div>
        <div class="col-6">
          <label for="exampleInputEmail1" class="form-label">APELLIDO MATERNO</label>
          <input type="text" class="form-control" name="segundoApellido" id="segundoApellido" aria-describedby="emailHelp">
        </div>
        <div class="col-lg-6">
          <label for="exampleInputEmail1" class="form-label">FECHA DE NACIMIENTO</label>
          <input type="date" class="form-control" required name="fechaNacimiento" id="fechaNacimiento" aria-describedby="emailHelp">
        </div>
        <div class="col-lg-6">
          <label for="exampleInputEmail1" class="form-label">NUMERO DE CEDULA DE IDENTIDAD</label>
          <input type="text" class="form-control" required name="cedula" id="cedula" aria-describedby="emailHelp">
        </div>
        <div class="col-lg-6">
        <fieldset type="text"  name="fichaMedica">
          <label>CUENTA CON FICHA MEDICA</label><br>
          <label><input type="radio" name="fichaMedica" id="fichaMedica" value="yes" /> Si</label>
          <label><input type="radio" name="fichaMedica" id="fichaMedica" value="no" /> No</label>
        </fieldset>
        </div>
        <br>
        <br>
        
        <div class="col-lg-6">
          <div class="form-group">
            <label  class="form-label">FOTO</label>
            <div class="card border-primary">
                <div class="card-body">
                  <label for="perfil" id="icon-imagen" class="btn btn-primary"><i class="fas fa-image"></i></label>
                  <span id="icon-cerrar"></span>
                 <input type="file" class="d-none" required name="perfil" id="perfil" aria-describedby="emailHelp" onchange="preview(event)">
                 <img class="img-thumbnail" id="img-preview">
                </div>
            </div>
          </div>
        
        </div>
        
        <script src="<?php echo base_url(); ?>./scripts/c_solicitud.js"></script>
        <script src="<?php echo base_url(); ?>./scripts/funciones.js"></script>

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
                        <img src="<?php echo base_url();?>/uploads/user.jpeg" style="width:60%; heigth: 160%;">

                      </center>
                     <?php
                      }else
                     {
                     ?>
                     <center>
                       <img src="<?php echo base_url();?>/uploads/<?php echo $logo;?>" style="width:60%; heigth: 60%;">

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

