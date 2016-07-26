<!DOCTYPE HTML>
<html lang="es">
    <head>
        <meta charset="utf-8"/>
        <title>Lista de Tipos de Eventos</title>
        <?php require_once 'frm_librerias_head.html';?>
        
    </head>
    <body>
        <?php require_once 'encabezado.php';?>
        
        <div class="container">
        <h2>Listado General de Tipos de Eventos</h2>
        <p>A continuación se detallan los diferentes tipos de eventos que están registrados en el sistema:</p>            
        <table id="tabla" class="display" cellspacing="0" width="100%">
          <thead>
            <tr>
              <th>ID</th>
              <th>Evento</th>
              <th>Observaciones</th>
              <th>Gestión Estado</th>
              <th>Cambiar Estado</th>
              <th>Mantenmiento</th>
            </tr>
          </thead>
          <tbody>
            <?php 
            $tam=count($params);
            for ($i = 0; $i <$tam; $i++) {
            ?>
            <tr>
                <td><?php echo $params[$i]['ID_Tipo_Evento'];?></td>
                <td><?php echo $params[$i]['Evento'];?></td>
                <td><?php echo $params[$i]['Observaciones'];?></td>
            
            <?php 
            if ($params[$i]['Estado']==1){
              ?>  
                <td>Activo</td>
               <?php 
            }else
            {?>  
                <td>Inactivo</td>
            <?php 
            }
            ?>
                
           <td><a href="index.php?ctl=cambiar_estado_tipo_evento&id=
               <?php echo $params[$i]['ID_Tipo_Evento']?>&estado=<?php echo $params[$i]['Estado']?>">
                   Activar/Desactivar</a></td>
           <td><a href="index.php?ctl=gestion_tipo_evento&id=
               <?php echo $params[$i]['ID_Tipo_Evento']?>&estado=<?php echo $params[$i]['Estado']?>&descripcion=<?php echo $params[$i]['Observaciones']?>">
                   Editar Modulo</a></td>
            </tr>     
                    
            <?php }
            ?>
            </tbody>
        </table>
        <a href="index.php?ctl=frm_tipo_eventos_gestion&id=0" class="btn btn-default" role="button">Agregar un Nuevo Tipo Evento</a>
        </div>
            <?php require 'vistas/plantillas/pie_de_pagina.php' ?>
    </body>
</html>