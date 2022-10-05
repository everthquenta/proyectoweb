<div class="col py-3">
    <div class="" style="width:100% ;">
        <p>System / Asociaciones</p>

    </div>
    <input type="text" class="form-control border border-dark " name="" id="dato_buscado" aria-describedby="emailHelp" onkeyup="btn_buscar();" style="width:60%;display:inline;margin-top:.1em; margin-bottom:15px;">
    <button type="button" class="btn border border-primary " data-toggle="modal" > Buscar</button>
    <button type="button" class="btn border border-dark" data-toggle="modal" data-target="#myModal_registrar" onclick="btn_modal_para_ingresar()">Registrar</button>
    <!-- <button type="button" class="btn btn-primary " onclick="btn_listar_datos();"> Listar</button> -->

    <!-- <button type="button" class="btn border border-dark" data-bs-toggle="modal" data-target="#myModal_registrars" onclick="btn_modal_para_ingresar()" style="display:inline;">Agregar</button> -->


    <!-- Tabla de ASOCIACIONES -->
    <!-- Start panael listado -->
    <div id="panel_listado">
        <table class="table table-bordered" style="border-color:#061B3D !important" id="listasociaciones">
            <thead class="text-white " style="border-bottom:none; background:#197E6A;">
                <tr>
                <th>#</th> 
                  <th>LOGO</th> 
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
                foreach ($asociacion->result() as $row) {
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
                     <img src="<?php echo base_url();?>/uploads/user.jpeg" style="width:60px; heigth: 60px;">
                     <?php
                      }else
                     {
                     ?>
                     <img src="<?php echo base_url();?>uploads/<?php echo $logo;?>" style="width:60px; heigth: 60px;">
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

                        <?php if($this->session->userdata('tipo')=='admin'){?>
                            <button type="button" class="btn btn-outline-warning" data-toggle="modal" data-target="#myModal_editar" onclick="btn_editar('<?php echo $idAsociacion; ?>');">MODIFICAR</button>

                        </td>
                        <td scope="col">

                            <button type="button" class="btn btn-outline-danger" data-toggle="modal" data-target="#myModal_eliminar" onclick="btn_eliminar('<?php echo $idAsociacion; ?>');">ELIMINAR</button>

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
            <link rel="stylesheet" href="styles.css">
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

<div class="modal fade" id="myModal_registrar" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">

    <form>
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header " style=" background:#061B3D">
                    <h5 class="modal-title text-white">Registrar Asociacion Deportiva</h4>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                </div>
                <div class="modal-body">
                    <div id="panel_registrar"></div>
                    <div id="panel_respuesta_registrar"></div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Cancelar</button>
                    <button type="submit" class="btn btn-primary" id="guardar" onclick="btn_guardar_datos();" data-dismiss="modal">Guardar</button>
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
<script src="<?php echo base_url(); ?>scripts/c_asociacion.js"></script>





<?php

$find              = 0;
$latitude          = 0;
$longitude         = 0;
$formatted_address = 0;

if (isset($_GET['find'])) {

    // Parametros de Configuracion
    $api_key = ""; // API Key Google Maps

    $find = urlencode(trim($_GET['find']));

    // Webservices
    $google_maps_url   = "https://maps.googleapis.com/maps/api/geocode/json?address=" . $find . "&key=" . $api_key;
    $google_maps_json  = file_get_contents($google_maps_url);
    $google_maps_array = json_decode($google_maps_json, true);

    // Get Location
    $latitude          = ($google_maps_array["results"][0]["geometry"]['location']['lat']);
    $longitude         = ($google_maps_array["results"][0]["geometry"]['location']['lng']);
    $formatted_address = ($google_maps_array["results"][0]["formatted_address"]);
}

?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Jose's Map</title>
    <link rel="stylesheet" href="flatly.min.css">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.1.1/jquery.min.js"></script>
    <script src="https://maps.googleapis.com/maps/api/js?key=<?=$api_key?>" ></script>
    <style>
        #map{
            width: 100%;
            height: 400px;
            border: #2c3e50 solid;
            border-width: 4px 4px 4px 4px;
        }
    </style>
    <script src="gmaps.min.js"></script>
    <script type="text/javascript">
        var map;
        $(document).ready(function(){
            map = new GMaps({
                div: '#map',
                lat: <?=$latitude?>,
                lng: <?=$longitude?>,
                zoom: 16,
                mapTypeId: google.maps.MapTypeId.HYBRID
            });

            map.addMarker({
                lat: <?=$latitude?>,
                lng: <?=$longitude?>,
                title: '<?=$formatted_address?>',
                infoWindow: {
                    content: '<?=$formatted_address?>'
                }
            });
        });
    </script>
</head>
<body>
    <div class="container">
        <div class="row">
            <div class="col-md-12">
                <h1 style="text-align: center;">Google Maps Geocoding API - PHP</h1>
                <form class="form-inline" method="get" style="text-align: center;">
                    <div class="form-group">
                        <input class="form-control" type="text" name="find" id="find" value="<?=urldecode($find)?>">
                    </div>
                    <input class="btn btn-primary" type="submit" value="Find">
                </form>
                <br>
                <div style="text-align: center;">
                    <kbd><kbd>Latitude:</kbd><?=$latitude?>, <kbd>Longitude:</kbd><?=$longitude?></kbd>
                </div>
            </div>
        </div>
        <hr>
        <div class="row">
            <div id="map"></div>
        </div>
    </div>
    <script src="bootstrap.min.js"></script>
</body>
</html>