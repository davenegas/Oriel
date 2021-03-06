<!DOCTYPE HTML>
<html lang="es">
    <head>
        <meta charset="utf-8"/>
        <title>Lista de Eventos</title>
        <?php require_once 'frm_librerias_head.html'; ?>    
        <link rel="stylesheet" href="vistas/css/ventanaoculta.css"> 
        <script language="javascript" src="vistas/js/refresca_pagina_automaticamente.js"></script>  
        <script type="text/javascript">
            window.onunload = unloadPage;
        </script>
        <script>
            $(document).ready(function () {
                $.post("index.php?ctl=cuenta_visitas_a_bitacora_digital");
                            
                if ( $.fn.dataTable.isDataTable('#tabla') ) {
                    table = $('#tabla').DataTable();
                }
                table.destroy();
                table = $('#tabla').DataTable( {
                    stateSave: true,
                    "lengthMenu": [[10, 25, 50,100,-1], [10, 25, 50,100,"All"]]
                });           
            });
        
            
            $(document).ready(function () {
                puestoenviado=<?php echo $puesto_enviado ?>;
                $("#puesto option[value="+puestoenviado+"]").attr("selected",true);
                
                check = <?php echo $check_continuidad ?>;
                if(check=='0'){
                    document.getElementById("continuidad").checked = false;
                } else{
                    document.getElementById("continuidad").checked = true;
                }
            });
            function validar_puesto(pst){
                puesto = pst;
                document.getElementById('puestos').submit();
            }
            function cambiar_estado_boton_resumen(codigo){
                identificador='btn'+codigo;
                var objetoSPAN = document.getElementById(identificador); 
                if (objetoSPAN.innerHTML =='+'){
                    objetoSPAN.innerHTML = '-'; 
                } else {
                    objetoSPAN.innerHTML = '+'; 
                }
            }    
            //Funcion para ocultar ventana de mantenimiento de notas de coordinacion
            function ocultar_elemento(){
                document.getElementById('ventana_oculta_1').style.display = "none";
                document.getElementById('ventana_oculta_2').style.display = "none";
                document.getElementById('ventana_oculta_3').style.display = "none";
                //location.reload(true);
            }
            //Valida informacion completa de formulario de notas de coordinacion
            function check_empty() {
                var notas=document.getElementById('observaciones').value;
                if (notas.trim()==""){
                     document.getElementById('observaciones').value="Sin Anotaciones";
                }
                //Envia el formulario y lo oculta
                document.getElementById('ventana').submit();
                document.getElementById('ventana_oculta_1').style.display = "none";
            }
            //Funcion para editar notas de supervisión
            function editar_notas_supervision(id_eve,notas) {
                document.getElementById('ID_Evento').value=id_eve;
                //alert("_"+notas+"_");
                if(notas=='Sin Anotaciones'){
                    document.getElementById('observaciones').value="";
                }else{
                    document.getElementById('observaciones').value=notas;
                }
                document.getElementById('ventana_oculta_1').style.display = "block";
                
                copyToClipboard();
            }
             //Funcion para editar notas de supervisión
            function mostrar_resumen_de_seguimientos(prueb) {
                //var mydiv= document.getElementById('tabla_seguimientos');
                //mydiv.appendChild(document.getElementById("tbl"+prueb));
                id_e=prueb;
                $.post("index.php?ctl=dibuja_tabla_seguimiento_evento", { id_e: id_e}, function(data){
                    $("#tabla_seguimiento_prueba").html(data); 
                    //console.log(data);
                });
                //document.getElementById('ventana_oculta_1').style.display = "block";
                document.getElementById('ventana_oculta_3').style.display = "block";
            }
            function tramita_mezcla_de_eventos() {
                var tbl = document.getElementById('tabla');
                var mezcla= document.getElementById('mezcla_eventos');
                var controles_input=document.getElementsByTagName("input");
                if (mezcla.checked==true){
                    if (tbl.rows.length-1==<?php echo count($params);?>){
                        for (var i=0;i < tbl.rows.length; i++){
                            tbl.rows[i].cells[4].hidden=false;
                        }
                    }else{
                        mezcla.checked=false;
                        alert ("Es necesario mostrar el total de eventos en pantalla para poder proceder con la mezcla, por favor ajuste el filtro a una cantidad superior de líneas por pantalla!!!");
                    }
                }else{
                    if (tbl.rows.length-1==<?php echo count($params);?>){
                        var cuenta_numero_eventos=0;
                        var id_numeros_de_evento='';
                        for (var i=0;i < controles_input.length; i++){
                           if (controles_input[i].type == "checkbox"){
                              if (controles_input[i].name == "seleccioneventos"){
                                 if (controles_input[i].checked == true){
                                    cuenta_numero_eventos=cuenta_numero_eventos+1;
                                    //alert(controles_input[i].value);
                                    if (cuenta_numero_eventos==1){
                                        id_numeros_de_evento=controles_input[i].value;
                                    }else{
                                        id_numeros_de_evento=id_numeros_de_evento+'-'+controles_input[i].value;
                                    }
                                    controles_input[i].checked = false;
                                 }
                              }
                           }   
                        }
                        if (cuenta_numero_eventos>1){                     
                            $.post("index.php?ctl=mezcla_eventos_bitacora_digital", { id_numeros_de_evento: id_numeros_de_evento }, function(data){
                                var str = data;
                                var n = str.search("NO");

                                if (n!=-1){
                                    alert('Ya existe esta mezcla en el sistema de forma idéntica o alguno de los eventos seleccionados pertenece a otra mezcla existente. No es posible el reingreso de la información!!!');
                                }else{
                                    alert('Mezcla ingresada correctamente en el sistema!!!');
                                }
                            });   
                        }else{
                            alert ("Es necesario mezclar al menos dos eventos!!! Por favor repita el procedimiento.");
                        }
                        for (var i=0;i < tbl.rows.length; i++){                  
                            tbl.rows[i].cells[4].hidden=true;
                        }
                        location.reload();  
                    }else{
                        mezcla.checked=true;
                        alert ("Es necesario mostrar el total de eventos en pantalla para poder proceder con la mezcla, por favor ajuste el filtro a una cantidad superior de líneas por pantalla!!!");
                    }
                }
            }
            
             //fin del boton de copia
        //Funcion copytoClipboard
        function copyToClipboard() {
        $("body").append("<input type='text' id='temp'>"); // Acá se crea un input dinamicamente con un id para luego asignarle un valor sombreado
        var s="Carlo Fuentes";
        $("#temp").val(s).select(); // Acá se obtiene el id del boton que hemos creado antes y se le agrega un valor y luego se le sombrea con select(). Para agregar lo que se quiere copiar editas val("EDITAESTOAQUÍ")
        document.execCommand("copy"); // document.execCommand("copy") manda a copiar el texto seleccionado en el documento
        $("#temp").remove();

        }
        </script>
    </head>
    <body>
        <?php require_once 'encabezado.php';?>
        <?php /*if($_SESSION['modulos']['Notas Importantes']==1){ ?>
            <!--Ventana de Notas Pendientes, deslizable-->
            <div class="esthela" style="right: -400px;">
                <div style="color: rgb(255, 255, 255); padding: 8px 5px 0pt 50px;">
                    <div class="">
                        <?php $notas=nota_obtener();?>
                        <label for="notas">Pendientes</label>
                        <textarea class="form-control" rows="10" id="notas" name="notas" placeholder="Notas importantes para seguimientos" onchange="guardar_informacion();"><?php echo $notas[0]['Nota'];?> </textarea>
                    </div>
                </div>
            </div>
         <?php } */?>
        <div class="container animated fadeIn col-xs-10 quitar-float">
            <div class="col-md-5">
                <h2>Listado de Eventos</h2>
                <!--<p>A continuación se detallan los diferentes roles que están registrados en el sistema:</p>-->            
                <a href="index.php?ctl=frm_eventos_agregar&id=0" class="btn btn-default espacio-abajo" role="button">Agregar Nuevo Evento de Bitácora</a>
                <a href="index.php?ctl=frm_eventos_lista_cerrados" class="btn btn-default espacio-abajo quitar-float" role="button">Eventos Cerrados</a> 
            </div>
            
            <form id="puestos" method="POST" name="form" action="index.php?ctl=eventos_listar_filtrado">
                <div class="col-md-2" style="margin-top: 35px;">    
                    <label for="puesto">Puesto</label>
                    <select class="form-control" id="puesto" name="puesto" onchange="validar_puesto(value);"> 
                        <option value="0">Todos</option>
                        <option value="1">Puesto 1</option>
                        <option value="2">Puesto 2</option>
                        <option value="3">Puesto 3</option>
                        <option value="4">Puesto 4</option>
                        <option value="5">Z2</option>
                    </select>
                </div>
                <div class="checkbox col-md-2" style="margin-top: 65px;">
                    <input type="checkbox" id="continuidad" name="continuidad" onchange="validar_puesto(value);">Mostrar Labores Continuidad
                </div> 
            </form>  
            
            <?php 
            //Solamente los coordinadores ven esta opcion de agregar mezclas
            if($_SESSION['modulos']['Módulo-Bitácora Digital-Agregar Mezclas de Eventos']==1){ ?>
                <div class="checkbox col-md-2" style="margin-top: 65px;">
                    <label><input type="checkbox" value="" id="mezcla_eventos" onclick="tramita_mezcla_de_eventos()">Mezclar Eventos</label>
                </div> 
            <?php } ?>

            <table id="tabla" class="display">
                <thead>
                    <tr>
                        <th hidden="true">ID_Evento</th>
                        <?php /*
                        //Solamente los coordinadores ven esta columna - NOTAS DE SUPERVISION
                        if($_SESSION['modulos']['Módulo-Bitácora Digital-Notas de Supervisión']==1){ ?>
                            <th style="text-align:center">Notas de Coordinación</th>
                        <?php } */?>
                        <th style="text-align:center">Fecha</th>
                        <th style="text-align:center">Hora</th>
                        <th style="text-align:center">Lapso</th>
                        <th id="mix" hidden="true">Mix</th>
                        <th style="text-align:center">Provincia</th>
                        <th style="text-align:center">Tipo Punto</th>
                        <th style="text-align:center">Punto BCR</th>
                        <th style="text-align:center">Código</th>
                        <th style="text-align:center">Tipo de Evento</th>
                        <th style="text-align:center">Estado del Evento</th>
                        <th style="text-align:center">Último Seguimiento</th>
                        <th style="text-align:center">Editar Evento</th>
                        <th style="text-align:center">Resumen de Seguimientos</th>
                        <th id="demo1" hidden="hidden">Seguimientos</th>
                    </tr>
                </thead>
                <tbody>
                    <?php 
                    $tam=count($params);
                    for ($i = 0; $i <$tam; $i++) { ?>
                        <tr data-toggle="tooltip" title="<?php echo $detalle_y_ultimo_usuario[$i]['Detalle'];?>">
                            <?php 
                            $fecha_evento = date_create($params[$i]['Fecha']);
                            $fecha_actual = date_create(date("d-m-Y"));
                            $dias_abierto= date_diff($fecha_evento, $fecha_actual);
                            ?>
                            <td style="text-align:center" hidden="true"><?php echo $params[$i]['ID_Evento'];?></td>
                            <?php /*
                            //Solamente los coordinadores ven esta columna - NOTAS DE SUPERVISION
                            if($_SESSION['modulos']['Módulo-Bitácora Digital-Notas de Supervisión']==1){ ?>
                                <?php if (strcmp($params[$i]['Fecha_Observaciones'], "1983-04-09")==0) { ?>
                                    <td style="text-align:center" data-toggle="tooltip" title="<?php echo $params[$i]['Observaciones_Evento'];?>"><a href="javascript:void(null)" style="color:#FFFFFF">3<img src="vistas/Imagenes/Agregar Nota.jpg" class="img-rounded" alt="Cinque Terre" width="25" height="25" onClick="editar_notas_supervision('<?php echo $params[$i]['ID_Evento'];?>','<?php echo $params[$i]['Observaciones_Evento'];?>')"></a></td>
                                <?php } else{ 
                                    if (strcmp($params[$i]['Fecha_Observaciones'], date("Y-m-d"))==0) { ?>
                                        <td style="text-align:center" data-toggle="tooltip" title="<?php echo $params[$i]['Observaciones_Evento'];?>"><a href="javascript:void(null)" style="color:#FFFFFF">1<img src="vistas/Imagenes/Nota de Hoy.png" class="img-rounded" alt="Cinque Terre" width="25" height="25" onClick="editar_notas_supervision('<?php echo $params[$i]['ID_Evento'];?>','<?php echo $params[$i]['Observaciones_Evento'];?>')"></a></td>
                                    <?php  }else{ ?>
                                        <td style="text-align:center" data-toggle="tooltip" title="<?php echo $params[$i]['Observaciones_Evento'];?>"><a href="javascript:void(null)" style="color:#FFFFFF">2<img src="vistas/Imagenes/Editar Nota.png" class="img-rounded" alt="Cinque Terre" width="25" height="25" onClick="editar_notas_supervision('<?php echo $params[$i]['ID_Evento'];?>','<?php echo $params[$i]['Observaciones_Evento'];?>')"></a></td>
                                    <?php }
                                } ?>
                            <?php } */?>
                            <td style="text-align:center"><?php echo date_format($fecha_evento, 'Y/m/d');?></td>
                            <td style="text-align:center"><?php echo $params[$i]['Hora'];?></td>
                            <td style="text-align:center"><?php echo $dias_abierto->format('%a');?></td>

                            <!--<td style="text-align:center"><?php echo date_format($fecha_evento, 'd/m/Y');?></td>-->
                            <!--<td style="text-align:center"><?php echo $params[$i]['Hora'];?></td>-->
                            <!--<td style="text-align:center"><?php echo $dias_abierto->format('%a');?></td>-->
                            <td style="text-align:center" hidden="true"><input type="checkbox" name="seleccioneventos" value="<?php echo $params[$i]['ID_Evento'];?>"></td>
                            <td style="text-align:center"><?php echo $params[$i]['Nombre_Provincia'];?></td>
                            <td style="text-align:center"><?php echo $params[$i]['Tipo_Punto'];?></td>
                            <?php if ($eventos_con_mezcla[$i]=="SI"){ ?>
                                <td style="text-align:center" data-toggle="tooltip" title="Evento Mezclado"><?php echo $params[$i]['Nombre'];?><a style="color:#FFFFFF">11<img src="vistas/Imagenes/mezcla_eventos.jpg" class="img-rounded" alt="Cinque Terre" width="15" height="20"></a></td> 
                            <?php 
                            }else{ ?>
                                <td style="text-align:center"><?php echo $params[$i]['Nombre'];?></td>
                            <?php } ?>   
                            <td style="text-align:center"><?php echo $params[$i]['Codigo'];?></td>
                            <td style="text-align:center"><?php echo $params[$i]['Evento'];?></td>
                            <td style="text-align:center"><?php echo $params[$i]['Estado_Evento'];?></td>
                            <td style="text-align:center"><?php echo $detalle_y_ultimo_usuario[$i]['Usuario'] ?></td>
                            <td align="center"><a href="index.php?ctl=frm_eventos_editar&accion=editar_abiertos&id=
                               <?php echo $params[$i]['ID_Evento']?>">Gestionar Seguimiento</a></td>
                            <!--<td style="text-align:center"><button data-toggle="collapse" data-target="#<?php echo $params[$i]['ID_Evento'];?>" id="btn<?php echo $params[$i]['ID_Evento'];?>" onclick="cambiar_estado_boton_resumen(<?php echo $params[$i]['ID_Evento'];?>);">+</button></td>-->
                            <td style="text-align:center"><button class="btn btn-default espacio-abajo" role="button" onclick="mostrar_resumen_de_seguimientos(<?php echo $params[$i]['ID_Evento'];?>)">+</button></td>         
                            <td style="text-align:center" id="<?php echo $params[$i]['ID_Evento'];?>" hidden="hidden">
                                <table class="table-condensed" id="tbl<?php echo $params[$i]['ID_Evento'];?>">
                                    <thead>
                                        <tr>
                                            <th>Fecha de Seguimiento</th>
                                            <th>Hora de Seguimiento</th>
                                            <th>Detalle del Seguimiento</th>
                                            <th>Ingresado Por</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <?php 
                                        $tama=count($todos_los_seguimientos_juntos);
                                        for ($j = 0; $j <$tama; $j++) { ?>
                                            <tr>
                                                <?php
                                                $fecha_evento = date_create($todos_los_seguimientos_juntos[$j]['Fecha']);
                                                $fecha_actual = date_create(date("d-m-Y"));
                                                $dias_abierto= date_diff($fecha_evento, $fecha_actual);
                                                if ($params[$i]['ID_Evento']==$todos_los_seguimientos_juntos[$j]['ID_Evento']){  ?>
                                                    <td><?php echo date_format($fecha_evento, 'd/m/Y');?></td>
                                                    <td><?php echo $todos_los_seguimientos_juntos[$j]['Hora'];?></td>
                                                    <td><?php echo $todos_los_seguimientos_juntos[$j]['Detalle'];?></td>
                                                    <td><?php echo $todos_los_seguimientos_juntos[$j]['Nombre_Usuario']." ".$todos_los_seguimientos_juntos[$j]['Apellido'] ?></td>               
                                                    
                                                <?php } ?>
                                            </tr>
                                        <?php  } ?>
                                    </tbody>
                                </table>  
                            </td>
                    </tr>
                    <?php }  ?>
                </tbody>
            </table>
        </div>
        <?php require 'vistas/plantillas/pie_de_pagina.php' ?>
        
        <!--agregar o editar seguimientos de coordinación -->
        <div id="ventana_oculta_1"> 
            <div id="popupventana">
                <!--Formulario para novedades-->
                <form id="ventana" method="POST" name="form" action="index.php?ctl=notas_coordinacion_bitacora_guardar">
                    <img id="close" src='vistas/Imagenes/cerrar.png' width="25" onclick ="ocultar_elemento()">
                    <h2 align="center">Notas de Coordinación:</h2>
                    <hr>
                    <input hidden id="ID_Evento" name="ID_Evento" type="text">
                                            
                    <label for="observaciones">Detalle</label>
                    <textarea type="text" class="form-control" id="observaciones" name="observaciones" value="" maxlength="500" placeholder="Observaciones"></textarea>
                    <hr>
                   <button><a href="javascript:%20check_empty()" id="submit">Guardar</a></button>
                </form>
            </div>
        </div>
        <!--Cierre agregar teléfono a Punto BCR-->
        
        <input id="alex" name="alex" type="text" hidden="" value="alex">
        
        <!--agregar o editar seguimientos de coordinación -->
        <div id="ventana_oculta_2"> 
            <div id="popupventana2">
                <div id="ventana2">
                    <img id="close" src='vistas/Imagenes/cerrar.png' width="25" onclick ="ocultar_elemento()">
                    <h2 align="center">Resumen de Seguimientos:</h2>
                    <div id="tabla_seguimientos">                
                    </div>
                    <hr>
                </div>
            </div>
        </div>
        
         <!--Ver seguimiento evento- Ventana oculta-->
        <div id="ventana_oculta_3"> 
            <div id="popupventana2" class="animated zoomIn">
                <!--Formulario para direccionamiento de las ip-->
                <div id="ventana2">
                    <img id="close" src='vistas/Imagenes/cerrar.png' width="25" onclick ="ocultar_elemento()">
                    <h2 align="center">Seguimiento de evento seleccionado</h2>
                    <br>
                    <table id='tabla_seguimiento_prueba' class="table ">
                    </table>
                </div>
            </div>      
        </div>
        <!--Cierre agregar teléfono a Punto BCR-->
        
    </body>
</html>