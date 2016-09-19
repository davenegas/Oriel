<!DOCTYPE HTML>
<html lang="es">
    <head>
        <meta charset="utf-8"/>
        <title>Lista de Puntos BCR</title>
        <?php require_once 'frm_librerias_head.html';?>
    </head>
    <body>
        <?php require_once 'encabezado.php';?>
        <div class="container">
        <h2>Listado General de Puntos BCR</h2>
        <p>A continuación se detallan los Puntos BCR que están registrados en el sistema:</p>   

        <table id="tabla" class="display" cellspacing="0" width="100%">
          <thead>
            <tr>
              <th style="text-align:center">ID Punto</th>
              <th style="text-align:center">Nombre</th>
              <th style="text-align:center">Unidad Ejecutora</th>
              <th style="text-align:center">Codigo</th>
              <th style="text-align:center">Cuenta SIS</th>
              <th style="text-align:center">Tipo de Punto</th>
              <th style="text-align:center">Observaciones</th>
              <?php if($_SESSION['modulos']['Editar Estado- Puntos BCR']==1){ ?> 
                <th>Estado</th>
                <th>Cambiar Estado</th>
              <?php } ?>
              <th>Información</th>
              <th>Registrar</th>
            </tr>
          </thead>
          <tbody>
            <?php 
            $tam=count($params);
            for ($i = 0; $i <$tam; $i++) {
            //Solamente muestra los puntos activos o todos a quien puede cambiar el estado
            if($_SESSION['modulos']['Editar Estado- Puntos BCR']==1||$params[$i]['Estado']==1){    
            ?>
            <tr>
                <td style="text-align:center"><?php echo $params[$i]['ID_PuntoBCR'];?></td>
                <td style="text-align:center"><?php echo $params[$i]['Nombre'];?></td>
                <td style="text-align:center"><?php echo $params[$i]['Departamento'];?></td>
                <td style="text-align:center"><?php echo $params[$i]['Codigo'];?></td>
                <td style="text-align:center"><?php echo $params[$i]['Cuenta_SIS'];?></td>
                <td style="text-align:center"><?php echo $params[$i]['Tipo_Punto'];?></td>
                <td style="text-align:center"><?php echo $params[$i]['Observaciones'];?></td>
                <?php if($_SESSION['modulos']['Editar Estado- Puntos BCR']==1){ 
                    if ($params[$i]['Estado']==1){  ?>  
                        <td style="text-align:center">Activo</td>
                        <?php 
                    }   else   {?>  
                        <td style="text-align:center">Inactivo</td>
                        <?php 
                    }?>

                    <td style="text-align:center"><a href="index.php?ctl=punto_bcr_cambiar_estado&id=
                        <?php echo $params[$i]['ID_PuntoBCR']?>&estado=<?php echo $params[$i]['Estado']?>">
                        Activar/Desactivar</a></td>
                <?php } ?>
                <td style="text-align:center"><a href="index.php?ctl=gestion_punto_bcr&id=
                    <?php echo $params[$i]['ID_PuntoBCR']?>&estado=<?php echo $params[$i]['Estado']?>
                    &descripcion=<?php echo $params[$i]['Observaciones']?>">
                    Detalles</a></td>
                 
                <td style="text-align:center"><a href="index.php?ctl=frm_eventos_agregar&id=<?php echo $params[$i]['ID_PuntoBCR']?>">
                    Ingresar Evento</a></td>
            </tr>     

            <?php }}
            ?>
            </tbody>
        </table>
        
        <a href="index.php?ctl=gestion_punto_bcr&id=0" class="btn btn-default" role="button">Agregar Nuevo Punto BCR</a>
        </div> 
        
        <?php require 'vistas/plantillas/pie_de_pagina.php' ?>
        
    </body>
</html>