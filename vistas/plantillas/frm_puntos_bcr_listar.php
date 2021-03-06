<!DOCTYPE HTML>
<html lang="es">
    <head>
        <meta charset="utf-8"/>
        <title>Lista de Puntos BCR</title>
        <?php require_once 'frm_librerias_head.html';?>
        <script>
          $(document).ready(function () {
            // Una vez se cargue al completo la página desaparecerá el div "cargando"
            $('#cargando').hide();
            $.post("index.php?ctl=cuenta_visitas_a_puntos_bcr_privado");
             if ( $.fn.dataTable.isDataTable('#tabla') ) {
                    table = $('#tabla').DataTable();
                }
                table.destroy();
                table = $('#tabla').DataTable( {
                    stateSave: true,
                    "lengthMenu": [[10, 25, 50,100,-1], [10, 25, 50,100,"All"]]
                });           
            
            });
        </script>
    </head>
    <body>
        <?php require_once 'encabezado.php';?>
        <div id="cargando">
            <center><img align="center" src="vistas/Imagenes/Espere.gif"/></center>
        </div>
        <div class="container">
        <h2>Listado General de Puntos BCR</h2>
        <p>A continuación se detallan los Puntos BCR que están registrados en el sistema:</p>   
        <table id="tabla" class="display" cellspacing="0" width="100%">
            <thead>
                <tr>
                    <th hidden style="text-align:center">ID Punto</th>
                    <th style="text-align:center">Nombre</th>
                    <th style="text-align:center">Unidad Ejecutora</th>
                    <th style="text-align:center">Código</th>
                    <th hidden>Número de Línea</th>
                    <th hidden>Dirección IP</th>
                    <th style="text-align:center">Cuenta SIS</th>
                    <th style="text-align:center">Tipo de Punto</th>
                    <th style="text-align:center">Horario</th>
                    <th style="text-align:center">Observaciones</th>
                    <?php if($_SESSION['modulos']['Editar Estado- Puntos BCR']==1||$_SESSION['modulos']['Ver inactivos- Puntos BCR']==1){ ?> 
                        <th>Estado</th>
                    <?php } ?>
                    <?php if($_SESSION['modulos']['Editar Estado- Puntos BCR']==1){ ?> 
                        <th>Cambiar Estado</th>
                    <?php } ?>    
                    <th>Información</th>
                    <?php if($_SESSION['modulos']['Módulo-Bitácora Digital']==1){ ?> 
                        <th>Registrar</th>
                    <?php } ?>
                </tr>
          </thead>
          <tbody>
                <?php 
                $tam=count($params);
                for ($i = 0; $i <$tam; $i++) {
                //Solamente muestra los puntos activos o todos a quien puede cambiar el estado
                if($_SESSION['modulos']['Editar Estado- Puntos BCR']==1||$params[$i]['Estado_Punto']==1||$_SESSION['modulos']['Ver inactivos- Puntos BCR']==1){    
                ?>
                <tr>
                    <td hidden style="text-align:center"><?php echo $params[$i]['ID_PuntoBCR'];?></td>
                    <td style="text-align:center"><?php echo $params[$i]['Nombre'];?></td>
                    <td style="text-align:center"><?php echo $params[$i]['Departamento'];?></td>
                    <td style="text-align:center"><?php echo $params[$i]['Codigo'];?></td>
                    <td hidden style="text-align:center"><?php echo $params[$i]['Numero_Linea'];?></td>
                    <td hidden style="text-align:center"><?php echo $params[$i]['Direccion_IP'];?></td>
                    <td style="text-align:center"><?php echo $params[$i]['Cuenta_SIS'];?></td>
                    <td style="text-align:center"><?php echo $params[$i]['Tipo_Punto'];?></td>
                    <td style="text-align:center"><?php echo $params[$i]['Observaciones'];?></td>
                    <?php if (strlen(trim($params[$i]['Observaciones_Punto']))==0){?>  
                               <td style="text-align:center">Sin Actualizar</td>
                          <?php }  else    {?>  
                               <td style="text-align:center"><?php echo $params[$i]['Observaciones_Punto'];?></td> 
                    <?php   }   ?>
                    <?php if($_SESSION['modulos']['Editar Estado- Puntos BCR']==1||$_SESSION['modulos']['Ver inactivos- Puntos BCR']==1){ 
                        if ($params[$i]['Estado_Punto']==1){  ?>  
                            <td style="text-align:center">Activo</td>
                        <?php } else {?>  
                            <td style="text-align:center">Inactivo</td>
                        <?php }?>
                    <?php } ?>
                    <?php if($_SESSION['modulos']['Editar Estado- Puntos BCR']==1){ ?>
                        <td style="text-align:center"><a href="index.php?ctl=punto_bcr_cambiar_estado&id=
                            <?php echo $params[$i]['ID_PuntoBCR']?>&estado=<?php echo $params[$i]['Estado_Punto']?>">
                            Activar/Desactivar</a></td>
                    <?php } ?>
                    <td style="text-align:center"><a href="index.php?ctl=gestion_punto_bcr&id=
                        <?php echo $params[$i]['ID_PuntoBCR']?>&estado=<?php echo $params[$i]['Estado_Punto']?>
                        &descripcion=<?php echo $params[$i]['Observaciones']?>">
                        Detalles</a></td>
                    <?php if($_SESSION['modulos']['Módulo-Bitácora Digital']==1){ ?> 
                        <td style="text-align:center"><a href="index.php?ctl=frm_eventos_agregar&id=<?php echo $params[$i]['ID_PuntoBCR']?>">
                            Ingresar Evento</a></td>
                    <?php } ?>
                </tr>     

            <?php }} ?>
            </tbody>
        </table>
        <?php if($_SESSION['modulos']['Editar- Puntos BCR']==1){ ?>
        <a href="index.php?ctl=gestion_punto_bcr&id=0" class="btn btn-default" role="button">Agregar Nuevo Punto BCR</a>
        <?php }?>
        </div>  
        <?php require 'vistas/plantillas/pie_de_pagina.php' ?>
        
    </body>
</html>