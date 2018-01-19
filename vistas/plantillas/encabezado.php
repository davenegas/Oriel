
<?php function nota_obtener() {
    $obj_general = new cls_general();
    $obj_general->obtener_notas();
    $notas= $obj_general->getArreglo(); 
    return $notas;
} ?>
    
<html lang="en"> 
    <head>
        <link rel="stylesheet" href="vistas/css/main.css">
        <script src="vistas/js/jquery-1-4-2-min.js"></script>
        <script language="javascript" src="vistas/js/listas_dependientes_encabezado.js"></script>
        <style>
            .dropdown-submenu {
                position: relative;
            }
            .dropdown-submenu .dropdown-menu {
                top: 0;
                left: 100%;
                margin-top: -1px;
            }
        </style>
        <script>
            $(document).ready(function () {
                //revision_controles();
                //setInterval(revision_controles,60000);
            });

            function revision_controles(){
                $.post("index.php?ctl=revision_controles_desatendidos", {}, function(data){
                    var srt = data;
                        var n= srt.search("<br>");
                        if(typeof(myToast)!== 'undefined'){
                            $().toastmessage('removeToast', myToast);
                        }
                        if(n!=-1){
                            $().toastmessage({sticky : true});
                            myToast = $().toastmessage('showWarningToast', data); 
                        }
                });
            }
        </script>
    </head>
    <center><img src="vistas/Imagenes/Banner_Centro_de_Control.jpg" alt=""/></center>
    <nav class="navbar navbar-default" >
        <div class="container-fluid">
            <div class="navbar-header">
                <a class="navbar-brand" href="index.php?ctl=principal"><b>Jefatura Seguridad</b></a>
            </div>
            
            <ul class="nav navbar-nav">
                <?php 
                //************************************************Pinta Menu de Seguridad***************************************************************
                if (($_SESSION['modulos']['Seguridad-Módulos']==1)||($_SESSION['modulos']['Seguridad-Roles']==1)||
                        ($_SESSION['modulos']['Seguridad-Usuarios']==1)||($_SESSION['modulos']['Seguridad-Trazabilidad']==1)){ ?>
                    <li class="dropdown">
                        <a class="dropdown-toggle" data-toggle="dropdown" href="#">Seguridad
                            <span class="caret"></span></a>
                        <ul class="dropdown-menu">

                            <?php if ($_SESSION['modulos']['Seguridad-Módulos']==1){ ?>
                                <li><a href="index.php?ctl=modulos_listar">Módulos</a></li>
                            <?php };  ?>

                            <?php   if ($_SESSION['modulos']['Seguridad-Roles']==1){ ?>
                                <li><a href="index.php?ctl=listar_roles">Roles</a></li>
                            <?php }; ?>

                            <?php  if ($_SESSION['modulos']['Seguridad-Usuarios']==1){?>
                                <li><a href="index.php?ctl=listar_usuarios">Usuarios</a></li>
                            <?php }; ?> 

                        </ul>
                    </li>
                <?php  };    ?>

                <?php 
                //************************************************Pinta Menu de Catalogos***************************************************************
                if (($_SESSION['modulos']['Catálogos-Empresas']==1||$_SESSION['modulos']['Catálogos-Tipo Evento']==1||
                       $_SESSION['modulos']['Importar- Prontuario']==1||$_SESSION['modulos']['Catálogos-Direcciones IP']==1||
                       $_SESSION['modulos']['Catálogos-Horarios']==1||$_SESSION['modulos']['Catálogos-Unidades Ejecutoras']==1||
                       $_SESSION['modulos']['Catálogos-Tipo Teléfono']==1||$_SESSION['modulos']['Catálogos-Tipo Punto']==1||
                       $_SESSION['modulos']['Catálogos-Gerente Zona']==1|| $_SESSION['modulos']['Catálogos-Supervisor Zona']==1||
                       $_SESSION['modulos']['Catálogos-Proveedor enlaces']==1||$_SESSION['modulos']['Catálogos-Tipo enlaces']==1||
                       $_SESSION['modulos']['Catálogos-Medio enlaces']==1|| $_SESSION['modulos']['Catálogos-Unidades de Video']==1||
                       $_SESSION['modulos']['Catálogos-Cencon']==1 || $_SESSION['modulos']['Catálogos-Puestos de Monitoreo']==1
                        || $_SESSION['modulos']['Catálogos-Inconsistencias de Video']==1 ||$_SESSION['modulos']['Catálogos-Botones']==1)){  ?>

                    <li class="dropdown">
                        <a class="dropdown-toggle" data-toggle="dropdown" href="#">Catálogos
                        <span class="caret"></span></a>
                        <ul class="dropdown-menu">
                            
                            <?php if ($_SESSION['modulos']['Catálogos-Botones']==1){?>  
                                <li><a href="index.php?ctl=botones_listar">Botones RF</a></li> 
                            <?php  }; ?>     
                                
                            <?php if ($_SESSION['modulos']['Catálogos-Inconsistencias de Video']==1){ ?>
                                <li class="dropdown-submenu">
                                    <a class="multilevel" tabindex="-1" href="#">Control de acceso<span class="caret"></span></a>
                                    <ul class="dropdown-menu">
                                      <li><a tabindex="-1" href="index.php?ctl=actualizar_controladores_inicio">Controladores</a></li>
                                      <li><a tabindex="-1" href="index.php?ctl=actualizar_puerta_controlada_inicio">Puertas</a></li>
                                      <li><a tabindex="-1" href="index.php?ctl=actualizar_modulo_puerta_inicio">Módulos</a></li>
                                    </ul>
                                </li>
                            <?php }; ?> 
                                
                            <?php  if ($_SESSION['modulos']['Catálogos-Direcciones IP']==1){?>
                                <li><a href="index.php?ctl=direcciones_ip_listar">Direcciones IP's</a></li> 
                            <?php  }; ?>    
                                
                            <?php if ($_SESSION['modulos']['Catálogos-Empresas']==1){ ?>
                                <li><a href="index.php?ctl=empresas_listar">Empresas</a></li>
                            <?php };?>   
                                
                            <?php  if ($_SESSION['modulos']['Catálogos-Gerente Zona']==1){?>
                                <li><a href="index.php?ctl=gerente_zona_listar">Gerentes de zona</a></li>
                            <?php  }; ?> 
                                
                            <?php  if ($_SESSION['modulos']['Catálogos-Horarios']==1){?>
                                <li><a href="index.php?ctl=horario_listar">Horarios BCR</a></li> 
                            <?php  }; ?> 
                                
                            <?php  if ($_SESSION['modulos']['Importar- Prontuario']==1){?>
                               <li><a href="index.php?ctl=frm_importar_prontuario_paso_1">Importar prontuario</a></li> 
                            <?php  }; ?>  
                            
                            <?php  if ($_SESSION['modulos']['Catálogos-Inconsistencias de Video']==1){?>
                               <li><a href="index.php?ctl=inconsistencias_de_video_listar">Inconsistencias de video</a></li>
                            <?php  }; ?>
                               
                            <?php  if ($_SESSION['modulos']['Catálogos-Medio enlaces']==1){?>
                                <li><a href="index.php?ctl=medio_enlace_listar">Medios de enlaces</a></li> 
                            <?php  }; ?> 
                                
                            <?php  if ($_SESSION['modulos']['Catálogos-Proveedor enlaces']==1){?>
                                <li><a href="index.php?ctl=proveedor_listar">Proveedores de enlaces</a></li> 
                            <?php  }; ?>
                            
                            <?php  if ($_SESSION['modulos']['Catálogos-Puestos de Monitoreo']==1){?>
                               <li><a href="index.php?ctl=puestos_de_monitoreo_listar">Puestos de monitoreo</a></li>
                            <?php  }; ?>
                            
                            <?php  if ($_SESSION['modulos']['Catálogos-Unidades de Video']==1){?>
                               <li><a href="index.php?ctl=sincronizacion_base_de_datos_rapid_eye">Rapid Eye</a></li>
                            <?php  }; ?>
                               
                            <?php  if ($_SESSION['modulos']['Catálogos-Cencon']==1){?>
                               <li><a href="index.php?ctl=cencon_gestion">Registro Cencon</a></li>
                            <?php  }; ?>
                            
                            <?php  if ($_SESSION['modulos']['Catálogos-Supervisor Zona']==1){?>
                                <li><a href="index.php?ctl=supervisor_zona_listar">Supervisor de zona</a></li>
                            <?php  }; ?>
                                
                            <?php if ($_SESSION['modulos']['Catálogos-Tipo Evento']==1){ ?>
                                <li><a href="index.php?ctl=tipo_eventos_listar">Tipo de evento</a></li>
                            <?php }; ?>

                           <?php  if ($_SESSION['modulos']['Catálogos-Tipo Punto']==1){?>
                                <li><a href="index.php?ctl=tipo_punto_listar">Tipo de punto</a></li>
                            <?php  }; ?>

                            <?php  if ($_SESSION['modulos']['Catálogos-Tipo Teléfono']==1){?>
                                <li><a href="index.php?ctl=tipo_telefono_listar">Tipo de teléfono</a></li>
                            <?php  }; ?>    
                                
                            <?php  if ($_SESSION['modulos']['Catálogos-Tipo enlaces']==1){?>
                                <li><a href="index.php?ctl=tipo_enlace_listar">Tipos de enlaces</a></li> 
                            <?php  }; ?>
                            
                            <?php  if ($_SESSION['modulos']['Catálogos-Unidades de Video']==1){?>
                               <li><a href="index.php?ctl=unidades_de_video_listar">Unidades de video</a></li>
                            <?php  }; ?>

                            <?php  if ($_SESSION['modulos']['Catálogos-Unidades Ejecutoras']==1){?>
                                <li><a href="index.php?ctl=unidad_ejecutora_listar">Unidades ejecutoras</a></li>
                            <?php  }; ?> 
                                
                        </ul>
                    </li>

                <?php }; ?>

                <?php 
                //************************************************Pinta Menu de Módulos***************************************************************
                if (($_SESSION['modulos']['Módulo-Bitácora Digital']==1)||($_SESSION['modulos']['Módulo-MRI BCR']==1)||
                        ($_SESSION['modulos']['Módulo-Control de Video']==1)||($_SESSION['modulos']['Módulo-PuntosBCR']==1)||
                        ($_SESSION['modulos']['Módulo-Personal']==1)||($_SESSION['modulos']['Módulo-Áreas de Apoyo']==1)||
                        ($_SESSION['modulos']['Módulo-Personal Externo']==1)||($_SESSION['modulos']['Módulo-Cencon']==1)||
                        ($_SESSION['modulos']['Módulo-Pruebas alarma']==1 || $_SESSION['modulos']['Módulo-Programaciones']==1)){?>

                    <li class="dropdown">
                        <a class="dropdown-toggle" data-toggle="dropdown" href="#">Módulos
                        <span class="caret"></span></a>
                        <ul class="dropdown-menu">
                            
                            <?php if ($_SESSION['modulos']['Módulo-Áreas de Apoyo']==1){ ?>
                                <li><a href="index.php?ctl=areas_apoyo_listar">Áreas de Apoyo</a></li>
                            <?php }; ?>
                                
                            <?php if ($_SESSION['modulos']['Módulo-Bitácora Digital']==1){ ?>
                                <li><a href="index.php?ctl=frm_eventos_listar">Bitácora Digital</a></li>
                            <?php }; ?>  
                                
                            <?php if ($_SESSION['modulos']['Módulo-Cencon']==1){?>
                                <li><a href="index.php?ctl=eventos_cencon">Cencon</a></li> 
                            <?php }; ?>
                                
                            <?php if ($_SESSION['modulos']['Módulo-Puestos de Monitoreo']==1){?>
                                <li><a href="index.php?ctl=controles_de_video_listar">Control de Video</a></li>
                            <?php }; ?>  
                                
                            <?php if ($_SESSION['modulos']['Módulo-Personal']==1){ ?>
                                <li><a href="index.php?ctl=personal_listar">Personal BCR</a></li>
                            <?php }; ?>  
                                
                            <?php if ($_SESSION['modulos']['Módulo-Personal Externo']==1){?>
                                <li><a href="index.php?ctl=personal_externo_listar">Personal Externo</a></li>
                            <?php }; ?>
                                
                            <?php if ($_SESSION['modulos']['Módulo-Programaciones']==1){ ?>
                                <li><a href="index.php?ctl=programacion_accesos">Programaciones</a></li>
                            <?php }; ?>
                                
                            <?php if ($_SESSION['modulos']['Módulo-Pruebas alarma']==1){?>
                                <li><a href="index.php?ctl=pruebas_alarma">Pruebas alarma</a></li> 
                            <?php }; ?>
                                
                            <?php if ($_SESSION['modulos']['Módulo-PuntosBCR']==1){ ?>
                                <li><a href="index.php?ctl=puntos_bcr_listar">Puntos BCR</a></li>
                            <?php }; ?>

                        </ul>
                    </li>

                <?php }; ?>
                    
                <?php 
                //************************************************Pinta Menu de Reportes***************************************************************
                if (($_SESSION['modulos']['Reportes-Eventos']==1)||($_SESSION['modulos']['Reportes-Oficinas']==1)||

                        ($_SESSION['modulos']['Reportes-Personal']==1)||($_SESSION['modulos']['Reportes-Alertas']==1)||
                        ($_SESSION['modulos']['Reportes-Enlaces Telecom']==1)||($_SESSION['modulos']['Reportes-Líneas teléfonicas']==1)||
                        ($_SESSION['modulos']['Reportes-Trazabilidad']==1)||($_SESSION['modulos']['Reportes-Historico seguimientos']==1)||
                        ($_SESSION['modulos']['Reportes-Activaciones provincia']==1)||($_SESSION['modulos']['Reportes-Cencon']==1)){ ?>
                    <li class="dropdown">
                        <a class="dropdown-toggle" data-toggle="dropdown" href="#">Reportes
                        <span class="caret"></span></a>
                        <ul class="dropdown-menu multi-level" role="menu">

                            <?php if ($_SESSION['modulos']['Reportes-Activaciones provincia']==1){ ?>
                                <li><a href="index.php?ctl=reporte_eventos_provincia">Activaciones por Provincia</a></li> 
                            <?php }; ?>
                               
                            <?php if ($_SESSION['modulos']['Reportes-Alertas Generales']==1){ ?>
                                <li><a href="index.php?ctl=alertas_generales">Alertas Generales</a></li> 
                            <?php }; ?>  
                              
                            <?php if ($_SESSION['modulos']['Reportes-Controles de Video']==1){ ?>
                                <li class="dropdown-submenu">
                                    <a class="multilevel" tabindex="-1" href="#">Control de Video<span class="caret"></span></a>
                                    <ul class="dropdown-menu">
                                      <li><a tabindex="-1" href="index.php?ctl=reporte_revisiones_video">Historial de revisiones</a></li>
                                      <li><a tabindex="-1" href="index.php?ctl=reporte_controles_de_video_listar">Estadisticas</a></li>
                                      <li><a tabindex="-1" href="index.php?ctl=reporte_ultimas_revisiones_video">Últimas revisiones</a></li>
                                      <li><a tabindex="-1" href="index.php?ctl=reporte_contador_video">Contador Control</a></li>
                                    </ul>
                                </li>
                            <?php }; ?> 
                              
                            <?php if ($_SESSION['modulos']['Reportes-Alertas Generales']==1){ ?>
                                <li><a href="index.php?ctl=reporte_tl300_en_puntos_bcr_listar">Direccionamiento Foglight</a></li> 
                            <?php }; ?> 
                                
                             <?php if ($_SESSION['modulos']['Reportes-Enlaces Telecom']==1){ ?>
                                <li><a href="index.php?ctl=enlace_reporte">Enlaces Telecom</a></li> 
                            <?php }; ?>  
                                
                            <?php if ($_SESSION['modulos']['Reportes-Historico seguimientos']==1){ ?>
                                <li><a href="index.php?ctl=reporte_seguimiento_eventos">Histórico Seguimiento Usuarios</a></li> 
                            <?php }; ?>  

                            <?php if ($_SESSION['modulos']['Reportes-Líneas teléfonicas']==1){ ?>
                                <li><a href="index.php?ctl=reporte_lineas_telefonicas">Líneas teléfonicas</a></li> 
                            <?php }; ?>
                                
                            <?php if ($_SESSION['modulos']['Módulo-Pruebas alarma']==1){ ?>
                                <li><a href="index.php?ctl=reporte_prueba_alarma">Pruebas alarma reportadas</a></li> 
                            <?php }; ?>
                                
                            <?php if ($_SESSION['modulos']['Reportes-Eventos']==1){ ?>
                                <li><a href="index.php?ctl=reporte_eventos_bitacora_digital">Reporte Eventos</a></li> 
                            <?php }; ?>
                                
                            <?php if ($_SESSION['modulos']['Reportes-Cencon']==1){ ?>
                                <li><a href="index.php?ctl=reporte_cencon">Reporte Cencon</a></li> 
                            <?php }; ?>
   
                            <?php if ($_SESSION['modulos']['Reportes-Cencon']==1){ ?>
                                <li><a href="index.php?ctl=reporte_seguimiento_cencon">Reporte Cencon Seguimientos</a></li> 
                            <?php }; ?> 
                                
                            <?php if ($_SESSION['modulos']['Reportes-Trazabilidad']==1){ ?>
                                <li><a href="index.php?ctl=frm_trazabilidad_listar">Trazabilidad</a></li> 
                            <?php }; ?>   

                        </ul>
                    </li>

                <?php }; ?>

                                   
                <?php 
                //************************************************Pinta Menu de Proyectos***************************************************************
                //Rol 2= Operador Z1    //Rol 3= Coordinador Empresa      //Rol 6= Operador Cencon        //Rol 11= Coordinador Z1
                //Rol 14= Operador Z2      //Rol 25= Control y seguimiento ATM's
                if (($_SESSION['modulos']['Seguridad-Trazabilidad']==1|| $_SESSION['rol']==25 || $_SESSION['rol']==2 || 
                        $_SESSION['rol']==3 || $_SESSION['rol']==6 || $_SESSION['rol']==11 || $_SESSION['rol']==14)){ ?>
                    <li class="dropdown">
                        <a class="dropdown-toggle" data-toggle="dropdown" href="#">Proyectos
                            <span class="caret"></span></a>
                        <ul class="dropdown-menu">
                            <?php if ($_SESSION['rol']==25||$_SESSION['modulos']['Seguridad-Trazabilidad']==1){?>
                                <li><a href="https://bcr0209ori01/ORIEL-Cajeros/index.php?ctl=inicio">Control y Seguimiento ATM's</a></li> 
                            <?php }; ?>
                                
                            <?php if ($_SESSION['modulos']['Seguridad-Trazabilidad']==1){?>
                                <li><a href="index.php?ctl=comite_crisis">Comité de Crisis</a></li> 
                            <?php }; ?>
                                
                            <?php if ($_SESSION['modulos']['Seguridad-Trazabilidad']==1 || $_SESSION['rol']==2 || 
                                $_SESSION['rol']==3 || $_SESSION['rol']==6 || $_SESSION['rol']==11 || $_SESSION['rol']==14){?>
                                <li><a href="https://bcrcartracktotal:28000/Cartrack/Login.aspx" target="_blank"><span class="glyphicon glyphicon-globe"></span> Cartrack</a></li> 
                            <?php }; ?>
                            
                            <?php if ($_SESSION['modulos']['Seguridad-Trazabilidad']==1 || $_SESSION['rol']==2 || 
                                $_SESSION['rol']==3 || $_SESSION['rol']==6 || $_SESSION['rol']==11 || $_SESSION['rol']==14){?>
                                <li><a href="http://bcr0106mft02:8080/console/page/cxlxlglwsg" target="_blank"><span class="glyphicon glyphicon-globe"></span> Foglight Z1</a></li> 
                            <?php }; ?>
                                
                            <?php if ($_SESSION['modulos']['Seguridad-Trazabilidad']==1 || $_SESSION['rol']==11){?>
                                <li><a href="http://172.20.7.14/desktop/#deviceGroups" target="_blank"><span class="glyphicon glyphicon-globe"></span> Monitoreo UPS</a></li> 
                            <?php }; ?>
                                
                            <?php if ($_SESSION['modulos']['Seguridad-Trazabilidad']==1|| $_SESSION['rol']==2 || 
                                $_SESSION['rol']==3 || $_SESSION['rol']==6 || $_SESSION['rol']==11 || $_SESSION['rol']==14){?>
                                <li><a href="https://10.170.5.81/check_mk/view.py?is_host_scheduled_downtime_depth=0&search=Search&filled_in=filter&is_host_acknowledged=-1&hst2=on&hst1=on&hst0=on&is_summary_host=0&hstp=on&opthostgroup=&selection=2b67b425-e2d2-422f-af1b-bd107d680baf&limit=hard&is_host_in_notification_period=-1&host=&view_name=hostproblems&sort=-hoststate%2Choststate%2Chost_state_age" target="_blank"><span class="glyphicon glyphicon-globe"></span> Griedshield</a></li> 
                            <?php }; ?>
                                
                            <?php if ($_SESSION['modulos']['Seguridad-Trazabilidad']==1 || $_SESSION['rol']==11){ ?>
                                <li><a href="https://bcr.service-now.com" target="_blank"><span class="glyphicon glyphicon-globe"></span> Service-now</a></li> 
                            <?php }; ?>
                                
                            <?php if ($_SESSION['modulos']['Seguridad-Trazabilidad']==1 || $_SESSION['rol']==11){?>
                                <li><a href="https://monitoreoatm:43/LOGIN_USER" target="_blank"><span class="glyphicon glyphicon-globe"></span> TS Monitor</a></li> 
                            <?php }; ?>
                        </ul>
                    </li>
                <?php  };    ?>
                    
                <?php 
                //************************************************Pinta Menu de Ayuda***************************************************************
                if (($_SESSION['modulos']['Ayuda']==1)){ ?>
                    <li class="dropdown">
                        <a class="dropdown-toggle" data-toggle="dropdown" href="#">Ayuda
                        <span class="caret"></span></a>
                        <ul class="dropdown-menu">
                            <li><a href="index.php?ctl=manual_ayuda_privado&manual=Usuario_Inicial">Manual Usuario Inicial</a></li>
                            
                            <?php if ($_SESSION['modulos']['Módulo-Bitácora Digital']==1){ ?>
                                <li><a href="index.php?ctl=manual_ayuda_privado&manual=Bitacora_Digital">Manual Bitácora Digital</a></li>
                            <?php }; ?>    
                                
                            <?php if ($_SESSION['modulos']['Módulo-PuntosBCR']==1){ ?>
                                <li><a href="index.php?ctl=manual_ayuda_privado&manual=Puntos_BCR">Manual Puntos BCR</a></li>
                            <?php }; ?>
                                
                            <?php if ($_SESSION['modulos']['Módulo-Personal']==1){ ?>
                                <li><a href="index.php?ctl=manual_ayuda_privado&manual=Personal_BCR">Manual Personal BCR</a></li>
                            <?php }; ?>
                                
                            <?php if ($_SESSION['modulos']['Módulo-Personal Externo']==1){ ?>
                                <li><a href="index.php?ctl=manual_ayuda_privado&manual=Personal_Externo">Manual Personal Externo</a></li>
                            <?php }; ?>
                             
                            <?php if ($_SESSION['modulos']['Módulo-Cencon']==1){ ?>
                                <li><a href="index.php?ctl=manual_ayuda_privado&manual=Cencon">Manual Cencon</a></li>
                            <?php }; ?>
                                
                            <?php if ($_SESSION['modulos']['Módulo-Puestos de Monitoreo']==1){ ?>
                                <li><a href="index.php?ctl=manual_ayuda_privado&manual=Control_Video">Manual Control de Video</a></li>
                            <?php }; ?>  
                                
                            <?php if ($_SESSION['modulos']['Módulo-Pruebas alarma']==1){ ?>
                                <li><a href="index.php?ctl=manual_ayuda_privado&manual=Prueba_Alarma">Manual Pruebas Alarma</a></li>
                            <?php }; ?>
                        </ul>
                    </li>
                <?php }; ?>       
            </ul>  

            <ul class="nav navbar-nav navbar-right">    
                <li><a href="index.php?ctl=principal"><span class="glyphicon glyphicon-th-large"></span><?php echo $_SESSION['name']." ".$_SESSION['apellido'];?></a></li>
                <li><a href="index.php?ctl=cerrar_sesion"><span class="glyphicon glyphicon-log-in"></span>Cerrar Sesión</a></li>    
            </ul>
      </div>
    </nav>
    
    <script>
        $(document).ready(function(){
            $('.dropdown-submenu a.multilevel').on("click", function(e){
                $(this).next('ul').toggle();
                e.stopPropagation();
                e.preventDefault();
            });
        });
    </script>

    
</html>