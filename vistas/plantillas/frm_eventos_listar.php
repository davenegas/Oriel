<!DOCTYPE HTML>
<html lang="es">
    <head>
        <meta charset="utf-8"/>
        <title>Lista de Eventos</title>
     <link href="../../../bootstrap-3.3.6/dist/css/bootstrap.min.css" rel="stylesheet" type="text/css" />
     <script src="vistas/js/jquery.min.js"></script>    
  <!--<script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.2/jquery.min.js"></script>-->      
  <script src="../../../bootstrap-3.3.6/dist/js/bootstrap.min.js"></script>
        
    </head>
    <body>
        <?php require_once 'encabezado.php';?>
        
        <div class="container">
        <h2>Listado de Eventos</h2>
        <!--<p>A continuación se detallan los diferentes roles que están registrados en el sistema:</p>-->            
        <table class="table">
          <thead>
               
            <tr>
              <th>Fecha</th>
              <th>Hora</th>
              <th>Provincia</th>
              <th>Tipo Punto</th>
              <th>Punto BCR</th>
              <th>Tipo de Evento</th>
              <th>Estado del Evento</th>
              <th>Editar Evento</th>
            </tr>
          </thead>
          <tbody>
        
            <?php 

            $tam=count($params);

            for ($i = 0; $i <$tam; $i++) {
            ?>
            <tr>
            <td><?php echo $params[$i]['Fecha'];?></td>
            <td><?php echo $params[$i]['Hora'];?></td>
            <td><?php echo $params[$i]['Nombre_Provincia'];?></td>
            <td><?php echo $params[$i]['Tipo_Punto'];?></td>
            <td><?php echo $params[$i]['Nombre'];?></td>
            <td><?php echo $params[$i]['Evento'];?></td>
            <td><?php echo $params[$i]['Seguimiento'];?></td>
            
            <td><a href="index.php?ctl=frm_eventos_editar&id=
               <?php echo $params[$i]['ID_Evento']?>">Agregar Seguimiento a este Evento</a></td>
            </tr>
            <?php }
            ?>
           <tr>
               <td><a href="index.php?ctl=frm_eventos_agregar&id=0" class="btn btn-default" role="button">Agregar Nuevo Evento de Bitácora</a></td>
            </tr>
            </tbody>
        </table>
        </div>
            <?php require 'vistas/plantillas/pie_de_pagina.php' ?>
    </body>
</html>